<?php
include("../conn.php");

$response = array("Error" => true, "msg" => "");
try {
    $idnumber = $_POST['emp_no'];
    $emptype = $_POST['emp_type'];
    $empstatus = $_POST['emp_status'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $suffix = $_POST['suffix'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $bdate = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $civilstatus = $_POST['civil_status'];
    $nationality = $_POST['nationality'];
    $payroll = $_POST['payroll'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $location = $_POST['location'];
    $shift = $_POST['shift'];

    $query = "INSERT INTO employees (idnumber, firstname, middlename, lastname, suffix, address, email, contact, birthdate, gender, nationality, civil_status, position, department, location, employment_type, employment_status, payrollgroup, shift) VALUES (:idnumber, :fname, :mname, :lname, :suffix, :address, :email, :contact, :birthdate,
    :gender, :nationality, :civilstatus, :position, :department, :location,
    :emptype, :empstatus, :payroll, :shift)";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':idnumber', $idnumber);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':mname', $mname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':suffix', $suffix);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contact', $contact);
    $stmt->bindParam(':birthdate', $bdate);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':nationality', $nationality);
    $stmt->bindParam(':civilstatus', $civilstatus);
    $stmt->bindParam(':position', $position);
    $stmt->bindParam(':department', $department);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':emptype', $emptype);
    $stmt->bindParam(':empstatus', $empstatus);
    $stmt->bindParam(':payroll', $payroll);
    $stmt->bindParam(':shift', $shift);

    if ($stmt->execute()) {
        $response['Error'] = false;
        $response['msg'] = "Employee has been added";
    } else {
        $response['msg'] = "Failed to add employee";
    }

    echo json_encode($response);
    exit();
} catch (Exception $e) {
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
}
