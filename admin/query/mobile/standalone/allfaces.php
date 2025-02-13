<?php
include("../../../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $location = $data['location'];
    $query = "select ma.face, ma.Employee as idnumber, concat(em.firstname, ' ', em.lastname) as name  from mobile_account as ma inner join employees as em on em.idnumber = ma.Employee where !ISNULL(ma.face) and ma.Location = :location";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':location', $location);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = [];
    foreach ($result as $row) {
        $face = $row['face'];
        array_push($data, array("face" => $face, "name" => $row['name'], "idnumber" => $row['idnumber']));
    }
    $response['msg'] = $data;
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
} finally {
    echo json_encode($response);
}
