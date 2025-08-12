
<?php
session_start();
// Handle add to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = (int)$_POST['product_id'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    if ($product_id > 0) {
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = $quantity;
        }
        $_SESSION['cart_success'] = 'Item added to cart successfully!';
        header('Location: index.php');
        exit;
    }
}
include 'header.php';
?>

<!-- Add custom CSS for subscribe banner background -->
<link rel="stylesheet" href="assets/css/subscribe-banner.css">

  <!--page loader-->

  <!--end loader-->

  <!--end top header-->


  <!--start page content-->
  <div class="page-content">
    

    <!--start carousel-->
    <section class="slider-section">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active bg-primary">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">Burger + Fries Combo</h3>
                  <h1 class="h1 text-white fw-bold">Perfect Meal Deal</h1>
                  <p class="text-white fw-bold"><i>Vibrant flavors, perfect for any craving!</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="#">Order Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s1.jpg" class="img-fluid" alt="Burger + Khoai Tây" style="width:100vw; max-width:900px; height:420px; object-fit:cover; display:block; margin-left:auto; margin-right:0;">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-red">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">Burgers & Hotdogs Feast</h3>
                  <h1 class="h1 text-white fw-bold">More Food, More Fun</h1>
                  <p class="text-white fw-bold"><i>Gather your friends – Enjoy the feast!</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="#">See Combos</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s2.jpg" class="img-fluid" alt="Combo Nhiều Burger & Hotdog" style="width:100vw; max-width:900px; height:420px; object-fit:cover; display:block; margin-left:auto; margin-right:0;">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-purple">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">Pizza, Chicken & Sides</h3>
                  <h1 class="h1 text-white fw-bold">Family Party Set</h1>
                  <p class="text-white fw-bold"><i>All-in-one combo – Perfect for sharing!</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="#">Order for Family</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s3.jpg" class="img-fluid" alt="Pizza + Gà + Đồ ăn kèm" style="width:100vw; max-width:900px; height:420px; object-fit:cover; display:block; margin-left:auto; margin-right:0;">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-yellow">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-dark fw-bold">Sweet Donuts</h3>
                  <h1 class="h1 text-dark fw-bold">Treat Yourself</h1>
                  <p class="text-dark fw-bold"><i>Colorful, sweet, and irresistible!</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="#">See Sweet Deals</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s4.jpg" class="img-fluid" alt="Bánh Donut" style="width:100vw; max-width:900px; height:420px; object-fit:cover; display:block; margin-left:auto; margin-right:0;">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-green">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">Burger & Snack Special</h3>
                  <h1 class="h1 text-white fw-bold">Signature Combo</h1>
                  <p class="text-white fw-bold"><i>Seasonal highlight – Try our new combo!</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="#">Try Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s5.jpg" class="img-fluid" alt="Burger + Snack" style="width:100vw; max-width:900px; height:420px; object-fit:cover; display:block; margin-left:auto; margin-right:0;">
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <!--end carousel-->


    <!--start Featured Products slider-->
    <section class="section-padding">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 h3 fw-bold">Featured Dishes</h3>
          <p class="mb-0 text-capitalize">Discover our most popular and mouthwatering fast food picks</p>
        </div>
        <div class="product-thumbs">
          <?php
          require_once __DIR__ . '/config/database.php';
          $stmt = $pdo->query('SELECT * FROM products ORDER BY created_at DESC LIMIT 8');
          $products = $stmt->fetchAll();
          foreach ($products as $p):
          ?>
          <div class="card">
            <div class="position-relative overflow-hidden">
              <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                <a href="javascript:;"><i class="bi bi-heart"></i></a>
                <form method="post" class="d-inline">
                  <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                  <input type="hidden" name="quantity" value="1">
                  <button type="submit" name="add_to_cart" class="btn p-0 border-0 bg-transparent"><i class="bi bi-basket3"></i></button>
                </form>
              </div>
              <a href="product-details.php?id=<?= $p['id'] ?>">
                <?php if ($p['thumbnail']): ?>
                  <img src="assets/images/product-images/<?= htmlspecialchars($p['thumbnail']) ?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?>" style="object-fit:cover; height:220px; width:100%;">
                <?php else: ?>
                  <img src="assets/images/no-image.png" class="card-img-top" alt="No image" style="object-fit:cover; height:220px; width:100%;">
                <?php endif; ?>
              </a>
            </div>
            <div class="card-body">
              <div class="product-info text-center">
                <h6 class="mb-1 fw-bold product-name"><?= htmlspecialchars($p['name']) ?></h6>
                <div class="ratings mb-1 h6">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </div>
                <p class="mb-0 h6 fw-bold product-price">$<?= number_format($p['price'], 0, ',', '.') ?>.00</p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!--end Featured Products slider-->


    <!--start tabular product-->
    <section class="product-tab-section section-padding bg-light">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 h3 fw-bold">Latest Products</h3>
          <p class="mb-0 text-capitalize">Fresh from the kitchen – just added to our menu</p>
        </div>
        <div class="row">
          <div class="col-auto mx-auto">
            <div class="product-tab-menu table-responsive">
              <ul class="nav nav-pills flex-nowrap" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#new-arrival" type="button">NEW DISHES</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" data-bs-toggle="pill" data-bs-target="#best-sellar" type="button">BEST SELLERS</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" data-bs-toggle="pill" data-bs-target="#trending-product"
                    type="button">CUSTOMER FAVORITES</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" data-bs-toggle="pill" data-bs-target="#special-offer" type="button">COMBO DEALS</button>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <hr>
        <div class="tab-content tabular-product">
          <div class="tab-pane fade show active" id="new-arrival">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-4">
              <?php
              require_once __DIR__ . '/config/database.php';
              $stmt = $pdo->query('SELECT * FROM products ORDER BY created_at DESC LIMIT 20');
              $products = $stmt->fetchAll();
              $loopIndex = 0;
              foreach ($products as $p):
              ?>
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <form method="post" class="d-inline">
                        <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" name="add_to_cart" class="btn p-0 border-0 bg-transparent"><i class="bi bi-basket3"></i></button>
                      </form>
                    </div>
                    <a href="product-details.php?id=<?= $p['id'] ?>">
                      <?php if ($p['thumbnail']): ?>
                        <img src="assets/images/product-images/<?= htmlspecialchars($p['thumbnail']) ?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?>" style="object-fit:cover; height:200px; width:100%;">
                      <?php else: ?>
                        <img src="assets/images/no-image.png" class="card-img-top" alt="No image" style="object-fit:cover; height:200px; width:100%;">
                      <?php endif; ?>
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name" title="<?= htmlspecialchars($p['name']) ?>">
                        <?= mb_strimwidth(htmlspecialchars($p['name']), 0, 40, '...') ?>
                      </h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$<?= number_format($p['price'], 0, ',', '.') ?>.00</p>
                    </div>
                  </div>
                </div>
              </div>
              <?php $loopIndex++; endforeach; ?>
            </div>
          </div>
          <div class="tab-pane fade" id="best-sellar">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-4">
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                    </div>
                    <a href="product-details.php">
                      <img src="assets/images/Bestseller/BeefBurger.jpg" class="card-img-top" alt="Cheeseburger" style="height:220px; width:100%; object-fit:cover;">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name">Cheeseburger</h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$1.99</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                    </div>
                    <a href="product-details.php">
                      <img src="assets/images/Bestseller/Cheeseshakenchicken.jpg" class="card-img-top" alt="Crispy Fried Chicken" style="height:220px; width:100%; object-fit:cover;">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name">Crispy Fried Chicken</h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$1.49</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                    </div>
                    <a href="product-details.php">
                      <img src="assets/images/Bestseller/CheeseShakenFries.jpg" class="card-img-top" alt="French Fries" style="height:220px; width:100%; object-fit:cover;">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name">French Fries</h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$0.99</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="ribban bg-warning text-dark">Best seller</div>
                  <div class="position-relative overflow-hidden">
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                    </div>
                    <a href="product-details.php">
                      <img src="assets/images/Bestseller/FriedChickenRicemuch.jpg" class="card-img-top" alt="Teriyaki Chicken Rice" style="height:220px; width:100%; object-fit:cover;">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name">Teriyaki Chicken Rice</h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$2.49</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                    </div>
                    <a href="product-details.php">
                      <img src="assets/images/Bestseller/Pudding.jpg" class="card-img-top" alt="Caramel Flan" style="height:220px; width:100%; object-fit:cover;">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name">Caramel Flan</h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$1.29</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="trending-product">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-4">
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                    </div>
                    <a href="product-details.php">
                      <img src="assets/images/Customerfavoriter/BonelessChickenmuch.jpg" class="card-img-top" alt="Spicy Chicken Nuggets" style="height:220px; width:100%; object-fit:cover;">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name">Spicy Chicken Nuggets</h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$2.99</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                    </div>
                    <a href="product-details.php">
                      <img src="assets/images/Customerfavoriter/FishBurger.jpg" class="card-img-top" alt="Fish Burger" style="height:220px; width:100%; object-fit:cover;">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name">Fish Burger</h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$2.49</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div class="ribban">JUST ADDED</div>
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                    </div>
                    <a href="product-details.php">
                      <img src="assets/images/Customerfavoriter/Friedchicken.jpg" class="card-img-top" alt="Crispy Fried Drumstick" style="height:220px; width:100%; object-fit:cover;">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name">Crispy Fried Drumstick</h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$1.49</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                    </div>
                    <a href="product-details.php">
                      <img src="assets/images/Customerfavoriter/IceCream.jpg" class="card-img-top" alt="Vanilla Ice Cream Cone" style="height:220px; width:100%; object-fit:cover;">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name">Vanilla Ice Cream Cone</h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$0.99</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      <a href="javascript:;"><i class="bi bi-heart"></i></a>
                      <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                    </div>
                    <a href="product-details.php">
                      <img src="assets/images/Customerfavoriter/MozzarellaSticks.jpg" class="card-img-top" alt="Mozzarella Stick" style="height:220px; width:100%; object-fit:cover;">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name">Mozzarella Stick</h6>
                      <div class="ratings mb-1 h6">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">$0.89</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="special-offer">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-4">
              <div class="col">
                <div class="card">
                  <img src="assets/images/ComboDeals/combo1.jpg" class="card-img-top" alt="Combo Hotdog & Pepsi + Fries" style="height:220px; width:220px; object-fit:cover; display:block; margin:auto;">
                  <div class="card-body text-center">
                    <h6 class="mb-1 fw-bold product-name">Combo Hotdog & Pepsi + Fries</h6>
                    <div class="ratings mb-1 h6">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                    </div>
                    <p class="mb-0 h6 fw-bold product-price">$4.99</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <img src="assets/images/ComboDeals/combo2.jpg" class="card-img-top" alt="Pizza Combo (Pizza + Fries + Coke)" style="height:220px; width:220px; object-fit:cover; display:block; margin:auto;">
                  <div class="card-body text-center">
                    <h6 class="mb-1 fw-bold product-name">Pizza Combo (Pizza + Fries + Coke)</h6>
                    <div class="ratings mb-1 h6">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                    </div>
                    <p class="mb-0 h6 fw-bold product-price">$11.99</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="ribban">50% Discount</div>
                  <img src="assets/images/ComboDeals/combo3.jpg" class="card-img-top" alt="Burger Combo (Burger + Fries + Coke)" style="height:220px; width:220px; object-fit:cover; display:block; margin:auto;">
                  <div class="card-body text-center">
                    <h6 class="mb-1 fw-bold product-name">Burger Combo (Burger + Fries + Coke)</h6>
                    <div class="ratings mb-1 h6">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                    </div>
                    <p class="mb-0 h6 fw-bold product-price">$9.99</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <img src="assets/images/ComboDeals/combo4.jpg" class="card-img-top" alt="Fried Chicken Combo (Chicken + Fries + Pepsi)" style="height:220px; width:220px; object-fit:cover; display:block; margin:auto;">
                  <div class="card-body text-center">
                    <h6 class="mb-1 fw-bold product-name">Fried Chicken Combo (Chicken + Fries + Pepsi)</h6>
                    <div class="ratings mb-1 h6">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                    </div>
                    <p class="mb-0 h6 fw-bold product-price">$7.99</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <img src="assets/images/ComboDeals/combo5.jpg" class="card-img-top" alt="Burger + Fries + Drink" style="height:220px; width:220px; object-fit:cover; display:block; margin:auto;">
                  <div class="card-body text-center">
                    <h6 class="mb-1 fw-bold product-name">Burger + Fries + Drink</h6>
                    <div class="ratings mb-1 h6">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                    </div>
                    <p class="mb-0 h6 fw-bold product-price">$8.49</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--end tabular product-->


    <!--start features-->
    <section class="product-thumb-slider section-padding">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 h3 fw-bold">Why Choose Us?</h3>
          <p class="mb-0 text-capitalize">Bringing hot meals and happy moments to your table every day.</p>
        </div>
        <div class="row row-cols-1 row-cols-lg-4 g-4">
          <div class="col d-flex">
            <div class="card depth border-0 rounded-0 border-bottom border-primary border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-primary">
                  <i class="bi bi-truck"></i>
                </div>
                <h5 class="fw-bold">Fast & Free Delivery</h5>
                <p class="mb-0">Enjoy hot meals delivered to your door – fast and free!</p>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card depth border-0 rounded-0 border-bottom border-danger border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-danger">
                  <i class="bi bi-credit-card"></i>
                </div>
                <h5 class="fw-bold">Safe Online Payment</h5>
                <p class="mb-0">Pay securely with trusted methods – no worries, just food!</p>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card depth border-0 rounded-0 border-bottom border-success border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-success">
                  <i class="bi bi-cart"></i>
                </div>
                <h5 class="fw-bold">Freshness Guarantee</h5>
                <p class="mb-0">Not happy? We’ll make it right with fresh replacements.</p>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card depth border-0 rounded-0 border-bottom border-warning border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-warning">
                  <i class="bi bi-headset"></i>
                </div>
                <h5 class="fw-bold">24/7 Customer Care</h5>
                <p class="mb-0">We’re always here – from late-night snacks to early-morning meals.</p>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->
      </div>
    </section>
    <!--end features-->


    <!--start special product-->
    <section class="section-padding bg-section-2">
      <div class="container">
        <div class="card border-0 rounded-0 p-3 depth">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="assets/images/extra-images/Chickens.jpg" class="img-fluid rounded-0" alt="Crispy Chicken">
            </div>
            <div class="col-lg-6">
              <div class="card-body">
                <h3 class="fw-bold">What's Hot on the Menu!</h3>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item bg-transparent px-0">Our new boneless chicken is juicy, crispy, and loved by everyone!</li>
                  <li class="list-group-item bg-transparent px-0">Every meal is made fresh to order with top ingredients and passion.</li>
                  <li class="list-group-item bg-transparent px-0">From crispy fries to cheesy burgers – we’ve got all your cravings covered.</li>
                  <li class="list-group-item bg-transparent px-0">Order now and enjoy fast delivery straight to your door.</li>
                </ul>
                <div class="buttons mt-4 d-flex flex-column flex-lg-row gap-3">
                  <a href="javascript:;" class="btn btn-lg btn-dark btn-ecomm px-5 py-3">Buy Now</a>
                  <a href="javascript:;" class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3">See Menu</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--start special product-->


    <!--start Brands-->
    <section class="section-padding">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 h3 fw-bold">Shop by Brands</h3>
          <p class="mb-0 text-capitalize">Pick Your Favorite Food Brands & Order Now</p>
        </div>
        <div class="brands">
          <div class="row row-cols-2 row-cols-lg-5 g-4">
            <div class="col">
              <div class="p-3 border rounded brand-box">
                <div class="d-flex align-items-center">
                  <a href="javascript:;">
                    <img src="assets/images/brands/1.jpg" class="img-fluid brand-logo" alt="McDonald's" style="object-fit:contain; display:block; margin:auto; max-height:120px; max-width:100%;">
                  </a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="p-3 border rounded brand-box">
                <div class="d-flex align-items-center">
                  <a href="javascript:;">
                    <img src="assets/images/brands/2.jpg" class="img-fluid brand-logo" alt="KFC" style="object-fit:contain; display:block; margin:auto; max-height:120px; max-width:100%;">
                  </a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="p-3 border rounded brand-box">
                <div class="d-flex align-items-center">
                  <a href="javascript:;">
                    <img src="assets/images/brands/3.jpg" class="img-fluid brand-logo" alt="Taco Bell" style="object-fit:contain; display:block; margin:auto; max-height:120px; max-width:100%;">
                  </a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="p-3 border rounded brand-box">
                <div class="d-flex align-items-center">
                  <a href="javascript:;">
                    <img src="assets/images/brands/4.jpg" class="img-fluid brand-logo" alt="Pizza Hut" style="object-fit:contain; display:block; margin:auto; max-height:120px; max-width:100%;">
                  </a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="p-3 border rounded brand-box">
                <div class="d-flex align-items-center">
                  <a href="javascript:;">
                    <img src="assets/images/brands/5.jpg" class="img-fluid brand-logo" alt="CocaCola" style="object-fit:contain; display:block; margin:auto; max-height:120px; max-width:100%;">
                  </a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="p-3 border rounded brand-box">
                <div class="d-flex align-items-center">
                  <a href="javascript:;">
                    <img src="assets/images/brands/6.jpg" class="img-fluid brand-logo" alt="Pepsi" style="object-fit:contain; display:block; margin:auto; max-height:120px; max-width:100%;">
                  </a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="p-3 border rounded brand-box">
                <div class="d-flex align-items-center">
                  <a href="javascript:;">
                    <img src="assets/images/brands/7.jpg" class="img-fluid brand-logo" alt="Subway" style="object-fit:contain; display:block; margin:auto; max-height:120px; max-width:100%;">
                  </a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="p-3 border rounded brand-box">
                <div class="d-flex align-items-center">
                  <a href="javascript:;">
                    <img src="assets/images/brands/8.jpg" class="img-fluid brand-logo" alt="Dunkin' Donuts" style="object-fit:contain; display:block; margin:auto; max-height:120px; max-width:100%;">
                  </a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="p-3 border rounded brand-box">
                <div class="d-flex align-items-center">
                  <a href="javascript:;">
                    <img src="assets/images/brands/9.jpg" class="img-fluid brand-logo" alt="Burger King" style="object-fit:contain; display:block; margin:auto; max-height:120px; max-width:100%;">
                  </a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="p-3 border rounded brand-box">
                <div class="d-flex align-items-center">
                  <a href="javascript:;">
                    <img src="assets/images/brands/10.jpg" class="img-fluid brand-logo" alt="Starbucks" style="object-fit:contain; display:block; margin:auto; max-height:120px; max-width:100%;">
                  </a>
                </div>
              </div>
            </div>
           </div>
          </div>
          <!--end row-->
        </div>
      </div>
    </section>
    <!--end Brands-->


    <!--start cartegory slider-->
    <section class="cartegory-slider section-padding bg-section-2">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 h3 fw-bold">Top Categories</h3>
          <p class="mb-0 text-capitalize">Choose your favorite fast food items and order now</p>
        </div>
        <div class="cartegory-box">
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="assets/images/categories/Lemontea.jpg" class="card-img-top rounded-0" alt="Lemon Tea" style="height:180px; width:100%; object-fit:cover;">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Lemon Tea</h5>
                  <h6 class="mb-0 product-number fw-bold">150 Products</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="assets/images/categories/SmallPastries.jpg" class="card-img-top rounded-0" alt="Small Pastries" style="height:180px; width:100%; object-fit:cover;">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Small Pastries</h5>
                  <h6 class="mb-0 product-number fw-bold">120 Products</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="assets/images/categories/Spagheti.jpg" class="card-img-top rounded-0" alt="Spaghetti" style="height:180px; width:100%; object-fit:cover;">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Spaghetti</h5>
                  <h6 class="mb-0 product-number fw-bold">150 Products</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="assets/images/categories/Teriyakispicychickenrice.jpg" class="card-img-top rounded-0" alt="Teriyaki/Spicy Chicken Rice" style="height:180px; width:100%; object-fit:cover;">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Teriyaki/Spicy Chicken Rice</h5>
                  <h6 class="mb-0 product-number fw-bold">100 Products</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="assets/images/categories/WinterMelonTea.jpg" class="card-img-top rounded-0" alt="Winter Melon Tea" style="height:180px; width:100%; object-fit:cover;">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Winter Melon Tea</h5>
                  <h6 class="mb-0 product-number fw-bold">129 Products</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="assets/images/categories/Milktea.jpg" class="card-img-top rounded-0" alt="Milktea" style="height:180px; width:100%; object-fit:cover;">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Milktea</h5>
                  <h6 class="mb-0 product-number fw-bold">150 Products</h6>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
    </section>
    <!--end cartegory slider-->


    <!--subscribe banner-->
  <section class="product-thumb-slider subscribe-banner py-5" style="background: linear-gradient(120deg, #ff9800 0%, #c0392b 100%); border-radius:0; margin-left:calc(-1 * var(--bs-gutter-x, 0.75rem)); margin-right:calc(-1 * var(--bs-gutter-x, 0.75rem)); padding-left:0; padding-right:0;">
      <div class="row">
  <div class="col-12">
          <div class="text-center">
            <h3 class="mb-0 fw-bold text-white">Get the Hottest Fast Food Deals! <br> Subscribe now and never miss a combo</h3>
            <div class="mt-3 d-flex justify-content-center">
              <input type="text" class="form-control form-control-lg bubscribe-control rounded-0 w-100" style="max-width:900px; min-width:300px; background:rgba(255,255,255,0.10); color:#fff; border-color:rgba(255,255,255,0.3);" placeholder="Enter your email">
            </div>
            <div class="mt-3 d-flex justify-content-center">
              <button type="button" class="btn btn-lg btn-ecomm bubscribe-button w-100" style="max-width:900px; min-width:300px;">SUBSCRIBE</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--subscribe banner-->


    <!--start blog-->
    <section class="section-padding">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 fw-bold">Latest Blog</h3>
          <p class="mb-0 text-capitalize">Catch Up on the Hottest Food Trends & Tasty Tips</p>
        </div>
        <div class="blog-cards">
          <div class="row row-cols-1 row-cols-lg-3 g-4">
            <div class="col">
              <div class="card">
                <img src="assets/images/blog/Flan.jpg" class="card-img-top rounded-0" alt="Flan" style="height:240px; object-fit:cover; width:100%;">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-4">
                    <div class="posted-by">
                      <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                    </div>
                    <div class="posted-date">
                      <p class="mb-0"><i class="bi bi-calendar me-2"></i>15 Aug, 2025</p>
                    </div>
                  </div>
                  <h5 class="card-title fw-bold mt-3">Creamy Caramel Flan</h5>
                  <p class="mb-0">A silky-smooth dessert with rich caramel and egg custard, the perfect sweet ending to your fast-food meal.</p>
                  <a href="blog-read.html" class="btn btn-outline-dark btn-ecomm mt-3">Read More</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="assets/images/blog/FriedChickenRice.jpg" class="card-img-top rounded-0" alt="Fried Chicken Rice" style="height:240px; object-fit:cover; width:100%;">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-4">
                    <div class="posted-by">
                      <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                    </div>
                    <div class="posted-date">
                      <p class="mb-0"><i class="bi bi-calendar me-2"></i>15 Aug, 2025</p>
                    </div>
                  </div>
                  <h5 class="card-title fw-bold mt-3">Crispy Fried Chicken Rice</h5>
                  <p class="mb-0">Golden, crunchy fried chicken served with warm rice and veggies — quick, tasty, and filling.</p>
                  <a href="blog-read.html" class="btn btn-outline-dark btn-ecomm mt-3">Read More</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="assets/images/blog/MozzarellaSticksmuch.jpg" class="card-img-top rounded-0" alt="Mozzarella Sticks" style="height:240px; object-fit:cover; width:100%;">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-4">
                    <div class="posted-by">
                      <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                    </div>
                    <div class="posted-date">
                      <p class="mb-0"><i class="bi bi-calendar me-2"></i>15 Aug, 2025</p>
                    </div>
                  </div>
                  <h5 class="card-title fw-bold mt-3">Crispy Potato Sticks</h5>
                  <p class="mb-0">Perfectly golden and crunchy on the outside, soft and fluffy inside — an addictive fast-food snack.</p>
                  <a href="blog-read.html" class="btn btn-outline-dark btn-ecomm mt-3">Read More</a>
                </div>
              </div>
            </div>

          </div>
          <!--end row-->
        </div>
      </div>
    </section>
    <!--end blog-->


  </div>
  <!--end page content-->

<?php include 'footer.php'; ?>
<?php if (!empty($_SESSION['login_success'])): ?>
      <script>
        toastr.success('Login successful!');
      </script>   
      <?php unset($_SESSION['login_success']); ?>
<?php endif; ?>
<?php if (!empty($_SESSION['cart_success'])): ?>
      <script>
        toastr.success('<?= $_SESSION['cart_success'] ?>');
      </script>   
      <?php unset($_SESSION['cart_success']); ?>
<?php endif; ?>