<?php
include('../conn.php');

$project_id = $_POST['project_id'];
$date = $_POST['date'];
$user_id = $_POST['user_id'];
$bid_price = $_POST['bid_price'];
$status = $_POST['status'];


$response = array();

try {
    $checkSql = "SELECT user_id FROM bid WHERE  user_id = '$user_id' AND project_id=$project_id ";
    $chkprepare = $conn->prepare($checkSql);
    $chkprepare->execute();

    if ($chkprepare->rowCount() > 0) {
        array_push($response, array("status" => "The bid is already applied."));
    } else {
        $sql = "INSERT INTO bid
        (id,project_id,date,user_id,bid_price,status) 
        VALUES 
        (Null,:project_id,:date,:user_id,:bid_price,:status)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(
            [
                ':project_id' => $project_id,
                ':date' => $date,
                ':user_id' => $user_id,
                ':bid_price' => $bid_price,
                ':status' => $status,


            ]
        );
        array_push($response, array("status" => "Bid is applied!"));
    }
} catch (Exception $e) {
    array_push($response, array("status" => $e));
}

echo (json_encode($response[0]));
