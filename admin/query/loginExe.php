<?php
session_start();
include("../conn.php");

// Ensure the data is received from the AJAX request
$lgn_username = isset($_POST['lgn_username']) ? $_POST['lgn_username'] : '';
$lgn_password = isset($_POST['lgn_password']) ? $_POST['lgn_password'] : '';
$stmt = null;
$lgn_password = hash('sha256', $lgn_password);
// Prepare the SQL statement
if ($lgn_username == "admin") {
    $query = "SELECT * FROM admin_users WHERE admin_username = :username AND admin_password = :password";
    $stmt = $conn->prepare($query);
} else {
    $stmt = $conn->prepare("SELECT au.admin_img, au.superuser, concat(emp.firstname, ' ', emp.lastname) as name, fp.name as position FROM admin_users as au inner join employees as emp on emp.idnumber = au.employee inner join field_position as fp on fp.fld_position_id = emp.position  WHERE admin_username = :username AND admin_password = :password ");
}

$stmt->bindParam(':username', $lgn_username);
$stmt->bindParam(':password', $lgn_password);

$stmt->execute();

$admin_Acc = $stmt->fetch(PDO::FETCH_ASSOC);

if ($admin_Acc) {
    $_SESSION['user'] = array(
        'admin_img' => $admin_Acc['admin_img'],
        'admin_name' => empty($admin_Acc['name']) ? "Administrator" : $admin_Acc['name'],
        'admin_super' => $admin_Acc['superuser'],
        'admin_position' => empty($admin_Acc['name']) ? "Administrator" : $admin_Acc['position'],
    );
    $res = array("res" => "success");
} else {
    $res = array("res" => "failed");
}

echo json_encode($res);
