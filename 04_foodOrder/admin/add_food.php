<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    $target = "../images/" . basename($image);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO food_items (name, description, price, image) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $description, $price, $target]);
        echo "Food item added successfully!";
    } else {
        echo "Failed to upload image.";
    }
}
?>

<?php include '../includes/header.php'; ?>
<form method="POST" enctype="multipart/form-data" style="padding: 20px;">
    <input type="text" name="name" placeholder="Food Name" required><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <input type="number" step="0.01" name="price" placeholder="Price" required><br>
    <input type="file" name="image" required><br>
    <button type="submit">Add Food</button>
</form>
<?php include '../includes/footer.php'; ?>
