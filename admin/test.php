<?php

$date = new DateTime("now", new DateTimeZone("Asia/Shanghai"));
$timestamp = $date->getTimestamp();
echo $timestamp;