<?php
header("Access-Control-Allow-Methods: POST");
include "conn.php";
$email = $_POST['email'];
$password = $_POST['password'];
$newpassword = $_POST['newpassword'];
$response = array();
$sql = "SELECT * FROM profile WHERE email_id='$email'";
$stmt = $conn->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    $response[0] = array(
        'status' => "Account with the email doesn't exist."
    );
    echo json_encode($response[0], JSON_PRETTY_PRINT);
} else {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row['email_id'] == $email && $row['password'] == $password) {
        $response[0] = $row;
        $sql2 = "UPDATE profile SET password = '$newpassword' WHERE email_id='$email' AND password='$password'";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
        $sql3 = "SELECT * FROM profile WHERE email_id='$email'";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->execute();
        $row = $stmt3->fetch(PDO::FETCH_ASSOC);
        echo json_encode($row, JSON_PRETTY_PRINT);
    } else {
        $response[0] = array(
            'status' => "Invalid Credentials."
        );
        echo json_encode($response[0], JSON_PRETTY_PRINT);
    }
}
