<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/commonfunction.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <!-- bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- css link -->
    <link rel="stylesheet" type="text/css" href="style1.css">
    <style>
        body{
            overflow-x:hidden;
        }
        .profile_image{
            width:100%;
            display:block;
            margin:auto;
            height:90%;
            object-fit:contain;
        }
        .edit_image{
          width:200px;
          height:200px;
          object-fit:contain;
        }
    </style>
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
          <a class="nav-link active text-light" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="../displayall.php">All Products</a>
        </li>
       

        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="../contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="../faq.php">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="../cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
</svg><sup><?php  cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Total amount: <?php total_amount(); ?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="../search-product.php" method="get"> 
        <input class="form-control me-2" type="search" placeholder="search <3" aria-label="Search" name="search_data" autocomplete="off">
        
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product"  >
      </form>
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
          <a class='nav-link text-dark' href='../users area/user-login.php'>Login</a> 
      </li>";
         }else{
          echo "<li class='nav-item'>
          <a class='nav-link text-dark' href='../users area/logout.php'>Logout</a> 
      </li>";
         }

        ?>
    </ul>
</nav>

<!-- third child -->
<div >
    <h3 class="text-center">OUR STORE</h3>
    <p class="text-center">Chick picks for you!!</p>
</div>

<!-- forth child -->
<div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav text-center" style="height:100vh;">
          <li class="nav-item" style="background-color:rgb(19,61,31);">
            <a class="nav-link text-light" href="#"><h4>PROFILE</h4></a>
          </li>
          <?php
            $username=$_SESSION['username'];
            $user_image="SELECT * FROM `user_details` WHERE username='$username'";
            $result_image=mysqli_query($connect,$user_image);
            $row_image=mysqli_fetch_array($result_image);
            $user_profile_image=$row_image['user_image'];
            echo "<li class='nav-item' style='background-color:rgb(19,61,31);'>
            <img src='./user images/$user_profile_image' alt='' class='profile_image'>
        </li>";
          ?>
          <!-- <li class="nav-item" style="background-color:rgb(19,61,31);">
              <img src="../images/shreya.jpeg" alt="" class="profile_image">
          </li> -->
          <li class="nav-item" style="background-color:rgb(19,61,31);">
              <a class="nav-link text-light" href="profile.php"><h6>Pending Orders</6></a>
          </li>
          <li class="nav-item" style="background-color:rgb(19,61,31);">
              <a class="nav-link text-light" href="profile.php?my_orders"><h6>My Orders</h6></a>
          </li>
          <li class="nav-item" style="background-color:rgb(19,61,31);">
              <a class="nav-link text-light" href="profile.php?edit_account"><h6>Edit Profile</h6></a>            </li>
          <li class="nav-item" style="background-color:rgb(19,61,31);">
              <a class="nav-link text-light" href="profile.php?delete_account"><h6>Delete Account</h6></a>
          </li>
          <li class="nav-item mb-2" style="background-color:rgb(19,61,31);">
              <a class="nav-link text-light" href="logout.php"><h6>Logout</h6></a>
          </li>
         </ul>
    </div>
    <div class="col-md-10 text-center">
      <?php
        get_user_order_details();
        if(isset($_GET['edit_account'])){
          include('edit_account.php');
        }
        if(isset($_GET['my_orders'])){
          include('user_orders.php');
        }
        if(isset($_GET['delete_account'])){
          include('./delete-account.php');
        }
      ?>
    </div>
</div>

<!-- last child-->
<!-- last child-->
<div class="p-3 text-center" style="background-color:rgb(19,61,31);">
    <div class="d-flex m-auto text-light text-decoration-none fw-bold">
        <a href="../index.php" class="p-2 m-auto text-light text-decoration-none ">Home</a>
        <a href="../displayall.php" class="p-2 m-auto text-light text-decoration-none ">All Products</a>
        <?php
         if(isset($_SESSION['username'])){
          echo "
          <a class='nav-link text-light  text-decoration-none ' href='./profile.php'>My Account</a>
        ";
         }else{
          echo "
          <a class='nav-link text-light text-decoration-none ' href='./user-registration.php'>Register</a>
        ";
         }
        ?><a href="../contact.php" class="p-2 m-auto text-light text-decoration-none ">Contact</a>
        <a href="../faq.php" class="p-2 m-auto text-light text-decoration-none ">FAQ</a>
        <a href="../cart.php" class="p-2 m-auto text-light text-decoration-none ">My Cart</a>
    </a>
    </div >
    
    <p class="text-light m-4">All rights reserved ©- Designed by HauteHabits</p>
</div>
</div>
</body>
</html>