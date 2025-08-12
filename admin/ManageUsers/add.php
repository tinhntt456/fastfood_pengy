<?php
// admin/manageusers/add.php
require_once '../../config/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $role = $_POST['role'] ?? 'user';
    if ($name && $email && $role) {
        $stmt = $pdo->prepare('INSERT INTO users (name, email, role, created_at) VALUES (?, ?, ?, NOW())');
        $stmt->execute([$name, $email, $role]);
        session_start();
        $_SESSION['success'] = 'Add user successfully!';
    }
}
header('Location: index.php');
exit;
