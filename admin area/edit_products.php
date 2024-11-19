<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    // echo $edit_id;
    $get_data="SELECT * FROM `product` WHERE product_id=$edit_id";
    $result_data=mysqli_query($connect,$get_data);
    $row_edit=mysqli_fetch_assoc($result_data);
    $product_title=$row_edit['product_title'];
    $product_description=$row_edit['product_description'];
    $product_keywords=$row_edit['product_keywords'];
    $category_id=$row_edit['category_id'];
    $gender_id=$row_edit['gender_id'];
    $product_image1=$row_edit['product_image1'];
    $product_image2=$row_edit['product_image2'];
    $product_image3=$row_edit['product_image3'];
    $product_image4=$row_edit['product_image4'];
    $product_material=$row_edit['product_material'];
    $product_care=$row_edit['product_care'];
    $model_description=$row_edit['model_description'];
    $product_price=$row_edit['product_price'];
    // echo $product_title;

    //fetching category name
    $select_category="SELECT * FROM `category` WHERE category_id=$category_id";
    $result_category=mysqli_query($connect,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];

    
    //fetching gender name
    $select_gender="SELECT * FROM `gender` WHERE gender_id=$gender_id";
    $result_gender=mysqli_query($connect,$select_gender);
    $row_gender=mysqli_fetch_assoc($result_gender);
    $gender_title=$row_gender['gender_title'];  
}



?>

<div class="container mt-5">
    <h3 class="text-center" style="color:rgb(19,61,31);">Edit Product</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" id="product_title" value="<?php  echo $product_title;?>"  name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product description</label>
            <input type="text" id="product_description" value="<?php echo $product_description; ?>" name="product_description" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product keywords</label>
            <input type="text" id="product_keywords" value="<?php echo $product_keywords ?>" name="product_keywords" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product category</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_title; ?>"><?php echo $category_title; ?></option>
                <?php
                    //fetching category name
                    $select_category_all="SELECT * FROM `category`";
                    $result_category_all=mysqli_query($connect,$select_category_all);
                    while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                        
                        $category_title=$row_category_all['category_title'];
                        $category_id=$row_category_all['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_gender" class="form-label">Gender</label>
            <select name="product_gender" class="form-select">
                <option value="<?php echo $gender_title; ?>"> <?php echo $gender_title; ?> </option>
                <?php
                    //fetching category name
                    $select_gender_all="SELECT * FROM `gender`";
                    $result_gender_all=mysqli_query($connect,$select_gender_all);
                    while($row_gender_all=mysqli_fetch_assoc($result_gender_all)){
                        
                        $gender_title=$row_gender_all['gender_title'];
                        $gender_id=$row_gender_all['gender_id'];
                        echo "<option value='$gender_id'>$gender_title</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product image 1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
            <img src="../admin area/product-images/<?php echo $product_image1; ?>" style="width:150px; height:250px; object-fit:contain;" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product image 2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
            <img src="../admin area/product-images/<?php echo $product_image2; ?>" style="width:150px; height:250px; object-fit:contain;" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product image 3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required="required">
            <img src="../admin area/product-images/<?php echo $product_image3; ?>" style="width:150px; height:250px; object-fit:contain;" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image4" class="form-label">Product image 4</label>
            <div class="d-flex">
            <input type="file" id="product_image4" name="product_image4" class="form-control w-90 m-auto" required="required">
            <img src="../admin area/product-images/<?php echo $product_image4; ?>" style="width:150px; height:250px; object-fit:contain;" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_material" class="form-label">Product material</label>
            <input type="text" id="product_material" value="<?php echo $product_material ?>" name="product_material" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_care" class="form-label">Product care</label>
            <input type="text" id="product_care" value="<?php echo $product_care ?>" name="product_care" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="model_description" class="form-label">Model description</label>
            <input type="text" id="model_description" value="<?php echo $model_description ?>" name="model_description" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product price</label>
            <input type="text" id="product_price"  value="<?php echo $product_price ?>" name="product_price" class="form-control" required="required">
        </div>

        <div class="text-center">
            <input type="submit" name="edit_product" value="Update Product" class="btn px-3 mb-3" style="background-color:rgb(19,61,31); color:white;">
        </div>

    </form>
</div>

<?php
//editing products

if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $producr_gender=$_POST['product_gender'];
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    $product_image4=$_FILES['product_image4']['name'];
    $product_material=$_POST['product_material'];
    $product_care=$_POST['product_care'];
    $model_description=$_POST['model_description'];
    $product_price=$_POST['product_price'];

    $temp_product_image1=$_FILES['product_image1']['tmp_name'];
    $temp_product_image2=$_FILES['product_image2']['tmp_name'];
    $temp_product_image3=$_FILES['product_image3']['tmp_name'];
    $temp_product_image4=$_FILES['product_image4']['tmp_name'];
    
    move_uploaded_file($temp_product_image1,"./product-images/$product_image1");
    move_uploaded_file($temp_product_image2,"./product-images/$product_image2");
    move_uploaded_file($temp_product_image3,"./product-images/$product_image3");
    move_uploaded_file($temp_product_image4,"./product-images/$product_image4");

    //query to update products
    $update_products="UPDATE `product` SET product_title='$product_title', product_description='$product_description', product_keywords='$product_keywords',
    category_id='$product_category', gender_id='$producr_gender', product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3',
    product_image4='$product_image4', product_material='$product_material', product_care='$product_care', model_description='$model_description', 
    product_price='$product_price', date=NOW() WHERE product_id=$edit_id";
    $result_update=mysqli_query($connect,$update_products);
    if($result_update){
        echo "<script>alert('Product updated successfully')</script>";
        echo "<script>window.open('./index.php?view_products.php','_self')</script>";
    }

}

?>