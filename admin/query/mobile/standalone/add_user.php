<?php
include("../../../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $employee = $data['employee'];
    $face = $data['face'];
    $location = $data['location'];
    if (checkUser($conn, $employee)) {
        if (haveFace($conn, $employee)) {
            $response['Error'] = true;
            $response['msg'] = "Already registered face!";
            echo json_encode($response);
        } else {
            $query = "UPDATE `mobile_account` SET `face` = :face WHERE `Employee` = :employee";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':face', $face);
            $stmt->bindParam(':employee', $employee);
            if ($stmt->execute()) {
                $response['msg'] = "Face added successfully!";
                $response['face'] = $face;
                echo json_encode($response);
            } else {
                $response['Error'] = true;
                $response['msg'] = 'Failed to add face';
                echo json_encode($response);
            }
        }
        exit();
    }
    $status = 1;
    $password = hash('sha256', '"LBRDC"');
    $query = "INSERT INTO `mobile_account`(`Employee`, `Location`, `Password`, `face` `Status`) VALUES (:employee,:location,:password, `:face`, :status)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':employee', $employee);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':face', $face);
    $stmt->bindParam(':status', $status);
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

function haveFace($conn, $employee)
{
    $query = "SELECT face FROM `mobile_account` WHERE `Employee` = $employee";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return empty($result[0]['face'])  ? false : true;
}
