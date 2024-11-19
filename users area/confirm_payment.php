<!-- connect file -->
<?php
include('../includes/connect.php');
session_start();

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    // echo $order_id;

    $select_data="SELECT * FROM `user_orders` WHERE order_id=$order_id";
    $result=mysqli_query($connect,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];

}

if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payemnt_mode=$_POST['payment_mode'];
    $insert_query="INSERT INTO `user_payments` (order_id,invoice_number,amount,payment_mode)
    VALUES ($order_id,$invoice_number,$amount,'$payemnt_mode')";
    $result=mysqli_query($connect,$insert_query);
    if($result){
        echo "<h3 class='text-center' style='color:rgb(19,61,31);'>Succeefully completed payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders="UPDATE `user_orders` SET order_status='Complete' WHERE order_id=$order_id";
    $result_orders=mysqli_query($connect,$update_orders);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payemnt Page</title>
    <!-- bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- css link -->
    <link rel="stylesheet" type="text/css" href="../style1.css">
</head>
<body class="bg-light">
    <h1 class="text-center" style="color:rgb(19,61,31);">Make Payment</h1>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="">Invoice number:</label>
                <input type="text" class="form-control w-50 m-auto" value="<?php echo $invoice_number ?>" name="invoice_number">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="">Amount:</label>
                <input type="text" class="form-control w-50 m-auto" value="<?php echo $amount_due ?>" name="amount">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option >Select Payemnt mode</option>
                    <option >UPI</option>
                    <option >Netbanking</option>
                    <option >Paypal</option>
                    <option >GooglePay</option>
                    <option >Cash on delivery</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
             <input type="submit" value="Confirm" name="confirm_payment" class="py-2 px-3 border-0" style="background-color:rgb(19,61,31); color:white;">
            </div>
        </form>
    </div>
    
</body>
</html>