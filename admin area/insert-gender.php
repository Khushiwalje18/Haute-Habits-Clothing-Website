<?php 
include('../includes/connect.php');

if(isset($_POST['insert-gen'])){
    $gender_title=$_POST['g_title'];


    //select from data base
    $select_query="SELECT * FROM `gender` WHERE gender_title='$gender_title'";
    $result_select=mysqli_query($connect,$select_query);
    $number=mysqli_num_rows($result_select);

    if($number>0){
        echo "<script>alert('Gender already present')</script>";
    }else{
    
    $insert_query="INSERT INTO `gender` (gender_title) VALUES('$gender_title')";
    $result=mysqli_query($connect,$insert_query);
    if($result){
        echo "<script>alert('Gender has been inserted successfully')</script>";
    }
    }}
?>


<h2 class="text-center">Insert Gender</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control"  name="g_title" placeholder="Insert gender" aria-label="Genders" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-3">

<input type="submit" class="b-0 p-2 my-2" style="background-color:smokewhite; color:rgb(19,61,31);" name="insert-gen" value="Insert gender">

</div>
</form> 