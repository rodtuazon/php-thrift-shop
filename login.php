<?php

session_start();

include("connections.php");

include("cart-number.php");

date_default_timezone_set ("Asia/Manila");
$date_now = date("m/d/Y");
$time_now = date("h:i a");
$notify = $attempt = $log_time = "";

$end_time = date("h:i A", strtotime("+15 minutes", strtotime($time_now)));

$email = $password = "";
$emailErr = $passwordErr = "";

if(isset($_POST["btn_login"])) {

    if(empty($_POST["email"])) {

        $emailErr = "Email is required!";
    
    }else{

        $email = $_POST["email"];

    }

    if(empty($_POST["password"])) {

        $passwordErr = "Password is required!";
    
    }else{

        $password = $_POST["password"];

    }

    if($email AND $password) {

        $check_email = mysqli_query($connections, "SELECT * FROM thrift_shop_admin WHERE email='$email'");
        $check_row = mysqli_num_rows($check_email);

        if($check_row > 0) {

            $fetch = mysqli_fetch_assoc($check_email);
            $db_password = $fetch["password"];
            $db_attempt = $fetch["attempt"];
            $db_log_time = strtotime($fetch["log_time"]);
            $my_log_time = $fetch["log_time"];
            $new_time = strtotime($time_now);

            if($db_log_time <= $new_time) {
                
                if($db_password == $password) {

                    $_SESSION["email"] = $email;

                    mysqli_query($connections, "UPDATE thrift_shop_admin SET attempt='', log_time='' WHERE email='$email'");

                    echo "<script>window.location.href='shop-database.php';</script>";

                }else{

                    $attempt = $db_attempt + 1;

                    if($attempt >= 3) {

                        $attempt = 3;
                            
                        mysqli_query($connections, "UPDATE thrift_shop_admin SET attempt='$attempt', log_time='$end_time' WHERE email='$email'");
                        $notify = "You already reach the three (3) times attempt to login. Please Login after 15 minutes: <b>$end_time</b>";

                    }else{

                        mysqli_query($connections, "UPDATE thrift_shop_admin SET attempt='$attempt' WHERE email='$email'");

                        $passwordErr = "Hi Admin! Your Password is incorrect!";

                        $notify = "Login Attempt: <b>$attempt</b>";

                    }

                }

            }else{

                $notify = "I'm sorry, You have to wait until: <b>$my_log_time</b> before login";
            
            }

        }else{

            $emailErr = "Email is not registered!";

        }
    }
}

?>

<style>
    .error{
        color:red;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Thrift Shop</title>
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

    <!-- login -->
    <section class="">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center vh-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="images/about-us-thrift-shop.jpg"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-3 text-white text-center">Admin Login</h3>
                
                <form method="POST" class="mb-0">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label text-white" for="form3Example3">Email address</label>
                    <input type="email" class="form-control form-control-lg" name="email" placeholder="Enter email address" value="<?php echo $email; ?>"/>
                    <span class="error"><?php echo $emailErr; ?></span>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label text-white" for="form3Example4">Password</label>
                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Enter password" value=""/>
                    <span class="error"><?php echo $passwordErr; ?></span>
                </div>

                <div class="text-lg-start mt-0 pt-0 text-center">
                    <span class="error"><?php echo $notify; ?></span>
                    <br>
                    <input class="btn-custom btn btn-primary btn-lg text-warning fw-bold" type="submit" value="Login" name="btn_login"/>
                </div>
                </form>
                </div>
            </div>
        </div>

        <!-- copyright -->
        <div class="text-center text-white mt-4 md-0">Thrift Shop © 2022. All rights reserved.</div>
        <!-- end of copyright -->
    
    </section>
    <!-- end of login -->   

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