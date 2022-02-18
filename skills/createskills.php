<?php
include('conn.php');

$skill_name = $_POST['skill_name'];
$subcategory_id = $_POST['subcategory_id'];
$date = $_POST['date'];

$response = array();
$sql = "INSERT INTO profile
        (id,skill_name,subcategory_id,date) 
        VALUES 
        (Null,:skill_name,:subcategory_id,:date)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(
            [
                ':skill_name' => $skill_name,
                ':subcategory_id' => $subcategory_id,
                ':date' => $date,

            ]
        );
        array_push($response, array("status" => "Skill created"));

echo (json_encode($response));
