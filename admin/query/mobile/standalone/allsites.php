<?php
include("../../../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $query = "select * from field_location where status != 0";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        $response['msg'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response);
    } else {
        $response['Error'] = true;
        $response['msg'] = 'Failed to fetch sites';
        echo json_encode($response);
    }
    exit();
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}
