<?php
$division = $_GET['division'];

// Database connection
$conn = new mysqli("localhost", "root", "", "vit_pune");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the data for the selected division
$sql = "SELECT * FROM students WHERE division = '$division'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students - Division <?php echo $division; ?> - VIT Pune</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Student Records for Division <?php echo $division; ?></h1>

    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Roll Number</th>
                <th>PRN Number</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Father's Name</th>
                <th>Mother's Name</th>
                <th>Date of Birth</th>
                <th>10th %</th>
                <th>12th/Diploma %</th>
                <th>Current GPA</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are results
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['roll_no']}</td>
                            <td>{$row['prn_number']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['father_name']}</td>
                            <td>{$row['mother_name']}</td>
                            <td>{$row['dob']}</td>
                            <td>{$row['tenth_percentage']}</td>
                            <td>{$row['twelfth_percentage_or_diploma']}</td>
                            <td>{$row['current_gpa']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No records found for Division $division</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="index.php" style="display: block; text-align: center; margin-top: 20px;">Go Back to Home Page</a>

</body>
</html>

<?php
// Close the connection
$conn->close();
?>
