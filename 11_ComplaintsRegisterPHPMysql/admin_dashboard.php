<?php
session_start();
require 'db.php';

if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

$query = "SELECT complaints.id, complaints.title, complaints.description, complaints.date, students.username 
          FROM complaints 
          JOIN students ON complaints.student_id = students.id";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Complaints</title>
</head>
<body>
    <h2>All Complaints</h2>
    <table border="1">
        <tr>
            <th>Complaint ID</th>
            <th>Student</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><?= $row['date'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
