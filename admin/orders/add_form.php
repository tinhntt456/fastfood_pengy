<?php
require_once '../../config/database.php';
// Get a list of users to select
$users = $pdo->query("SELECT id, name FROM users")->fetchAll();
?>
<?php include '../admin_header.php'; ?>
<div class="container mt-4">
    <h2 class="mb-4">Add New Order</h2>
    <form action="add.php" method="post">
        <div class="mb-3">
            <label for="user_id" class="form-label">Customer</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">-- Select Customer --</option>
                <?php foreach ($users as $u): ?>
                    <option value="<?= $u['id'] ?>"><?= htmlspecialchars($u['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea name="note" id="note" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0">Pending</option>
                <option value="1">Confirmed</option>
                <option value="2">In Transit</option>
                <option value="3">Completed</option>
                <option value="-1">Cancelled</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="subtotal" class="form-label">Subtotal</label>
            <input type="number" step="0.01" name="subtotal" id="subtotal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tax_fee" class="form-label">Tax Fee</label>
            <input type="number" step="0.01" name="tax_fee" id="tax_fee" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" step="0.01" name="total" id="total" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="total_price" class="form-label">Total Price</label>
            <input type="number" step="0.01" name="total_price" id="total_price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="created_at" class="form-label">Created At</label>
            <input type="datetime-local" name="created_at" id="created_at" class="form-control" value="<?= date('Y-m-d\TH:i') ?>">
        </div>
        <div class="mb-3">
            <label for="updated_at" class="form-label">Updated At</label>
            <input type="datetime-local" name="updated_at" id="updated_at" class="form-control" value="<?= date('Y-m-d\TH:i') ?>">
        </div>
        <button type="submit" class="btn btn-primary">Add Order</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>
<?php include '../admin_footer.php'; ?>
