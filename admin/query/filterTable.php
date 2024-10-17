<?php
session_start();

if (isset($_POST['column'])) {
    $column = json_decode($_POST['column']);
    $_SESSION['selectedColumn'] = $column;
    echo json_encode(["Error" => false, "column" => $column]);
}