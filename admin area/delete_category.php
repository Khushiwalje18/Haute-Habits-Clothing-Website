<?php

if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
    // echo $delete_category;

    $delete_query_cat="DELETE FROM `category` WHERE category_id=$delete_category";
    $result_delete_cat=mysqli_query($connect,$delete_query_cat);
    if($result_delete_cat){
        echo "<script>alert('Category deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}


?>