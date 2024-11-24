<?php
session_start();
include '../includes/db.php';

// If the cart is empty, redirect to the menu
if (empty($_SESSION['cart'])) {
    header('Location: index.php');
    exit;
}

$total_price = 0;
foreach ($_SESSION['cart'] as $food_id => $item) {
    $total_price += $item['price'] * $item['quantity'];
}

// Handling the checkout form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['name'];
    $customer_contact = $_POST['contact'];

    // Insert the order into the orders table
    $sql = "INSERT INTO orders (customer_name, customer_contact, total_price, order_status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$customer_name, $customer_contact, $total_price, 'Pending']);
    $order_id = $conn->lastInsertId(); // Get the last inserted order ID

    // Insert the individual food items into the order_items table
    foreach ($_SESSION['cart'] as $food_id => $item) {
        $sql = "INSERT INTO order_items (order_id, food_id, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$order_id, $food_id, $item['quantity'], $item['price']]);
    }

    // Clear the cart after placing the order
    unset($_SESSION['cart']);

    echo "<h2 style='text-align:center;'>Order placed successfully! Thank you, $customer_name.</h2>";
    echo "<a href='index.php'><button style='display:block; margin:auto;'>Go to Menu</button></a>";
    exit;
}
?>

<?php include '../includes/header.php'; ?>

<h2 style="text-align:center;">Checkout</h2>
<form method="POST" style="text-align:center; padding: 20px;">
    <label for="name">Name: </label>
    <input type="text" name="name" required><br><br>
    
    <label for="contact">Contact Number: </label>
    <input type="text" name="contact" required><br><br>
    
    <button type="submit">Place Order</button>
</form>

<h3 style="text-align:center;">Total Price: $<?php echo $total_price; ?></h3>

<?php include '../includes/footer.php'; ?>
