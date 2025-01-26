<?php
include("../conn.php");

$response = array("Error" => true, "msg" => "");

$key = $_POST['key'];
try {
    if ($key == "payrollgroup") {
        $location_id = $_POST['location'];
        $query = "SELECT * FROM `field_payrollgroup` WHERE location_id = :location_id AND status != 0";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':location_id', $location_id);
        $stmt->execute();
        $payroll = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $response['Error'] = false;
        $response['msg'] = $payroll;
        echo json_encode($response);
        exit();
    }
    if ($key == "department") {
        $payroll_id = $_POST['payrollgroup'];
        $query = "SELECT * FROM `field_department` WHERE payroll_id = :payroll_id AND status != 0";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':payroll_id', $payroll_id);
        $stmt->execute();
        $department = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $response['Error'] = false;
        $response['msg'] = $department;
        echo json_encode($response);
        exit();
    }
    if ($key == "employees") {
        $department_id = $_POST['department'];
        $location_id = $_POST['location'];
        $payroll_id = $_POST['payrollgroup'];
        $query = "SELECT emp.firstname, emp.lastname, emp.idnumber, fp.name as position  FROM `employees` as emp inner join field_position as fp WHERE department = :department_id AND location = :location_id AND payrollgroup = :payroll_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->bindParam(':location_id', $location_id);
        $stmt->bindParam(':payroll_id', $payroll_id);
        $stmt->execute();
        $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $response['Error'] = false;
        $response['msg'] = $employees;
        echo json_encode($response);
        exit();
    }
} catch (Exception $e) {
}
