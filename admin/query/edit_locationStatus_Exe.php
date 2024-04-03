<?php 
include("../conn.php");

$edit_Id = isset($_POST['edit_Id']) ? $_POST['edit_Id'] : '';
$edit_LocName = isset($_POST['edit_LocName']) ? $_POST['edit_LocName'] : '';
$edit_Status = isset($_POST['edit_Status']) ? $_POST['edit_Status'] : '';

// Check if all variables contain values
if(empty($edit_Id) || empty($edit_Status)) {
    $res = array("res" => "incomplete", "msg" => $edit_Id . " " . $edit_Status);
    echo json_encode($res);
    exit();
}

/* CHECK Existing Location */
$stmt1 = $conn->prepare("SELECT * FROM field_location WHERE fld_location_id = :id");
$stmt1->bindParam(':id', $edit_Id);
$stmt1->execute();
$existLoc = $stmt1->fetch(PDO::FETCH_ASSOC);

if($existLoc) {
    /* Update Existing Location */
    $stmt2 = $conn->prepare("UPDATE field_location SET loc_status = :loc_status WHERE fld_location_id = :id");
    $stmt2->bindParam(':loc_status', $edit_Status);
    $stmt2->bindParam(':id', $edit_Id);
    
    $updateLocQuery = $stmt2->execute();
    
    if($updateLocQuery && $edit_Status == 'active') {
        $res = array("res" => "enable", "msg" => $edit_LocName);
    } else if ($updateLocQuery && $edit_Status == 'inactive') {
        $res = array("res" => "disable", "msg" => $edit_LocName);
    } else {
        $res = array("res" => "failed", "msg" => $edit_LocName);
    }

    echo json_encode($res);
    exit();
} else {
    // Handle the case where the location does not exist
    $res = array("res" => "norecord", "msg" => $edit_LocName, "msg2" => $edit_Id . " " . $edit_Status);
    echo json_encode($res);
    exit();
}
