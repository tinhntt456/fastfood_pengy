<?php
session_start();
require_once __DIR__ . '/config/database.php';
// Delete product
if (isset($_POST['remove_id'])) {
    unset($_SESSION['cart'][(int)$_POST['remove_id']]);
    $_SESSION['cart_success'] = 'Product removed from cart successfully!';
    header('Location: cart.php');
    exit;
}
// Update quantity
if (isset($_POST['update_qty']) && is_array($_POST['qty'])) {
    foreach ($_POST['qty'] as $pid => $qty) {
        $pid = (int)$pid;
        $qty = max(1, (int)$qty);
        if (isset($_SESSION['cart'][$pid])) {
            $_SESSION['cart'][$pid] = $qty;
        }
    }
    $_SESSION['cart_success'] = 'Quantity updated successfully!';
    header('Location: cart.php');
    exit;
}
include 'header.php';
// Fetch products in cart
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$products = [];
$total = 0;
if ($cart) {
    $ids = implode(',', array_map('intval', array_keys($cart)));
    $stmt = $pdo->query("SELECT * FROM products WHERE id IN ($ids)");
    while ($row = $stmt->fetch()) {
        $row['cart_qty'] = $cart[$row['id']];
        $row['subtotal'] = $row['cart_qty'] * $row['price'];
        $products[] = $row;
        $total += $row['subtotal'];
    }
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
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->


  <!--start product details-->
  <section class="section-padding">
    <div class="container">

      <div class="d-flex align-items-center px-3 py-2 border mb-4">
        <div class="text-start">
          <h4 class="mb-0 h4 fw-bold">My Bag (<?= array_sum(array_column($products, 'cart_qty')) ?> items)</h4>
        </div>
        <div class="ms-auto">
          <a href="index.php" class="btn btn-light btn-ecomm">Continue Shopping</a>
        </div>
      </div>
      <div class="row g-4">
        <form method="post" class="d-flex flex-wrap">
          <div class="col-12 col-lg-8 mb-4 mb-lg-0">
            <?php if (empty($products)): ?>
              <div class="alert alert-info">Your cart is empty.</div>
            <?php else: ?>
              <?php 
              // Xử lý đặt hàng khi bấm Place Order
              // Bắt buộc đăng nhập khi mua hàng
              if (!isset($_SESSION['user_id'])) {
                echo '<div class="alert alert-danger">Bạn cần đăng nhập để đặt hàng.</div>';
              } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['place_order'])) {
                require_once 'config/database.php';
                $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
                $note = isset($_POST['note']) ? $_POST['note'] : '';
                $status = 0; // pending
                $order_code = 'OD' . time() . rand(100,999);
                $created_at = $updated_at = date('Y-m-d H:i:s');
                $subtotal = $total = $tax_fee = $total_price = 0;
                $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                // Tính toán tổng tiền
                foreach ($products as $item) {
                  $subtotal += $item['price'] * $item['cart_qty'];
                }
                $tax_fee = round($subtotal * 0.1, 2); // ví dụ thuế 10%
                $total = $subtotal + $tax_fee;
                $total_price = $total;
                // Lưu orders bằng PDO
                global $pdo;
                $sql = "INSERT INTO orders (user_id, order_code, note, status, subtotal, tax_fee, total, created_at, updated_at, total_price) VALUES (:user_id, :order_code, :note, :status, :subtotal, :tax_fee, :total, :created_at, :updated_at, :total_price)";
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute([
                  ':user_id' => $user_id,
                  ':order_code' => $order_code,
                  ':note' => $note,
                  ':status' => $status,
                  ':subtotal' => $subtotal,
                  ':tax_fee' => $tax_fee,
                  ':total' => $total,
                  ':created_at' => $created_at,
                  ':updated_at' => $updated_at,
                  ':total_price' => $total_price
                ]);
                if ($result) {
                  $order_id = $pdo->lastInsertId();
                  // Lưu order_details
                  $sql_detail = "INSERT INTO order_details (order_id, product_id, price, quantity, subtotal) VALUES (:order_id, :product_id, :price, :quantity, :subtotal)";
                  $stmt_detail = $pdo->prepare($sql_detail);
                  foreach ($products as $item) {
                    $item_subtotal = $item['price'] * $item['cart_qty'];
                    $stmt_detail->execute([
                      ':order_id' => $order_id,
                      ':product_id' => $item['id'],
                      ':price' => $item['price'],
                      ':quantity' => $item['cart_qty'],
                      ':subtotal' => $item_subtotal
                    ]);
                  }
                  unset($_SESSION['cart']);
                  echo '<script>window.location="order_confirmation.php?order_id=' . $order_id . '";</script>';
                  exit;
                } else {
                  echo '<div class="alert alert-danger">Đặt hàng thất bại. Vui lòng thử lại!</div>';
                }
              }
              ?>
              <?php foreach ($products as $item): ?>
              <div class="card rounded-0 mb-3">
                <div class="card-body">
                  <div class="d-flex flex-column flex-lg-row gap-3">
                    <div class="product-img">
                      <img src="assets/images/product-images/<?= htmlspecialchars($item['thumbnail']) ?>" width="150" alt="<?= htmlspecialchars($item['name']) ?>">
                    </div>
                    <div class="product-info flex-grow-1">
                      <h5 class="fw-bold mb-0"><?= htmlspecialchars($item['name']) ?></h5>
                      <div class="product-price d-flex align-items-center gap-2 mt-3">
                        <div class="h6 fw-bold">$<?= number_format($item['price'], 2) ?></div>
                        <div class="h6 fw-light text-muted">x</div>
                        <input type="number" name="qty[<?= $item['id'] ?>]" value="<?= $item['cart_qty'] ?>" min="1" style="width:60px;" class="form-control d-inline-block">
                        <div class="h6 fw-light text-muted">=</div>
                        <div class="h6 fw-bold text-success">$<?= number_format($item['subtotal'], 2) ?></div>
                      </div>
                    </div>
                    <div class="d-none d-lg-block vr"></div>
                    <div class="d-grid gap-2 align-self-start align-self-lg-center">
                      <button type="submit" name="remove_id" value="<?= $item['id'] ?>" class="btn btn-ecomm"><i class="bi bi-x-lg me-2"></i>Remove</button>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
              <div class="d-flex justify-content-end mb-3">
                <button type="submit" name="update_qty" class="btn btn-dark btn-ecomm">Update Quantity</button>
              </div>
            <?php endif; ?>
          </div>
          <div class="col-12 col-lg-4">
            <div class="card rounded-0 mb-3">
              <div class="card-body">
                <h5 class="fw-bold mb-4">Order Summary</h5>
                <div class="hstack align-items-center justify-content-between">
                  <p class="mb-0">Bag Total</p>
                  <p class="mb-0">$<?= number_format($total, 2) ?></p>
                </div>
                <hr>
                <div class="hstack align-items-center justify-content-between fw-bold text-content">
                  <p class="mb-0">Total Amount</p>
                  <p class="mb-0">$<?= number_format($total, 2) ?></p>
                </div>
                <div class="d-grid mt-4">
                  <button type="submit" name="place_order" class="btn btn-dark btn-ecomm py-3 px-5" <?= empty($products) ? 'disabled' : '' ?>>Place Order</button>
                </div>
              </div>
            </div>
            <div class="card rounded-0">
              <div class="card-body">
                <h5 class="fw-bold mb-4">Apply Coupon</h5>
                <div class="input-group">
                  <input type="text" class="form-control rounded-0" placeholder="Enter coupon code">
                  <button class="btn btn-dark btn-ecomm rounded-0" type="button">Apply</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div><!--end row-->

    </div>
  </section>
  <!--start product details-->




