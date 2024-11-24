<?php
session_start();

// Check if the form has been submitted
if (isset($_POST['food_id']) && isset($_POST['quantity'])) {
    $food_id = $_POST['food_id'];
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];
    $quantity = $_POST['quantity'];

    // If the cart session doesn't exist, create it
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // If the food item is already in the cart, update the quantity
    if (isset($_SESSION['cart'][$food_id])) {
        $_SESSION['cart'][$food_id]['quantity'] += $quantity;
    } else {
        // If it's a new item, add it to the cart
        $_SESSION['cart'][$food_id] = [
            'name' => $food_name,
            'price' => $food_price,
            'quantity' => $quantity
        ];
    }

    // Redirect the user back to the menu or cart page
    header('Location: index.php'); // Or redirect to cart.php if you prefer
    exit;
}
