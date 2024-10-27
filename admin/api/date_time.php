<?php
date_default_timezone_set('Asia/Manila');
$currentDateTime = date('Y-m-d h:i:s A');
echo json_encode(["datetime" => $currentDateTime]);