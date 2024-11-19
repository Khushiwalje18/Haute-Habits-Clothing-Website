<?php
//include('./includes/connect.php');

//getting products on homepage
function getproducts(){
    global $connect;

    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['gender'])){
    $select_query="SELECT * FROM `product` order by rand() limit 0,16";
   $result_query=mysqli_query($connect,$select_query);
  //  $row=mysqli_fetch_assoc($result_query);
  //  echo $row['product_title'];
   while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $gender_id=$row['gender_id'];
    echo "<div class='col-md-4 mb-2' style='width: 18rem;'>
    <div class='card' style='height: 530px;'>
        <img src='./admin area/product-images/$product_image1' class='card-img-top' alt='$product_title' >
        <div class='card-body'>
          <h5 class='card-title' style='font-size: 15px;'>$product_title</h5>
          <p class='card-text' style='font-size: 15px;'>Price: <i class='bi bi-currency-rupee'></i>$product_price/-</p>
          <div>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-primary' style='background-color:white; border:none;'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-bag-heart' viewBox='0 0 16 16' style='color:rgb(19,61,31);'>
          <path fill-rule='evenodd' d='M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z' />
              </svg></a>
          <a href='product-details.php?product_id=$product_id' class='btn btn-primary' style='background-color:white; border:1px solid rgb(19,61,31); color:rgb(19,61,31);'>Quick view</a>
        </div>        
          </div>
    </div>
  </div>";
   }
}
}
}

//displaying all products
function get_all_product(){
    global $connect;

    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['gender'])){
    $select_query="SELECT * FROM `product` order by rand()";
   $result_query=mysqli_query($connect,$select_query);
  //  $row=mysqli_fetch_assoc($result_query);
  //  echo $row['product_title'];
   while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $gender_id=$row['gender_id'];
    echo "<div class='col-md-4 mb-2' style='width: 18rem;'>
    <div class='card' style='height: 530px;'>
        <img src='./admin area/product-images/$product_image1' class='card-img-top' alt='$product_title' >
        <div class='card-body'>
          <h5 class='card-title' style='font-size: 15px;'>$product_title</h5>
          <p class='card-text' style='font-size: 15px;'>Price: <i class='bi bi-currency-rupee'></i>$product_price/-</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-primary' style='background-color:white; border:none;'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-bag-heart' viewBox='0 0 16 16' style='color:rgb(19,61,31);'>
          <path fill-rule='evenodd' d='M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z' />
              </svg></a>
              <a href='product-details.php?product_id=$product_id' class='btn btn-primary' style='background-color:white; border:1px solid rgb(19,61,31); color:rgb(19,61,31);'>Quick view</a>
        </div>
    </div>
  </div>";
   }
}
}
}




//getting unique categories
function getunique_categories(){
    global $connect;

    //condition to check isset or not
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
    $select_query="SELECT * FROM `product` WHERE category_id=$category_id";
   $result_query=mysqli_query($connect,$select_query);
   $num_of_rows=mysqli_num_rows($result_query);
   if($num_of_rows==0){
    echo "<h2 class='text-center text-success'>Out of Stock, Sorry!</h2><h4 class='text-center text-success'>Try to explore something more pretty and chick</h4>";
   }
   while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $gender_id=$row['gender_id'];
    echo "<div class='col-md-4 mb-2' style='width: 18rem;'>
    <div class='card' style='height: 530px;'>
        <img src='./admin area/product-images/$product_image1' class='card-img-top' alt='$product_title' >
        <div class='card-body'>
          <h5 class='card-title' style='font-size: 15px;'>$product_title</h5>
          <p class='card-text' style='font-size: 15px;'>Price: <i class='bi bi-currency-rupee'></i>$product_price/-</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-primary' style='background-color:white; border:none;'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-bag-heart' viewBox='0 0 16 16' style='color:rgb(19,61,31);'>
          <path fill-rule='evenodd' d='M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z' />
              </svg></a>
          <a href='product-details.php?product_id=$product_id' class='btn btn-primary' style='background-color:white; border:1px solid rgb(19,61,31); color:rgb(19,61,31);'>Quick view</a>
        </div>
    </div>
  </div>";
   }
}
}

