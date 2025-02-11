<?php
include("../../../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $location = $data['location'];
    $query = "select face from mobile_account as ma where !ISNULL(ma.face) and ma.Location = :location";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':location', $location);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = [];
    foreach ($result as $row) {
        $face = $row['face'];
        array_push($data, array("face" => $face));
    }
    $response['msg'] = $data;
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
} finally {
    echo json_encode($response);
}
