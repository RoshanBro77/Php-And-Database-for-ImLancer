<?php
header("Access-Control-Allow-Methods: POST");
include "../conn.php";

$project_id = $_POST['project_id'];
$bid_id = $_POST['bid_id'];
$freelancer_id = $_POST['freelancer_id'];

// updating bid table
$sql = "UPDATE bid SET status ='Rejected' WHERE id=$bid_id";
$stmt = $conn->prepare($sql);
$stmt->execute();



echo json_encode(array("status" => "Project rejected"));
