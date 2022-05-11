<?php
include('../conn.php');
$json_data = file_get_contents('php://input');

// data we get from the client
$budget = $_POST['budget'];
$project_category = $_POST['project_category'];
$project_subcategory = $_POST['project_subcategory'];
$project_name = $_POST['project_name'];
$duration = $_POST['duration'];
$date = $_POST['date'];
$deadline = $_POST['deadline'];
$client_id = $_POST['client_id'];
$freelancer_id = $_POST['freelancer_id'];
$project_status = $_POST['project_status'];
$file = $_POST['file'];
$description = $_POST['description'];
$skill_id = $_POST['skill_id'];

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
            $chkSql = "SELECT project_subcategory FROM project WHERE project_category = '$project_category' AND project_subcategory='$project_subcategory' AND project_name='$project_name' AND description='$description' AND budget='$budget'";
            // preparing the sql for execution
            $emstmt = $conn->prepare($chkSql);
            // executing the sql
            $emstmt->execute();


            // check if the user account already exists
            if ($emstmt->rowCount() > 0) {
                array_push($response, array("Status" => "The account with this project_subcategory or budget already exists"));
            } else {
                // if not exist create one
                $sql = "INSERT INTO project (id,budget,project_category,project_subcategory,project_name,duration,date,deadline,client_id,freelancer_id,project_status,file,description,skill_id) 
                VALUES (NULL,:budget,:project_category,:project_subcategory,:project_name,:duration,:date,:deadline,:client_id,:freelancer_id,:project_status,:file,:description,:skill_id)";
                $stmt = $conn->prepare($sql);

                $stmt->execute(
                    [
                        ':project_category' => $project_category,
                        ':project_subcategory' => $project_subcategory,
                        ':budget' => $budget,
                        ':project_name' => $project_name,
                        ':duration' => $duration,
                        ':date' => $date,
                        ':deadline' => $deadline,
                        ':client_id' => $client_id,
                        ':freelancer_id' => $freelancer_id,
                        ':project_status' => $project_status,
                        ':file' => $upload_name,
                        ':description' => $description,
                        ':skill_id' => $skill_id,

                    ]
                );
                array_push($response, array("Status" => "Project created"));
            }
        } else {
            array_push($response, array("File" => "Failed to Save file to directory"));
        }
    }
}
$last_id = $conn->lastInsertId();
// array_push($response, array("Status" => "Payment Saved"));
array_push($response, array("projectid" => "$last_id"));
// giving the response in json encoded format
echo (json_encode($response));
