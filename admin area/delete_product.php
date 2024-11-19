<?php

if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];
    // echo $delete_id;
    //delete query
    $delete_query="DELETE FROM `product` WHERE product_id=$delete_id";
    $result_delete=mysqli_query($connect,$delete_query);
    if($result_delete){
        echo "<script>alert('Product deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}



?>