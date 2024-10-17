<?php
include "../conn.php";

$response = array("Error" => true, "msg" => "");
// $json = file_get_contents('php://input');
// $data = json_decode($json, true);
$add_Status = 1;
$add_Created = date("Y-m-d");
$column = ['emp_status', 'emp_created'];
$params = [':emp_status', ':emp_created'];
$values = [':emp_status' => $add_Status, ':emp_created' => $add_Created];
// $employee = $data['employee'];
$emp_keys = json_decode($_POST['keys']);
$emp_values = json_decode($_POST['values']);
$data = ["keys" => $emp_keys, "values" => $emp_values];
// $response['msg'] = $data;
// echo json_encode(value: $response);
// exit();
try {
    for ($i = 0; $i < count($data['keys']); $i++) {
        $column[] = $data['keys'][$i][0];
        $params[] = ":" . $data['keys'][$i][0];
        $values[":" . $data['keys'][$i][0]] = $data['values'][$i][0];

        // $values[] = "'" . $data['values'][$i][0] . "'";
    }
    if (count($column) != count($params)) {
        $response['msg'] = "Invalid Data";
        echo json_encode($response);
        exit();
    }
    $query = "insert into employee_tbl (" . implode(", ", $column) . ") values (" . implode(", ", $params) . ")";
    // var_dump($values);
    $stmt = $conn->prepare($query);
    if (!checkDuplicate($conn, $values[':IdNumber'])) {
        if ($stmt->execute($values)) {
            $response['Error'] = false;
            $response['msg'] = "Employee has been added";
        }
    } else {
        $response['msg'] = "Employee already exist";
    }

    echo json_encode($response);
} catch (Exception $e) {
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
}


function checkDuplicate($con, $emp_number)
{
    $query = "select * from employee_tbl where IdNumber='$emp_number'";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // return $result;
    return count($result) == 1 ? true : false;

}