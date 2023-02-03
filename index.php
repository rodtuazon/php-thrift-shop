<?php

include("connections.php");

include("cart-number.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Thrift Shop</title>
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
                        <a title = "Home" class = "nav-link text-uppercase text-white" href = "#home">Home</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a title = "Collection" class = "nav-link text-uppercase text-white" href = "#collection">Collection</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a title = "About us" class = "nav-link text-uppercase text-white" href = "#about">About us</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a title = "Contact" class = "nav-link text-uppercase text-white" href = "#contact">Contact</a>
                    </li>
                    <li class = "nav-item px-2 py-2 border-0">
                        <a title = "Instagram" class = "nav-link text-uppercase text-white" href = "#instagram">Instagram</a>
                    </li>
                    <li class = "nav-item px-2 py-2 border-0">
                        <a title = "Admin" class = "nav-link text-uppercase text-white" href = "login.php">Admin</a>
                    </li>
                    <li class = "nav-item px-2 py-2 border-0">
                        <a title = "Forum" class = "nav-link text-uppercase text-white" href = "forum.php">Forum</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- header -->
    <header id = "home" class = "vh-100 carousel slide" data-bs-ride = "carousel" style = "padding-top: 104px">
        <div class = "container h-100 d-flex align-items-center carousel-inner">
            <div class = "text-center carousel-item active">
                <h2 class = "text-capitalize text-warning">Best Collection</h2> 
                <h1 class = "text-uppercase py-2 fw-bold text-warning">New Arrivals</h1>
                <a href = "shop-products.php" class = "btn mt-3 text-uppercase text-warning fw-bold">Shop Now</a>
            </div>
            <div class = "text-center carousel-item">
                <h2 class = "text-capitalize text-warning">Best Price & Offer</h2> 
                <h1 class = "text-uppercase py-2 fw-bold text-warning">Clearance Sale</h1>
                <a href = "shop-products.php" class = "btn mt-3 text-uppercase text-warning fw-bold">Buy Now</a>
            </div>
        </div>

        <button class = "carousel-control-prev" type = "button" data-bs-target="#home" data-bs-slide = "prev">
            <span class = "carousel-control-prev-icon"></span>
        </button>
        <button class = "carousel-control-next" type = "button" data-bs-target="#home" data-bs-slide = "next">
            <span class = "carousel-control-next-icon"></span>
        </button>
    </header>
    <!-- end of header -->

    <!-- collection -->
    <section id = "collection" class = "py-5">
        <div class = "container">
            <div class = "title text-center">
                <h2 class = "position-relative d-inline-block text-white fw-bold">New Collection</h2>
            </div>

            <div class = "row g-0">
                <div class = "d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                    <button type = "button" class = "btn m-2 text-warning fw-bold active-filter-btn" data-filter = "*">All</button>
                    <button type = "button" class = "btn m-2 text-warning fw-bold" data-filter = ".tshirts">T-shirts</button>
                    <button type = "button" class = "btn m-2 text-warning fw-bold" data-filter = ".poloshirts">Polo shirts</button>
                    <button type = "button" class = "btn m-2 text-warning fw-bold" data-filter = ".jackets">Jackets</button>
                </div>

                <div class = "collection-list mt-4 row gx-0 gy-3 text-white">
                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 tshirts">
                        <div class = "collection-img position-relative">
                            <img src = "images/shirt-split-black.jpg" class = "w-100">
                        </div>
                        <div class = "">
                            <p class = "text-capitalize my-1">Split Black T-Shirt</p>
                            <span class = "fw-bold">₱ 500.00</span>
                        </div>
                    </div>

                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 tshirts">
                        <div class = "collection-img position-relative">
                            <img src = "images/shirt-split-white.jpg" class = "w-100">
                        </div>
                        <div class = "">
                            <p class = "text-capitalize my-1">Split White T-Shirt</p>
                            <span class = "fw-bold">₱ 500.00</span>
                        </div>
                    </div>

                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 jackets">
                        <div class = "collection-img position-relative">
                            <img src = "images/jacket-chaps.jpg" class = "w-100">
                        </div>
                        <div class = "">
                            <p class = "text-capitalize my-1">Chaps Pink Jacket</p>
                            <span class = "fw-bold">₱ 800.00</span>
                        </div>
                    </div>

                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 poloshirts">
                        <div class = "collection-img position-relative">
                            <img src = "images/polo-nautica-striped.jpg" class = "w-100">
                        </div>
                        <div class = "">
                            <p class = "text-capitalize my-1">Nautica Brown Striped Polo Shirt</p>
                            <span class = "fw-bold">₱ 750.00</span>
                        </div>
                    </div>

                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 poloshirts">
                        <div class = "collection-img position-relative">
                            <img src = "images/polo-nautica-navy.jpg" class = "w-100">
                        </div>
                        <div class = "">
                            <p class = "text-capitalize my-1">Nautica Navy Polo Shirt</p>
                            <span class = "fw-bold">₱ 750.00</span>
                        </div>
                    </div>

                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 jackets">
                        <div class = "collection-img position-relative">
                            <img src = "images/jacket-kappa.jpg" class = "w-100">
                        </div>
                        <div class = "">
                            <p class = "text-capitalize my-1">Kappa Navy Jacket</p>
                            <span class = "fw-bold">₱ 800.00</span>
                        </div>
                    </div>

                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 tshirts">
                        <div class = "collection-img position-relative">
                            <img src = "images/shirt-kaws-white.jpg" class = "w-100">
                        </div>
                        <div class = "">
                            <p class = "text-capitalize my-1">Kaws White Shirt</p>
                            <span class = "fw-bold">₱ 1200.00</span>
                        </div>
                    </div>

                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 jackets">
                        <div class = "collection-img position-relative">
                            <img src = "images/jacket-giordano.jpg" class = "w-100">
                        </div>
                        <div class = "">
                            <p class = "text-capitalize my-1">Giordano Navy Jacket</p>
                            <span class = "fw-bold">₱ 750.00</span>
                        </div>
                    </div>

                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 poloshirts">
                        <div class = "collection-img position-relative">
                            <img src = "images/polo-duckhead-striped.jpg" class = "w-100">
                        </div>
                        <div class = "">
                            <p class = "text-capitalize my-1">Duckhead Blue Striped Polo Shirt</p>
                            <span class = "fw-bold">₱ 500.00</span>
                        </div>
                    </div>

                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 tshirts">
                        <div class = "collection-img position-relative">
                            <img src = "images/shirt-kaws-blue.jpg" class = "w-100">
                        </div>
                        <div class = "">
                            <p class = "text-capitalize my-1">Kaws Blue Striped Shirt</p>
                            <span class = "fw-bold">₱ 1000.00</span>
                        </div>
                    </div>

                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 jackets">
                        <div class = "collection-img position-relative">
                            <img src = "images/jacket-thenorthface.jpg" class = "w-100">
                        </div>
                        <div class = "">
                            <p class = "text-capitalize my-1">The North Face Black Jacket</p>
                            <span class = "fw-bold">₱ 850.00</span>
                        </div>
                    </div>

                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 poloshirts">
                        <div class = "collection-img position-relative">
                            <img src = "images/polo-ralphlauren-striped.jpg" class = "w-100">
                        </div>
                        <div class = "">
                            <p class = "text-capitalize my-1">Ralph Lauren Navy Striped Polo Shirt</p>
                            <span class = "fw-bold">₱ 500.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of collection -->

    <!-- about -->
    <section id = "about" class = "mb-5">
        <div class = "container">
            <div class = "row gy-lg-5 align-items-center">
                <div class = "col-lg-6 order-lg-1 text-center">
                    <div class = "title pt-3 pb-5">
                        <h2 class = "position-relative d-inline-block ms-4 text-white fw-bold">About Us</h2>
                    </div>
                    <p class = "text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, officia quod a veniam, iusto aliquam natus sunt laborum dolore ipsum temporibus quia facilis excepturi quae assumenda, aliquid rerum. Voluptas, cum.</p>
                    <p class = "text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum aspernatur cupiditate doloremque maiores? Necessitatibus delectus eveniet vero nisi velit veniam voluptatibus perspiciatis amet esse tempore fuga, corporis odit ullam natus!</p>
                </div>
                <div class = "col-lg-6 order-lg-0">
                    <img src = "images/about-us-thrift-shop.jpg" alt = "" class = "img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- end of about -->

    <!-- contact and instagram -->
    <section id = "contact" class = "bg-info py-5">
        <div class = "container">
            <div class = "row text-white g-4">
                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light mb-3 fw-bold">Contact Us</h5>
                    <div class = "d-fle justify-content-start align-items-start my-2 text-muted">
                    <span class = "me-3">
                        <i class = "fas fa-map-marked-alt text-white"></i>
                    </span>
                    <span class = "fw-light text-white">
                        Bay Garden Homes, Barangay Santo Domingo, Bay, Laguna, Philippines, 4033
                    </span>
                    </div>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <div class = "d-fle justify-content-start align-items-start my-2 text-muted">
                    <span class = "me-3">
                        <i class = "fas fa-envelope text-white"></i>
                    </span>
                    <span class = "fw-light text-white">
                        thriftshop_orders@gmail.com
                    </span>
                    </div>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <div class = "d-fle justify-content-start align-items-start my-2 text-muted">
                    <span class = "me-3">
                        <i class = "fas fa-phone-alt text-white"></i>
                    </span>
                    <span class = "fw-light text-white">
                        +63 927 2970 351
                    </span>
                    </div>
                </div>

                <div id = "instagram" class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light mb-3 fw-bold">Follow Us</h5>
                    <div class = "d-fle justify-content-start align-items-start my-2 text-muted">
                    <span class = "me-3">
                        <a style="color: #ac2bac;" href="https://www.instagram.com/rod_mykel/" target="_blank" role="button"><i class="fab fa-instagram fa-lg"></i></a>    
                    </span>
                    <span class = "fw-light text-white">
                        Thrift Shop
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of contact and instagram-->
    
    <!-- footer -->
    <footer>
    <!-- copyright -->
    <div class= "d-flex flex-column text-center py-4 px-4 px-xl-5 bg-primary">
    <div class="text-center text-white mb-3 mb-md-0">Thrift Shop © 2022. All rights reserved.</div>
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