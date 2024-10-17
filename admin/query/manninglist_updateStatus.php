<?php
session_start();
include '../conn.php';


$id = isset($_POST['id']) ? $_POST['id'] : "";
$status = isset($_POST['status']) ? $_POST['status'] : "";
$response = array("Error" => true, "msg" => "");
try {
    $conn->beginTransaction();
    $stmt = $conn->prepare("UPDATE employee_tbl SET emp_status = :status WHERE IdNumber = :id");
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $response['Error'] = false;
    $response['msg'] = "Status updated";
    $txt = $status == 1 ? "Active" : "Inactive";
    $logs = addLogs("Manning-List", "Set Employee status :" . $txt, $_SESSION['user']['admin_name']);
    if (!$logs) {
        $conn->rollBack();
        $response['Error'] = true;
        $response['msg'] = "Failed to add logs";
        echo json_encode($response);
        exit();
    }

    echo json_encode($response);
    $conn->commit();
} catch (Exception $e) {
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
}