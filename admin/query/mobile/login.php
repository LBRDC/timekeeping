<?php

include("../../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $usernamae = $data['username'];
    $password = $data['password'];
    $query = "SELECT concat(e.LastName, ', ', e.FirstName, ' ', e.MiddleName) as name, m.accountID, m.Employee as EmployeeID, m.Location as LocationID, m.Email, m.Password, l.name_location as Location, l.latitude, l.longitude, l.radius, m.Status, m.identifier FROM `mobile_account` as m INNER join employee_tbl as e on e.IdNumber = m.Employee INNER JOIN field_location as l on l.fld_location_id = m.Location where BINARY m.Employee = :emp_id and BINARY m.Password = :emp_pass";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':emp_id', $usernamae);
    $stmt->bindParam(':emp_pass', $password);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $row = $stmt->rowCount();
    if ($row == 1) {
        $response['Error'] = false;
        $response['msg'] = 'Login Success';
        $response['data'] = $result;
        echo json_encode($response);
    } else {
        $response['Error'] = true;
        $response['msg'] = 'Invalid Username or Password';
        echo json_encode($response);
    }
    exit();
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}