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
    <title>Admin Dashboard</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- css file -->
    <link rel="stylesheet" href="../style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <!-- first child -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light" >
            <div class="container-fluid">
                <h3>HAUTE HABITS</h3>
                <nav class="navbar navbar-expand-lg">
                    
                </nav>
            </div>
        </nav>

    <!-- second child -->
        <div >
            <h3 class="text-center p-2">Manage HauteHabit details</h3>
        </div>

    <!-- third child-->
        <div class="row">
            <div class="col-md-12 p-1">
                <div class="d-flex align-items-center px-5">      
                    <a href="#"><img src="../images/khushi.jpeg" alt="" class="adminimage"></a>
                    <a href="#"><img src="../images/shreya.jpeg" alt="" class="adminimage"></a> 
                    <h3 style="color:red;">Welcome HauteHabits Admin</h3>

                            
                </div>
                <div class="button text-center">
                    <button><a href="insert-product.php" class="nav-link   my-1" style="background-color:smokewhite; color:rgb(19,61,31);">
                        Insert Product
                    </a></button>
                    <button><a href="index.php?view_products" class="nav-link  my-1" style="background-color:smokewhite; color:rgb(19,61,31);">
                        View Products
                    </a></button>
                    <button><a href="index.php?insert-category" class="nav-link   my-1" style="background-color:smokewhite; color:rgb(19,61,31);">
                        Insert Category 
                    </a></button>
                    <button><a href="index.php?view_categories" class="nav-link  my-1" style="background-color:smokewhite; color:rgb(19,61,31);">
                        View Categories
                    </a></button>
                    <button><a href="index.php?insert-gender" class="nav-link  my-1" style="background-color:smokewhite; color:rgb(19,61,31);">
                        Insert Gender
                    </a></button>
                    <button><a href="index.php?view_genders" class="nav-link  my-1" style="background-color:smokewhite; color:rgb(19,61,31);">
                        View Gender
                    </a></button>
                    <button><a href="index.php?list_orders" class="nav-link   my-1" style="background-color:smokewhite; color:rgb(19,61,31);">
                        All Orders
                    </a></button>
                    <button><a href="index.php?view_payments" class="nav-link  my-1" style="background-color:smokewhite; color:rgb(19,61,31);">
                        All Payments
                    </a></button>
                    <button><a href="index.php?view_users" class="nav-link   my-1" style="background-color:smokewhite; color:rgb(19,61,31);">
                        List Users
                    </a></button>
                    <button><a href="index.php?view_contact_data" class="nav-link   my-1" style="background-color:smokewhite; color:rgb(19,61,31);">
                        View customer feedbacks
                    </a></button><br><br><br>
                   
                </div>
            </div>
        </div>

    <!-- forth child -->
    <div class="container my-3">
        <?php
        if(isset($_GET['insert-category'])){
            include('insert-category.php');
        }
        if(isset($_GET['insert-gender'])){
            include('insert-gender.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['view_genders'])){
            include('view_genders.php');
        }
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        }
        if(isset($_GET['edit_gender'])){
            include('edit_gender.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }
        if(isset($_GET['delete_gender'])){
            include('delete_gender.php');
        }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['delete_order'])){
            include('delete_order.php');
        }
        if(isset($_GET['view_payments'])){
            include('view_payments.php');
        }
        if(isset($_GET['delete_payment'])){
            include('delete_payment.php');
        }
        if(isset($_GET['view_users'])){
            include('view_users.php');
        }
        if(isset($_GET['delete_user'])){
            include('delete_user.php');
        }
        if(isset($_GET['view_contact_data'])){
            include('view_contact_data.php');
        }
       if(isset($_GET['delete_contact_data'])){
            include('delete_contact_data.php');
       }
        ?>
    </div>




    <!-- last child-->
    <?php include("../includes/footer.php"); ?>
    </div>






<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>