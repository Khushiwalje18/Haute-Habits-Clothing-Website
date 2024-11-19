<?php

if(isset($_GET['delete_gender'])){
    $delete_gender=$_GET['delete_gender'];
    // echo $delete_gender;

    $delete_query_gen="DELETE FROM `gender` WHERE gender_id=$delete_gender";
    $result_delete_gen=mysqli_query($connect,$delete_query_gen);
    if($result_delete_gen){
        echo "<script>alert('Gender deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_genders','_self')</script>";
    }
}


?>