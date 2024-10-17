<?php
session_start();

if (isset($_POST['filterdata'])) {
    $column = $_POST['filterdata'];
    $_SESSION['filterdata'] = $column;
    echo json_encode(["Error" => false, "column" => $column]);
} else {
    $_SESSION['filterdata'] = [];
    echo json_encode(["Error" => false]);
}