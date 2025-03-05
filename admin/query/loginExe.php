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
    $stmt = $conn->prepare("SELECT au.admin_img, au.superuser, concat(emp.firstname, ' ', emp.lastname) as name, fp.name as position, up.employee_add, up.employee_edit, up.employee_delete, up.department, up.position, up.payroll_group, up.location, up.schedule, up.signatories, up.holiday, up.mobile_add, up.mobile_email, up.mobile_device FROM admin_users as au inner join employees as emp on emp.idnumber = au.employee inner join field_position as fp on fp.fld_position_id = emp.position inner join user_permission as up on up.userID = au.employee  WHERE admin_username = :username AND admin_password = :password ");
}

$stmt->bindParam(':username', $lgn_username);
$stmt->bindParam(':password', $lgn_password);

$stmt->execute();

$admin_Acc = $stmt->fetch(PDO::FETCH_ASSOC);

if ($admin_Acc) {
    $_SESSION['user'] = array(
        'admin_img' => $admin_Acc['admin_img'],
        'admin_name' => $admin_Acc['name'] ?? "Administrator",
        'admin_super' => $admin_Acc['superuser'],
        'admin_position' => $admin_Acc['position'] ?? "Administrator",
        'employee_add' => $admin_Acc['employee_add'] ?? 1,
        'employee_edit' => $admin_Acc['employee_edit'] ?? 1,
        'employee_delete' => $admin_Acc['employee_delete'] ?? 1,
        'department' => $admin_Acc['department'] ?? 1,
        'position' => $admin_Acc['position'] ?? 1,
        'payroll_group' => $admin_Acc['payroll_group'] ?? 1,
        'location' => $admin_Acc['location'] ?? 1,
        'schedule' => $admin_Acc['schedule'] ?? 1,
        'signatories' => $admin_Acc['signatories'] ?? 1,
        'holiday' => $admin_Acc['holiday'] ?? 1,
        'mobile_add' => $admin_Acc['mobile_add'] ?? 1,
        'mobile_email' => $admin_Acc['mobile_email'] ?? 1,
        'mobile_device' => $admin_Acc['mobile_device'] ?? 1,
    );
    // $_SESSION['user'] = array(
    //     'admin_img' => $admin_Acc['admin_img'],
    //     'admin_name' => empty($admin_Acc['name']) ? "Administrator" : $admin_Acc['name'],
    //     'admin_super' => $admin_Acc['superuser'],
    //     'admin_position' => empty($admin_Acc['name']) ? "Administrator" : $admin_Acc['position'],
    //     'employee_add' => empty($admin_Acc['employee_add']) && $admin_Acc['employee_add'] == null ? "EMPTY" : $admin_Acc['employee_add'],
    //     'employee_edit' => empty($admin_Acc['employee_edit']) && $admin_Acc['employee_edit'] == null ? 1 : $admin_Acc['employee_edit'],
    //     'employee_delete' => empty($admin_Acc['employee_delete']) && $admin_Acc['employee_delete'] == null ? 1 : $admin_Acc['employee_delete'],
    //     'department' => empty($admin_Acc['department']) && $admin_Acc['department'] == null ? 1 : $admin_Acc['department'],
    //     'position' => empty($admin_Acc['position']) && $admin_Acc['position'] == null ? 1 : $admin_Acc['position'],
    //     'payroll_group' => empty($admin_Acc['payroll_group']) && $admin_Acc['payroll_group'] == null ? 1 : $admin_Acc['payroll_group'],
    //     'location' => empty($admin_Acc['location']) && $admin_Acc['location'] == null ? 1 : $admin_Acc['location'],
    //     'schedule' => empty($admin_Acc['schedule']) && $admin_Acc['schedule'] == null ? 1 : $admin_Acc['schedule'],
    //     'signatories' => empty($admin_Acc['signatories']) && $admin_Acc['signatories'] == null ? 1 : $admin_Acc['signatories'],
    //     'holiday' => empty($admin_Acc['holiday']) && $admin_Acc['holiday'] == null ? 1 : $admin_Acc['holiday'],
    //     'mobile_add' => empty($admin_Acc['mobile_add']) && $admin_Acc['mobile_add'] == null ? 1 : $admin_Acc['mobile_add'],
    //     'mobile_edit' => empty($admin_Acc['mobile_edit']) && $admin_Acc['mobile_edit'] == null ? 1 : $admin_Acc['mobile_edit'],
    //     'mobile_delete' => empty($admin_Acc['mobile_delete']) &&  $admin_Acc['mobile_delete'] == null ? 1 : $admin_Acc['mobile_delete'],
    // );
    $res = array("res" => "success");
} else {
    $res = array("res" => "failed");
}

echo json_encode($res);
