<h3 class="text-center" style="color:rgb(19,61,31);">All orders</h3>
<table class="table table-bordered mt-5">
    <thead style="background-color:rgb(19,61,31); color:white;" class="text-center">
        <?php
            $get_orders="SELECT * FROM `user_orders`";
            $result_orders=mysqli_query($connect,$get_orders);
            $count_orders=mysqli_num_rows($result_orders);
            

    if($count_orders==0){
        echo "<h2 class='text-center mt-5' style='color:red;'>No orders yet</h2>";
    }else{
            $number=0;
           
                echo "
                <tr>
                  <th>Sr.no</th>
                  <th>Due Amount</th>
                  <th>Invoice number</th>
                  <th>Total products</th>
                  <th>Order date</th>
                  <th>Status</th>
                  <th>delete</th>
                </tr>
                </thead>
                <tbody class='bg-light text-dark text-center'>";
                $number=0;
            while($row_order_data=mysqli_fetch_assoc($result_orders)){
                $order_id=$row_order_data['order_id'];
                $user_id=$row_order_data['user_id'];
                $amount_due=$row_order_data['amount_due'];
                $invoice_number=$row_order_data['invoice_number'];
                $total_products=$row_order_data['total_products'];
                $order_date=$row_order_data['order_date'];
                $order_status=$row_order_data['order_status'];
                $number++;
                echo "
                <tr>
                  <td>$number</td>
                  <td>$amount_due</td>
                  <td>$invoice_number</td>
                  <td>$total_products</td>
                  <td>$order_date</td>
                  <td>$order_status</td>
                  <td><a href='index.php?delete_order=<?php echo $order_id ?>'  type='button' class='text-dark' data-toggle='modal'
                  data-target='#exampleModalLong' ><i class='fa-solid fa-trash'></i></a></td>";
            }
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_orders.php" class="text-light text-decoration-none" >NO</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_order=<?php echo $order_id?>'
         class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>

