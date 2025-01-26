<?php
include("../conn.php");

$response = array("Error" => true, "msg" => "");

try {
    $location = $_POST["location"];
    $query = "SELECT emp.idnumber, emp.lastname, emp.firstname, fd.name as department, fp.name as position  FROM employees as emp inner join field_department as fd on fd.fld_dept_id = emp.department INNER JOIN field_position as fp on fp.fld_position_id = emp.position WHERE emp.location = '$location' ";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        $response["Error"] = false;
        $response["msg"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $response["msg"] = "Error in query";
    }
    echo json_encode($response);
    exit();
} catch (Exception $e) {
    $response["msg"] = $e->getMessage();
    echo json_encode($response);
    exit();
}
