<?php

if(isset($_GET['delete_order'])){
    $delete_order=$_GET['delete_order'];
    // echo $delete_category;

    $delete_query_order="DELETE FROM `user_orders` WHERE order_id=$delete_order";
    $result_delete_order=mysqli_query($connect,$delete_query_order);
    if($result_delete_order){
        echo "<script>alert('Order deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_orders.php','_self')</script>";
    }
}


?>