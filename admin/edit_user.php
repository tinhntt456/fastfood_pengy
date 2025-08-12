<?php
require_once '../config/database.php';
// Get user to edit
if (!isset($_GET['id'])) {
    header('Location: users/index.php');
    exit;
}
$user_id = (int)$_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$user_id]);
$user = $stmt->fetch();
if (!$user) {
    echo '<div class="alert alert-danger">User not found!</div>';
    exit;
}
// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? $user['name'];
    $email = $_POST['email'] ?? $user['email'];
    $role = $_POST['role'] ?? $user['role'];
    $sql = "UPDATE users SET name=:name, email=:email, role=:role WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':role' => $role,
        ':id' => $user_id
    ]);
    if ($result) {
        header('Location: users/index.php?msg=User+updated+successfully');
        exit;
    } else {
        echo '<div class="alert alert-danger">Failed to update user!</div>';
    }
}
include 'admin_header.php';
?>
<div class="container mt-4">
    <h2 class="mb-4">Edit User</h2>
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-control">
                <option value="user" <?= $user['role']==='user'?'selected':'' ?>>User</option>
                <option value="admin" <?= $user['role']==='admin'?'selected':'' ?>>Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="users/index.php" class="btn btn-secondary">Back</a>
    </form>
</div>
<?php include 'admin_footer.php'; ?>
