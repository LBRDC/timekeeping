<?php
include("../conn.php");

$response = array("Error" => true, "msg" => "");

$key = $_POST['key'];

try {
    if ($key == 'add') {
        $employee = $_POST['id'];
        $username = $_POST['username'];
        $password = hash('sha256', "Password01");
        $date = date('Y-m-d');
        $query = "insert into admin_users(employee, admin_username, admin_password, date) values(:employee, :username, :password, :date)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':employee', $employee);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':date', $date);
        if ($stmt->execute()) {
            $response['Error'] = false;
            $response['msg'] = "User Account Added";
        } else {
            $response['msg'] = "Failed to add User Account";
        }
        echo json_encode($response);
        exit();
    }
    if ($key == "delete") {
        $id = $_POST['id'];
        $query = "delete from admin_users where employee = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $response['Error'] = false;
            $response['msg'] = "User Account Deleted";
        } else {
            $response['msg'] = "Failed to delete User Account";
        }
        echo json_encode($response);
        exit();
    }
} catch (Exception $e) {
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}