//getting unique gender
function getunique_gender(){
    global $connect;

    //condition to check isset or not
    if(isset($_GET['gender'])){
        $gender_id=$_GET['gender'];
    $select_query="SELECT * FROM `product` WHERE gender_id=$gender_id";
   $result_query=mysqli_query($connect,$select_query);
   $num_of_rows=mysqli_num_rows($result_query);
   if($num_of_rows==0){
    echo "<h2 class='text-center text-success'>Out of Stock, Sorry!</h2><h4 class='text-center text-success'>Try to explore something more pretty and chick</h4>";
   }
   while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $gender_id=$row['gender_id'];
    echo "<div class='col-md-4 mb-2' style='width: 18rem;'>
    <div class='card' style='height: 530px;'>
        <img src='./admin area/product-images/$product_image1' class='card-img-top' alt='$product_title' >
        <div class='card-body'>
          <h5 class='card-title' style='font-size: 15px;'>$product_title</h5>
          <p class='card-text' style='font-size: 15px;'>Price: <i class='bi bi-currency-rupee'></i>$product_price/-</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-primary' style='background-color:white; border:none;'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-bag-heart' viewBox='0 0 16 16' style='color:rgb(19,61,31);'>
          <path fill-rule='evenodd' d='M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z' />
              </svg></a>
              <a href='product-details.php?product_id=$product_id' class='btn btn-primary' style='background-color:white; border:1px solid rgb(19,61,31); color:rgb(19,61,31);'>Quick view</a>
        </div>
    </div>
  </div>";
   }
}
}



//displaying gender in side nav
function getgender(){
    global $connect;
    $select_gender="SELECT * FROM `gender`";
            $result_gender=mysqli_query($connect,$select_gender);
            // $row_data=mysqli_fetch_assoc($result_gender);
            // echo $row_data['gender_title'];

            while($row_data=mysqli_fetch_assoc($result_gender)){
              $gender_title=$row_data['gender_title'];
              $gender_id=$row_data['gender_id'];
              echo "<li class='nav-item' >
              <a href='index.php?gender=$gender_id' class='nav-link' style='color:rgb(19,61,31);'>$gender_title</a>
          </li>";
            }
}

//displaying category in side nav
function getcategory(){
    global $connect;
    $select_category="SELECT * FROM `category`";
    $result_category=mysqli_query($connect,$select_category);
    // $row_data=mysqli_fetch_assoc($result_gender);
    // echo $row_data['gender_title'];

    while($row_data=mysqli_fetch_assoc($result_category)){
    $category_title=$row_data['category_title'];
    $category_id=$row_data['category_id'];
    echo "<li class='nav-item' >
    <a href='index.php?category=$category_id' class='nav-link' style='color:rgb(19,61,31);'>$category_title</a>
    </li>";
    }
}


//searching products
function search_product(){
    global $connect;

    if(isset($_GET['search_data_product'])){
            $search_data_value=$_GET['search_data'];
    $search_query="SELECT * FROM `product` WHERE product_keywords LIKE '%$search_data_value%'  ";
   $result_query=mysqli_query($connect,$search_query);
  //  $row=mysqli_fetch_assoc($result_query);
  //  echo $row['product_title'];
  $num_of_rows=mysqli_num_rows($result_query);
   if($num_of_rows==0){
    echo "<h2 class='text-center text-success'>No results match!</h2><h4 class='text-center text-success'>Try to explore something more pretty and chick</h4>";
   }
   while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $gender_id=$row['gender_id'];
    echo "<div class='col-md-4 mb-2' style='width: 18rem;'>
    <div class='card' style='height: 530px;'>
        <img src='./admin area/product-images/$product_image1' class='card-img-top' alt='$product_title' >
        <div class='card-body'>
          <h5 class='card-title' style='font-size: 15px;'>$product_title</h5>
          <p class='card-text' style='font-size: 15px;'>Price: <i class='bi bi-currency-rupee'></i>$product_price/-</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-primary' style='background-color:white; border:none;'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-bag-heart' viewBox='0 0 16 16' style='color:rgb(19,61,31);'>
          <path fill-rule='evenodd' d='M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z' />
              </svg></a>
              <a href='product-details.php?product_id=$product_id' class='btn btn-primary' style='background-color:white; border:1px solid rgb(19,61,31); color:rgb(19,61,31);'>Quick view</a>
        </div>
    </div>
  </div>";
   }
}
}


