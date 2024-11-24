<?php
session_start();
include '../includes/db.php';

// Get all food items from the database
$sql = "SELECT * FROM food_items";
$stmt = $conn->query($sql);
$food_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include '../includes/header.php'; ?>

<h2 style="text-align: center;">Menu</h2>
<div class="menu">
    <?php foreach ($food_items as $food): ?>
        <div class="food-item" style="text-align: center; margin: 20px;">
            <img src="../uploads/<?php echo $food['image']; ?>" alt="<?php echo $food['name']; ?>" width="200"><br>
            <h3><?php echo $food['name']; ?></h3>
            <p><?php echo $food['description']; ?></p>
            <p>Price: $<?php echo $food['price']; ?></p>
            <!-- Add to Cart Form -->
            <form action="add_to_cart.php" method="POST">
                <input type="hidden" name="food_id" value="<?php echo $food['id']; ?>">
                <input type="hidden" name="food_name" value="<?php echo $food['name']; ?>">
                <input type="hidden" name="food_price" value="<?php echo $food['price']; ?>">
                <input type="number" name="quantity" value="1" min="1" style="width: 50px;">
                <button type="submit">Add to Cart</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

<?php include '../includes/footer.php'; ?>
