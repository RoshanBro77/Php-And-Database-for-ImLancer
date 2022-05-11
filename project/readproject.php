<?php
header("Access-Control-Allow-Methods: POST");
include "../conn.php";
$response = array();

$sql = "";
$row = array();
if (isset($_GET['project_id'])) {
    $project_id =  $_GET['project_id'];
    // this is single movie
    $sql = "SELECT * FROM project WHERE project_id='$project_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $response[0] = $row;
    } else {
        $response[0] = array(
            'status' => 'The account with project_id doesnot exist'
        );
    }

    echo json_encode($response[0], JSON_PRETTY_PRINT);
} else if (isset($_GET['creator'])) {
    $creator =  $_GET['creator'];
    // this is single movie
    $sql = "SELECT * FROM project WHERE client_id='$creator'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $response[0] = $row;
    } else {
        $response[0] = [];
    }

    echo json_encode($response[0], JSON_PRETTY_PRINT);
} else if (isset($_GET['freelancer'])) {
    $freelancer =  $_GET['freelancer'];
    // this is single movie
    $sql = "SELECT * FROM project WHERE freelancer_id='$freelancer'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $response[0] = $row;
    } else {
        $response[0] = [];
    }

    echo json_encode($response[0], JSON_PRETTY_PRINT);
} else if (isset($_GET['subcategory_id'])) {
    $id =  $_GET['subcategory_id'];
    // this is single movie
    $sql = "SELECT p.*,pr.user_name as client_username,pr.email_id as client_email,pr.rating as client_rating FROM project p JOIN profile pr on p.client_id = pr.id WHERE p.project_subcategory=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $response[0] = $row;
    } else {
        $response[0] = [];
    }

    echo json_encode($response[0], JSON_PRETTY_PRINT);
}
// SELECT p.*,pr.user_name as client_username,pr.email_id as client_email,pr.rating as client_rating FROM project p JOIN profile pr on p.client_id = pr.id
else {
    // this is multiple movies
    $sql = "SELECT * FROM project";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response[0] = $row;
    echo json_encode($response[0], JSON_PRETTY_PRINT);
}
