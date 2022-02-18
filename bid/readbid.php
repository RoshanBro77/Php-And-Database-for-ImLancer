<?php
header("Access-Control-Allow-Methods: POST");
include "../conn.php";
$response = array();

$sql = "";
$row = array();
if (isset($_GET['project_id'])) {
    $email =  $_GET['project_id'];
    // this is single movie
    $sql = "SELECT * FROM bid WHERE project_id='$project_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $response[0] = $row;
    } else {
        $response[0] = array(
            'status' => 'There are no bids available.'
        );
    }

    echo json_encode($response[0], JSON_PRETTY_PRINT);
} else {
    // this is multiple movies
    $sql = "SELECT * FROM bid";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response[0] = $row;
    echo json_encode($response[0], JSON_PRETTY_PRINT);
}
