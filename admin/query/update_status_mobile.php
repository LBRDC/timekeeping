<?php
include("../conn.php");

$response = array("Error" => false, "msg" => "");
try {
    $accID = $_POST['accountID'];
    $status = $_POST['status'];
    $query = "UPDATE `mobile_account` SET `Status`='$status' WHERE accountID = '$accID'";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        $response["msg"] = "Status updated successfully";
    }
    echo json_encode($response);
    exit();
} catch (\Throwable $th) {
    $response["Error"] = true;
    $response["msg"] = "Error: " . $th->getMessage();
    echo json_encode($response);
    exit();
}