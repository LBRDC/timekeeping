<?php

include("../conn.php");
$response = array("Error" => false, 'msg' => '');
try {
    $id = $_POST['id'];
    $query = "select e.IdNumber, concat(e.LastName, ', ', e.FirstName, ' ', e.MiddleName) as name, e.Position, e.UnitOfAssignment, l.name_location, l.fld_location_id as loc_id from mobile_account as m INNER JOIN employee_tbl as e on e.IdNumber = m.Employee INNER JOIN field_location as l on l.fld_location_id = m.Location where m.accountID = $id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $response['msg'] = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($response);
    exit();
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}