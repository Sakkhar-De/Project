<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GamerZone";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$tablename='match10';
// Create database
$sql = "CREATE TABLE $tablename AS 
    SELECT id, username,email,phone
    FROM match2;
    ";
if ($conn->query($sql) === TRUE) {
    echo "table $tablename created successfully";
} else {
    echo "Error creating table $tablename: " . $conn->error;
}

$conn->close();
?>