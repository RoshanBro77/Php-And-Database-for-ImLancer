<?php
include('../conn.php');

// data we get from the client
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$type = $_POST['type'];
$content = $_POST['content'];
$date = $_POST['date'];
$receiver_id = $_POST['reciever_id'];

$response = array();

try {
    $checkSql = "SELECT id FROM notification WHERE  id = '$id' ";
    $chkprepare = $conn->prepare($checkSql);
    $chkprepare->execute();

    if ($chkprepare->rowCount() > 0) {
        array_push($response, array("status" => "The notification already exists"));
    } else {
        $sql = "INSERT INTO notification
        (id,title,description,type,content,date,reciever_id) 
        VALUES 
        (Null,:title,:description,:type,:content,:date,:reciever_id)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(
            [


                ':title' => $title,
                ':description' => $description,
                ':type' => $type,
                ':content' => $content,
                ':date' => $date,
                ':reciever_id' => $receiver_id,
            ]
        );
        array_push($response, array("status" => "Notification created"));
    }
} catch (Exception $e) {
    array_push($response, array("status" => "Error while creating notification $e"));
}

echo (json_encode($response));
