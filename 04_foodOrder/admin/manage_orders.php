<?php
include '../includes/db.php';

$sql = "SELECT * FROM orders";
$stmt = $conn->query($sql);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include '../includes/header.php'; ?>
<h2 style="text-align: center;">Order Management</h2>
<table border="1" style="margin: auto; width: 80%; text-align: center;">
    <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Contact</th>
        <th>Total Price</th>
        <th>Status</th>
    </tr>
    <?php foreach ($orders as $order): ?>
        <tr>
            <td><?php echo $order['id']; ?></td>
            <td><?php echo $order['customer_name']; ?></td>
            <td><?php echo $order['customer_contact']; ?></td>
            <td><?php echo $order['total_price']; ?></td>
            <td><?php echo $order['order_status']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>
