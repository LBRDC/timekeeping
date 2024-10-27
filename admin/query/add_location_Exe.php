<?php
include("../conn.php");

$add_LocName = isset($_POST['add_LocName']) ? $_POST['add_LocName'] : '';
$add_Latitude = isset($_POST['add_Latitude']) ? $_POST['add_Latitude'] : '';
$add_Longitude = isset($_POST['add_Longitude']) ? $_POST['add_Longitude'] : '';
$add_Radius = isset($_POST['add_Radius']) ? $_POST['add_Radius'] : '';
$status = "active";

// Check if all variables contain values
if (empty($add_LocName) || empty($add_Latitude) || empty($add_Longitude) || empty($add_Radius)) {
	$res = array("res" => "incomplete");
	echo json_encode($res);
	exit();
}

/* CHECK Existing Location */
$stmt1 = $conn->prepare("SELECT * FROM field_location WHERE name_location = :locName");
$stmt1->bindParam(':locName', $add_LocName);
$stmt1->execute();
$existLoc = $stmt1->fetch(PDO::FETCH_ASSOC);

if ($existLoc) {
	$res = array("res" => "exist", "msg" => $add_LocName);
	echo json_encode($res);
	exit();
} else {
	/* Add New Location */
	$stmt2 = $conn->prepare("INSERT INTO field_location (name_location, latitude, longitude, radius, status) VALUES (:locName, :locLatitude, :locLongitude, :locRadius, :status)");
	$stmt2->bindParam(':locName', $add_LocName);
	$stmt2->bindParam(':locLatitude', $add_Latitude);
	$stmt2->bindParam(':locLongitude', $add_Longitude);
	$stmt2->bindParam(':locRadius', $add_Radius);
	$stmt2->bindParam(':status', $status);

	$addLocQuery = $stmt2->execute();

	if ($addLocQuery) {
		$res = array("res" => "success", "msg" => $add_LocName);
	} else {
		$res = array("res" => "failed", "msg" => $add_LocName);
	}

	echo json_encode($res);
	exit();
}