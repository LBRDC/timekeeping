<?php

include '../conn.php';

$emp_id = isset($_POST['id']) ? $_POST['id'] : "";

try {
    global $inv_emp;
    $stmt = $conn->prepare("SELECT * FROM employee_tbl WHERE IdNumber = :id");
    $stmt->bindParam(":id", $emp_id);
    $stmt->execute();
    $inv_emp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['Error' => false, "info" => $inv_emp, "header" => ""]);
} catch (Exception $e) {
    echo json_encode(['Error' => true, "msg" => $e->getMessage()]);
}