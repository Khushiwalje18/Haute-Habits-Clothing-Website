<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="SELECT * FROM `user_details` WHERE username='$user_session_name' ";
    $result_query=mysqli_query($connect,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];
}

if(isset($_POST['user_update'])){
    $update_id=$user_id;
    $username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_contact'];
    $user_profile_image=$_FILES['user_image']['name'];
    $user_profile_image_tmp=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_profile_image_tmp,"./user images/$user_profile_image");
    
    //update query
    $update_data="UPDATE `user_details` SET username='$username', user_email='$user_email',
    user_image='$user_profile_image', user_address='$user_address', user_mobile='$user_mobile' WHERE
    user_id=$update_id";
    $result_query_update=mysqli_query($connect,$update_data);
    if($result_query_update){
        echo "<script>alert('Account edited successfully')</script>";
        echo "<script>window.open('logout.php','_self')</script>";
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
</head>
<body>
    <h3 class="text-center mt-5 mb-4" style="color:rgb(19,61,31);">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" value="<?php echo $username ?>" class="form-control w-50 m-auto" name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" value="<?php echo $user_email ?>" class="form-control w-50 m-auto" name="user_email">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image">
            <img src="./user images/<?php echo $user_profile_image?>" class="edit_image" alt="">
        </div>
        <div class="form-outline mb-4">
            <input type="text" value="<?php echo $user_address ?>" class="form-control w-50 m-auto" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" value="<?php echo $user_mobile ?>" class="form-control w-50 m-auto" name="user_contact">
        </div>
        
            <input type="submit" value="Update" class="py-2 px-3 border-1" style="background-color:smokewhite; color:rgb(19,61,31);" name="user_update">
    </form>
</body>
</html>