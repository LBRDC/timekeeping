<?php
session_start();
include("../conn.php");

$response = array("Error" => true, "msg" => "");
$add_Status = 1;
$add_Created = date("Y-m-d");

try {
    $conn->beginTransaction();
    // $jsonData = file_get_contents("php://input");
    // $POST = json_decode($jsonData, true);
    // $employees = $POST['employees'];
    // $tableFields = $POST['keys'];
    // $overWrite = $POST['overwrite'];
    $employees = json_decode($_POST['employees'], true);
    $tableFields = json_decode($_POST['keys']);
    $overWrite = json_decode($_POST['overwrite']);
    $currentFields = checkFields($conn);
    $finalColumn = [];

    //Check and Comparing the table fields from imported data and table column
    foreach ($tableFields as $val) {
        if (!in_array($val, $currentFields)) {
            $finalColumn[] = $val;
        }
    }

    //Make dynamic table column in database
    if (!empty($finalColumn)) {
        $result = alterDynamicTable($conn, $finalColumn);
        if ($result['Error']) {
            $conn->rollBack();
            return $result;
        }
    }


    //Import All employees
    foreach ($employees as $val) {
        $keys = array_keys($val);
        $values = array_values($val);
        $newKey = array_merge(['emp_status', 'emp_created'], $keys);
        $newVal = [":emp_status", ":emp_created"];
        foreach ($keys as $value) {
            $newVal[] = ":{$value}";
        }
        $params = [":emp_status" => $add_Status, ":emp_created" => $add_Created];
        for ($i = 0; $i < count($keys); $i++) {
            $params[":" . $keys[$i]] = $values[$i];
        }

        $query = "insert into employee_tbl (" . implode(",", $newKey) . ") values(" . implode(",", $newVal) . ")";
        if (!checkDuplicate($conn, $params[':IdNumber'])) {
            $stmt = $conn->prepare($query);
            if (!$stmt->execute($params)) {
                $conn->rollback();
                $response['Error'] = true;
                return json_encode($response);
            }
        } else {
            if ($overWrite) {
                $forq = [];
                // $id = $params[':IdNumber'];
                $idNumberIndex = array_search("IdNumber", $newKey);
                $empStatusIndex = array_search("emp_status", $newKey);
                $empCreatedIndex = array_search("emp_created", $newKey);
                unset($params[':emp_status']);
                unset($params[':emp_created']);
                // unset($params[':IdNumber']);
                unset($newKey[$idNumberIndex]);
                unset($newKey[$empStatusIndex]);
                unset($newKey[$empCreatedIndex]);
                foreach ($newKey as $key) {
                    $forq[] = $key . "=:" . $key;
                }
                $query = "update employee_tbl set " . implode(", ", $forq) . " where IdNumber=:IdNumber";
                $stmt = $conn->prepare($query);
                if (!$stmt->execute($params)) {
                    $conn->rollBack();
                    $response['Error'] = true;
                    $response['msg'] = "Failed to update existing employee with ID of " . $params[':IdNumber'];
                    echo json_encode($response);
                    exit();
                }
            } else {
                $response['Error'] = true;
                $response['msg'] = "Failed to update existing employee";
                echo json_encode($response);
                exit();
            }
        }
    }

    $logs = addLogs("Manning-List", "Import Excel Data", $_SESSION['user']['admin_name']);
    if (!$logs) {
        $conn->rollBack();
        $response['Error'] = true;
        $response['msg'] = "Failed to add logs";
        echo json_encode($response);
        exit();
    }

    if ($conn->inTransaction()) {
        $conn->commit();
    }
    $response['Error'] = false;
    $response['msg'] = "Employees imported successfully";
    echo json_encode($response);
} catch (Exception $e) {
    // $conn->rollBack();
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
}


//  function to check duplicate entry
// Update Query

function updateEmployee($conn, $data)
{
    echo json_encode(["Error" => false, "msg" => "update employee"]);
}



//Alter the database table to make a dynamic column based on imported table data header
function alterDynamicTable($conn, $headers)
{
    $response = array("Error" => true, "msg" => "");
    $columnName = [];
    foreach ($headers as $val) {
        $columnName[] = "ADD COLUMN {$val} varchar(255) NOT NULL";
    }
    $query = "ALTER TABLE employee_tbl " . implode(", ", $columnName);
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        $response['Error'] = false;
        $response['msg'] = "Table created successfully";
        return $response;
    }

    $response['msg'] = $stmt->errorInfo();
    return $response;
}



function checkFields($con)
{
    $query = "SHOW COLUMNS FROM lbrdc_tk.employee_tbl";
    $stmt = $con->prepare($query);
    // return $result['result'][0]['Field'];
    // $data = [];
    // foreach ($result['result'] as $row) {
    //     array_push($data, $row['Field']);
    // }
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = [];
    foreach ($result as $row) {
        array_push($data, $row['Field']);
    }
    return $data;

}


function checkDuplicate($con, $emp_number)
{
    $query = "select * from employee_tbl where IdNumber='$emp_number'";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // return $result;
    return count($result) == 1 ? true : false;

}