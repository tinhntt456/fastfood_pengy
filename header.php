<!doctype html>
<html lang="en" class="light-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/favicon-32x32.jpg" type="image/jpeg" style="background:#fff;" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick-theme.css" />
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/dark-theme.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
  <title>FastFoodPenry</title>
  <style>
    .profile-name {
      font-weight: bold;
      font-size: 1.1em;
      color: #222;
    }
  </style>
</head>

<?php
if (session_status() === PHP_SESSION_NONE) session_start();
// Fetch categories from database
require_once __DIR__ . '/config/database.php';
$cat_stmt = $pdo->query('SELECT id, name FROM categories ORDER BY id DESC');
$header_categories = $cat_stmt->fetchAll();
?>
<body>
  
  <header class="top-header">
    <nav class="navbar navbar-expand-xl w-100 navbar-dark container gap-3">
      <a class="navbar-brand d-flex align-items-center" href="index.php">
  <img src="assets/images/Logo.jpg" class="logo-img" alt="Pengy Logo" style="height:60px; width:auto; max-width:120px; background:transparent;">
      </a>
      <a class="mobile-menu-btn d-inline d-xl-none" href="javascript:;" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar">
        <i class="bi bi-list"></i>
      </a>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
        <div class="offcanvas-header">
          <div class="offcanvas-logo"><img src="assets/images/Logo.jpg" class="logo-img" alt="Pengy Logo" style="background:transparent;">
          </div>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body primary-menu">
          <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <?php if (!empty($header_categories)): ?>
              <?php foreach ($header_categories as $cat): ?>
                <li class="nav-item">
                  <a class="nav-link" href="categories.php?id=<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></a>
                </li>
              <?php endforeach; ?>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="contact-us.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
      <ul class="navbar-nav secondary-menu flex-row">
        
        
        <li class="nav-item">
          <a class="nav-link position-relative" href="cart.php">
            <?php
              $cart_count = 0;
              if (!empty($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                $cart_count = array_sum($_SESSION['cart']);
              }
            ?>
            <div class="cart-badge"><?= $cart_count ?></div>
            <i class="bi bi-basket2"></i>
          </a>
        </li>
        <?php if (!empty($_SESSION['user_id'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="account-profile.php">My Profile</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="authentication-login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="authentication-register.php">Register</a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>