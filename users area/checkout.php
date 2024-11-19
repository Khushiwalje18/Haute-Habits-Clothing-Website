<!-- connect file -->
<?php
include('../includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haute Habits-checkout</title>
    <!-- bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
          <a class="nav-link active text-light" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="../displayall.php">All Products</a>
        </li>
       

        <li class="nav-item">
          <a class="nav-link text-light" href="./user-registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="../contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="./faq.php">FAQ</a>
        </li>
        
      </ul>
      <form class="d-flex" action="search-product.php" method="get"> 
        <input class="form-control me-2" type="search" placeholder="search <3" aria-label="Search" name="search_data">
        
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product" >
      </form>
    </div>
  </div>
</nav>
<!-- calling cart function -->

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
          <a class='nav-link text-dark' href='./user-login.php'>Login</a> 
      </li>";
         }else{
          echo "<li class='nav-item'>
          <a class='nav-link text-dark' href='logout.php'>Logout</a> 
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
<div class="row px-3">
    <div class="col-md-12">
        <!-- products -->
        <div class="row">
           
        <?php
        if(!isset($_SESSION['username'])){


            include('user-login.php');
        }else{
            include('payment.php');
        }
        ?>
 

           
                    
            
            
            <!--row end  -->
        </div>
        <!-- col end -->
      </div>
    
</div>

<!-- last child-->
<?php include("../includes/footer.php"); ?>
    </div>
</body>
</html>