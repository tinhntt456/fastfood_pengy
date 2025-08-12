<?php
require_once '../../config/database.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id > 0) {
    // Delete order details first
    $stmt = $pdo->prepare('DELETE FROM order_details WHERE order_id = ?');
    $stmt->execute([$id]);
    // Delete order
    $stmt = $pdo->prepare('DELETE FROM orders WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: index.php?msg=deleted');
    exit;
}
header('Location: index.php?error=invalid');
