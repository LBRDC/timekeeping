<?php
date_default_timezone_set('Asia/Manila');
$epoch = 1704067500;

// Convert epoch to human-readable date and time
$timestamp = date('Y-m-d H:i:s', $epoch);

echo $timestamp;
