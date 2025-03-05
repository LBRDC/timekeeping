<?php
include("../conn.php");

$response = array("Error" => false, 'msg' => '');
$key = $_POST['key'];
try {
    if ($key == "resetPassword") {
        $accID = $_POST['accountID'];
        $pw = hash('sha256', "LBRDC");
        $query = "UPDATE `mobile_account` SET `Password` = :password WHERE `accountID` = :accountID";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':accountID', $accID);
        $stmt->bindParam(':password', $pw);
        if ($stmt->execute()) {
            $response['msg'] = "Password has been reset successfully!";
        }
        echo json_encode($response);
        exit();
    }
    if ($key == "resetDevice") {
        $accID = $_POST['accountID'];
        $identifier = "";
        $query = "UPDATE `mobile_account` SET `identifier` = :identifier WHERE `accountID` = :accountID";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':accountID', $accID);
        $stmt->bindParam(':identifier', $identifier);
        if ($stmt->execute()) {
            $response['msg'] = "Device has been reset successfully!";
        }
        echo json_encode($response);
        exit();
    }
    if ($key == "resetEmail") {
        $accID = $_POST['accountID'];
        $email = "";
        $query = "UPDATE `mobile_account` SET `Email` = :email WHERE `accountID` = :accountID";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':accountID', $accID);
        $stmt->bindParam(':email', $email);
        if ($stmt->execute()) {
            $response['msg'] = "Email has been reset successfully!";
        }
        echo json_encode($response);
        exit();
    }
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}
