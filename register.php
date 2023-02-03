<?php

include("connections.php");

$first_name = $last_name = $birthday = $gender = $email = $phone_number = "";

$first_nameErr = $last_nameErr = $birthdayErr = $genderErr = $emailErr = $phone_numberErr = "";

if (isset($_POST["btn_register"])) {

    if(empty($_POST["first_name"])) {

        $first_nameErr = "Required!";

    }else{

        $first_name = $_POST["first_name"];

    }

    if(empty($_POST["last_name"])) {

        $last_nameErr = "Required!";

    }else{

        $last_name = $_POST["last_name"];

    }

    if(empty($_POST["birthday"])) {

        $birthdayErr = "Required!";

    }else{

        $birthday = $_POST["birthday"];

    }

    if(empty($_POST["gender"])) {

        $genderErr = "Required!";

    }else{

        $gender = $_POST["gender"];

    }

    if(empty($_POST["email"])) {

        $emailErr = "Required!";

    }else{

        $email = $_POST["email"];

    }

    if(empty($_POST["phone_number"])) {

        $phone_numberErr = "Required!";

    }else{

        $phone_number = $_POST["phone_number"];

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
    <title>Register | Thrift Shop</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/main.css">
</head>
<body>
 <!-- navbar -->
 <nav class = "navbar navbar-expand-lg navbar-light bg-info py-4 fixed-top">
        <div class = "container">
            <div class="navbar-brand d-flex justify-content-between align-items-center text-warning order-lg-0" href = "index.php">
                <h1>Thrift Shop</h1>
            </div>

            <div class = "order-lg-2 nav-btns">
                <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-shopping-cart"></i>
                    <span class = "position-absolute top-0 start-100 translate-middle badge bg-primary">0</span>
                </button>
                <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-heart"></i>
                    <span class = "position-absolute top-0 start-100 translate-middle badge bg-primary">0</span>
                </button>
                <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-search"></i>
                </button>
            </div>

            <button class = "navbar-toggler border-0" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navMenu">
                <span class = "navbar-toggler-icon"></span>
            </button>

            <div class = "collapse navbar-collapse order-lg-1" id = "navMenu">
                <ul class = "navbar-nav mx-auto text-center">
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-white" href = "http://localhost/Thrift-Shop/#home">Home</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-white" href = "http://localhost/Thrift-Shop/#collection">Collection</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-white" href = "http://localhost/Thrift-Shop/#about">About us</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-white" href = "http://localhost/Thrift-Shop/#contact">Contact</a>
                    </li>
                    <li class = "nav-item px-2 py-2 border-0">
                        <a class = "nav-link text-uppercase text-white" href = "http://localhost/Thrift-Shop/#instagram">Instagram</a>
                    </li>
                    <li class = "nav-item px-2 py-2 border-0">
                        <a class = "nav-link text-uppercase text-white" href = "login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- end of navbar -->
    <!-- register -->
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card shadow-2-strong card-registration bg-primary text-white" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration</h3>
                                
                                <form method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="lastName">First Name</label>
                                            <input type="text" name="first_name" placeholder="First Name" id="firstName" class="form-control form-control-lg" value="<?php echo $first_name; ?>"/>
                                            <span class="error"><?php echo $first_nameErr; ?></span>
                                        </div>
                                    
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="lastName">Last Name</label>
                                            <input type="text" name="last_name" placeholder="Last Name" id="lastName" class="form-control form-control-lg" value="<?php echo $last_name; ?>"/>
                                            <span class="error"><?php echo $first_nameErr; ?></span>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                    <div class="form-outline datepicker w-100">
                                        <label for="birthdayDate" class="form-label">Birthday (Ex. May 6, 1999)</label>
                                        <input type="text" name="birthday" placeholder="Birthday" id="birthdayDate" class="form-control form-control-lg" value="<?php echo $birthday; ?>"/>
                                        <span class="error"><?php echo $birthdayErr; ?></span>
                                    </div>

                                    </div>
                                    <div class="col-md-6 mb-2">

                                        <h6 class="mb-2 pb-1">Gender: </h6>

                                        <select name="gender" class="form-select form-select-lg mb-0" aria-label=".form-select-lg example">
                                            
                                            <option name="gender" value="">Select Gender</option>
                                            <option name="gender" value="Male" <?php if($gender == "Male") { echo "selected"; } ?> >Male</option>
                                            <option name="gender" value="Female" <?php if($gender == "Female") { echo "selected"; } ?> >Female</option>
                                            <option name="gender" value="Other" <?php if($gender == "Other") { echo "selected"; } ?> >Other</option>
                                            
                                        </select>
                                        
                                        <span class="error"><?php echo $genderErr; ?> </span>
                                    
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="emailAddress">Email</label>
                                            <input type="email" name="email" placeholder="Email" id="emailAddress" class="form-control form-control-lg" value="<?php echo $email; ?>"/>
                                            <span class="error"><?php echo $emailErr; ?> </span>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="phoneNumber">Phone Number (Ex. 09266445220)</label>
                                            <input type="text" name="phone_number" placeholder="Phone Number" id="phoneNumber" class="form-control form-control-lg" value="<?php echo $phone_number; ?>" maxlength="11"/>
                                            <span class="error"><?php echo $phone_numberErr; ?> </span>
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-2 pt-2">
                                    <input class="btn-custom btn btn-primary btn-lg text-warning" type="submit" value="Register" name="btn_register"/>
                                </div>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class= "d-flex flex-column text-center py-4 px-4 px-xl-5 bg-primary">

            <!-- copyright -->
            <div class="text-white mb-3 mb-md-0">Thrift Shop © 2022. All rights reserved.</div>
            <!-- end of copyright -->

        </section>
    <!-- end of register -->

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