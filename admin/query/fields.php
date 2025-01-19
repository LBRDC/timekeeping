<?php

include "../conn.php";
$response = array("Error" => false, "msg" => "");
$fields = $_POST['fields'];
$key = $_POST['key'];
if ($fields == "department") {
    if ($key == "add") {
        $code = $_POST['code'];
        $name = $_POST['name'];
        $status = 1;
        $query = "INSERT INTO `field_department`(`code`, `name`, `status`) VALUES (:code, :name, :status)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':status', $status);
        if ($stmt->execute()) {
            $response['msg'] = "Department added successfully!";
        } else {
            $response['Error'] = true;
            $response['msg'] = "Failed to add department!";
        }
        echo json_encode($response);
        exit();
    }

    if ($key == "edit") {
        $id = $_POST['id'];
        $code = $_POST['code'];
        $name = $_POST['name'];
        $query = "UPDATE `field_department` SET `code`=:code,`name`=:name WHERE `fld_dept_id`=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $response['msg'] = "Department updated successfully!";
        } else {
            $response['Error'] = true;
            $response['msg'] = "Failed to update department!";
        }
        echo json_encode($response);
        exit();
    }

    if ($key == "status") {
        $id = $_POST['id'];
        $status = $_POST['status'];
        $query = "UPDATE `field_department` SET `status`=:status WHERE `fld_dept_id`=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $response['msg'] = "Department status updated successfully!";
        } else {
            $response['Error'] = true;
            $response['msg'] = "Failed to update department status!";
        }
        echo json_encode($response);
        exit();
    }
}
