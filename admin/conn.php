<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "lbrdc_tk";
$port = 3306;
$conn = null;

// $host = "lbrdc-software.com";
// $user = "lbrdcsof";
// $pass = "Lbrdc2021.";
// $db = "lbrdcsof_tk";
// $port = 3306;
// $conn = null;


try {
    // $conn = new PDO("mysql:host={$host};dbname={$db};charset=utf8", $user, $pass);
    $conn = new PDO("mysql:host={$host};port={$port};dbname={$db};charset=utf8", $user, $pass); // for infinityfree
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $userId = 1;

    $stmt = $conn->prepare("SELECT * FROM admin_users WHERE id = :id");
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        //echo "User found: " . $user['id'];
    } else {
        echo "User not found.";
    }

    //echo "Connected successfully"; 
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    echo "Connection failed: " . $e->getMessage();
}


function addLogs($page, $action, $user)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO `admin_editlog`(`log_page`, `log_action`, `log_user`) VALUES (:page, :action, :user)");
    $stmt->bindParam(":page", $page);
    $stmt->bindParam(":action", $action);
    $stmt->bindParam(":user", $user);
    if ($stmt->execute()) {
        return true;
    }
    return false;
}
