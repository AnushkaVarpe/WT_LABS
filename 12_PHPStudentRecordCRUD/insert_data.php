<?php
$division = $_GET['division'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Student Data - VIT Pune</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        h1 {
            margin-bottom: 40px;
        }
        form {
            display: inline-block;
            text-align: left;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="number"], input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            border: 1px solid #000;
            background-color: #f2f2f2;
            text-decoration: none;
            color: #000;
        }
        button:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <h1>Insert Student Data for Division <?php echo $division; ?></h1>

    <form action="process_insert.php" method="POST">
        <input type="hidden" name="division" value="<?php echo $division; ?>">
        <div class="form-group">
            <label for="name">Student Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="roll_no">Roll Number:</label>
            <input type="text" id="roll_no" name="roll_no" required>
        </div>
        <div class="form-group">
            <label for="prn">PRN Number:</label>
            <input type="text" id="prn" name="prn" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="father_name">Father's Name:</label>
            <input type="text" id="father_name" name="father_name" required>
        </div>
        <div class="form-group">
            <label for="mother_name">Mother's Name:</label>
            <input type="text" id="mother_name" name="mother_name" required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
        </div>
        <div class="form-group">
            <label for="tenth_percentage">10th Percentage:</label>
            <input type="number" step="0.01" id="tenth_percentage" name="tenth_percentage" required>
        </div>
        <div class="form-group">
            <label for="twelfth_percentage_or_diploma">12th/Diploma Percentage:</label>
            <input type="number" step="0.01" id="twelfth_percentage_or_diploma" name="twelfth_percentage_or_diploma" required>
        </div>
        <div class="form-group">
            <label for="current_gpa">Current GPA:</label>
            <input type="number" step="0.01" id="current_gpa" name="current_gpa" required>
        </div>
        <button type="submit">Insert Data</button>
    </form>

</body>
</html>
