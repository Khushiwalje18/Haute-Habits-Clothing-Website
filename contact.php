<!-- connect file -->
<?php
include('includes/connect.php');
include('./functions/commonfunction.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haute Habits</title>
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
        .moving-text {
            position: relative;
            animation: moveText 7s linear infinite;
        }

        @keyframes moveText {
            0% {
                left: 0;
            }
            100% {
                left: 100%;
            }
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
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Total amount: <?php total_amount(); ?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search-product.php" method="get"> 
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


<div class="container-fluid m-3">
        <h2 class="text-center mb-5" style="color:rgb(19,61,31);">Contact Us</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="./images/contact.jpg" alt="admin registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4 mt-5">
                <form action="" method="post">
                    <div class="form-outline mb-4 mt-5">
                        <label for="admin_username" class="form-label">Name</label>
                        <input type="text" id="admin_username" name="admin_username" autocomplete="off" placeholder="Enter your name" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4 ">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="email" id="admin_email" name="admin_email" autocomplete="off" placeholder="Enter your email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_message" class="form-label">Any Suggestions</label>
                        <input type="textarea" id="admin_message" autocomplete="off" name="admin_message" placeholder="Enter any message/complain/suggestions/query" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" name="admin_contact" value="Send" style="background-color:rgb(19,61,31); color:white;" class="py-2 px-3 border-0">
                        <p class="small fw-bold text-danger">Feel free to ask anything!</p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

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

<?php
if(isset($_POST['admin_contact'])){
  $contact_name=$_POST['admin_username'];
  $contact_email=$_POST['admin_email'];
  $contact_message=$_POST['admin_message'];

  $insert_contact_data="INSERT INTO `contact_details` (contact_username,contact_email,contact_message)
  VALUES ('$contact_name','$contact_email','$contact_message')";
  $result_contact_data=mysqli_query($connect,$insert_contact_data);
  if($result_contact_data){
    echo "<script>alert('Thank you for contacting us!!')</script>";
    echo "<script>window.open('./contact.php','_self')</script>";
  }
}

?>