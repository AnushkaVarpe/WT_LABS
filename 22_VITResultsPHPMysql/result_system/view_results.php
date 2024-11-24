<?php
// view_results.php
require_once 'config.php';

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    
    // Retrieve result from the database
    $stmt = $conn->prepare("SELECT * FROM students WHERE student_id = ?");
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
    $stmt->close();

    if ($student) {
        echo "<h3>Result for Student: " . $student['name'] . " (ID: " . $student['student_id'] . ")</h3>";
        echo "<p>Total Marks: " . $student['total_marks'] . "</p>";
        echo "<p>Result: " . $student['result'] . "</p>";
    } else {
        echo "No record found for student with ID " . $student_id;
    }
} else {
    echo "No student ID provided.";
}
?>
