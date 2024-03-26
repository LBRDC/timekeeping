<?php
date_default_timezone_set('Asia/Manila'); // Set your timezone
$date = date('m/d/Y');
$time = date('h:i a');
$day = date('l');

echo json_encode(array('date' => $date, 'time' => $time, 'day' => $day));