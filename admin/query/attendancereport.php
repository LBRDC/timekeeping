<?php
include("../conn.php");
date_default_timezone_set("Asia/Shanghai");
$response = array("Error" => false, 'msg' => []);
try {
    $users = $_POST['users'];
    // $users = json_decode(file_get_contents("php://input"), true);
    // $users = $users['users'];

    foreach ($users as $user) {
        $id = $user['idnumber'];
        $start_date = $user['startDate'];
        $end_date = $user['endDate'];
        array_push($response['msg'], getUser($conn, $id, formatDate($start_date), formatDate($end_date)));
    }
    echo json_encode($response);
    exit();
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}


function formatDate($date)
{
    $date = date_create($date);
    return date_format($date, 'm-d-Y');
}

function getUser($con, $id, $start_date, $end_date)
{

    $userDetails = ["user" => ['idnumber' => '', 'emp_name' => '', 'emp_status' => '', 'department' => '', 'position' => '', 'location' => '',], 'attendance' => [], 'startdate' => $start_date, 'enddate' => $end_date, "holidays" => [], 'signatory' => ''];

    $sql = "SELECT emp.idnumber, concat(emp.lastname,' ',emp.firstname) as emp_name, emp.employment_type as emp_status, fd.name as department, fp.name as position, fl.name_location as location, fs.check_in, fs.check_out  FROM employees as emp inner join field_department as fd on fd.fld_dept_id = emp.department inner join field_position as fp on fp.fld_position_id = emp.position inner join field_location as fl on fl.fld_location_id = emp.location inner join field_schedule as fs on fs.fld_schedule_id = emp.shift WHERE idnumber = $id";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $userDetails['user']['idnumber'] = $result['idnumber'];
    $userDetails['user']['emp_name'] = $result['emp_name'];
    $userDetails['user']['emp_status'] = $result['emp_status'];
    $userDetails['user']['department'] = $result['department'];
    $userDetails['user']['position'] = $result['position'];
    $userDetails['user']['location'] = $result['location'];
    $userDetails['user']['check_in'] = $result['check_in'];
    $userDetails['user']['check_out'] = $result['check_out'];
    $userDetails['user']['formatted'] = $result['idnumber'] . '   ' . $result['emp_name'] . '           ' . $result['position'] . '   ' . $result['department'] . '   ' . strtoupper($result['emp_status']);
    $sql = "select date, type from field_holiday";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $userDetails['holidays'] = $result;
    $sql = "SELECT name, position FROM `field_signatories` WHERE isDefault = 1";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $userDetails['signatory'] = $result;
    $sql = 'SELECT ifnull(timestamps, "")as timestamps, ifnull(check_in,"") as check_in, ifnull(break_out, "") as break_out, ifnull(break_in, "") as break_in, ifnull(check_out,"")as check_out, ifnull(ot_in, "") as ot_in, ifnull(ot_out,"") as ot_out FROM `employee_attendance` WHERE `timestamps` >= :startdate and `timestamps` <= :enddate and accountID = :id order by timestamps asc';
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':startdate', $start_date);
    $stmt->bindParam(':enddate', $end_date);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $attendance = [];
    foreach ($result as $row) {
        $attendance[] = $row;
    }
    $userDetails['attendance'] = $attendance;
    return $userDetails;
}
