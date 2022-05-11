<?php
header("Access-Control-Allow-Methods: POST");
include "../conn.php";
$response = array();
$id = $_GET['id'];
// this is multiple categories


$chkSql = "SELECT * from project WHERE freelancer_id=$id AND project_status='Assigned'";
$emstmt = $conn->prepare($chkSql);
$emstmt->execute();

if ($emstmt->rowCount() > 0) {
    array_push($response, array("status" => "You have active projects to complete."));
} else {
    $sql = "DELETE from profile WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql2 = "DELETE from project WHERE user_id=$id";
    $stmt2 = $conn->prepare($sql);
    $stmt2->execute();
    array_push($response, array("status" => "Account Deleted"));
}
echo json_encode($response[0]);
