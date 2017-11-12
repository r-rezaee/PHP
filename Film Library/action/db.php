<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film";

// Create connection 
$conn = new mysqli ($servername, $username, $password, $dbname);


// Check connection for error
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

?>