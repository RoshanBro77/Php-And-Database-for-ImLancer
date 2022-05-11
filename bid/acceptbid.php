<?php
header("Access-Control-Allow-Methods: POST");
include "../conn.php";

$project_id = $_POST['project_id'];
$bid_id = $_POST['bid_id'];
$freelancer_id = $_POST['freelancer_id'];

// updating bid table
$sql = "UPDATE bid SET status ='Accepted' WHERE id=$bid_id";
$stmt = $conn->prepare($sql);
$stmt->execute();

// updating the project table for freelancer and status
$sql2 = "UPDATE project SET freelancer_id =$freelancer_id, project_status='Assigned' WHERE id=$project_id";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();

echo json_encode(array("status" => "Project assigned"));
