
<h3 style="color:rgb(19,61,31);" class="mb-4">Delete Account</h3>
    <form class="mt-5" action="" method="post">
        <div class="form-outline mb-4">
            <input type="submit" value="Delete My Account" name="delete" class="form-control m-auto w-50" >
        </div>
        <div class="form-outline mb-4">
            <input type="submit" value="Go Back " name="dont_delete" class="form-control m-auto w-50" >
        </div>
    </form>


<?php
$unsername_session=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query="DELETE FROM `user_details` WHERE username='$unsername_session'";
    $result_delete=mysqli_query($connect,$delete_query);
    if($result_delete){
        session_destroy();
        echo "<script>alert('Account deleted successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

if(isset($_POST['dont_delete'])){
    echo "<script>window.open('profile.php')</script>";
}

?>