<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "bloodbank_db";

// Create connection
$conn = new mysqli($server, $username, $password, $database);
    if($conn->connect_error){
        die("Connection failed. ERROR : " . $conn->connect_error);
    }
?>
