<?php
// admin/manageusers/delete.php
require_once '../../config/database.php';
$user_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($user_id > 0) {
    $pdo->prepare('DELETE FROM users WHERE id = ?')->execute([$user_id]);
    session_start();
    $_SESSION['success'] = 'Delete user successfully!';
}
header('Location: index.php');
exit;
