<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3 class="text-center" style="color:rgb(19,61,31);">All products</h3>
<table class="table table-bordered mt-5">
    <thead class="text-center" style="background-color:rgb(19,61,31); color:white;">
        <th>Product ID</th>
        <th>Product Title</th>
        <th>Product view</th>
        <th>Product Price</th>
        <th>Total Sold</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody class="bg-light text-dark">
        <?php
            $get_products="SELECT * FROM `product`";
            $result_product=mysqli_query($connect,$get_products);
            $number=0;
            while($row_products=mysqli_fetch_assoc($result_product)){
                $product_id=$row_products['product_id'];
                $product_title=$row_products['product_title'];
                $product_image1=$row_products['product_image1'];
                $product_price=$row_products['product_price'];
                $status=$row_products['status'];
                $number++;
                ?>
                <tr class='text-center'>
                        <td><?php echo $number ?></td>
                        <td><?php echo $product_title ?></td>
                        <td><img src='./product-images/<?php echo $product_image1 ?>' style='width:100px; height:200;'></td>
                        <td><?php echo $product_price ?>/-</td>
                        <td>
                            <?php
                                $get_count="SELECT * FROM `pending_orders` WHERE product_id=$product_id";
                                $result_count=mysqli_query($connect,$get_count);
                                $rows_count=mysqli_num_rows($result_count);
                                echo $rows_count;
                            ?>
                        </td>
                        <td><?php echo $status ?></td>
                        <td><a href='index.php?edit_products=<?php echo $product_id?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a href='index.php?delete_product=<?php echo $product_id?>'  type="button" class="text-dark" data-toggle="modal" data-target="#exampleModalLong" > <i class='fa-solid fa-trash'></i></a></td>
                </tr>
        <?php   
            }
        ?>

    </tbody>
</table>
</body>
</html>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_products.php" class="text-light text-decoration-none" >NO</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_product=<?php echo $product_id?>'
         class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>