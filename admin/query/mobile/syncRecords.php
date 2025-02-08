<?php

include("../../conn.php");

$response = array("Error" => false, 'msg' => '');

try {
    $conn->beginTransaction();
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $records = $data['records'];
    // var_dump($records);
    // die();
    if (empty($records)) {
        $response['Error'] = true;
        $response['msg'] = 'No Records to Sync';
        echo json_encode($response);
        exit();
    }

    foreach ($records as $record) {
        $query = "INSERT INTO `employee_attendance`(`accountID`, `check_in`, `check_out`, `break_in`, `break_out`, `ot_in`, `ot_out`, `timestamps`) VALUES (:accountID,:check_in,:check_out,:break_in,:break_out,:ot_in,:ot_out,:timestamps)";
        $stmt = $conn->prepare($query);
        $checkout = $record['check_out'] == '' ? null : $record['check_out'];
        $breakin = $record['break_in'] == '' ? null : $record['break_in'];
        $breakout = $record['break_out'] == '' ? null : $record['break_out'];
        $otin = $record['ot_in'] == '' ? null : $record['ot_in'];
        $otout = $record['ot_out'] == '' ? null : $record['ot_out'];
        $stmt->bindParam(':accountID', $record['accountID']);
        $stmt->bindParam(':check_in', $record['check_in']);
        $stmt->bindParam(':check_out', $checkout);
        $stmt->bindParam(':break_in', $breakin);
        $stmt->bindParam(':break_out', $breakout);
        $stmt->bindParam(':ot_in', $otin);
        $stmt->bindParam(':ot_out', $otout);
        $stmt->bindParam(':timestamps', $record['date']);
        if (!checkDuplicate($conn, $record['accountID'], $record['date'])) {
            if (!$stmt->execute()) {
                $conn->rollBack();
                $response['Error'] = true;
                $response['msg'] = 'Failed to Sync Records';
                echo json_encode($response);
                exit();
            }
        }
    }
    $conn->commit();
    $response['msg'] = 'Records Synced Successfully';
    echo json_encode($response);
} catch (Exception $e) {
    $conn->rollBack();
    $response['Error'] = true;
    $response['msg'] = $e->getMessage();
    echo json_encode($response);
    exit();
}

function checkDuplicate($conn, $accountID, $date)
{
    $query = "SELECT * FROM `employee_attendance` WHERE `accountID` = :accountID AND `timestamps` = :timestamps";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':accountID', $accountID);
    $stmt->bindParam(':timestamps', $date);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}
