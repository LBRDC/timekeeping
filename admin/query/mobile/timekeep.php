<?php

include("../../conn.php");

$response = array("Error" => false, 'msg' => '');
try {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $accountID = $data['accountID'];
    $key = $data['key'];
    $date = new DateTime("now", new DateTimeZone("Asia/Taipei"));
    $timestamp = $date->getTimestamp();
    $time = time();
    if($key == "check_in"){
        //Check Duplicate
        if(isDuplicated($key, unix_to_date($timestamp), $accountID, $conn)){
            $response['Error'] = true;
            $response['msg'] = 'Duplicated '. ucfirst(str_replace('_', ' ', $key));
            echo json_encode($response);
            exit();
        }
        $query = "insert into employee_attendance(accountID, `$key`, timestamps) values(:accountID, :time, :timestamp)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':accountID', $accountID);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':timestamp', unix_to_date($timestamp));
        if($stmt->execute()){
            $response['Error'] = false;
            $response['msg'] = 'Check In Successful';
            echo json_encode($response);
        }else{
            $response['Error'] = true;
            $response['msg'] = 'Check In Failed';
            echo json_encode($response);
        }
    }else{
        //Check Duplicate
        if(isDuplicated($key, unix_to_date($timestamp), $accountID, $conn)){
            $response['Error'] = true;
            $response['msg'] = 'Duplicated '. ucfirst(str_replace('_', ' ', $key));
            echo json_encode($response);
            exit();
        }
        $query = "update employee_attendance set $key = :time where accountID = :accountID and timestamps = :date";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':accountID', $accountID);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':date', unix_to_date($timestamp));
        $msg = ucfirst(str_replace('_', ' ', $key));
        if($stmt->execute()){
            $response['Error'] = false;
            $response['msg'] =  $msg. ' Successful';
            echo json_encode($response);
        }else{
            $response['Error'] = true;
            $response['msg'] =  $msg. ' Failed';
            echo json_encode($response);
        }
    }
} catch (Exception $e) {
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}

function unix_to_date($date){
    return date("m-d-Y", $date);
}

function isDuplicated($key, $date, $accountID, $conn){
    $query = "select `$key` from employee_attendance where accountID = :accountID and timestamps = :date";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':accountID', $accountID);
    $stmt->bindParam(':date', $date);
    $stmt->execute();
    $result = $stmt->fetch();
    if(empty($result[$key])){
        return false;
    }else{
        return true;
    }

}