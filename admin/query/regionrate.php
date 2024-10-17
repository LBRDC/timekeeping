<?php

include "../conn.php";


$stmt = $conn->prepare("select * from region");
$stmt->execute();
echo json_encode(['rates' => $stmt->fetchAll(PDO::FETCH_ASSOC)]);