</div>
<!--end page content-->

<?php include 'footer.php'; ?>
</div>
</div>
<div class="offcanvas-footer p-3 border-top">
  <div class="d-grid">
  <a href="checkout.php" class="btn btn-lg btn-dark btn-ecomm px-5 py-3 <?= empty($products) ? 'disabled' : '' ?>">Checkout</a>
  </div>
</div>

</div>
<!--end cat-->


<!--start size modal-->
<div class="modal" id="SizeModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-0">
      <div class="modal-body">
        <div class="d-flex gap-3">
          <div class="product-img">
            <img src="assets/images/featured-products/01.webp" width="80" alt="">
          </div>
          <div class="product-info flex-grow-1">
            <h6 class="fw-bold mb-0">AKS - Checked Straight Kurta</h6>
            <div class="product-price d-flex align-items-center gap-2 mt-2">
              <div class="h6 fw-bold">$458</div>
              <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>
              <div class="h6 fw-bold text-danger">(70% off)</div>
            </div>
          </div>
          <div class="">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        </div>
        <hr>
        <div class="size-chart mt-4">
          <h5 class="fw-bold mb-4">Select Size</h5>
          <div class="d-flex align-items-center gap-3 flex-wrap">
            <div class="">
              <button type="button">XS</button>
            </div>
            <div class="">
              <button type="button">S</button>
            </div>
            <div class="">
              <button type="button">M</button>
            </div>
            <div class="">
              <button type="button">L</button>
            </div>
            <div class="">
              <button type="button">XL</button>
            </div>
            <div class="">
              <button type="button">XXL</button>
            </div>
            <div class="">
              <button type="button">3XL</button>
            </div>
            <div class="">
              <button type="button">4XL</button>
            </div>
            <div class="">
              <button type="button">5XL</button>
            </div>
            <div class="">
              <button type="button">6XL</button>
            </div>
            <div class="">
              <button type="button">7XL</button>
            </div>
            <div class="">
              <button type="button">8XL</button>
            </div>
          </div>
        </div>

        <div class="d-grid mt-4">
          <button type="button" class="btn btn-dark btn-ecomm">Done</button>
        </div>

      </div>
    </div>
  </div>
</div>
<!--end size modal-->


<!--start qty modal-->
<div class="modal" id="QtyModal" tabindex="-1">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content rounded-0">
      <div class="modal-body">
        <div class="d-flex align-items-center justify-content-between">
          <div class="">
            <h5 class="fw-bold mb-0">Select Quantity</h5>
          </div>
          <div class="">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        </div>
        <hr>
        <div class="size-chart">
          <div class="d-flex align-items-center gap-3 flex-wrap">
            <div class="">
              <button type="button">1</button>
            </div>
            <div class="">
              <button type="button">2</button>
            </div>
            <div class="">
              <button type="button">3</button>
            </div>
            <div class="">
              <button type="button">4</button>
            </div>
            <div class="">
              <button type="button">5</button>
            </div>
            <div class="">
              <button type="button">6</button>
            </div>
            <div class="">
              <button type="button">7</button>
            </div>
            <div class="">
              <button type="button">8</button>
            </div>
            <div class="">
              <button type="button">9</button>
            </div>
            <div class="">
              <button type="button">10</button>
            </div>
            <div class="">
              <button type="button">11</button>
            </div>
            <div class="">
              <button type="button">12</button>
            </div>
          </div>
        </div>

        <div class="d-grid mt-4">
          <button type="button" class="btn btn-dark btn-ecomm">Done</button>
        </div>

      </div>
    </div>
  </div>
</div>
<!--end qty modal-->



<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i class="bi bi-arrow-up"></i></a>
<!--End Back To Top Button-->


<!-- JavaScript files -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/slick/slick.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/loader.js"></script>


</body>

</html>