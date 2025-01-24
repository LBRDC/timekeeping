<?php
include("../conn.php");

$edit_id = isset($_POST['edit_id']) ? $_POST['edit_id'] : '';
$edit_LocName = isset($_POST['edit_LocName']) ? $_POST['edit_LocName'] : '';
$edit_Latitude = isset($_POST['edit_Latitude']) ? $_POST['edit_Latitude'] : '';
$edit_Longitude = isset($_POST['edit_Longitude']) ? $_POST['edit_Longitude'] : '';
$edit_Radius = isset($_POST['edit_Radius']) ? $_POST['edit_Radius'] : '';
$edit_status = (string) isset($_POST['edit_Status']) ? $_POST['edit_Status'] : '';

// Check if all variables contain values
if (empty($edit_id) || empty($edit_LocName) || empty($edit_Latitude) || empty($edit_Longitude) || empty($edit_Radius)) {
    $res = array("res" => "incomplete", "msg" => $edit_id . " " . $edit_LocName . " " . $edit_Latitude . " " . $edit_Longitude . " " . $edit_Radius . " " . $edit_status);
    echo json_encode($res);
    exit();
}

/* CHECK Existing Location */
$stmt1 = $conn->prepare("SELECT * FROM field_location WHERE fld_location_id = :id");
$stmt1->bindParam(':id', $edit_id);
$stmt1->execute();
$existLoc = $stmt1->fetch(PDO::FETCH_ASSOC);

if ($existLoc) {
    /* Update Existing Location */
    $stmt2 = $conn->prepare("UPDATE field_location SET name_location = :locName, latitude = :locLatitude, longitude = :locLongitude, radius = :locRadius, status = :status WHERE fld_location_id = :id");
    $stmt2->bindParam(':locName', $edit_LocName);
    $stmt2->bindParam(':locLatitude', $edit_Latitude);
    $stmt2->bindParam(':locLongitude', $edit_Longitude);
    $stmt2->bindParam(':locRadius', $edit_Radius);
    $stmt2->bindParam(':status', $edit_status);
    $stmt2->bindParam(':id', $edit_id);

    $updateLocQuery = $stmt2->execute();

    if ($updateLocQuery) {
        $res = array("res" => "success", "msg" => $edit_LocName);
    } else {
        $res = array("res" => "failed", "msg" => $edit_LocName);
    }

    echo json_encode($res);
    exit();
} else {
    // Handle the case where the location does not exist
    $res = array("res" => "norecord", "msg" => $edit_LocName);
    echo json_encode($res);
    exit();
}
