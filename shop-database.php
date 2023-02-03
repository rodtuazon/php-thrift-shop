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
    <title>Shop Database | Thrift Shop</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href ="bootstrap-5.0.2-dist/css/bootstrap.min.css">
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

    <!-- database -->
    <section class="mt-5 py-5">
        <div class="container mt-5 mb-4">
            
        <?php include('message.php'); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Shop Database
                                <a class="btn btn-custom fw-bold float-end" href="shop-create.php">Add Products</a>
                            </h4>
                        </div>
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th style="text-align:center;">Product ID</th>
                                    <th style="text-align:center;">Product Name</th>
                                    <th style="text-align:center;">Product Image</th>
                                    <th style="text-align:center;">Product Price</th>
                                    <th style="text-align:center;">Action</th>
                                </thead>
                                <tbody>

                                    <?php 

                                        $query = "SELECT * FROM thrift_shop_products";
                                        $query_run = mysqli_query($connections, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $id)
                                            {
                                                ?>
                                                <tr>
                                                    <td style="text-align:center;"><?= $id['id']; ?></td>
                                                    <td style="text-align:center;"><?= $id['product_name']; ?></td>
                                                    <td style="text-align:center;"><img src="images/<?= $id['product_image']; ?>" height="300" width="300"></td>
                                                    <td style="text-align:center;">₱ <?= $id['product_price']; ?>.00</td>
                                                    <td style="text-align:center;">
                                                        <form action="shop-update.php" method="POST" class="d-inline">
                                                            <input type="hidden" name="edit_id" value="<?= $id['id']; ?>"></input>
                                                            <button type="submit" name="edit_data_btn" class="btn btn-custom fw-bold btn-md">Edit</button>
                                                        </form>
                                                        <form action="shop-functions.php" method="POST" class="d-inline">
                                                            <button type="submit" name="delete_product" value="<?=$id['id'];?>" class="btn btn-custom fw-bold btn-md">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<h5> No Record Found </h5>";
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>                      
    </section>
    <!-- end of database -->

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