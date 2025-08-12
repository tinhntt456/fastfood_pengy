<?php
require_once 'config/database.php';

function save_order($customer_name, $phone, $address, $total, $status, $cart, $user_id = null) {
    $pdo = getPDO();
    $pdo->beginTransaction();
    try {
        if ($user_id) {
            $stmt = $pdo->prepare("INSERT INTO orders (user_id, customer_name, phone, address, total, status, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
            $stmt->execute([$user_id, $customer_name, $phone, $address, $total, $status]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO orders (customer_name, phone, address, total, status, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
            $stmt->execute([$customer_name, $phone, $address, $total, $status]);
        }
        $order_id = $pdo->lastInsertId();
        $item_stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, qty, price) VALUES (?, ?, ?, ?)");
        foreach ($cart as $item) {
            $item_stmt->execute([$order_id, $item['id'], $item['qty'], $item['price']]);
        }
        $pdo->commit();
        return $order_id;
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function getPDO() {
    // Update with your DB config
    $db = require 'config/database.php';
    return new PDO($db['dsn'], $db['user'], $db['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
