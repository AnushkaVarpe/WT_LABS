<?php
$host = 'localhost';
$db = 'restaurant_db';
$user = 'root';
$pass = 'anu@210904'; // Set password if required

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
