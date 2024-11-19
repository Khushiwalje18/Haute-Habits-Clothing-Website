<?php

include('../includes/connect.php');
include('../functions/commonfunction.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment </title>
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
<body>
    <!-- php code to access user id -->
    <?php
        $username=$_SESSION['username'];
      $user_ip=getIPAddress();
      $get_user="SELECT * FROM `user_details` WHERE username='$username'";
      $result=mysqli_query($connect,$get_user);
      $run_query=mysqli_fetch_array($result);
      $user_id=$run_query['user_id'];
      
      


    ?>


    <div class="container">
        <h2 class="text-center" Style="color:rgb(19,61,31);">Payment Modes</h2>
        <div class="row justify-content-center aling-items-center mt-5">
            <div class="col-4">
                <a href="https://www.paypal.com" target="_blank"><img src="../images/payment/paypal.jfif" style="border-radius:20px; width:300px; height:300px;" alt="" ></a>
            </div>
            <div class="col-4">   
                <a href="https://pay.google.com" target="_blank"><img src="../images/payment/googlepay.jfif" style="border-radius:20px; width:300px; height:300px;" alt=""></a>
            </div>
            <div class="col-4">    
                <a href="https://www.bhimupi.org.in" target="_blank"><img src="../images/payment/bhim.jfif" style="border-radius:0; width:300px; height:300px;" alt=""></a>
            </div>
        </div>
        <div class="row justify-content-center aling-items-center">
            <div class="col-4"> 
                <a href="https://www.phonepe.com" target="_blank"><img src="../images/payment/phonepe.jfif" style="border-radius:20px; width:300px; height:300px;" alt=""></a>
            </div>
            <div class="col-4"> 
                <a href="https://go.wepay.com" target="_blank"><img src="../images/payment/wepay.jfif" style="border-radius:20px; width:300px; height:300px;" alt=""></a>
            </div>    
            <div class="col-4"> 
            <a href="order.php?user_id=<?php echo $user_id ?>"><img src="../images/payment/cash.jfif" style="border-radius:20px; width:300px; height:300px;" alt=""><h5 style="color:rgb(19,61,31); text-decoration:underline;">Cash on Delivery</h5></a>
            </div>
        </div>
    </div>
</body>
</html>