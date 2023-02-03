<?php

session_start();

include("connections.php");

include("cart-number.php");

if(isset($_GET['remove_product']))
{
   $remove_id = $_GET['remove_product'];
   mysqli_query($connections, "DELETE FROM thrift_shop_cart WHERE id = '$remove_id'");
   header("Location: shop-cart.php");
}

if(isset($_GET['delete_all_products']))
{
   mysqli_query($connections, "DELETE FROM thrift_shop_cart");
   header("Location: shop-cart.php");
}

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

    <!-- shop cart -->
    <section class="py-5">    
        <div class="container" style = "padding-top: 104px">
            
            <div class="mb-4 gy-3">
            <h1 class="text-center fw-bold mb-4">Shopping Cart</h1> 
            
            <div class="card table-responsive px-0">
                
                <table class="table table-bordered table-striped">

                <thead>
                    <th style="text-align:center;">Product Image</th>
                    <th style="text-align:center;">Product Name</th>
                    <th style="text-align:center;">Product Price</th>
                    <th style="text-align:center;">Action</th>
                </thead>

                <tbody>

                    <?php 
                    
                    $query = "SELECT * FROM thrift_shop_cart";
                    $query_run = mysqli_query($connections, $query);

                    $grand_total = 0;

                    if(mysqli_num_rows($query_run) > 0){
                        while($fetch_cart = mysqli_fetch_assoc($query_run)){
                    ?>

                    <tr>
                        <td style="text-align:center;"><img src="images/<?php echo $fetch_cart['product_image']; ?>" height="100"></td>
                        <td style="text-align:center;"><?php echo $fetch_cart['product_name']; ?></td>
                        <td style="text-align:center;">₱ <?php echo $sub_total = ($fetch_cart['product_price']); ?>.00</td>
                        <td style="text-align:center;"><a href="shop-cart.php?remove_product=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Remove item from cart?')" class="btn btn-custom fw-bold"> <i class="fas fa-trash"></i> Remove</a></td>
                    </tr>
                    <?php
                        $grand_total += $sub_total;  
                        }
                    }
                    ?>
                    <tr class="table-bottom">
                        <td style="text-align:center;"><a href="shop-products.php" class="btn btn-custom fw-bold" style="margin-top: 0;">Continue Shopping</a></td>
                        <td style="text-align:center;" colspan="1" class="fw-bold">Grand total:</td>
                        <td style="text-align:center;">₱ <?php echo $grand_total; ?>.00</td>
                        <td style="text-align:center;"><a href="shop-cart.php?delete_all_products" onclick="return confirm('Are you sure you want to delete all?');" class="btn btn-custom fw-bold"> <i class="fas fa-trash"></i> Delete all </a>
                    </tr>
                </tbody>
                </table>
                    <div class="text-center">
                        <a href="shop-checkout.php" class="btn btn-custom fw-bold col-md-3 mb-2 <?= ($grand_total > 1)?'':'disabled'; ?>">Proceed to checkout</a>
                    </div>
            </div>
            </div>
        </div>
    </section>                    
    <!-- end of shop cart -->

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