<?php
$servername = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbName = 'imlancer';
try {
    // creating the connection to database
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbusername, $dbpassword);
    // echo "Successfully connected";
} catch (PDOException $e) {
    echo "Connection failed" . $e->getMessage();
}
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
