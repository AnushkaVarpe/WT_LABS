<?php
$action = $_GET['action'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Division - VIT Pune</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        h1 {
            margin-bottom: 40px;
        }
        .btn {
            padding: 10px 20px;
            font-size: 18px;
            margin: 20px;
            cursor: pointer;
            border-radius: 5px;
            border: 1px solid #000;
            background-color: #f2f2f2;
            text-decoration: none;
            color: #000;
        }
        .btn:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <h1>Select Division</h1>

    <form action="<?php echo $action === 'insert' ? 'insert_data.php' : 'view_data.php'; ?>" method="GET">
        <select name="division" required>
            <option value="">Select Division</option>
            <option value="A">Division A</option>
            <option value="B">Division B</option>
            <option value="C">Division C</option>
        </select>
        <br><br>
        <button type="submit" class="btn">Proceed</button>
    </form>

</body>
</html>
