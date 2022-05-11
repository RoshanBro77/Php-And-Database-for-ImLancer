<?php
header("Access-Control-Allow-Methods: POST");
include "../conn.php";
$response = array();

$sql = "";
$row = array();
if (isset($_GET['project_idd'])) {
    $project_id =  $_GET['project_idd'];
    // this is single movie
    $sql = "SELECT * FROM bid WHERE project_idd='$project_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $response[0] = $row;
    } else {
        $response[0] = [];
    }

    echo json_encode($response[0], JSON_PRETTY_PRINT);
}

// maile apply gareko bid ko lagi
else if (isset($_GET['user_id'])) {
    $id =  $_GET['user_id'];
    $sql = "SELECT p.*, pr.user_name as clientUsername, pr.rating as clientRating, pr.email_id as clientEmail,b.bid_price as bidPrice, b.user_id as userId, b.date as bidAppliedDate, b.status from project p JOIN profile pr on p.client_id = pr.id JOIN bid b on b.project_id = p.id WHERE b.user_id = $id AND b.status !='Accepted'";
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

// maile create graeko project ko bid ko lagi
else if (isset($_GET['project_id'])) {
    $id =  $_GET['project_id'];
    // this is single movie
    $sql = "SELECT b.*, p.user_name as freelancerUsername, p.email_id as freelancerEmail, p.address as freelancerAddress, p.phone as freelancerPhone, p.rating as freelancerRating, p.skill_id as freelancerSkills, p.myspeciality as freelancerSpeciality, p.mydescription as freelancerDescription, p.socialmedia as freelancerSocialmedia, p.gender as freelanderGender, p.notification_id as notificationId, prj.file as projectDocument, prj.project_name as projectName, prj.project_status as projectStatus, prj.budget, prj.description, prj.deadline,prj.freelancer_id FROM bid b JOIN profile p on b.user_id = p.id JOIN project prj on b.project_id = prj.id WHERE b.project_id = $id ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $response[0] = $row;
    } else {
        $response[0] = [];
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
