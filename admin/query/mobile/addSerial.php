<?php
include("../../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $accountID = $data['accountID'];
    $serialNumber = $data['serialNumber'];
    $query = "Update mobile_account set identifier=:identifier where accountID=:accountID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":identifier", $serialNumber);
    $stmt->bindParam(":accountID", $accountID);
    if($stmt->execute()){
        $response['msg'] = 'Device has been registered';
        echo json_encode($response);
    }else{
        $response['Error'] = true;
        $response['msg'] = 'Failed to register device';
        echo json_encode($response);
    }
    exit();
} catch (Exception $th) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}