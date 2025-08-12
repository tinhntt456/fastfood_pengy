<?php
session_start();
include '../admin_header.php';
require_once '../../config/database.php';
// Get a list of users
$sql = "SELECT id, name, email, role FROM users ORDER BY id DESC";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll();
?>
<?php if (!empty($_SESSION['success'])): ?>
    <div class="container mt-3"><div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div></div>
<?php endif; ?>
<div class="container py-4">
    <h2 class="mb-4">User List</h2>
    <a href="add_form.php" class="btn btn-success mb-3">Add User</a>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <!-- <th>Created Date</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['role']) ?></td>
                <!-- <td></td> -->
                <td>
                    <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this user?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include '../admin_footer.php'; ?>
