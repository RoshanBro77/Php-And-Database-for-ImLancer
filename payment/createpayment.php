<?php
include('../conn.php');

$client_id = $_POST['client_id'];
$amount = $_POST['amount'];
$status = $_POST['status'];
$date = $_POST['date'];
$account = $_POST['account'];
$project_id = $_POST['project_id'];

$response = array();

try {
    $sql = "INSERT INTO payment
        (id,client_id,amount,status,date,account,project_id) 
        VALUES 
        (Null,:client_id,:amount,:status,:date,:account,:project_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(
        [
            ':client_id' => $client_id,
            ':amount' => $amount,
            ':status' => $status,
            ':date' => $date,
            ':account' => $account,
            ':project_id' => $project_id,

        ]
    );
    array_push($response, array("status" => "Account created"));
} catch (Exception $e) {
    array_push($response, array("status" => "Error while creating account"));
}

echo (json_encode($response));
