<?php

session_start();

include("connections.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product | Thrift Shop</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/main.css">
</head>
<body>
    <!-- navbar -->
    <nav class = "navbar navbar-expand-lg navbar-light bg-info py-4 fixed-top">
        <div class = "container">
            <div class="navbar-brand d-flex justify-content-between align-items-center text-uppercase text-warning order-lg-0" href = "index.php">
                <h1>Thrift Shop</h1>
            </div>

            <div class = "order-lg-2 nav-btns">
                <a title = "Logout" class = "nav-logout nav-link text-uppercase text-white" href = "logout.php">Logout</a>
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
    
    <!-- update product -->
    <section class="vh-100">
        <div class="container h-custom">

            <?php include('message.php'); ?>

            <div class="row">
                <div class="">
                    <div class="card col-md-9 position-absolute top-50 start-50 translate-middle">
                        <div class="card-header">
                            <h4>Update Product 
                                <a href="shop-database.php" class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                        
                        <?php
                        if(isset($_POST['edit_data_btn']))
                        {
                            $id = $_POST['edit_id'];

                            $query = "SELECT * FROM thrift_shop_products WHERE id='$id' ";
                            $query_run = mysqli_query($connections, $query);

                            foreach($query_run as $row)
                            {
                        ?>

                            <form action="shop-functions.php" method="POST" enctype="multipart/form-data">
                                
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">    

                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="edit_product_name" value="<?php echo $row['product_name']?>" class="form-control" placeholder="Enter product name">
                                </div>
                                <div class="mb-3">
                                    <label>Product Image</label>
                                    <input type="file" name="product_image" value="<?php echo $row['product_image']?>" id="product_image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Product Price</label>
                                    <input type="text" name="edit_product_price" value="<?php echo $row['product_price']?>" class="form-control" placeholder="Enter product price">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_product" class="btn btn-primary">Update Product</button>
                                </div>

                            </form>

                        <?php
                            }
                        }

                        ?>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <!-- copyright -->
        <div class="text-center text-white mt-4 mb-0 md-0">Thrift Shop © 2022. All rights reserved.</div>
        <!-- end of copyright -->

    </section>
    <!-- end of update product -->
    
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