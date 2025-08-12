<?php
require_once 'config/database.php';
if (!isset($_GET['order_id'])) {
    echo "Order not found.";
    exit;
}
$order_id = intval($_GET['order_id']);
// $pdo is assumed to be the PDO connection from database.php
$stmt = $pdo->prepare("SELECT * FROM orders WHERE id = ?");
$stmt->execute([$order_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);
$item_stmt = $pdo->prepare("SELECT * FROM order_details WHERE order_id = ?");
$item_stmt->execute([$order_id]);
$items = $item_stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h2 class="mb-3 text-success"><i class="bi bi-check-circle-fill"></i> Order Successful!</h2>
                    <p>Thank you for your order. Your order has been recorded.</p>
                    <hr>
                    <div class="mb-3">
                        <strong>Order ID:</strong> #<?= htmlspecialchars($order['order_code']) ?>
                    </div>
                    <div class="mb-3">
                        <strong>Order Date:</strong> <?= htmlspecialchars($order['created_at']) ?>
                    </div>
                    <div class="mb-3">
                        <strong>Total:</strong> <span class="text-danger fw-bold"><?= number_format($order['total']) ?> VND</span>
                    </div>
                    <div class="mb-3">
                        <strong>Status:</strong> 
                        <?php 
                            $statusText = 'Pending Confirmation';
                            if ($order['status'] == 1) $statusText = 'Confirmed';
                            elseif ($order['status'] == 2) $statusText = 'In Transit';
                            elseif ($order['status'] == 3) $statusText = 'Completed';
                            elseif ($order['status'] == -1) $statusText = 'Cancelled';
                        ?>
                        <span class="badge bg-info text-dark"><?= $statusText ?></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-light fw-bold">Product details</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($items as $item): ?>
                                <tr>
                                    <td><?= $item['product_id'] ?></td>
                                    <td>
                                        <?php 
                                            // Get product name from products table
                                            $pstmt = $pdo->prepare("SELECT name FROM products WHERE id = ?");
                                            $pstmt->execute([$item['product_id']]);
                                            $p = $pstmt->fetch();
                                            echo htmlspecialchars($p ? $p['name'] : '');
                                        ?>
                                    </td>
                                    <td><?= number_format($item['price']) ?> VND</td>
                                    <td><?= $item['quantity'] ?></td>
                                    <td><?= number_format($item['subtotal']) ?> VND</td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
