<?php

session_start();

include("connections.php");

if(isset($_POST['add_to_cart']))
{

   $product_name = $_POST['product_name'];
   $product_image = $_POST['product_image'];
   $product_price = $_POST['product_price'];

   $query = "SELECT * FROM thrift_shop_cart WHERE product_name='$product_name'";
   $query_run = mysqli_query($connections, $query);

   if(mysqli_num_rows($query_run) > 0){
        $_SESSION['message'] = 'Product already added to cart';
        header('Location: shop-products.php');
   }else{
        $insert_product = mysqli_query($connections, "INSERT INTO thrift_shop_cart (product_name, product_image, product_price) VALUES ('$product_name', '$product_image', '$product_price')");
        $_SESSION['message'] = 'Product added to cart successfully';
        header('Location: shop-products.php');
   }

}

if(isset($_POST['save_product']))
{
    $product_name = $_POST['product_name'];
    $product_image = $_FILES['product_image']['name'];
    $product_price = $_POST['product_price'];

    if(file_exists("upload/" . $_FILES["product_image"]["name"]))
    {
        $store = $_FILES["product_image"]["name"];
        $_SESSION['status']= "Image already exists. '.$store.'";
        header('Location: shop-create.php');
    }
    else
    {
            $query = "INSERT INTO thrift_shop_products (product_name,product_image,product_price) VALUES ('$product_name','$product_image','$product_price')";
            $query_run = mysqli_query($connections, $query);

            if($query_run)
            {
                move_uploaded_file($_FILES["product_image"]["tmp_name"], "upload/".$_FILES["product_image"]["name"]);
                $_SESSION['message'] = "Product Created Successfully";
                header('Location: shop-database.php');
            }
            else
            {
                $_SESSION['message'] = "Product Not Created";
                header('Location: shop-database.php');
            }
    }
}

if(isset($_POST['update_product']))
{
    $edit_id = $_POST['edit_id'];
    $edit_product_name = $_POST['edit_product_name'];
    $edit_product_image = $_FILES['product_image']['name'];
    $edit_product_price = $_POST['edit_product_price'];

    $query = "UPDATE thrift_shop_products SET product_name='$edit_product_name', product_image='$edit_product_image', product_price='$edit_product_price' WHERE id='$edit_id' ";
    $query_run = mysqli_query($connections, $query);

    if($query_run)
    {
        move_uploaded_file($_FILES["product_image"]["tmp_name"], "upload/".$_FILES["product_image"]["name"]);
        $_SESSION['message'] = "Product Updated Successfully";
        header('Location: shop-database.php');
    }
    else
    {
        $_SESSION['message'] = "Product Not Updated";
        header("Location: shop-database.php");
    }
}

if(isset($_POST['delete_product']))
{
    $id = mysqli_real_escape_string($connections, $_POST['delete_product']);

    $query = "DELETE FROM thrift_shop_products WHERE id='$id' ";
    $query_run = mysqli_query($connections, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Product Deleted Successfully";
        header("Location: shop-database.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Product Not Deleted";
        header("Location: shop-database.php");
        exit(0);
    }
}

if(isset($_POST['order_btn'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address_1 = $_POST['address_1'];
    $address_2 = $_POST['address_2'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $zip_code = $_POST['zip_code'];
    $province_state = $_POST['province_state'];
    $country = $_POST['country'];
    $payment = $_POST['payment'];

    $cart_query = mysqli_query($connections, "SELECT * FROM `thrift_shop_cart`");
    $price_total = 0;

    if(mysqli_num_rows($cart_query) > 0){
        while($product_item = mysqli_fetch_assoc($cart_query)){
            $product_name[] = $product_item['product_name'];
            $product_price = ($product_item['product_price']);
            $price_total += $product_price;
        }
    }

    $total_product = implode('<br>',$product_name);

    $detail_query = mysqli_query($connections, "INSERT INTO `thrift_shop_order`(first_name,last_name,email,phone_number,address_1,address_2,barangay,city,zip_code,province_state,country,payment,price_total) VALUES ('$first_name','$last_name','$email','$phone_number','$address_1','$address_2','$barangay','$city','$zip_code','$province_state','$country','$payment','$price_total')");

    if($cart_query && $detail_query){
        include("header.php");
        echo "
            <center>
                <div class='py-5'>
                    <div class='container' style='padding-top: 104px'>
                    <div class='row mb-4 gy-3'>
                        <h1 class='fw-bold mb-4'>Thank you for shopping!</h1>
                        <div class='col'>
                            <h4 class='fw-bold'>".$total_product."</h4>
                            <h4 class='fw-bold mt-4'> Total: ₱ ".$price_total.".00</h4>
                        </div>
                        <div class=''>
                            <p> First Name: <span class='fw-bold'>".$first_name."</span> </p>
                            <p> Last Name: <span class='fw-bold'>".$last_name."</span> </p>
                            <p> Email: <span class='fw-bold'>".$email."</span> </p>
                            <p> Phone Number: <span class='fw-bold'>".$phone_number."</span> </p>
                            <p> Complete Address: <span class='fw-bold'>".$address_1.", ".$address_2.", ".$barangay.", ".$city." - ".$zip_code.", ".$province_state.", ".$country."</span> </p>
                            <p> Payment Mode: <span class='fw-bold'>".$payment."</span> </p>
                            <h2 class='text-danger fw-bold mt-4 mb-4'>Note: Screenshot this page and send it to thriftshop_orders@gmail.com to confirm your order.</h2>

                            <a href='shop-products.php' class='btn fw-bold col-md-3'>Continue Shopping</a>
                    </div>
                </div>
            </center>
        ";
        include("footer.php"); 
    }
}

?>