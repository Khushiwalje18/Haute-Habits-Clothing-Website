<h3 class="text-center" style="color:rgb(19,61,31);">Categories</h3>
<table class="table table-bordered mt-5">
    <thead style="background-color:rgb(19,61,31); color:white;">
        <tr class="text-center">
            <th>Sr.no</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-light text-dark text-center">
        <?php
            $select_cat="SELECT * FROM `category`";
            $result_cat=mysqli_query($connect,$select_cat);
            $number=0;
            while($row_cat=mysqli_fetch_assoc($result_cat)){
                $category_id=$row_cat['category_id'];
                $category_title=$row_cat['category_title'];
                $number++;
        ?>
        <tr>
            <td><?php echo $number ?></td>
            <td><?php echo $category_title ?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id ?>'  type="button" class="text-dark" data-toggle="modal" data-target="#exampleModalLong" ><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_products.php" class="text-light text-decoration-none" >NO</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_category=<?php echo $category_id ?>'
         class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>