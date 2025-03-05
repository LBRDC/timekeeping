<?php
include("../conn.php");

$response = array("Error" => true, "msg" => "");
try {
    $id = $_POST['id'];
    $query = "select * from employees where id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $response['Error'] = false;
    $response['msg'] = $result;
    echo json_encode($response);
    exit();
} catch (Exception $e) {
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
}
