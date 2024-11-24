<?php
$host = 'localhost';
$db = 'employee_db';
$user = 'root'; // Default XAMPP username
$pass = 'anu@210904'; // Default XAMPP password (leave blank)

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
