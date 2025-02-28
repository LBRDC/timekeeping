<?php

include("../../conn.php");

$response = array("Error" => false, 'msg' => '');
try {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $accountID = $data['accountID'];
    $query = "select check_in, check_out, break_in, break_out, ot_in, ot_out, timestamps from employee_attendance where accountID=:accountID order by timestamps desc";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":accountID", $accountID);
    $stmt->execute();
    $result = $stmt->fetchAll();
    echo json_encode($result);
    exit();
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}
