<?php
require_once '../../config/database.php';
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
     // Delete previous order details
    $pdo->prepare('DELETE FROM order_details WHERE order_id = ?')->execute([$id]);
    // Delete order
    $stmt = $pdo->prepare('DELETE FROM orders WHERE id = ?');
    $stmt->execute([$id]);
}
header('Location: index.php');
exit;
