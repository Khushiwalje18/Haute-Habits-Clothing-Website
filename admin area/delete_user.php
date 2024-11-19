<?php

if(isset($_GET['delete_user'])){
    $delete_user_id=$_GET['delete_user'];
    // echo $delete_id;
    //delete query
    $delete_query_user="DELETE FROM `user_details` WHERE user_id=$delete_user_id";
    $delete_user_result=mysqli_query($connect,$delete_query_user);
    if($delete_user_result){
        echo "<script>alert('user deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}



?>