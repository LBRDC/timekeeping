<?php

include("../../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $accountID = $data['accountID'];
    $email = $data['email'];
    $query = "UPDATE `mobile_account` SET `Email` = :email WHERE `accountID` = :accountID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':accountID', $accountID);
    $stmt->bindParam(':email', $email);
    if ($stmt->execute()) {
        $response['Error'] = false;
        $response['msg'] = 'Email Updated';
        echo json_encode($response);
    }
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}