<?php
include 'header.php';
require_once __DIR__ . '/config/database.php';

$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($product_id <= 0) {
    echo '<div class="container py-5"><div class="alert alert-danger">Invalid product ID.</div></div>';
    include 'footer.php';
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
$stmt->execute([$product_id]);
$product = $stmt->fetch();
if (!$product) {
    echo '<div class="container py-5"><div class="alert alert-danger">Invalid product ID.</div></div>';
    include 'footer.php';
    exit;
}
// Get additional images
$img_stmt = $pdo->prepare('SELECT image_url FROM product_images WHERE product_id = ?');
$img_stmt->execute([$product_id]);
$sub_images = $img_stmt->fetchAll();

// Function to handle image paths (if only the filename is given, prepend the directory)
function get_image_path($img) {
  if (!$img) return 'assets/images/no-image.png';
  if (strpos($img, '/') === false && strpos($img, '\\') === false) {
    return 'assets/images/product-images/' . $img;
  }
  return $img;
}
?>
<!--end top header-->


<!--start page content-->
<div class="page-content">


  <!--start breadcrumb-->
  <div class="py-4 border-bottom">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="categories.php?id=<?= $product['category_id'] ?>">Shop</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($product['name']) ?></li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->


  <!--start product details-->
  <section class="py-4">
    <div class="container">
      <div class="row g-4">
        <div class="col-12 col-xl-7">
          <div class="product-images">
              <div class="product-zoom-images">
                <div class="row g-3">
                  <!-- Avatar (always visible) -->
                  <div class="col">
                    <?php 
                      $main_img_path = 'assets/images/product-images/' . $product['thumbnail'];

                    ?>
                    <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="<?= htmlspecialchars($main_img_path) ?>">
                      <img src="<?= htmlspecialchars($main_img_path) ?>" class="img-fluid product-detail-thumb" style="width: 320px; height: 240px; object-fit: cover;" alt="<?= htmlspecialchars($product['name']) ?>" >
                    </div>
                  </div>
                  <!-- Show all sub-images (if any), not duplicated with main image -->
                  <?php 
                  if (!empty($sub_images)) :
                    foreach ($sub_images as $sub_img) :
                      $sub_img_path = 'assets/images/product-images/' . $sub_img['image_url'];
                  ?>
                  <div class="col">
                    <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="<?= htmlspecialchars($sub_img_path) ?>">
                      <img src="<?= htmlspecialchars($sub_img_path) ?>" class="img-fluid product-detail-thumb" style="width: 320px; height: 240px; object-fit: cover;" alt="Sub-image">
                    </div>
                  </div>
                  <?php endforeach; endif; ?>
                </div><!--end row-->
              </div>
          </div>
        </div>
        <div class="col-12 col-xl-5">
          <div class="product-info">
            <h4 class="product-title fw-bold mb-1"><?= htmlspecialchars($product['name']) ?></h4>
            <div class="product-price d-flex align-items-center gap-3">
              <div class="h4 fw-bold">$<?= number_format($product['price'], 2) ?></div>
            </div>
            <p class="fw-bold mb-0 mt-1 text-success">Available: <?= (int)$product['stock'] ?></p>
            <div class="cart-buttons mt-3">
              <div class="buttons d-flex flex-column flex-lg-row gap-3 mt-4">
                <a href="product-details.php?id=<?= $product['id'] ?>&add_to_cart=1" class="btn btn-lg btn-dark btn-ecomm px-5 py-3 col-lg-6"><i class="bi bi-basket2 me-2"></i>Add to Cart</a>
                <a href="javascript:;" class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3"><i class="bi bi-suit-heart me-2"></i>Add to Wishlist</a>
              </div>
            </div>
            <hr class="my-3">
            <div class="product-info">
              <h6 class="fw-bold mb-3">Product Description</h6>
              <p class="mb-1"><?= nl2br(htmlspecialchars($product['descriptions'])) ?></p>
            </div>
          </div>
        </div>
      </div><!--end row-->
    </div>
  </section>
  <!--end product details-->


  <!--start product details-->
  <section class="section-padding">
    <div class="container">
      <div class="separator pb-3">
        <div class="line"></div>
        <h3 class="mb-0 h3 fw-bold">Similar Products</h3>
        <div class="line"></div>
      </div>
      <div class="similar-products">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4">
          <div class="col">
            <a href="javascript:;">
              <div class="card rounded-0">
                <img src="assets/images/new-arrival/BonelessChicken.jpg" alt="Boneless Chicken" class="card-img-top rounded-0">
                <div class="card-body border-top">
                  <h5 class="mb-0 fw-bold product-short-title">Boneless Chicken</h5>
                    <p class="mb-0 product-short-name">Crispy, golden, and perfectly seasoned chicken fillet.</p>
                    <div class="product-price d-flex align-items-center gap-2 mt-2">
                      <div class="h6 fw-bold">$6.99</div>
                      <div class="h6 fw-light text-muted text-decoration-line-through">$9.99</div>
                      <div class="h6 fw-bold text-danger">(40% off)</div>
                    </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="javascript:;">
              <div class="card rounded-0">
                <img src="assets/images/new-arrival/Cheeseshakenchickenmuch.jpg" alt="Cheese Shaken Chicken Much" class="card-img-top rounded-0">
                <div class="card-body border-top">
                    <h5 class="mb-0 fw-bold product-short-title">Cheesy Chicken Bites</h5>
                    <p class="mb-0 product-short-name">Tender nuggets bursting with melted cheese.</p>
                    <div class="product-price d-flex align-items-center gap-2 mt-2">
                      <div class="h6 fw-bold">$5.49</div>
                      <div class="h6 fw-light text-muted text-decoration-line-through">$8.99</div>
                      <div class="h6 fw-bold text-danger">(45% off)</div>
                    </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="javascript:;">
              <div class="card rounded-0">
                <img src="assets/images/new-arrival/ChickenBurger.jpg" alt="Chicken Burger" class="card-img-top rounded-0">
                <div class="card-body border-top">
                  <h5 class="mb-0 fw-bold product-short-title">Chicken Burger</h5>
                    <p class="mb-0 product-short-name">Crunchy chicken patty with lettuce and sauce.</p>
                    <div class="product-price d-flex align-items-center gap-2 mt-2">
                      <div class="h6 fw-bold">$7.49</div>
                      <div class="h6 fw-light text-muted text-decoration-line-through">$10.99</div>
                      <div class="h6 fw-bold text-danger">(41% off)</div>
                    </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="javascript:;">
              <div class="card rounded-0">
                <img src="assets/images/new-arrival/FrenchFries.jpg" alt="French Fries" class="card-img-top rounded-0">
                <div class="card-body border-top">
                  <h5 class="mb-0 fw-bold product-short-title">French Fries</h5>
                    <p class="mb-0 product-short-name">Classic fries, golden and crispy.</p>
                    <div class="product-price d-flex align-items-center gap-2 mt-2">
                      <div class="h6 fw-bold">$3.49</div>
                      <div class="h6 fw-light text-muted text-decoration-line-through">$4.99</div>
                      <div class="h6 fw-bold text-danger">(40% off)</div>
                    </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="javascript:;">
              <div class="card rounded-0">
                <img src="assets/images/new-arrival/Peachtea.jpg" alt="Peach Tea" class="card-img-top rounded-0">
                <div class="card-body border-top">
                  <h5 class="mb-0 fw-bold product-short-title">Peach Tea</h5>
                    <p class="mb-0 product-short-name">Iced, refreshing, and fruity drink.</p>
                    <div class="product-price d-flex align-items-center gap-2 mt-2">
                      <div class="h6 fw-bold">$2.99</div>
                      <div class="h6 fw-light text-muted text-decoration-line-through">$3.99</div>
                      <div class="h6 fw-bold text-danger">(50% off)</div>
                    </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="javascript:;">
              <div class="card rounded-0">
                <img src="assets/images/new-arrival/Sausages.jpg" alt="Sausages" class="card-img-top rounded-0">
                <div class="card-body border-top">
                  <h5 class="mb-0 fw-bold product-short-title">Sausages</h5>
                    <p class="mb-0 product-short-name">Juicy and flavorful snack.</p>
                    <div class="product-price d-flex align-items-center gap-2 mt-2">
                      <div class="h6 fw-bold">$4.49</div>
                      <div class="h6 fw-light text-muted text-decoration-line-through">$5.99</div>
                      <div class="h6 fw-bold text-danger">(42% off)</div>
                    </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="javascript:;">
              <div class="card rounded-0">
                <img src="assets/images/new-arrival/SpaghettiwithMincedBeefCreamSauce.jpg" alt="Spaghetti with Minced Beef Cream Sauce" class="card-img-top rounded-0">
                <div class="card-body border-top">
                  <h5 class="mb-0 fw-bold product-short-title">Spaghetti with Minced Beef Cream Sauce</h5>
                    <p class="mb-0 product-short-name">Creamy and comforting pasta with rich beef sauce.</p>
                    <div class="product-price d-flex align-items-center gap-2 mt-2">
                      <div class="h6 fw-bold">$8.99</div>
                      <div class="h6 fw-light text-muted text-decoration-line-through">$13.99</div>
                      <div class="h6 fw-bold text-danger">(43% off)</div>
                    </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="javascript:;">
              <div class="card rounded-0">
                <img src="assets/images/new-arrival/Spicysweetsaucechicken.jpg" alt="Spicy Sweet Sauce Chicken" class="card-img-top rounded-0">
                <div class="card-body border-top">
                  <h5 class="mb-0 fw-bold product-short-title">Spicy Sweet Sauce Chicken</h5>
                    <p class="mb-0 product-short-name">Sticky, spicy, and sweet – pure flavor bomb!</p>
                    <div class="product-price d-flex align-items-center gap-2 mt-2">
                      <div class="h6 fw-bold">$6.49</div>
                      <div class="h6 fw-light text-muted text-decoration-line-through">$8.99</div>
                      <div class="h6 fw-bold text-danger">(39% off)</div>
                    </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="javascript:;">
              <div class="card rounded-0">
                <img src="assets/images/new-arrival/StirFriedCornmuch.jpg" alt="Stir Fried Corn Much" class="card-img-top rounded-0">
                <div class="card-body border-top">
                    <h5 class="mb-0 fw-bold product-short-title">Stir-Fried Corn</h5>
                    <p class="mb-0 product-short-name">Light, sweet corn sautéed to perfection.</p>
                    <div class="product-price d-flex align-items-center gap-2 mt-2">
                      <div class="h6 fw-bold">$2.49</div>
                      <div class="h6 fw-light text-muted text-decoration-line-through">$4.49</div>
                      <div class="h6 fw-bold text-danger">(45% off)</div>
                    </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="javascript:;">
              <div class="card rounded-0">
                <img src="assets/images/new-arrival/VegetarianBurger.jpg" alt="Vegetarian Burger" class="card-img-top rounded-0">
                <div class="card-body border-top">
                  <h5 class="mb-0 fw-bold product-short-title">Vegetarian Burger</h5>
                    <p class="mb-0 product-short-name">Delicious, plant-based option with fresh veggies.</p>
                    <div class="product-price d-flex align-items-center gap-2 mt-2">
                      <div class="h6 fw-bold">$5.99</div>
                      <div class="h6 fw-light text-muted text-decoration-line-through">$9.99</div>
                      <div class="h6 fw-bold text-danger">(40% off)</div>
                    </div>
                </div>
              </div>
            </a>
          </div>


        </div>
        <!--end row-->
      </div>
    </div>
  </section>
  <!--end product details-->


</div>
<!--end page content-->


<?php
// Handle adding to cart via GET request
if (isset($_GET['add_to_cart']) && $product_id > 0) {
    $quantity = 1;
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
    $_SESSION['cart_success'] = 'Product added to cart successfully!';
    header('Location: product-details.php?id=' . $product_id);
    exit;
}
?>
<?php include 'footer.php'; ?>
<?php if (!empty($_SESSION['cart_success'])): ?>
      <script>
        toastr.success('<?= $_SESSION['cart_success'] ?>');
      </script>   
      <?php unset($_SESSION['cart_success']); ?>
<?php endif; ?>