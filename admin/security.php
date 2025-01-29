<?php


$pass = "LBRDC";

$encrypt = hash('sha256', $pass);
echo $encrypt;
