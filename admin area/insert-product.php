<?php 
include('../includes/connect.php');


if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_desc'];
    $product_keywords=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_gender=$_POST['product_gender'];
    $product_material=$_POST['product_material'];
    $product_care=$_POST['product_care'];
    $product_model=$_POST['product_model'];
    $product_price=$_POST['product_price'];
    $product_status='true';

     //accessing images
     $product_image1=$_FILES['product_image1']['name'];
     $product_image2=$_FILES['product_image2']['name'];  
     $product_image3=$_FILES['product_image3']['name'];  
     $product_image4=$_FILES['product_image4']['name'];      
 

    //accessing image temp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];  
    $temp_image3=$_FILES['product_image3']['tmp_name'];  
    $temp_image4=$_FILES['product_image4']['tmp_name']; 

    //checking required condition
    if($product_title=='' or $product_description=='' 
    or $product_keywords=='' or $product_category=='' 
    or $product_gender=='' or $product_material=='' 
    or $product_care=='' or $product_model=='' or 
    $product_price=='' or $product_image1=='' or 
    $product_image2=='' or $product_image3=='' or 
    $product_image4=='' ){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product-images/$product_image1");
        move_uploaded_file($temp_image2,"./product-images/$product_image2");
        move_uploaded_file($temp_image3,"./product-images/$product_image3");
        move_uploaded_file($temp_image4,"./product-images/$product_image4");

       //inserting products in database
       $insert_product="insert into `product` (product_title,product_description,product_keywords,category_id,
       gender_id,product_image1,product_image2,product_image3,product_image4,
       product_material,product_care,model_description,product_price,date,status) 
       values ('$product_title','$product_description','$product_keywords',
       '$product_category','$product_gender',
       '$product_image1','$product_image2','$product_image3',
       '$product_image4',
       '$product_material', '$product_care', '$product_model', 
       '$product_price',NOW(),
       '$product_status')";
       $result_query=mysqli_query($connect,$insert_product);
       if($result_query){
           echo "<script>alert('Product successfully inserted')</script>";
       }
    } 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert products- Admin Dashboard</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- css file -->
    <link rel="stylesheet" href="../style1.css">
</head>
<body class="bg-light">
    <div class="container">
        <h1 class="text-center mt-3">Insert Product</h1>
        <!-- insert products form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!--title  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_desc" class="form-label">Product description</label>
                <input type="text" name="product_desc" id="product_desc" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>
            <!--  keywords-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product keywords</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>
            <!-- category  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select category</option>

                    <?php
                    $select_query="SELECT * FROM `category`";
                    $result_query=mysqli_query($connect,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }

                    ?>

                </select>
            </div>
            <!-- gender -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_gender" id="" class="form-select">          
                    <option value="">select Gender</option>
                    
                    
                    <?php
                        $select_query="SELECT * FROM `gender`";
                        $result_query=mysqli_query($connect,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $gender_title=$row['gender_title'];
                            $gender_id=$row['gender_id'];
                            echo "<option value='$gender_id'>$gender_title</option>";
                        }
                    ?>

                </select>
            </div>
            <!--  image 1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
            <!--  image 2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            <!--  image 3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
            <!--  image 4-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image4" class="form-label">Product image4</label>
                <input type="file" name="product_image4" id="product_image4" class="form-control" required="required">
            </div>
            <!-- material-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_material" class="form-label">Product material</label>
                <input type="text" name="product_material" id="product_material" class="form-control" placeholder="Enter product material" autocomplete="off" required="required">
            </div>
            <!-- care -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_care" class="form-label">Product care</label>
                <input type="text" name="product_care" id="product_care" class="form-control" placeholder="Enter product care" autocomplete="off" required="required">
            </div>
            <!-- model-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_model" class="form-label">Model description</label>
                <input type="text" name="product_model" id="product_model" class="form-control" placeholder="Enter model description" autocomplete="off" required="required">
            </div>
            <!-- price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <!-- submitting data-->
            <div class="form-outline mb-4 w-50 m-auto">
               <input type="submit" name="insert_product" class="b-0 p-2 my-2" style="background-color:smokewhite; color:rgb(19,61,31);" value="Insert product">
            </div>
        </form>

        
    </div>
    
</body>
</html>