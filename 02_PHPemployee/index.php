<?php
include 'db.php';

$sql = "SELECT * FROM employees";
$stmt = $conn->prepare($sql);
$stmt->execute();
$employees = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Employee List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?php echo $employee['id']; ?></td>
                    <td><?php echo $employee['name']; ?></td>
                    <td><?php echo $employee['email']; ?></td>
                    <td><?php echo $employee['position']; ?></td>
                    <td><?php echo $employee['salary']; ?></td>
                    <td><?php echo $employee['created_at']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="add_employee.php">Add New Employee</a>
</body>
</html>
