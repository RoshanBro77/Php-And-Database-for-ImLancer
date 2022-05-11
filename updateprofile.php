<?php
include('conn.php');
$json_data = file_get_contents('php://input');

// data we get from the client
$username = $_POST['user_name'];
$password = $_POST['password'];
$email = $_POST['email_id'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$notificationid = $_POST['notificationid'];

// array to store the response
$response = array();

// this will hold the name of the image if any
$upload_name = $_POST['profileimage_id'];

// check if the file has any data
if (isset($_FILES['file']) == "") {
    // there is no data in the file
    array_push($response, array("File" => "No File selected"));
} else {
    // there is some data in the file
    $file_name = $_FILES['file']['name']; // name of the file
    $file_tmp_name = $_FILES['file']['tmp_name']; // temporary name of the file
    $error = $_FILES['file']['error']; // error in the file if any
    // check if there are any error in the file
    if ($error > 0) {
        // return file error response
        array_push($response, array("File" => "Error While uploading"));
    } else {
        // we have a valid file
        // generating a name for the file
        $random_name = rand(1000, 1000000) . "-" . $file_name;
        $upload_name = $random_name;
        // replacing all the inconsistant symbols in the file name
        $upload_name = preg_replace('/\s+/', '-',  $upload_name);

        // now we have file and a unique file name
        // uploading file to the server in the filder
        if (move_uploaded_file($file_tmp_name, 'profilepictures/' . $upload_name)) {
            // file is uploaded

        } else {
            array_push($response, array("File" => "Failed to Save file to directory"));
        }
    }
}
$sql = "UPDATE profile (id,username,password,email,address,phone,date,notificationid,profileimage) 
VALUES (NULL,:username,:password,:email,:address,:phone,:date,:notificationid,:profileimage)";
$stmt = $conn->prepare($sql);

$stmt->execute(
    [

        ':username' => $username,
        ':password' => $password,
        ':email' => $email,
        ':address' => $address,
        ':phone' => $phone,
        ':date' => $date,
        ':notificationid' => $notificationid,
        ':profileimage' => $upload_name,
    ]
);
array_push($response, array("Status" => "Account created"));

// giving the response in json encoded format
echo (json_encode($response));
