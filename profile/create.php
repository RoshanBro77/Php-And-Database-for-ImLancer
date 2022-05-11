<?php
include('../conn.php');
$json_data = file_get_contents('php://input');

// data we get from the client
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$email_id = $_POST['email_id'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$rating = $_POST['rating'];
$skill_id = $_POST['skill_id'];
$profileimage_id = $_POST['profileimage_id'];
$mydescription = $_POST['mydescription'];
$myspeciality = $_POST['myspeciality'];
$document = $_POST['document'];
$socialmedia = $_POST['socialmedia'];
$gender = $_POST['gender'];
$notification_id = $_POST['notification_id'];

// array to store the response
$response = array();

// this will hold the name of the image if any
$upload_name = "";

// check if the file has any data
if (isset($_FILES['file']) == "" || isset($_FILES['document']) == "") {
    // there is no data in the file
    array_push($response, array("File" => "No File selected"));
} else {
    // there is some data in the file
    $file_name = $_FILES['file']['name']; // name of the file
    $file_tmp_name = $_FILES['file']['tmp_name']; // temporary name of the file
    $error = $_FILES['file']['error'];
    $document_name = $_FILES['document']['name']; // name of the file
    $document_tmp_name = $_FILES['document']['tmp_name']; // temporary name of the file
    $docerror = $_FILES['document']['error']; // error in the file if any
    // check if there are any error in the file
    if ($error > 0 || $docerror > 0) {
        // return file error response
        array_push($response, array("File" => "Error While uploading"));
    } else {
        // we have a valid file
        // generating a name for the file
        $random_name = rand(1000, 1000000) . "-" . $file_name;
        $upload_name = $random_name;
        // replacing all the inconsistant symbols in the file name
        $upload_name = preg_replace('/\s+/', '-',  $upload_name);
        $random_document_name = rand(1000, 1000000) . "-" . $document_name;
        $upload_document_name = $random_document_name;
        // replacing all the inconsistant symbols in the file name
        $upload_document_name = preg_replace('/\s+/', '-',  $upload_document_name);

        // now we have file and a unique file name
        // uploading file to the server in the filder
        if (move_uploaded_file($file_tmp_name, '../profilepictures/' . $upload_name) || move_uploaded_file($document_tmp_name, '../documents/' . $upload_document_name)) {
            // file is uploaded
            array_push($response, array("File" => "Uploaded"));


            // preparing a sql query to select data from the database.
            $chkSql = "SELECT email_id FROM profile WHERE email_id = '$email_id' OR user_name = '$user_name'";
            // preparing the sql for execution
            $emstmt = $conn->prepare($chkSql);
            // executing the sql
            $emstmt->execute();


            // check if the user account already exists
            if ($emstmt->rowCount() > 0) {
                array_push($response, array("Status" => "The account with this email_id or user_name already exists"));
            } else {
                // if not exist create one
                $sql = "INSERT INTO profile (id,user_name,password,email_id,address,phone,date,notification_id,profileimage_id,skill_id,mydescription,myspeciality,document,socialmedia,gender) 
                VALUES (NULL,:user_name,:password,:email_id,:address,:phone,:date,:notification_id,:profileimage_id,:skill_id,:mydescription,:myspeciality,:document,:socialmedia,:gender)";
                $stmt = $conn->prepare($sql);


                $stmt->execute(
                    [

                        ':user_name' => $user_name,
                        ':password' => $password,
                        ':email_id' => $email_id,
                        ':address' => $address,
                        ':phone' => $phone,
                        ':date' => $date,
                        ':notification_id' => $notification_id,
                        ':profileimage_id' => $upload_name,
                        ':skill_id' => $skill_id,
                        ':mydescription' => $mydescription,
                        ':myspeciality' => $myspeciality,
                        ':document' => $document,
                        ':socialmedia' => $socialmedia,
                        ':gender' => $gender,

                    ]
                );
                array_push($response, array("Status" => "Account created"));
            }
        } else {
            array_push($response, array("File" => "Failed to Save file to directory"));
        }
    }
}

// giving the response in json encoded format
echo (json_encode($response));
