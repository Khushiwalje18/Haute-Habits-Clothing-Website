<?php
    if(isset($_GET['edit_category'])){
        $edit_category=$_GET['edit_category'];
    
        $get_category="SELECT * FROM `category` WHERE category_id=$edit_category";
        $result_category=mysqli_query($connect,$get_category);
        $row=mysqli_fetch_assoc($result_category);
        $category_title=$row['category_title'];
        // echo $category_title;
    }

    if(isset($_POST['edit_cat'])){
        $cat_title=$_POST['category_title'];

        $update_cat="UPDATE `category` SET category_title='$cat_title' WHERE category_id=$edit_category";
        $result_update=mysqli_query($connect,$update_cat);
        if($result_update){
            echo "<script>alert('Category updated successfully')</script>";
            echo "<script>window.open('./index.php?view_categories.php','_self')</script>";
        }
    }



?>




<div class="container mt-3">
    <h3 class="text-center" style="color:rgb(19,61,31)l">Edit category</h3>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4">
            <label for="category_title" class="form-label">Category title</label>
            <input type="text"  value ="<?php echo $category_title ?>" name="category_title" id="category_title" class="form-control w-50 m-auto" required="required">
        </div>
        <input type="submit" name="edit_cat" value="Update category" class="btn px-3 mb-3" style="background-color:rgb(19,61,31); color:white;" >
    </form>
</div>
