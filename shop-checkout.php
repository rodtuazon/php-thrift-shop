<?php

session_start();

include("connections.php");

include("cart-number.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Cart | Thrift Shop</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href = "css/main.css">
</head>
<body>
    <!-- navbar -->
    <nav class = "navbar navbar-expand-lg navbar-light bg-info py-4 fixed-top">
        <div class = "container">
            <div class="navbar-brand d-flex justify-content-between align-items-center text-uppercase text-warning order-lg-0" href = "index.php">
                <h1>Thrift Shop</h1>
            </div>

            <div class = "order-lg-2 nav-btns">
                <button type = "button" class = "btn position-relative">
                    <a title = "Cart" href="shop-cart.php" class = "fa fa-shopping-cart"></a>
                    <span class = "position-absolute top-0 start-100 translate-middle badge bg-primary"><?php echo $row_count; ?></span>
                </button>
            </div>

            <button class = "navbar-toggler border-0" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navMenu">
                <span class = "navbar-toggler-icon"></span>
            </button>

            <div class = "collapse navbar-collapse order-lg-1" id = "navMenu">
                <ul class = "navbar-nav mx-auto text-center">
                    <li class = "nav-item px-2 py-2">
                        <a title = "Home" class = "nav-link text-uppercase text-white" href = "http://localhost/Thrift-Shop/#home">Home</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a title = "Collection" class = "nav-link text-uppercase text-white" href = "http://localhost/Thrift-Shop/#collection">Collection</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a title = "About us" class = "nav-link text-uppercase text-white" href = "http://localhost/Thrift-Shop/#about">About us</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a title = "Contact" class = "nav-link text-uppercase text-white" href = "http://localhost/Thrift-Shop/#contact">Contact</a>
                    </li>
                    <li class = "nav-item px-2 py-2 border-0">
                        <a title = "Instagram" class = "nav-link text-uppercase text-white" href = "http://localhost/Thrift-Shop/#instagram">Instagram</a>
                    </li>
                    <li class = "nav-item px-2 py-2 border-0">
                        <a title = "Admin" class = "nav-link text-uppercase text-white" href = "login.php">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <section class="py-5">
        <div class="container text-center" style = "padding-top: 104px">
            <div class="row mb-4 gy-3">
            <h1 class="mb-3 fw-bold">Billing address</h4>

                <form action="shop-functions.php" method="POST" class="needs-validation">

                <div class="display-order">
                    <?php

                        $query = "SELECT * FROM thrift_shop_cart";
                        $query_run = mysqli_query($connections, $query);

                        $total = 0;
                        $grand_total = 0;
                        
                        if(mysqli_num_rows($query_run) > 0){
                            while($fetch_cart = mysqli_fetch_assoc($query_run)){
                            $total_price = ($fetch_cart['product_price']);
                            $grand_total = $total += $total_price;

                    ?>

                    <span class="fw-bold"><?= $fetch_cart['product_name']; ?></span>
                    <span class="fw-bold"> - ₱ <?= $fetch_cart['product_price']; ?>.00</span>
                    <br>

                    <?php

                    }
                    }else
                    {
                        echo "<div class='display-order'><span>your cart is empty!</span></div>";
                    }

                    ?>
                    <br>
                    <span class="grand-total fw-bold"> Grand total: ₱ <?= $grand_total; ?>.00</span>
                    
                </div>

                    <div class="row g-3 mt-3 mb-3">
                        <div class="col-sm-6">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" placeholder="Enter your first name" name="first_name" required>
                        </div>

                        <div class="col-sm-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="Enter your last name" name="last_name" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                        <label class="form-label">Email</span></label>
                        <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
                        </div>

                        <div class="col-6">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" placeholder="E.g. 09696669969" name="phone_number" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                        <label class="form-label">Address Line 1</label>
                        <input type="text" class="form-control" placeholder="E.g. Blk 6 Lot 9 John Street" name="address_1" required>
                        </div>

                        <div class="col-6">
                        <label class="form-label">Address Line 2 (Optional)</span></label>
                        <input type="text" class="form-control" placeholder="Apartment or suite" name="address_2">
                        </div>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col">
                        <label class="form-label">Barangay</label>
                        <input tpye="text" class="form-control" placeholder="E.g. Halang" name="barangay" required>
                        </div>

                        <div class="col">
                        <label class="form-label">City</label>
                        <input tpye="text" class="form-control" placeholder="E.g. Calamba" name="city" required>
                        </div>

                        <div class="col">
                        <label class="form-label">Zip Code</label>
                        <input type="text" class="form-control" placeholder="E.g. 4027" name="zip_code" required>
                        </div>

                        <div class="col">
                        <label class="form-label">Province/State</label>
                        <input tpye="text" class="form-control" placeholder="E.g. Laguna" name="province_state" required>
                        </div>

                        <div class="col">
                        <label class="form-label">Country</label>
                        <input tpye="text" class="form-control" placeholder="E.g. Philippines" name="country" required>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Payment</h4>

                        <div class="row justify-content-center">
                            <div class="col-2">
                                <select class="form-select" name="payment">
                                    <option value="Cash on delivery" type="radio" selected>Cash on delivery</option>
                                    <option value="Gcash" type="radio">Gcash</option>
                                    <option value="Paypal" type="radio">Paypal</option>
                                </select>
                            </div>
                        </div>

                    <hr class="my-4">

                    <button class="btn btn-custom fw-bold" name="order_btn" type="submit">Continue to checkout</button>

                </form>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer">
    <!-- copyright -->
    <div class="text-center text-white mb-3 mb-3 md-0">Thrift Shop © 2022. All rights reserved.</div>
    <!-- end of copyright -->    
    </footer>
    <!-- end of footer -->

    <!-- jquery -->
    <script src = "js/jquery-3.6.0.js"></script>
    <!-- isotope -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap -->
    <script src = "bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom -->
    <script src = "js/script.js"></script>
</body>
</html>