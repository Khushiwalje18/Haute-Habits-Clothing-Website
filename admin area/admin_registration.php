<?php

include('../includes/connect.php');
include('../functions/commonfunction.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin registration</title>
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
    </style>
</head>
<body >
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5" style="color:rgb(19,61,31);">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin-registration.jpg" alt="admin registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4 mt-5">
                        <label for="admin_username" class="form-label">Username</label>
                        <input type="text" id="admin_username" name="admin_username" placeholder="Enter your username" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="email" id="admin_email" name="admin_email" placeholder="Enter your email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_pass" class="form-label">Confirm password</label>
                        <input type="password" id="confirm_pass" name="confirm_pass" placeholder="Enter your password" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" name="admin_registration" value="Register" style="background-color:rgb(19,61,31); color:white;" class="py-2 px-3 border-0">
                        <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['admin_registration'])){
    $admin_username=$_POST['admin_username'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $confirm_admin_password=$_POST['confirm_pass'];
   
    
    //select query
    $select_query="SELECT * FROM `admin_details` WHERE admin_username='$admin_username' or admin_email='$admin_email'";
    $result_admin=mysqli_query($connect,$select_query);
    $rows_count=mysqli_num_rows($result_admin);
    if($rows_count>0){
        echo "<script>alert('Sorry, Username and email already exists')</script>";
    }else if($admin_password!=$confirm_admin_password){
        echo "<script>alert('Passwords do not match')</script>";
    }else{
    //insert query
    $insert_query_admin="INSERT INTO `admin_details` (admin_username,admin_email,admin_password)
    VALUES ('$admin_username','$admin_email','$hash_password')";
    $sql_execute_admin=mysqli_query($connect,$insert_query_admin);
    if($sql_execute_admin){
        echo "<script>alert('Congratulations, Account created successfully.')</script>";
    }else{
        die(mysqli_error($connect));
    }
}
}




?>