//view details function
function view_details(){
    global $connect;

    //condition to check isset or not
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['gender'])){
            $product_id=$_GET['product_id'];
    $select_query="SELECT * FROM `product` WHERE product_id=$product_id";
   $result_query=mysqli_query($connect,$select_query);
 
   while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_image4=$row['product_image4'];
    $product_description=$row['product_description'];
    $product_material=$row['product_material'];
    $product_care=$row['product_care'];
    $product_model=$row['model_description'];
    $product_price=$row['product_price'];
    $gender_id=$row['gender_id'];
    echo "<div class='col-md-4 mb-2' style='width: 18rem;'>
    <div class='card' style='height: 530px;'>
        <img src='./admin area/product-images/$product_image1' class='card-img-top' alt='$product_title' >
        <div class='card-body'>
          <h5 class='card-title' style='font-size: 15px;'>$product_title</h5>
          <p class='card-text' style='font-size: 15px;'>Price: <i class='bi bi-currency-rupee'></i>$product_price/-</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-primary' style='background-color:white; border:none;'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-bag-heart' viewBox='0 0 16 16' style='color:rgb(19,61,31);'>
          <path fill-rule='evenodd' d='M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z' />
              </svg></a>
          <a href='index.php' class='btn btn-primary' style='background-color:white; border:1px solid rgb(19,61,31); color:rgb(19,61,31);'>Go Home</a>
        </div>
    </div>
  </div>
  <div class='col-md-9'>
            <!-- realted data-->
            <div class='row'>
                <div class='col-md-12'></div>

                <div class='col-md-4'>
                    <img src='./admin area/product-images/$product_image2' class='card-img-top mb-2' alt='...'>
                </div> 
                <div class='col-md-4'>
                    <img src='./admin area/product-images/$product_image3' class='card-img-top mb-2' alt='...'>
                </div>
                 
                <div class='col-md-4'>
                    <img src='./admin area/product-images/$product_image4' class='card-img-top mb-2' alt='...'>
                </div>
            </div>
            <div class='col-md-12'>
            <h5>Detailed description:</h5>
            <h6 class='fw-normal'>$product_description</h6>
            <h5>Material:</h5>
            <h6 class='fw-normal'>$product_material</h6>
            </div>
            <h5>Care:</h5>
            <h6 class='fw-normal'>$product_care</h6>
            <h5>Model:</h5>
            <h6 class='fw-normal'>$product_model</h6>
 </div>";
   }
}
}
}
}

//getting ip address
function getIPAddress(){  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


//cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $connect; 
        $ip =getIPAddress();
        $get_product_id=$_GET['add_to_cart'];

        $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip' and product_id=$get_product_id";
       $result_query=mysqli_query($connect,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
   if($num_of_rows>0){
    echo "<script>alert('This product already present in cart')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    }else{
        $insert_query="INSERT INTO `cart_details` (product_id,ip_address,quantity) VALUES ($get_product_id,'$ip',0)";
        $result_query=mysqli_query($connect,$insert_query);
        echo "<script>alert('Product added to cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
}

//function to get number of products in cart
 function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $connect; 
        $ip =getIPAddress();
       

        $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
       $result_query=mysqli_query($connect,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }else{
    global $connect; 
    $ip =getIPAddress();
   

    $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
   $result_query=mysqli_query($connect,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    
}
echo $count_cart_items;
 }

 //totalprice function
 function total_amount(){
    global $connect;
    $ip =getIPAddress();
    $total_price=0;
    $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
    $result_query=mysqli_query($connect,$cart_query);
    while($row=mysqli_fetch_array($result_query)){
        $product_id=$row['product_id'];
        $select_products="SELECT * FROM `product` WHERE product_id='$product_id'";
        $result_product=mysqli_query($connect,$select_products);
        while($row_product_price=mysqli_fetch_array($result_product)){
            $product_price=array($row_product_price['product_price']);
            $product_value=array_sum($product_price);
            $total_price+=$product_value;
        }
    }
    echo $total_price;
 }

 //function for get user order details
 function get_user_order_details(){
    global $connect;
    $username=$_SESSION['username'];
    $get_details="SELECT * FROM `user_details` WHERE username='$username'";
    $result_query=mysqli_query($connect,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="SELECT * FROM `user_orders` WHERE user_id=$user_id AND order_status='Pending'";
                    $result_orders_query=mysqli_query($connect,$get_orders);
                    $row_count=mysqli_num_rows($result_orders_query);
                    if($row_count>0){
                        echo "<h3 class='text-center mt-5 mb-3' style='color:rgb(19,61,31);'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                        <p class='text-center'><a href='profile.php?my_orders' style='color:rgb(19,61,31);'>More Details</a></p>";
                    }else{
                        echo "<h3 class='text-center mt-5 mb-3' style='color:rgb(19,61,31);'>No pending orders</h3>
                        <p class='text-center'><a href='../index.php' style='color:rgb(19,61,31);'>Explore new products</a></p>";
                    }
                }
            }
        } 
    }
 }
?>