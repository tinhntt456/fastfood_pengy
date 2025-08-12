<?php
require_once '../../config/database.php';
include '../admin_header.php';
$stmt = $pdo->query('SELECT o.*, u.name as user_name FROM orders o LEFT JOIN users u ON o.user_id = u.id ORDER BY o.id DESC');
$orders = $stmt->fetchAll();
?>
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800">Order Management</h1>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Order List</h6>
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
						</tr>
					</thead>
					<tbody>
						<?php foreach ($orders as $o): ?>
						<tr>
							<td><?= $o['id'] ?></td>
							<td><?= htmlspecialchars($o['order_code'] ?? '') ?></td>
							<td><?= htmlspecialchars($o['user_name'] ?? '') ?></td>
							<td><?= htmlspecialchars($o['status'] ?? '') ?></td>
							<td>$<?= number_format($o['total'] ?? 0, 2, ',', '.') ?></td>
							<td><?= $o['created_at'] ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include '../admin_footer.php'; ?>
