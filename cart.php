<!-- connect file -->
<?php
include('./includes/connect.php');
include('./functions/commonfunction.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haute Habits-Cart</title>
    <!-- bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
    <!-- css link -->
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <div class="container-fluid"></div>
        <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(19,61,31);">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="index.php"><h3>HAUTE HABITS</h3></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="displayall.php">All Products</a>
        </li>
       

        <?php
         if(isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link text-light' href='./users area/profile.php'>My Account</a>
        </li>";
         }else{
          echo "<li class='nav-item'>
          <a class='nav-link text-light' href='./users area/user-registration.php'>Register</a>
        </li>";
         }
        ?>
        <li class="nav-item">
          <a class="nav-link text-light" href="./contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="./faq.php">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
</svg><sup><?php  cart_item(); ?></sup></a>
        </li>

      </ul>
      
    </div>
  </div>
</nav>
<!-- calling cart function -->
<?php

cart();
?>
<!-- second child -->
<nav class="navbar navbar-expand-lg text-dark">
    <ul class="navbar-nav me-auto">
        
        <?php
        if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link text-dark' href='#'>Welcome Guest</a> 
        </li>";
           }else{
            echo "<li class='nav-item'>
            <a class='nav-link text-dark' href='#'>Welcome ".$_SESSION['username']."</a> 
        </li>";
           }
           
         if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link text-dark' href='./users area/user-login.php'>Login</a> 
      </li>";
         }else{
          echo "<li class='nav-item'>
          <a class='nav-link text-dark' href='./users area/logout.php'>Logout</a> 
      </li>";
         }

        ?>
    </ul>
</nav>

<!-- third child -->
<div>
    <h3 class="text-center">OUR STORE</h3>
    <p class="text-center">Chick picks for you!!</p>
</div>

<!-- forth child -->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            <!-- <thead>
                <tr>
                    <th>Product-Title</th>
                    <th>Product View</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    
                </tr>
            </thead> -->
            <tbody>
                <!-- php code to display dynamic data -->
                <?php
                    
                     $ip =getIPAddress();
                     $total_price=0;
                     $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                     $result_query=mysqli_query($connect,$cart_query);
                     $result_count=mysqli_num_rows($result_query);
                     if($result_count>0){

                    
                     while($row=mysqli_fetch_array($result_query)){
                         $product_id=$row['product_id'];
                         $select_products="SELECT * FROM `product` WHERE product_id='$product_id'";
                         $result_product=mysqli_query($connect,$select_products);
                         while($row_product_price=mysqli_fetch_array($result_product)){
                             $product_price=array($row_product_price['product_price']);
                             $price_table=$row_product_price['product_price'];
                             $product_title=$row_product_price['product_title'];
                             $product_image1=$row_product_price['product_image1'];
                             $product_value=array_sum($product_price);
                             $total_price+=$product_value;
                     
                ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin area/product-images/<?php echo $product_image1 ?>" alt="" style="width:150px; height:250px; object-fit:contain;"></td>
                    <td><select name="Size" id="">
                    <option value="SIZE">SIZE</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                    </select></td>
                    <td><input type="text" name="qty" id="" placeholder="Quantity" class="form-input w-30" autocomplete="off"> 
                    <input type="submit" value="Update" name="update_cart" class="px-1 " style="background-color:rgb(19,61,31); color:white"></td>
                    <?php
                    $ip=getIPAddress();
                    if(isset($_POST['update_cart'])){
                        $quantity=$_POST['qty'];
                        $update_cart="UPDATE `cart_details` SET quantity=$quantity WHERE ip_address='$ip'";
                        $result_cart=mysqli_query($connect,$update_cart);
                        $total_price=$total_price*$quantity; 
                    }

                    ?>
                    
                    <td><?php echo $price_table ?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>">
                    <input type="submit" value="Remove Product" name="remove_cart" class="px-1 mx-1" style="background-color:rgb(19,61,31); color:white"></td>
                     <!-- <td>
                      <button class="px-1 " style="background-color:rgb(19,31); color:white">Update</button> -->
                     
                        <!-- <button class="px-1 " style="background-color:rgb(19,61,31); color:white">Remove</button> 
                    </td> -->
                </tr>
                <?php
                         }
                        }
                    }
    else{
        echo "<br><br><br><h2 class='text-center'>No products in your cart</h2>";
    }
                ?>
            </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex">
            <?php

$ip =getIPAddress();
$cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
$result_query=mysqli_query($connect,$cart_query);
$result_count=mysqli_num_rows($result_query);
if($result_count>0){
    echo    " <h5 class='px-3'>Sub-total: <strong>$total_price/-</strong></h5>
    <button class='px-3 py-1 border-1 mx-3' style='background-color:rgb(19,61,31); color:white;'>
    <a href='index.php' style='color:white; text-decoration:none;'> Continue shopping</a></button>
    <button class='px-3 py-1 border-1 mx-3' style='background-color:grey;'><a href='./users area/checkout.php' style='text-decoration:none; color:white;'>Check Out</a></button>";
}else{
    echo "
        <button class='px-4 py-2 border-1 mx-3' style='background-color:rgb(19,61,31); color:white;'>
    <a href='index.php' style='color:white; text-decoration:none;'> Continue shopping</a></button>";
}
    ?>
           
        </div>
    </div>
</div>
</form>
<br>
<!-- function to remove item -->
<?php
function remove_product(){
    global $connect;
    if(isset($_POST['remove_cart']) && isset($_POST['removeitem']) && is_array($_POST['removeitem'])){
 
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="DELETE FROM `cart_details` WHERE product_id=$remove_id";
            $run_delete=mysqli_query($connect,$delete_query);
            if($run_delete){
                echo"<script>window.open('cart.php,'_self')</script>";
            }
        }
    }  
}
echo $removeitem=remove_product();



?>

<!-- last child-->
<!-- last child-->
<div class="p-3 text-center" style="background-color:rgb(19,61,31);">
    <div class="d-flex m-auto text-light text-decoration-none fw-bold">
        <a href="index.php" class="p-2 m-auto text-light text-decoration-none ">Home</a>
        <a href="displayall.php" class="p-2 m-auto text-light text-decoration-none ">All Products</a>
        <?php
         if(isset($_SESSION['username'])){
          echo "
          <a class='nav-link text-light  text-decoration-none ' href='./users area/profile.php'>My Account</a>
        ";
         }else{
          echo "
          <a class='nav-link text-light text-decoration-none ' href='../users area/user-registration.php'>Register</a>
        ";
         }
        ?><a href="./contact.php" class="p-2 m-auto text-light text-decoration-none ">Contact</a>
        <a href="faq.php" class="p-2 m-auto text-light text-decoration-none ">FAQ</a>
        <a href="cart.php" class="p-2 m-auto text-light text-decoration-none ">My Cart</a>
    </a>
    </div >
    
    <p class="text-light m-4">All rights reserved ©- Designed by HauteHabits</p>
</div>
</div>
</body>
</html>