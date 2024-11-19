<?php

if(isset($_GET['delete_contact_data'])){
    $delete_contact_data=$_GET['delete_contact_data'];
    // echo $delete_contact_data;

    $delete_query_contact_data="DELETE FROM `contact_details` WHERE contact_id=$delete_contact_data";
    $result_delete_contact_data=mysqli_query($connect,$delete_query_contact_data);
    if($result_delete_contact_data){
        echo "<script>alert('Deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_contact_data.php','_self')</script>";
    }
}


?>