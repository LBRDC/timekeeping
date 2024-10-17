<?php
include '../conn.php';


$id = isset($_POST['id']) ? $_POST['id'] : "";
$status = isset($_POST['status']) ? $_POST['status'] : "";
$response = array("Error" => true, "msg" => "");
try {
    $stmt = $conn->prepare("UPDATE employee_tbl SET emp_status = :status WHERE IdNumber = :id");
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $response['Error'] = false;
    $response['msg'] = "Status updated";
    echo json_encode($response);
} catch (Exception $e) {
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
}