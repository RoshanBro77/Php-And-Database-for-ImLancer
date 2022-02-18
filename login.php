<?php
header("Access-Control-Allow-Methods: POST");
include "conn.php";
$email = $_GET['email'];
$password = $_GET['password'];


$response = array();
$sql = "SELECT * FROM profile WHERE email_id='$email'";
$stmt = $conn->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() == 0) {

    array_push($response, array('status' => "Account doesnot exist"));
} else {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row['email_id'] == $email && $row['password'] == $password) {
        array_push($response, $row);
    } else {
        array_push($response, array('status' => "Invaid Credentials"));
    }
}

echo (json_encode($response[0]));
