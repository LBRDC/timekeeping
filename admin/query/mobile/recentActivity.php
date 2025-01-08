<?php

include("../../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $accountID = $data['accountID'];
    $date = new DateTime("now", new DateTimeZone("Asia/Taipei"));
    $timestamp = $date->getTimestamp();
    $query = "select * from `employee_attendance` WHERE `accountID` = :accountID and timestamps = :date";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':accountID', $accountID);
    $stmt->bindParam(':date', unix_to_date($timestamp));
    if ($stmt->execute()) {
        $response['Error'] = false;
        $response['data'] = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($response);
    }
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}

function unix_to_date($date){
    return date("m-d-Y", $date);
}