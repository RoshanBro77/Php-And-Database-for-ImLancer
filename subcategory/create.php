<?php
include('conn.php');

$category_id = $_POST['category_id'];
$subcategory_name = $_POST['subcategory_name'];
$date = $_POST['date'];
$subcategory_image = $_POST['subcategory_image'];

$response = array();
$sql = "INSERT INTO subcategory
        (id,category_id,subcategory_name,date,subcategory_image) 
        VALUES 
        (Null,:category_id,:subcategory_name,:date,:subcategory_image)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(
            [
                ':category_id' => $category_id,
                ':subcategory_name' => $subcategory_name,
                ':date' => $date,
                ':subcategory_image' => $subcategory_image,

            ]
        );
        array_push($response, array("status" => "SubCategory created"));
echo (json_encode($response));
