<?php
include("../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    $accID = $_POST['accountID'];
    $location = $_POST['location'];
    $query = "UPDATE `mobile_account` SET `Location` = :location WHERE `accountID` = :accountID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':accountID', $accID);
    $stmt->bindParam(':location', $location);
    if ($stmt->execute()) {
        $response['msg'] = "Mobile User Updated Successfully!";
    }
    echo json_encode($response);
    exit();
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}