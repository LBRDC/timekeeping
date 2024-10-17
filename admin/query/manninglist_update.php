<?php
session_start();
include "../conn.php";

// $json = file_get_contents('php://input');
// $data = json_decode($json, true);
// $id = $data['id'];
// $keys = $data['keys'];
// $values = $data['values'];
$id = isset($_POST['id']) ? $_POST['id'] : "";
$keys = isset($_POST['keys']) ? $_POST['keys'] : [];
$values = isset($_POST['values']) ? $_POST['values'] : [];
$newData = [];
try {
    $conn->beginTransaction();
    $queArr = [];
    for ($i = 0; $i < count($keys); $i++) {
        $newData[":" . $keys[$i][0]] = $values[$i][0];
        array_push($queArr, $keys[$i][0] . " = :" . $keys[$i][0]);
    }
    $query = "update employee_tbl set " . implode(", ", $queArr);

    $query .= " where IdNumber =" . $id;
    $stmt = $conn->prepare($query);
    $stmt->execute($newData);

    $logs = addLogs("Manning-List", "Update Employee :" . $id, $_SESSION['user']['admin_name']);
    if (!$logs) {
        $conn->rollBack();
        $response['Error'] = true;
        $response['msg'] = "Failed to add logs";
        echo json_encode($response);
        exit();
    }
    $conn->commit();
    echo json_encode(['Error' => false, "msg" => "Record Updated"]);
} catch (Exception $e) {
    echo json_encode(['Error' => true, "msg" => $e->getMessage()]);
}