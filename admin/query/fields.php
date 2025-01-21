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
} else if ($fields == "holiday") {
    if ($key == "add") {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $type = $_POST['type'];
        $dateTime = new DateTime($date);
        $formattedDate = $dateTime->format('m-d-Y');
        $query = "insert into field_holiday (name, date, type) values (:name, :date, :type)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':date', $formattedDate);
        $stmt->bindParam(':type', $type);
        if ($stmt->execute()) {
            $response['msg'] = "Holiday added successfully!";
        } else {
            $response['Error'] = true;
            $response['msg'] = "Failed to add holiday!";
        }
        echo json_encode($response);
        exit();
    } else if ($key == "delete") {
        $id = $_POST['id'];
        $query = "delete from field_holiday where id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $response['msg'] = "Holiday deleted successfully!";
        } else {
            $response['Error'] = true;
            $response['msg'] = "Failed to delete holiday!";
        }
        echo json_encode($response);
        exit();
    }
} else if ($fields == "signatory") {
    if ($key == "add") {
        $name = $_POST['name'];
        $position = $_POST['position'];
        $no = $_POST['no'];
        $isDefault = 0;
        $query = "insert into field_signatories (name, position, sign_no, isDefault) values (:name, :position, :no, :isDefault)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':no', $no);
        $stmt->bindParam(':isDefault', $isDefault);
        if ($stmt->execute()) {
            $response['msg'] = "Signatory added successfully!";
        } else {
            $response['Error'] = true;
            $response['msg'] = "Failed to add signatory!";
        }
        echo json_encode($response);
        exit();
    }

    if ($key == "setDefault") {
        $id = $_POST['id'];
        $query = "update field_signatories set isDefault = 0";
        $stmt = $conn->prepare($query);
        if ($stmt->execute()) {
            $query = "update field_signatories set isDefault = 1 where id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                $response['msg'] = "Signatory set as default successfully!";
            } else {
                $response['Error'] = true;
                $response['msg'] = "Failed to set signatory as default!";
            }
        }
        echo json_encode($response);
        exit();
    }

    if ($key == "delete") {
        $id = $_POST['id'];
        $query = "delete from field_signatories where id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $response['msg'] = "Signatory deleted successfully!";
        } else {
            $response['Error'] = true;
            $response['msg'] = "Failed to delete signatory!";
        }
        echo json_encode($response);
        exit();
    }
}
