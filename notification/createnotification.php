<?php
include('conn.php');

// data we get from the client
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$type = $_POST['type'];
$content = $_POST['content'];
$date = $_POST['date'];

$response = array();

try {
    $checkSql = "SELECT id FROM notification WHERE  id = '$id' ";
    $chkprepare = $conn->prepare($checkSql);
    $chkprepare->execute();

    if ($chkprepare->rowCount() > 0) {
        array_push($response, array("status" => "The notification already exists"));
    } else {
        $sql = "INSERT INTO notification
        (id,title,id,description,type,content,date) 
        VALUES 
        (Null,:title,:id,:description,:type,:content,:date)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(
            [

                
                ':title' => $title,
                ':id' => $id,
                ':description' => $description,
                ':type' => $type,
                ':content' => $content,
                ':date' => $date,
            ]
        );
        array_push($response, array("status" => "Notification created"));
    }
} catch (Exception $e) {
    array_push($response, array("status" => "Error while creating notification"));
}

echo (json_encode($response));
