<?php
require_once '../../config/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? null;
    $note = $_POST['note'] ?? '';
    $status = $_POST['status'] ?? 0;
    $subtotal = $_POST['subtotal'] ?? 0;
    $tax_fee = $_POST['tax_fee'] ?? 0;
    $total = $_POST['total'] ?? 0;
    $total_price = $_POST['total_price'] ?? 0;
    $created_at = $_POST['created_at'] ?? date('Y-m-d H:i:s');
    $updated_at = $_POST['updated_at'] ?? date('Y-m-d H:i:s');
    $order_code = 'OD' . time() . rand(100,999);

    $sql = "INSERT INTO orders (user_id, order_code, note, status, subtotal, tax_fee, total, created_at, updated_at, total_price) VALUES (:user_id, :order_code, :note, :status, :subtotal, :tax_fee, :total, :created_at, :updated_at, :total_price)";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([
        ':user_id' => $user_id,
        ':order_code' => $order_code,
        ':note' => $note,
        ':status' => $status,
        ':subtotal' => $subtotal,
        ':tax_fee' => $tax_fee,
        ':total' => $total,
        ':created_at' => $created_at,
        ':updated_at' => $updated_at,
        ':total_price' => $total_price
    ]);
    if ($result) {
        header('Location: index.php');
        exit;
    } else {
        echo '<div class="alert alert-danger">Add order failed!</div>';
    }
} else {
    header('Location: add_form.php');
    exit;
}
