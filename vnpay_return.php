<?php
session_start();
require_once 'order_save.php';
require_once 'order_confirm.php';

// VNPay return parameters
$vnp_ResponseCode = $_GET['vnp_ResponseCode'] ?? '';
$vnp_TxnRef = $_GET['vnp_TxnRef'] ?? '';

if ($vnp_ResponseCode === '00') { // Payment success
    // Retrieve customer info from session (set before redirect)
    $customer_name = $_SESSION['checkout_customer_name'];
    $phone = $_SESSION['checkout_phone'];
    $address = $_SESSION['checkout_address'];
    $total = $_SESSION['checkout_total'];
    $cart_items = $_SESSION['cart_items'];
    $order_id = save_order($customer_name, $phone, $address, $total, 'PAID', $cart_items);
    send_order_confirmation($order_id, $customer_name, $phone, $address, $total);
    // Clear cart
    unset($_SESSION['cart']);
    unset($_SESSION['cart_items']);
    header('Location: order_confirmation.php?order_id=' . $order_id);
    exit;
} else {
    echo "<h2>Payment failed or cancelled. Please try again.</h2>";
}
