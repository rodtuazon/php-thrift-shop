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
    <title>Shop Products | Thrift Shop</title>
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

    <!-- shop products -->
    <section class="py-5">
        <div class="container" style = "padding-top: 104px">
            
            <div class="mb-4 gy-3">

                <?php include('message.php'); ?>

                <h1 class="text-center fw-bold">Available Products</h1>

                    <div class="row g-0">

                    <?php

                    $query = "SELECT * FROM thrift_shop_products";
                    $query_run = mysqli_query($connections, $query);
                    
                    if(mysqli_num_rows($query_run) > 0){
                        while($fetch_product = mysqli_fetch_assoc($query_run)){
                    ?>

                    <form action="shop-functions.php" method="POST" class="row gx-0 gy-3 mt-2 col-md-6 col-lg-4 col-xl-3 p-2">
                    
                            <div class ="collection-img position-relative">
                                <img src="images/<?php echo $fetch_product['product_image']; ?>" class="w-100">
                            </div>
                                <span class="mt-2 fw-bold"><?php echo $fetch_product['product_name']; ?></span>
                                <div class="price fw-bold">₱ <?php echo $fetch_product['product_price']; ?>.00</div>
                                <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_product['product_image']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_product['product_price']; ?>">
                                <div class="text-center">
                                <button type="submit" name="add_to_cart" class="btn btn-custom col-md-6 mt-2 text-warning fw-bold">Add to cart</button>
                                </div>              
                      
                    </form>

                    <?php
                        }
                    }
                    ?>

                    </div>

            </div>
        </div>           
    </section>
    <!-- end of shop products -->
    
    <!-- footer -->
    <footer>
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