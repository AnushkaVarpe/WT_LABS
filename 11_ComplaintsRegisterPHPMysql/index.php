<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM students WHERE username = '$username' AND password = MD5('$password')";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $student = $result->fetch_assoc();
        $_SESSION['student_id'] = $student['id'];  // Store student ID in session
        $_SESSION['username'] = $student['username'];
        header("Location: student_dashboard.php");
    } else {
        echo "Invalid username or password.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Login</title>
</head>
<body>
    <form method="POST" action="">
        <h2>Student Login</h2>
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
