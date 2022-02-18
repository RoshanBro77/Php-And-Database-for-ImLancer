<?php
header("Access-Control-Allow-Methods: POST");
include "../conn.php";
$response = array();

$sql = "";
$row = array();
if (isset($_GET['id'])) {
    $id =  $_GET['id'];
    // this is single movie
    $sql = "SELECT * FROM subcategory WHERE category_id='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $response[0] = $row;
    } else {
        $response[0] = array(
            'status' => 'The subcategory with id doesnot exist'
        );
    }

    echo json_encode($response[0], JSON_PRETTY_PRINT);
} else {
    // this is multiple movies
    $sql = "SELECT * FROM subcategory";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response[0] = $row;
    echo json_encode($response[0], JSON_PRETTY_PRINT);
}
