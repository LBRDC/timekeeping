<?php
include("../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    if (checkUser($conn, $_POST['employee'])) {
        $response['Error'] = true;
        $response['msg'] = "Employee already has a mobile account!";
        echo json_encode($response);
        exit();
    }
    $status = 1;
    $password = "LBRDC";
    $query = "INSERT INTO `mobile_account`(`Employee`, `Location`, `Password`, `Status`) VALUES (:employee,:location,:password,:status)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':employee', $_POST['employee']);
    $stmt->bindParam(':location', $_POST['location']);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':status', $status);
    if ($stmt->execute()) {
        $response['msg'] = "Mobile User Added Successfully!";
    }
    echo json_encode($response);
    exit();
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}


function checkUser($conn, $employee)
{
    $query = "SELECT * FROM `mobile_account` WHERE `Employee` = $employee";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return count($result) >= 1 ? true : false;
}