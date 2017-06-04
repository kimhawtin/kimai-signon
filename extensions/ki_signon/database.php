<?php

//Update this file to reflect any changes to the database server or user details.
//This code is called by other pages when a relevant database connection is 
//required.

//Database details
$username = "root";
$password = "";
$hostname = "127.0.0.1";
$dbname = "kimai";

// Create connection to the database
$conn = new mysqli($hostname, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
