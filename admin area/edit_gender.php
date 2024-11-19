<?php
    if(isset($_GET['edit_gender'])){
        $edit_gender=$_GET['edit_gender'];
    
        $get_gender="SELECT * FROM `gender` WHERE gender_id=$edit_gender";
        $result_gender=mysqli_query($connect,$get_gender);
        $row_gender=mysqli_fetch_assoc($result_gender);
        $gender_title=$row_gender['gender_title'];
        // echo $gender_title;
    }

    if(isset($_POST['edit_gen'])){
        $gen_title=$_POST['gender_title'];

        $update_gen="UPDATE `gender` SET gender_title='$gen_title' WHERE gender_id=$edit_gender";
        $result_update_gen=mysqli_query($connect,$update_gen);
        if($result_update_gen){
            echo "<script>alert('gender updated successfully')</script>";
            echo "<script>window.open('./index.php?view_genders.php','_self')</script>";
        }
    }



?>

<div class="container mt-3">
    <h3 class="text-center" style="color:rgb(19,61,31)l">Edit gender</h3>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4">
            <label for="gender_title" class="form-label">Gender title</label>
            <input type="text" value="<?php echo $gender_title ?>" name="gender_title" id="gender_title" class="form-control w-50 m-auto" required="required">
        </div>
        <input type="submit" name="edit_gen" value="Update gender" class="btn px-3 mb-3" style="background-color:rgb(19,61,31); color:white;" >
    </form>
</div>