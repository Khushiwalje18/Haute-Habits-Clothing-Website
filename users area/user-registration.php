<?php

include('../includes/connect.php');
include('../functions/commonfunction.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- css link -->
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <div class="container-fluid">
        <h1 style="color:rgb(19,61,31); font-size:70px; padding:10px 0 0 0;margin-left:9.6%;">HAUTE HABITS</h1>
        <h5 style="color:rgb(19,61,31);  margin-left:10%; margin-bottom:25px">New User Registration:</h5>
        <div class="row" style="margin-left:10%;">   
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" style="border-radius:0%; border-bottom:1px solid black;border-top:none; border-right:none; border-left:none;" autocomplete="off" required="required" name="user_username"/>
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email ID</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" style="border-radius:0%; border-bottom:1px solid black;border-top:none; border-right:none; border-left:none;" autocomplete="off" required="required" name="user_email"/>
                    </div>
                    <!-- user image -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control" style="border-radius:0%; border-bottom:1px solid black;border-top:none; border-right:none; border-left:none;"  required="required" name="user_image"/>
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" style="border-radius:0%; border-bottom:1px solid black;border-top:none; border-right:none; border-left:none;" autocomplete="off" required="required" name="user_password"/>
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-4">
                        <label for="confirm_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_user_password" class="form-control" placeholder="Confirm password" style="border-radius:0%; border-bottom:1px solid black;border-top:none; border-right:none; border-left:none;" autocomplete="off" required="required" name="confirm_user_password"/>
                    </div>
                    <!-- address field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" style="border-radius:0%; border-bottom:1px solid black;border-top:none; border-right:none; border-left:none;" autocomplete="off" required="required" name="user_address"/>
                    </div>
                    <!-- contact field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your Contact number" style="border-radius:0%; border-bottom:1px solid black;border-top:none; border-right:none; border-left:none;" autocomplete="off" required="required" name="user_contact"/>
                    </div>
                    <div class="mt-4 pt-2" >
                        <input type="submit" value="Register" style="background-color:smokewhite; color:rgb(19,61,31);" class="py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1">Already have an account ? <a href="user-login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>


<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $confirm_user_password=$_POST['confirm_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_temp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();
    
    //select query
    $select_query="SELECT * FROM `user_details` WHERE username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($connect,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and email already exists')</script>";
    }else if($user_password!=$confirm_user_password){
        echo "<script>alert('Passwords do not match')</script>";
    }else{
    //insert query
    move_uploaded_file($user_image_temp,"./user images/$user_image");
    $insert_query="INSERT INTO `user_details` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile)
    VALUES ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($connect,$insert_query);
    if($sql_execute){
        echo "<script>alert('Congratulations, Account created successfully.')</script>";
    }else{
        die(mysqli_error($connect));
    }
    }

    //selecting cart items
    $select_cart_items="SELECT * FROM `cart_details` WHERE ip_address='$user_ip' ";
    $result_cart=mysqli_query($connect,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('You have products in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
    }




?>