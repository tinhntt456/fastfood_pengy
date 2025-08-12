<?php
require_once '../../config/database.php';
// Get a list of users to select
$users = $pdo->query("SELECT id, name FROM users")->fetchAll();
// Get the order to edit
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}
$id = (int)$_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM orders WHERE id = ?');
$stmt->execute([$id]);
$order = $stmt->fetch();
if (!$order) {
    echo '<div class="alert alert-danger">Order not found!</div>';
    exit;
}
// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? $order['user_id'];
    $note = $_POST['note'] ?? '';
    $status = $_POST['status'] ?? 0;
    $subtotal = $_POST['subtotal'] ?? 0;
    $tax_fee = $_POST['tax_fee'] ?? 0;
    $total = $_POST['total'] ?? 0;
    $total_price = $_POST['total_price'] ?? 0;
    $created_at = $_POST['created_at'] ?? $order['created_at'];
    $updated_at = $_POST['updated_at'] ?? date('Y-m-d H:i:s');
    $sql = "UPDATE orders SET user_id=:user_id, note=:note, status=:status, subtotal=:subtotal, tax_fee=:tax_fee, total=:total, created_at=:created_at, updated_at=:updated_at, total_price=:total_price WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([
        ':user_id' => $user_id,
        ':note' => $note,
        ':status' => $status,
        ':subtotal' => $subtotal,
        ':tax_fee' => $tax_fee,
        ':total' => $total,
        ':created_at' => $created_at,
        ':updated_at' => $updated_at,
        ':total_price' => $total_price,
        ':id' => $id
    ]);
    if ($result) {
        header('Location: index.php');
        exit;
    } else {
        echo '<div class="alert alert-danger">Update failed!</div>';
    }
}
include '../admin_header.php';
?>
<div class="container mt-4">
    <h2 class="mb-4">Edit Order</h2>
    <form method="post">
        <div class="mb-3">
            <label for="user_id" class="form-label">Customer</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <?php foreach ($users as $u): ?>
                    <option value="<?= $u['id'] ?>" <?= $u['id'] == $order['user_id'] ? 'selected' : '' ?>><?= htmlspecialchars($u['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea name="note" id="note" class="form-control"><?= htmlspecialchars($order['note']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0" <?= $order['status']==0?'selected':'' ?>>Pending</option>
                <option value="1" <?= $order['status']==1?'selected':'' ?>>Confirmed</option>
                <option value="2" <?= $order['status']==2?'selected':'' ?>>In Transit</option>
                <option value="3" <?= $order['status']==3?'selected':'' ?>>Completed</option>
                <option value="-1" <?= $order['status']==-1?'selected':'' ?>>Cancelled</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="subtotal" class="form-label">Subtotal</label>
            <input type="number" step="0.01" name="subtotal" id="subtotal" class="form-control" value="<?= $order['subtotal'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="tax_fee" class="form-label">Tax Fee</label>
            <input type="number" step="0.01" name="tax_fee" id="tax_fee" class="form-control" value="<?= $order['tax_fee'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" step="0.01" name="total" id="total" class="form-control" value="<?= $order['total'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="total_price" class="form-label">Total Price</label>
            <input type="number" step="0.01" name="total_price" id="total_price" class="form-control" value="<?= $order['total_price'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="created_at" class="form-label">Created At</label>
            <input type="datetime-local" name="created_at" id="created_at" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($order['created_at'])) ?>">
        </div>
        <div class="mb-3">
            <label for="updated_at" class="form-label">Updated At</label>
            <input type="datetime-local" name="updated_at" id="updated_at" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($order['updated_at'])) ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>
<?php include '../admin_footer.php'; ?>
