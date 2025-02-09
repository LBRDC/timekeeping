<?php
include("../../../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $query = "select  em.idnumber, concat(em.firstname, ' ', em.lastname) as name from employees as em INNER JOIN field_location as fl on fl.fld_location_id = em.location where fl.fld_location_id = :locationID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':locationID', $data['location']);
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
