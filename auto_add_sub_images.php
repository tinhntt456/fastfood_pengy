<?php
// Script to automatically assign thumbnail images to all products
require_once __DIR__ . '/config/database.php';

// Fetch product list
$products = $pdo->query('SELECT id, image FROM products')->fetchAll();

// Fetch thumbnail files (thumb_*.jpg, thumb_*.webp, ...)
$thumb_dir = __DIR__ . '/assets/images/product-images/';
$thumb_files = glob($thumb_dir . 'thumb_*.*');
if (!$thumb_files) {
    die('No thumbnail images found in the product-images directory!');
}

// Get file names (without path)
$thumb_names = array_map('basename', $thumb_files);

// Count existing thumbnails in DB
$exist = $pdo->query('SELECT product_id, image_url FROM product_images')->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_COLUMN);

$count = 0;
foreach ($products as $i => $product) {
    $pid = $product['id'];
    // If already has a sub-image, skip
    if (!empty($exist[$pid])) continue;
    // Assign thumbnail in order, if exhausted, loop back to start
    $thumb = $thumb_names[$i % count($thumb_names)];
    $stmt = $pdo->prepare('INSERT INTO product_images (product_id, image_url) VALUES (?, ?)');
    $stmt->execute([$pid, $thumb]);
    $count++;
}
echo "Assigned thumbnails to $count products without sub-images.";
