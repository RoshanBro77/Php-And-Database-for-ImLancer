<?php
include('../conn.php');
$json_data = file_get_contents('php://input');

// data we get from the client
$category_image = $_POST['category_image'];
$category_name = $_POST['category_name'];
$date = $_POST['date'];

// array to store the response
$response = array();

// this will hold the name of the image if any
$upload_name = "";

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
        if (move_uploaded_file($file_tmp_name, 'files/' . $upload_name)) {
            // file is uploaded
            array_push($response, array("File" => "Uploaded"));


            // preparing a sql query to select data from the database.
            $chkSql = "SELECT category_name FROM category WHERE category_name = '$category_name' ";
            // preparing the sql for execution
            $emstmt = $conn->prepare($chkSql);
            // executing the sql
            $emstmt->execute();


            // check if the user account already exists
            if ($emstmt->rowCount() > 0) {
                array_push($response, array("Status" => "The category already exist."));
            } else {
                // if not exist create one
                $sql = "INSERT INTO category (id,category_image,category_name,date) 
                VALUES (NULL,:category_image,:category_name,:date)";
                $stmt = $conn->prepare($sql);

                $stmt->execute(
                    [
                    
                        ':category_image' => $upload_name,
                        ':category_name' => $category_name,
                        ':date' => $date,
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
