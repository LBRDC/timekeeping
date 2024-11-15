<?php

include "../conn.php";


$stmt = $conn->prepare("select * from field_location");
$stmt->execute();
echo json_encode(['locations' => $stmt->fetchAll(PDO::FETCH_ASSOC)]);