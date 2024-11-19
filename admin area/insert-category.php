<?php 
include('../includes/connect.php');

if(isset($_POST['insert-cat'])){
    $category_title=$_POST['c_title'];


    //select from data base
    $select_query="SELECT * FROM `category` WHERE category_title='$category_title'";
    $result_select=mysqli_query($connect,$select_query);
    $number=mysqli_num_rows($result_select);

    if($number>0){
        echo "<script>alert('Catgegory already present')</script>";
    }else{
    
    $insert_query="INSERT INTO `category` (category_title) VALUES('$category_title')";
    $result=mysqli_query($connect,$insert_query);
    if($result){
        echo "<script>alert('Catgegory has been inserted successfully')</script>";
    }
    }}
?>


<h2 class="rexr-center">Insert Category</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control"  name="c_title" placeholder="Insert category" aria-label="Categories" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-3">

<input type="submit" class="b-0 p-2 my-2" style="background-color:smokewhite; color:rgb(19,61,31);" name="insert-cat" value="Insert Category">

</div>
</form> 