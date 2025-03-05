<?php
include("../conn.php");

$response = array("Error" => false, "msg" => "");

$key = $_POST['key'];
try {
    if ($key == 'add') {
        if (checkUser($conn, $_POST['id'])) {
            $response['msg'] = "User Account Already Exist";
            echo json_encode($response);
            exit();
        }
        $conn->beginTransaction();
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


        $query = "insert into user_permission(userID) values(:employee)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':employee', $employee);
        if ($stmt->execute()) {
            $response['Error'] = false;
            $response['msg'] = "User Account Added";
        } else {
            $response['msg'] = "Failed to add User Account";
        }
        $conn->commit();
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
    if ($key == 'getPermission') {
        $id = $_POST['id'];
        $query = "select * from user_permission where userID = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($result);
        exit();
    }
    if ($key == "setPermission") {
        $conn->beginTransaction();
        $permissions = json_decode($_POST['permissions']);
        $id = $_POST['userid'];
        $permissionVal = true;
        $query = "UPDATE `user_permission` SET `employee_add`='0',`employee_edit`='0',`employee_delete`='0',`department`='0',`position`='0',`payroll_group`='0',`location`='0',`schedule`='0',`signatories`='0',`holiday`='0',`mobile_add`='0',`mobile_email`='0',`mobile_device`='0' WHERE userID = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if (!$stmt->execute()) {
            $response['Error'] = true;
            $response['msg'] = "Failed to update permission";
            $conn->rollBack();
            echo json_encode($response);
            exit();
        }
        foreach ($permissions as $val) {
            $query = "update user_permission set $val = :value where userID = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':value', $permissionVal);
            $stmt->bindParam(':id', $id);
            if (!$stmt->execute()) {
                $response['Error'] = true;
                $response['msg'] = "Failed to update permission";
                $conn->rollBack();
                echo json_encode($response);
                exit();
            }
        }
        $conn->commit();
        $response['msg'] = "Permissions updated successfully";
        echo json_encode($response);
        exit();
    }
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}


function checkUser($conn, $id)
{
    $query = "select * from admin_users where employee = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        return true;
    } else {
        return false;
    }
}
