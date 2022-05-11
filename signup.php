<?php
include('conn.php');

$user_name = $_POST['user_name'];
$password = $_POST['password'];
$email_id = $_POST['email_id'];
// $address = $_POST['address'];
$phone = $_POST['phone'];
$rating = $_POST['rating'];
$date = $_POST['date'];
$notification_id = $_POST['notification_id'];
$profileimage_id = $_POST['profileimage_id'];
$skill_id = $_POST['skill_id'];
$gender = $_POST['gender'];

$response = array();

try {
    $checkSql = "SELECT email_id FROM profile WHERE  email_id = '$email_id' OR user_name ='$user_name'";
    $chkprepare = $conn->prepare($checkSql);
    $chkprepare->execute();

    if ($chkprepare->rowCount() > 0) {
        array_push($response, array("status" => "The email id or username already exists"));
    } else {
        $sql = "INSERT INTO profile
        (id,user_name,password,email_id,phone,rating,date,notification_id,profileimage_id,skill_id,gender) 
        VALUES 
        (Null,:user_name,:password,:email_id,:phone,:rating,:date,:notification_id,:profileimage_id,:skill_id,:gender)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(
            [
                ':user_name' => $user_name,
                ':password' => $password,
                ':email_id' => $email_id,
                ':phone' => $phone,
                ':rating' => $rating,
                ':date' => $date,
                ':notification_id' => $notification_id,
                ':profileimage_id' => $profileimage_id,
                ':skill_id' => $skill_id,
                ':gender' => $gender,

            ]
        );
        array_push($response, array("status" => "Account created"));
    }
} catch (Exception $e) {
    array_push($response, array("status" => "Error while creating account" . $e));
}

echo (json_encode($response));
