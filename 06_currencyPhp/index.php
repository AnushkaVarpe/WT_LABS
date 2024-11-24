<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Currency Converter</h1>

        <?php
        // Define the exchange rate (1 USD = 83 INR)
        $exchangeRate = 83;
        $convertedAmount = "";

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usdAmount = $_POST['usd'];

            // Validate the input
            if (!empty($usdAmount) && is_numeric($usdAmount)) {
                // Convert USD to INR
                $convertedAmount = $usdAmount * $exchangeRate;
            } else {
                $convertedAmount = "Please enter a valid amount.";
            }
        }
        ?>

        <!-- Conversion Form -->
        <form method="POST" action="">
            <label for="usd">Enter Amount in USD:</label>
            <input type="number" id="usd" name="usd" placeholder="Enter USD" required>
            <button type="submit">Convert</button>
        </form>

        <!-- Display Converted Amount -->
        <?php if ($convertedAmount): ?>
            <p class="result">
                <?php 
                if (is_numeric($convertedAmount)) {
                    echo "Equivalent in INR: ₹" . number_format($convertedAmount, 2);
                } else {
                    echo $convertedAmount;
                }
                ?>
            </p>
        <?php endif; ?>
    </div>
</body>
</html>
