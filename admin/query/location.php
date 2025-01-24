<?php

include "../conn.php";
$response = array("Error" => false, "msg" => "");

$id = $_POST['id'];
$status = $_POST['status'];

try {
    $query = "UPDATE field_location SET status = :status WHERE fld_location_id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        $response["Error"] = false;
        $response["msg"] = "Location status updated successfully!";
    } else {
        $response["Error"] = true;
        $response["msg"] = "Failed to update location status!";
    }
    echo json_encode($response);
    exit();
} catch (Exception $e) {
    $response["Error"] = true;
    $response["msg"] = "An error occurred while updating location status!";
    echo json_encode($response);
    exit();
}
