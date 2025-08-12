<?php
require_once '../config/database.php';
// Delete order and its details by order id (GET param)
if (isset($_GET['id'])) {
    $order_id = (int)$_GET['id'];
    // First, delete order details
    $pdo->prepare('DELETE FROM order_details WHERE order_id = ?')->execute([$order_id]);
    // Then, delete the order itself
    $stmt = $pdo->prepare('DELETE FROM orders WHERE id = ?');
    $stmt->execute([$order_id]);
    // Redirect with success message
    header('Location: orders/index.php?msg=Order+deleted+successfully');
    exit;
} else {
    echo '<div class="alert alert-danger">Order ID is missing.</div>';
}
