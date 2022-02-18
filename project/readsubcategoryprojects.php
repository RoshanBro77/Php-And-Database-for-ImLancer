<?php
header("Access-Control-Allow-Methods: POST");
include "../conn.php";
$response = array();

$sql = "";
$row = array();
if (isset($_GET['subcategory_id'])) {
    $subcategory_id =  $_GET['subcategory_id'];
    // this is single movie
    $sql = "SELECT prj.*,pr.user_name as client_username, pr.rating as client_rating, pr.email_id as client_email FROM project prj JOIN profile pr on prj.client_id = pr.id  WHERE project_subcategory='$subcategory_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $response[0] = $row;
    } else {
        $response[0] = array(
            'status' => 'The project with subcategory_id doesnot exist'.$subcategory_id
        );
    }

    echo json_encode($response[0], JSON_PRETTY_PRINT);
} else {
    // this is multiple movies
    $sql = "SELECT prj.*,pr.user_name as client_username, pr.rating as client_rating, pr.email_id as client_email FROM project prj JOIN profile pr on prj.client_id = pr.id ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response[0] = $row;
    echo json_encode($response[0], JSON_PRETTY_PRINT);
}
