
<style>
  .card-img-top {
    width: 100%;
    height: 180px;
    object-fit: cover;
  }
  .promo-banner {
    background: #ffe082;
    color: #b71c1c;
    padding: 18px 0 10px 0;
    text-align: center;
    font-size: 1.3rem;
    font-weight: bold;
    border-radius: 8px;
    margin-bottom: 18px;
    letter-spacing: 1px;
  }
</style>


<?php include 'header.php'; ?>

<!-- Fast Food Deals Banner -->
<div class="container">
  <div class="promo-banner">
    🎯 Fast Food Deals – Up to 70% Off! Enjoy your favorite fast food items at irresistible prices!
  </div>
</div>

<!--start page content-->
<div class="page-content">


   <!--start breadcrumb-->
   <div class="py-4 border-bottom">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0"> 
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:;">Menu</a></li>
          <li class="breadcrumb-item active" aria-current="page">Special Offers</li>
        </ol>
      </nav>
    </div>
   </div>
   <!--end breadcrumb-->


   <!--start product grid-->
   <section class="py-4">
    <h5 class="mb-0 fw-bold d-none">Product Grid</h5>
    <div class="container">
      <div class="btn btn-dark btn-ecomm d-xl-none position-fixed top-50 start-0 translate-middle-y"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarFilter"><span><i class="bi bi-funnel me-1"></i> Filters</span></div>
       <div class="row">
          <div class="col-12 col-xl-3 filter-column">
              <nav class="navbar navbar-expand-xl flex-wrap p-0">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarFilter" aria-labelledby="offcanvasNavbarFilterLabel">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title mb-0 fw-bold text-uppercase" id="offcanvasNavbarFilterLabel">Filters</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                    <div class="filter-sidebar">
                      <div class="card rounded-0">
                        <div class="card-header d-none d-xl-block bg-transparent">
                            <h5 class="mb-0 fw-bold">Filters</h5>
                        </div>
                        <div class="card-body">
                          <h6 class="p-1 fw-bold bg-light">🔍 Filters</h6>
                          <form>
                          <div class="categories mb-3">
                            <div class="fw-bold mb-2">🍔 Categories</div>
                            <div class="ms-2">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="catChicken">
                                <label class="form-check-label" for="catChicken">🍗 Chicken <span class="text-muted">(8)</span></label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="catBurgers">
                                <label class="form-check-label" for="catBurgers">🍔 Burgers <span class="text-muted">(2)</span></label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="catSides">
                                <label class="form-check-label" for="catSides">🍟 Sides <span class="text-muted">(3)</span></label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="catBeverages">
                                <label class="form-check-label" for="catBeverages">🥤 Beverages <span class="text-muted">(1)</span></label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="catNoodles">
                                <label class="form-check-label" for="catNoodles">🍝 Noodles & Rice <span class="text-muted">(1)</span></label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="catVegetarian">
                                <label class="form-check-label" for="catVegetarian">🥦 Vegetarian <span class="text-muted">(2)</span></label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="catDesserts" disabled>
                                <label class="form-check-label text-muted" for="catDesserts">🍰 Desserts (Coming Soon)</label>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="fw-bold">💰 Price</div>
                            <div class="ms-2">
                              <input type="number" class="form-control form-control-sm d-inline-block w-auto" min="1" max="50" value="1" style="width:60px;"> –
                              <input type="number" class="form-control form-control-sm d-inline-block w-auto" min="1" max="50" value="50" style="width:60px;">
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="fw-bold">🏷️ Discount Range</div>
                            <div class="ms-2">
                              <div class="form-check"><input class="form-check-input" type="radio" name="discount" id="disc10"><label class="form-check-label" for="disc10">10% and Above</label></div>
                              <div class="form-check"><input class="form-check-input" type="radio" name="discount" id="disc20"><label class="form-check-label" for="disc20">20% and Above</label></div>
                              <div class="form-check"><input class="form-check-input" type="radio" name="discount" id="disc30"><label class="form-check-label" for="disc30">30% and Above</label></div>
                              <div class="form-check"><input class="form-check-input" type="radio" name="discount" id="disc40"><label class="form-check-label" for="disc40">40% and Above</label></div>
                              <div class="form-check"><input class="form-check-input" type="radio" name="discount" id="disc50"><label class="form-check-label" for="disc50">50% and Above</label></div>
                              <div class="form-check"><input class="form-check-input" type="radio" name="discount" id="disc60"><label class="form-check-label" for="disc60">60% and Above</label></div>
                              <div class="form-check"><input class="form-check-input" type="radio" name="discount" id="disc70"><label class="form-check-label" for="disc70">70% and Above</label></div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="fw-bold">🌱 Nutrition</div>
                            <div class="ms-2">
                              <div class="form-check"><input class="form-check-input" type="radio" name="nutrition" id="nutVegetarian"><label class="form-check-label" for="nutVegetarian">Vegetarian <span class="text-muted">(e.g. Veggie Burger, Stir-Fried Corn)</span></label></div>
                              <div class="form-check"><input class="form-check-input" type="radio" name="nutrition" id="nutNonVegetarian"><label class="form-check-label" for="nutNonVegetarian">Non-Vegetarian <span class="text-muted">(e.g. Chicken items, Beef Spaghetti)</span></label></div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="fw-bold">🌶️ Sauce Type</div>
                            <div class="ms-2">
                              <div class="form-check"><input class="form-check-input" type="checkbox" id="sauceSpicy"><label class="form-check-label" for="sauceSpicy">Spicy</label></div>
                              <div class="form-check"><input class="form-check-input" type="checkbox" id="sauceSweet"><label class="form-check-label" for="sauceSweet">Sweet</label></div>
                              <div class="form-check"><input class="form-check-input" type="checkbox" id="sauceCheese"><label class="form-check-label" for="sauceCheese">Cheese</label></div>
                              <div class="form-check"><input class="form-check-input" type="checkbox" id="sauceCreamy"><label class="form-check-label" for="sauceCreamy">Creamy</label></div>
                              <div class="form-check"><input class="form-check-input" type="checkbox" id="sauceClassic"><label class="form-check-label" for="sauceClassic">Classic</label></div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="fw-bold">🎨 Flavor Profiles</div>
                            <div class="ms-2">
                              <div class="form-check"><input class="form-check-input" type="checkbox" id="flavorCrispy"><label class="form-check-label" for="flavorCrispy">Crispy <span class="text-muted">(e.g. Chicken Bites, Fries)</span></label></div>
                              <div class="form-check"><input class="form-check-input" type="checkbox" id="flavorJuicy"><label class="form-check-label" for="flavorJuicy">Juicy <span class="text-muted">(e.g. Sausages, Burgers)</span></label></div>
                              <div class="form-check"><input class="form-check-input" type="checkbox" id="flavorCreamy"><label class="form-check-label" for="flavorCreamy">Creamy <span class="text-muted">(e.g. Spaghetti, Tea)</span></label></div>
                              <div class="form-check"><input class="form-check-input" type="checkbox" id="flavorTangy"><label class="form-check-label" for="flavorTangy">Tangy <span class="text-muted">(e.g. Peach Tea, Sauced Chicken)</span></label></div>
                            </div>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </nav>
          </div>
          <div class="col-12 col-xl-9">
            <div class="shop-right-sidebar">
              <div class="card rounded-0">
                <div class="card-body p-2">
                  <div class="d-flex align-items-center justify-content-between bg-light p-3 rounded shadow-sm flex-wrap gap-2">
                    <div class="product-count fw-bold text-danger fs-5">
                      <i class="bi bi-collection"></i> 657 Items Found
                    </div>
                    <div class="view-type hstack gap-2 d-none d-xl-flex align-items-center">
                      <span class="fw-bold text-secondary">View:</span>
                      <button type="button" class="btn btn-outline-dark btn-sm px-2 py-1" title="3-column grid">
                        <i class="bi bi-grid-3x3-gap-fill"></i>
                      </button>
                      <button type="button" class="btn btn-dark btn-sm px-2 py-1 active" title="4-column grid">
                        <i class="bi bi-grid-fill"></i>
                      </button>
                    </div>
                    <form class="d-flex align-items-center">
                      <label for="sortBy" class="me-2 fw-bold text-secondary mb-0">Sort By</label>
                      <select id="sortBy" class="form-select form-select-sm rounded-2 shadow-none" style="min-width: 170px;">
                        <option selected>What's New</option>
                        <option value="1">Popularity</option>
                        <option value="2">Better Discount</option>
                        <option value="3">Price: High to Low</option>
                        <option value="4">Price: Low to High</option>
                        <option value="5">Custom Rating</option>
                      </select>
                    </form>
                  </div>
                </div>
              </div>

              <div class="product-grid mt-4">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                  <!-- Boneless Chicken -->
                  <div class="col">
                    <div class="card border shadow-none">
                      <div class="position-relative overflow-hidden">
                        <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                          <a href="javascript:;"><i class="bi bi-heart"></i></a>
                          <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                          <a href="javascript:;"><i class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="javascript:;">
                          <img src="assets/images/new-arrival/BonelessChicken.jpg" class="card-img-top" alt="Boneless Chicken">
                        </a>
                      </div>
                      <div class="card-body border-top">
                        <h5 class="mb-0 fw-bold product-short-title">Boneless Chicken</h5>
                        <p class="mb-0 product-short-name">Crispy, golden, and perfectly seasoned chicken fillet.</p>
                        <div class="product-price d-flex align-items-center gap-2 mt-2">
                          <div class="h6 fw-bold">$6.99</div>
                          <div class="h6 fw-light text-muted text-decoration-line-through">$9.99</div>
                          <div class="h6 fw-bold text-danger">(40% off)</div>
                        </div>
                        <span class="badge bg-warning text-dark mt-2">Chicken</span>
                      </div>
                    </div>
                  </div>
                  <!-- Cheesy Chicken Bites -->
                  <div class="col">
                    <div class="card border shadow-none">
                      <div class="position-relative overflow-hidden">
                        <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                          <a href="javascript:;"><i class="bi bi-heart"></i></a>
                          <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                          <a href="javascript:;"><i class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="javascript:;">
                          <img src="assets/images/new-arrival/Cheeseshakenchickenmuch.jpg" class="card-img-top" alt="Cheesy Chicken Bites">
                        </a>
                      </div>
                      <div class="card-body border-top">
                        <h5 class="mb-0 fw-bold product-short-title">Cheesy Chicken Bites</h5>
                        <p class="mb-0 product-short-name">Tender nuggets bursting with melted cheese.</p>
                        <div class="product-price d-flex align-items-center gap-2 mt-2">
                          <div class="h6 fw-bold">$5.49</div>
                          <div class="h6 fw-light text-muted text-decoration-line-through">$8.99</div>
                          <div class="h6 fw-bold text-danger">(45% off)</div>
                        </div>
                        <span class="badge bg-warning text-dark mt-2">Chicken</span>
                      </div>
                    </div>
                  </div>
                  <!-- Chicken Burger -->
                  <div class="col">
                    <div class="card border shadow-none">
                      <div class="position-relative overflow-hidden">
                        <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                          <a href="javascript:;"><i class="bi bi-heart"></i></a>
                          <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                          <a href="javascript:;"><i class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="javascript:;">
                          <img src="assets/images/new-arrival/ChickenBurger.jpg" class="card-img-top" alt="Chicken Burger">
                        </a>
                      </div>
                      <div class="card-body border-top">
                        <h5 class="mb-0 fw-bold product-short-title">Chicken Burger</h5>
                        <p class="mb-0 product-short-name">Crunchy chicken patty with lettuce and sauce.</p>
                        <div class="product-price d-flex align-items-center gap-2 mt-2">
                          <div class="h6 fw-bold">$7.49</div>
                          <div class="h6 fw-light text-muted text-decoration-line-through">$10.99</div>
                          <div class="h6 fw-bold text-danger">(41% off)</div>
                        </div>
                        <span class="badge bg-warning text-dark mt-2">Burgers</span>
                      </div>
                    </div>
                  </div>
                  <!-- French Fries -->
                  <div class="col">
                    <div class="card border shadow-none">
                      <div class="position-relative overflow-hidden">
                        <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                          <a href="javascript:;"><i class="bi bi-heart"></i></a>
                          <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                          <a href="javascript:;"><i class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="javascript:;">
                          <img src="assets/images/new-arrival/FrenchFries.jpg" class="card-img-top" alt="French Fries">
                        </a>
                      </div>
                      <div class="card-body border-top">
                        <h5 class="mb-0 fw-bold product-short-title">French Fries</h5>
                        <p class="mb-0 product-short-name">Classic fries, golden and crispy.</p>
                        <div class="product-price d-flex align-items-center gap-2 mt-2">
                          <div class="h6 fw-bold">$3.49</div>
                          <div class="h6 fw-light text-muted text-decoration-line-through">$4.99</div>
                          <div class="h6 fw-bold text-danger">(40% off)</div>
                        </div>
                        <span class="badge bg-info text-dark mt-2">Sides</span>
                      </div>
                    </div>
                  </div>
                  <!-- Peach Tea -->
                  <div class="col">
                    <div class="card border shadow-none">
                      <div class="position-relative overflow-hidden">
                        <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                          <a href="javascript:;"><i class="bi bi-heart"></i></a>
                          <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                          <a href="javascript:;"><i class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="javascript:;">
                          <img src="assets/images/new-arrival/Peachtea.jpg" class="card-img-top" alt="Peach Tea">
                        </a>
                      </div>
                      <div class="card-body border-top">
                        <h5 class="mb-0 fw-bold product-short-title">Peach Tea</h5>
                        <p class="mb-0 product-short-name">Iced, refreshing, and fruity drink.</p>
                        <div class="product-price d-flex align-items-center gap-2 mt-2">
                          <div class="h6 fw-bold">$2.99</div>
                          <div class="h6 fw-light text-muted text-decoration-line-through">$3.99</div>
                          <div class="h6 fw-bold text-danger">(50% off)</div>
                        </div>
                        <span class="badge bg-primary text-light mt-2">Beverages</span>
                      </div>
                    </div>
                  </div>
                  <!-- Sausages -->
                  <div class="col">
                    <div class="card border shadow-none">
                      <div class="position-relative overflow-hidden">
                        <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                          <a href="javascript:;"><i class="bi bi-heart"></i></a>
                          <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                          <a href="javascript:;"><i class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="javascript:;">
                          <img src="assets/images/new-arrival/Sausages.jpg" class="card-img-top" alt="Sausages">
                        </a>
                      </div>
                      <div class="card-body border-top">
                        <h5 class="mb-0 fw-bold product-short-title">Sausages</h5>
                        <p class="mb-0 product-short-name">Juicy and flavorful snack.</p>
                        <div class="product-price d-flex align-items-center gap-2 mt-2">
                          <div class="h6 fw-bold">$4.49</div>
                          <div class="h6 fw-light text-muted text-decoration-line-through">$5.99</div>
                          <div class="h6 fw-bold text-danger">(42% off)</div>
                        </div>
                        <span class="badge bg-info text-dark mt-2">Sides</span>
                      </div>
                    </div>
                  </div>
                  <!-- Spaghetti with Minced Beef Cream Sauce -->
                  <div class="col">
                    <div class="card border shadow-none">
                      <div class="position-relative overflow-hidden">
                        <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                          <a href="javascript:;"><i class="bi bi-heart"></i></a>
                          <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                          <a href="javascript:;"><i class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="javascript:;">
                          <img src="assets/images/new-arrival/SpaghettiwithMincedBeefCreamSauce.jpg" class="card-img-top" alt="Spaghetti with Minced Beef Cream Sauce">
                        </a>
                      </div>
                      <div class="card-body border-top">
                        <h5 class="mb-0 fw-bold product-short-title">Spaghetti with Minced Beef Cream Sauce</h5>
                        <p class="mb-0 product-short-name">Creamy and comforting pasta with rich beef sauce.</p>
                        <div class="product-price d-flex align-items-center gap-2 mt-2">
                          <div class="h6 fw-bold">$8.99</div>
                          <div class="h6 fw-light text-muted text-decoration-line-through">$13.99</div>
                          <div class="h6 fw-bold text-danger">(43% off)</div>
                        </div>
                        <span class="badge bg-success text-light mt-2">Noodles & Rice</span>
                      </div>
                    </div>
                  </div>
                  <!-- Spicy Sweet Sauce Chicken -->
                  <div class="col">
                    <div class="card border shadow-none">
                      <div class="position-relative overflow-hidden">
                        <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                          <a href="javascript:;"><i class="bi bi-heart"></i></a>
                          <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                          <a href="javascript:;"><i class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="javascript:;">
                          <img src="assets/images/new-arrival/Spicysweetsaucechicken.jpg" class="card-img-top" alt="Spicy Sweet Sauce Chicken">
                        </a>
                      </div>
                      <div class="card-body border-top">
                        <h5 class="mb-0 fw-bold product-short-title">Spicy Sweet Sauce Chicken</h5>
                        <p class="mb-0 product-short-name">Sticky, spicy, and sweet – pure flavor bomb!</p>
                        <div class="product-price d-flex align-items-center gap-2 mt-2">
                          <div class="h6 fw-bold">$6.49</div>
                          <div class="h6 fw-light text-muted text-decoration-line-through">$8.99</div>
                          <div class="h6 fw-bold text-danger">(39% off)</div>
                        </div>
                        <span class="badge bg-warning text-dark mt-2">Chicken</span>
                      </div>
                    </div>
                  </div>
                  <!-- Stir-Fried Corn -->
                  <div class="col">
                    <div class="card border shadow-none">
                      <div class="position-relative overflow-hidden">
                        <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                          <a href="javascript:;"><i class="bi bi-heart"></i></a>
                          <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                          <a href="javascript:;"><i class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="javascript:;">
                          <img src="assets/images/new-arrival/StirFriedCornmuch.jpg" class="card-img-top" alt="Stir-Fried Corn">
                        </a>
                      </div>
                      <div class="card-body border-top">
                        <h5 class="mb-0 fw-bold product-short-title">Stir-Fried Corn</h5>
                        <p class="mb-0 product-short-name">Light, sweet corn sautéed to perfection.</p>
                        <div class="product-price d-flex align-items-center gap-2 mt-2">
                          <div class="h6 fw-bold">$2.49</div>
                          <div class="h6 fw-light text-muted text-decoration-line-through">$4.49</div>
                          <div class="h6 fw-bold text-danger">(45% off)</div>
                        </div>
                        <span class="badge bg-info text-dark mt-2">Sides</span>
                      </div>
                    </div>
                  </div>
                  <!-- Vegetarian Burger -->
                  <div class="col">
                    <div class="card border shadow-none">
                      <div class="position-relative overflow-hidden">
                        <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                          <a href="javascript:;"><i class="bi bi-heart"></i></a>
                          <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                          <a href="javascript:;"><i class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="javascript:;">
                          <img src="assets/images/new-arrival/VegetarianBurger.jpg" class="card-img-top" alt="Vegetarian Burger">
                        </a>
                      </div>
                      <div class="card-body border-top">
                        <h5 class="mb-0 fw-bold product-short-title">Vegetarian Burger</h5>
                        <p class="mb-0 product-short-name">Delicious, plant-based option with fresh veggies.</p>
                        <div class="product-price d-flex align-items-center gap-2 mt-2">
                          <div class="h6 fw-bold">$5.99</div>
                          <div class="h6 fw-light text-muted text-decoration-line-through">$9.99</div>
                          <div class="h6 fw-bold text-danger">(40% off)</div>
                        </div>
                        <span class="badge bg-success text-light mt-2">Vegetarian</span>
                      </div>
                    </div>
                  </div>


              </div><!--end row-->
            </div>

            </div>
          </div>
       </div><!--end row-->
    </div>
  </section>
   <!--start product details-->


  
  
 </div>
  <!--end page content-->
<?php include 'footer.php'; ?>