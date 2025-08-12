<?php
require_once '../config/database.php';
// Delete user by user id (GET param)
if (isset($_GET['id'])) {
    $user_id = (int)$_GET['id'];
    // Delete the user
    $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
    $stmt->execute([$user_id]);
    // Redirect with success message
    header('Location: users/index.php?msg=User+deleted+successfully');
    exit;
} else {
    echo '<div class="alert alert-danger">User ID is missing.</div>';
}
