<?php
session_start();

// If the cart is empty, display a message
if (empty($_SESSION['cart'])) {
    echo "<h2 style='text-align:center;'>Your cart is empty</h2>";
    echo "<a href='index.php'><button style='display:block; margin:auto;'>Go to Menu</button></a>";
    exit;
}

$total_price = 0;
?>

<?php include '../includes/header.php'; ?>

<h2 style="text-align:center;">Your Cart</h2>
<table border="1" style="margin: auto; width: 80%; text-align: center;">
    <tr>
        <th>Food Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Action</th>
    </tr>
    <?php
    // Display the cart contents
    foreach ($_SESSION['cart'] as $food_id => $item) {
        $total_price += $item['price'] * $item['quantity'];
        echo "<tr>
                <td>{$item['name']}</td>
                <td>\${$item['price']}</td>
                <td>{$item['quantity']}</td>
                <td><a href='cart.php?remove={$food_id}'>Remove</a></td>
              </tr>";
    }
    ?>
</table>

<h3 style="text-align:center;">Total: $<?php echo $total_price; ?></h3>

<div style="text-align:center; margin-top: 20px;">
    <a href="checkout.php"><button>Proceed to Checkout</button></a>
    <a href="index.php"><button>Continue Shopping</button></a>
</div>

<?php include '../includes/footer.php'; ?>
