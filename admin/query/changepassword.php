<?php
session_start();
include "../conn.php";
$response = array("Error" => false, "msg" => "");
$user = $_SESSION['user'];

try {
    $accID = $_POST['accountID'];
    $curr = hash('sha256', $_POST['curr_pass']);
    $new = hash('sha256', $_POST['new_pass']);
    $con = hash('sha256', $_POST['con_pass']);

    if ($user['admin_pass'] != $curr) {
        $response['Error'] = true;
        $response['msg'] = 'Current password is incorrect';
        echo json_encode($response);
        exit();
    }

    if ($new != $con) {
        $response['Error'] = true;
        $response['msg'] = 'New password and confirm password does not match';
        echo json_encode($response);
        exit();
    }

    $query = "update admin_users set admin_password = :pass where id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':pass', $new);
    $stmt->bindParam(':id', $accID);
    if ($stmt->execute()) {
        $response['msg'] = 'Password successfully changed';
        echo json_encode($response);
        session_destroy();
        exit();
    }
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}
