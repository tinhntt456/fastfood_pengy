<?php
require_once '../config/database.php';
include 'admin_header.php';
// Fetch all orders with user info
$stmt = $pdo->query('SELECT o.*, u.name as user_name FROM orders o LEFT JOIN users u ON o.user_id = u.id ORDER BY o.id DESC');
$orders = $stmt->fetchAll();
?>
<div class="container-fluid mt-4">
    <h1 class="h3 mb-4 text-gray-800">Order Management</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
            <a href="orders/add_form.php" class="btn btn-success btn-sm float-end">Add Order</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Order Code</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $o): ?>
                        <tr>
                            <td><?= $o['id'] ?></td>
                            <td><?= htmlspecialchars($o['order_code'] ?? '') ?></td>
                            <td><?= htmlspecialchars($o['user_name'] ?? '') ?></td>
                            <td>
                                <?php
                                $statusText = 'Pending';
                                if ($o['status'] == 1) $statusText = 'Confirmed';
                                elseif ($o['status'] == 2) $statusText = 'Shipping';
                                elseif ($o['status'] == 3) $statusText = 'Completed';
                                elseif ($o['status'] == -1) $statusText = 'Cancelled';
                                ?>
                                <span class="badge bg-info text-dark"><?= $statusText ?></span>
                            </td>
                            <td>$<?= number_format($o['total'] ?? 0, 2, ',', '.') ?></td>
                            <td><?= $o['created_at'] ?></td>
                            <td>
                                <a href="edit_order.php?id=<?= $o['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_order.php?id=<?= $o['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'admin_footer.php'; ?>
