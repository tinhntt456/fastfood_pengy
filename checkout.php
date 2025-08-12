<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once 'config/database.php';

// Calculate cart totals

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$subtotal = 0;
$cart_items = [];
if ($cart) {
    $ids = implode(',', array_map('intval', array_keys($cart)));
    $db = require 'config/database.php';
    $pdo = new PDO($db['dsn'], $db['user'], $db['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $stmt = $pdo->query("SELECT * FROM products WHERE id IN ($ids)");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $qty = $cart[$row['id']];
        $row['qty'] = $qty;
        $row['subtotal'] = $qty * $row['price'];
        $cart_items[] = $row;
        $subtotal += $row['subtotal'];
    }
}
$shipping_fee = ($subtotal > 0) ? 20000 : 0; // Example shipping fee
$total = $subtotal + $shipping_fee;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = trim($_POST['customer_name']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $payment_method = $_POST['payment_method'];

    if ($payment_method === 'cod') {
        // Save order to DB
        try {
            require_once 'order_save.php';
            $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
            $order_id = save_order($customer_name, $phone, $address, $total, 'COD', $cart_items, $user_id);
            if (!$order_id) {
                throw new Exception('Failed to save order.');
            }
            // Send confirmation email & Zalo OA message
            require_once 'order_confirm.php';
            send_order_confirmation($order_id, $customer_name, $phone, $address, $total);
            // Redirect to confirmation page
            header('Location: order_confirmation.php?order_id=' . $order_id);
            exit;
        } catch (Exception $e) {
            echo '<div style="color:red;">Lỗi: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    } elseif ($payment_method === 'vnpay') {
        // VNPay integration
        require_once 'vnpay_payment.php';
        // Save information to session for post-payment processing
        $_SESSION['checkout_customer_name'] = $customer_name;
        $_SESSION['checkout_phone'] = $phone;
        $_SESSION['checkout_address'] = $address;
        $_SESSION['checkout_total'] = $total;
        $_SESSION['cart_items'] = $cart_items;
        $vnpay_url = create_vnpay_payment($total, $customer_name, $phone, $address);
        header('Location: ' . $vnpay_url);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <h2>Checkout</h2>
    <form method="post" action="checkout.php">
        <label>Name:</label>
        <input type="text" name="customer_name" required><br>
        <label>Phone:</label>
        <input type="text" name="phone" required><br>
        <label>Address:</label>
        <input type="text" name="address" required><br>
        <label>Payment Method:</label><br>
        <input type="radio" name="payment_method" value="cod" checked> Cash on Delivery<br>
        <input type="radio" name="payment_method" value="vnpay"> VNPay Online Payment<br><br>
        <h4>Order Summary</h4>
        <p>Subtotal: <?= number_format($subtotal) ?> VND</p>
        <p>Shipping: <?= number_format($shipping_fee) ?> VND</p>
        <p><strong>Total: <?= number_format($total) ?> VND</strong></p>
        <button type="submit">Place Order</button>
    </form>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
