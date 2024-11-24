<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Transformer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
        }
        button {
            padding: 8px 16px;
            margin: 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .output {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>String Transformation</h1>
        <form method="POST">
            <label for="inputString">Enter a string:</label><br>
            <input type="text" name="inputString" id="inputString" required><br>
            <button type="submit" name="action" value="uppercase">Transform to Uppercase</button>
            <button type="submit" name="action" value="lowercase">Transform to Lowercase</button>
            <button type="submit" name="action" value="ucfirst">First Character Uppercase</button>
            <button type="submit" name="action" value="ucwords">First Character of Each Word Uppercase</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the input string
            $inputString = $_POST['inputString'];

            // Check which action button was clicked
            $action = $_POST['action'];
            $result = "";

            if ($action == "uppercase") {
                $result = strtoupper($inputString);
            } elseif ($action == "lowercase") {
                $result = strtolower($inputString);
            } elseif ($action == "ucfirst") {
                $result = ucfirst(strtolower($inputString)); // Convert the whole string to lowercase, then capitalize the first character
            } elseif ($action == "ucwords") {
                $result = ucwords(strtolower($inputString)); // Convert the whole string to lowercase, then capitalize the first letter of each word
            }
            

            // Display result
            echo "<div class='output'>";
            echo "<p><strong>Result:</strong> $result</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
