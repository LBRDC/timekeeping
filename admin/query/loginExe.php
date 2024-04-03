<?php 
session_start();
include("../conn.php");

// Ensure the data is received from the AJAX request
$lgn_username = isset($_POST['lgn_username']) ? $_POST['lgn_username'] : '';
$lgn_password = isset($_POST['lgn_password']) ? $_POST['lgn_password'] : '';

// Prepare the SQL statement
$stmt = $conn->prepare("SELECT * FROM admin_users WHERE admin_username = :username AND admin_password = :password ");

$stmt->bindParam(':username', $lgn_username);
$stmt->bindParam(':password', $lgn_password);

$stmt->execute();

$admin_Acc = $stmt->fetch(PDO::FETCH_ASSOC);

if ($admin_Acc) {
    $_SESSION['user'] = array(
        'admin_img' => $admin_Acc['admin_img'],
        'admin_name' => $admin_Acc['admin_name'],
        'admin_super' => $admin_Acc['superuser']
    );
    $res = array("res" => "success");
} else {
    $res = array("res" => "failed");
}

echo json_encode($res);
