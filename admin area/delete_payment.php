<?php

if(isset($_GET['delete_payment'])){
    $delete_payment_id=$_GET['delete_payment'];
    // echo $delete_category;

    $delete_query_payment="DELETE FROM `user_payments` WHERE payment_id=$delete_payment_id";
    $result_delete_payment=mysqli_query($connect,$delete_query_payment);
    if($result_delete_payment){
        echo "<script>alert('Payment deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_payments.php','_self')</script>";
    }
}


?>