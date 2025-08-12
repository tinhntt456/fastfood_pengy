// admin/manageusers/edit.php
<?php
// admin/manageusers/edit.php
require_once '../../config/database.php';
$user_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($user_id <= 0) {
    include '../admin_header.php';
    echo '<div class="container py-5"><div class="alert alert-danger">User not found.</div></div>';
    include '../admin_footer.php';
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $role = $_POST['role'] ?? '';
    if ($name && $email && $role) {
    $stmt = $pdo->prepare('UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?');
    $stmt->execute([$name, $email, $role, $user_id]);
    session_start();
    $_SESSION['success'] = 'Edit user successfully!';
    header('Location: index.php');
    exit;
    }
}
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$user_id]);
$user = $stmt->fetch();
if (!$user) {
    include '../admin_header.php';
    echo '<div class="container py-5"><div class="alert alert-danger">User not found.</div></div>';
    include '../admin_footer.php';
    exit;
}
include '../admin_header.php';
?>
<div class="container py-4">
    <h2 class="mb-4">Edit User #<?= $user_id ?></h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-select" required>
                <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>
<?php include '../admin_footer.php'; ?>
