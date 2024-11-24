// submit_result.php
<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $subject1_mse = $_POST['subject1_mse'];
    $subject1_ese = $_POST['subject1_ese'];
    $subject2_mse = $_POST['subject2_mse'];
    $subject2_ese = $_POST['subject2_ese'];
    $subject3_mse = $_POST['subject3_mse'];
    $subject3_ese = $_POST['subject3_ese'];
    $subject4_mse = $_POST['subject4_mse'];
    $subject4_ese = $_POST['subject4_ese'];

    // Calculate total marks for each subject
    $subject1_total = ($subject1_mse * 0.3) + ($subject1_ese * 0.7);
    $subject2_total = ($subject2_mse * 0.3) + ($subject2_ese * 0.7);
    $subject3_total = ($subject3_mse * 0.3) + ($subject3_ese * 0.7);
    $subject4_total = ($subject4_mse * 0.3) + ($subject4_ese * 0.7);

    // Calculate total marks
    $total_marks = $subject1_total + $subject2_total + $subject3_total + $subject4_total;

    // Determine result
    $result = $total_marks >= 40 ? 'Pass' : 'Fail'; // Example: pass if total marks >= 40

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO students (student_id, name, subject1_mse, subject1_ese, subject2_mse, subject2_ese, subject3_mse, subject3_ese, subject4_mse, subject4_ese, total_marks, result) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiiiiiiiiis", $student_id, $name, $subject1_mse, $subject1_ese, $subject2_mse, $subject2_ese, $subject3_mse, $subject3_ese, $subject4_mse, $subject4_ese, $total_marks, $result);
    $stmt->execute();
    $stmt->close();

    // Show calculated marks and result
    echo "<h3>Result for Student: " . $name . " (ID: " . $student_id . ")</h3>";
    echo "<p>Subject 1 Total Marks: " . $subject1_total . "</p>";
    echo "<p>Subject 2 Total Marks: " . $subject2_total . "</p>";
    echo "<p>Subject 3 Total Marks: " . $subject3_total . "</p>";
    echo "<p>Subject 4 Total Marks: " . $subject4_total . "</p>";
    echo "<p>Total Marks: " . $total_marks . "</p>";
    echo "<p>Result: " . $result . "</p>";

    echo "<p>Result submitted successfully!</p>";
}
?>