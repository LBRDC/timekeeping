<?php

include("../../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $accountID = $data['accountID'];
    $password = hash('sha256', $data['password']);
    $query = "UPDATE `mobile_account` SET `Password` = :password WHERE `accountID` = :accountID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':accountID', $accountID);
    $stmt->bindParam(':password', $password);
    if ($stmt->execute()) {
        $response['Error'] = false;
        $response['msg'] = 'Password Updated';
        echo json_encode($response);
    }
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}
