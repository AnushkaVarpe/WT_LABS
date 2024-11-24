<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "vit_pune");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$division = $_POST['division'];
$name = $_POST['name'];
$roll_no = $_POST['roll_no'];
$prn = $_POST['prn'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$dob = $_POST['dob'];
$tenth_percentage = $_POST['tenth_percentage'];
$twelfth_percentage_or_diploma = $_POST['twelfth_percentage_or_diploma'];
$current_gpa = $_POST['current_gpa'];

// SQL query to insert data
$sql = "INSERT INTO students (name, roll_no, prn_number, phone, email, father_name, mother_name, dob, tenth_percentage, twelfth_percentage_or_diploma, current_gpa, division) 
        VALUES ('$name', '$roll_no', '$prn', '$phone', '$email', '$father_name', '$mother_name', '$dob', '$tenth_percentage', '$twelfth_percentage_or_diploma', '$current_gpa', '$division')";

if ($conn->query($sql) === TRUE) {
    echo "Student record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();

// Redirect back to home page
header("Location: index.php");
exit();
?>
