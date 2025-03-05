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

    $query = "UPDATE employees SET firstname = :fname, middlename = :mname, lastname = :lname, suffix = :suffix, address = :address, email = :email, contact = :contact, birthdate = :birthdate, gender = :gender, nationality = :nationality, civil_status = :civilstatus, position = :position, department = :department, location = :location, employment_type = :emptype, employment_status = :empstatus, payrollgroup = :payroll, shift = :shift WHERE idnumber = :idnumber";

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
        $response['msg'] = "Employee has been updated";
    } else {
        $response['msg'] = "Failed to update employee";
    }

    echo json_encode($response);
    exit();
} catch (Exception $e) {
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
}
