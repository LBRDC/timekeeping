<?php

include("../../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $accountID = $data['accountID'];
    $query = "SELECT concat(e.lastname, ', ', e.firstname, ' ', e.middlename) as name, m.accountID, m.Employee as EmployeeID, m.Location as LocationID, m.Email, m.Password, concat(l.name_location, ' ', '[', fs.check_in,' - ', fs.check_out ,']') as Location, m.Status, l.latitude, l.longitude, l.radius, m.Status, m.identifier FROM `mobile_account` as m INNER join employees as e on e.idnumber = m.Employee INNER JOIN field_location as l on l.fld_location_id = e.location inner join field_schedule as fs on fs.fld_schedule_id = e.shift where m.accountID= :emp_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':emp_id', $accountID);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $response['Error'] = false;
    $response['msg'] = 'Data fetched';
    $response['data'] = $result;
    echo json_encode($response);
    exit();
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}
