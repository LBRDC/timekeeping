<?php
include("../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    $accID = $_POST['accountID'];
    $pw = hash('sha256', "LBRDC");
    $query = "UPDATE `mobile_account` SET `Password` = :location WHERE `accountID` = :accountID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':accountID', $accID);
    $stmt->bindParam(':location', $pw);
    if ($stmt->execute()) {
        $response['msg'] = "Account has been reset successfully!";
    }
    echo json_encode($response);
    exit();
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}
