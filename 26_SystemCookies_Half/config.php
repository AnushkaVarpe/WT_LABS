<?php
$servername = "localhost";  // Change to your database server if it's not local
$username = "root";         // Change this to your MySQL username
$password = "2004";         // Change this to your MySQL password
$dbname = "vit_results"; // Name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
