<?php
include('conn.php');

$client_id = $_POST['client_id'];
$pay_status = $_POST['pay_status'];
$project_id = $_POST['project_id'];
$recieve_status = $_POST['recieve_status'];
$work_status = $_POST['work_status'];
$freelancer_id=$_POST['freelancer_id'];
$budget = $_POST['budget'];
$date = $_POST['date'];
$phone_no = $_POST['phone_no'];

$response = array();

try {
    $checkSql = "SELECT project_id FROM payment WHERE  project_id = '$project_id' OR client_id ='$client_id'";
    $chkprepare = $conn->prepare($checkSql);
    $chkprepare->execute();

    if ($chkprepare->rowCount() > 0) {
        array_push($response, array("status" => "The email id or username already exists"));
    } else {
        $sql = "INSERT INTO payment
        (id,client_id,pay_status,project_id,recieve_status,work_status,freelancer_id,budget,date,phone_no) 
        VALUES 
        (Null,:client_id,:pay_status,:project_id,:recieve_status,:work_status,:freelancer_id,:budget,:date,:phone_no)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(
            [
                ':client_id' => $client_id,
                ':pay_status' => $pay_status,
                ':project_id' => $project_id,
                ':recieve_status' => $recieve_status,
                ':work_status' => $work_status,
                ':freelancer_id'=>$freelancer_id,
                ':budget' => $budget,
                ':date' => $date,
                ':phone_no' => $phone_no,

            ]
        );
        array_push($response, array("status" => "Account created"));
    }
} catch (Exception $e) {
    array_push($response, array("status" => "Error while creating account"));
}

echo (json_encode($response));
