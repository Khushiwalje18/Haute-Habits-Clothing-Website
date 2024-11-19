<?php
if(isset($_POST['admin_register'])){
    $admin_username=$_POST['username'];
    $admin_email=$_POST['email'];
    $admin_password=$_POST['password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $confirm_admin_password=$_POST['confirm_pass'];
   
    
    //select query
    $select_query="SELECT * FROM `admin_details` WHERE admin_username='$admin_username' or admin_email='$admin_email'";
    $result_admin=mysqli_query($connect,$select_query);
    $rows_count=mysqli_num_rows($admin_result);
    if($rows_count>0){
        echo "<script>alert('Sorry, Username and email already exists')</script>";
    }else if($admin_password!=$confirm_admin_password){
        echo "<script>alert('Passwords do not match')</script>";
    }else{
    //insert query
    $insert_query_admin="INSERT INTO `admin_details` (admin_username,admin_email,admin_password)
    VALUES ('$admin_username','$admin_email','$hash_password')";
    $sql_execute_admin=mysqli_query($connect,$insert_query_admin);
    if($sql_execute_admin){
        echo "<script>alert('Congratulations, Account created successfully.')</script>";
    }else{
        die(mysqli_error($connect));
    }
}
}
?>

<?php
    if(isset($_POST['admin_login'])){
        $admin_username=$_POST['admin_username'];
        $admin_password=$_POST['admin_password'];
        
        $select_query="SELECT * FROM `user_details` WHERE admin_username='$admin_username'";
        $result=mysqli_query($connect,$select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_array($result);
        $user_ip=getIPAddress();
        



        //cart item
        // $select_query_cart="SELECT * FROM `cart_details` WHERE ip_address";
        // $select_cart=mysqli_query($connect,$select_query_cart);
        // $row_count_cart=mysqli_num_rows($select_cart);
        if($row_count>0){
            $_SESSION['username']=$admin_username;
            if(password_verify($admin_password,$row_data['admin_password'])){
                // echo "<script>alert('Login Successful')</script>";
                    echo "<script>alert('Login Successful')</script>";
                    echo "<script>window.open('./index.php','_self')</script>";
                }else{
                echo "<script>alert('Invalid Credentials')</script>";
            }
       }
    }

?>


<?php
    if(isset($_POST['admin_login'])){
        $admin_username=$_POST['admin_username'];
        $admin_password=$_POST['admin_password'];
        
        $select_query="SELECT * FROM `user_details` WHERE admin_username='$admin_username'";
        $result=mysqli_query($connect,$select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_array($result);
        $user_ip=getIPAddress();
        



        //cart item
        $select_query_cart="SELECT * FROM `cart_details` WHERE ip_address";
        $select_cart=mysqli_query($connect,$select_query_cart);
        $row_count_cart=mysqli_num_rows($select_cart);
        if($row_count>0){
            $_SESSION['username']=$user_username;
            if(password_verify($user_password,$row_data['user_password'])){
                // echo "<script>alert('Login Successful')</script>";
                if($row_count==1 and $row_count_cart==0){
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('Login Successful')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                }else{
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('Login Successful')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            }else{
                echo "<script>alert('Invalid Credentials')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }


?>