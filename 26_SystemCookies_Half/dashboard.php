<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

echo "Welcome, " . $_SESSION['username'] . "!<br>";
echo "Logged in via cookie: " . ($_COOKIE['username'] ?? 'Not set') . "<br>";
?>

<a href="logout.php">Logout</a>
