<?php
require 'db.php';
session_start();

if (!isset($_SESSION['student_id'])) {
    // Redirect to login if not logged in
    header("Location: index.php");
    exit();
}

$student_id = $_SESSION['student_id']; // Get student ID from session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO complaints (student_id, title, description) VALUES ('$student_id', '$title', '$description')";

    if ($conn->query($query)) {
        echo "Complaint registered successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Complaint</title>
</head>
<body>
    <h2>Register Complaint</h2>
    <form method="POST" action="">
        <label>Title:</label>
        <input type="text" name="title" required><br>
        <label>Description:</label>
        <textarea name="description" required></textarea><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
