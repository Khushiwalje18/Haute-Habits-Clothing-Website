<h3 class="text-center" style="color:rgb(19,61,31);">All payments</h3>
<table class="table table-bpaymented mt-5">
    <thead style="background-color:rgb(19,61,31); color:white;" class="text-center">
        <?php
            $get_payments="SELECT * FROM `user_payments`";
            $result_payments=mysqli_query($connect,$get_payments);
            $count_payments=mysqli_num_rows($result_payments);
            

    if($count_payments==0){
        echo "<h2 class='text-center mt-5' style='color:red;'>No Payments yet</h2>";
    }else{
            
                echo "
                <tr>
                  <th>Sr.no</th>
                  <th>Invoice number</th>
                  <th>Amount</th>
                  <th>Payment mode</th>
                  <th>Order date</th>
                  <th>delete</th>
                </tr>
                </thead>
                <tbody class='bg-light text-dark text-center'>";
                $number=0;
            while($row_payment_data=mysqli_fetch_assoc($result_payments)){
                $order_id=$row_payment_data['order_id'];
                $payment_id=$row_payment_data['payment_id'];
                $invoice_number=$row_payment_data['invoice_number'];
                $amount=$row_payment_data['amount'];
                $payment_mode=$row_payment_data['payment_mode'];
                $order_date=$row_payment_data['date'];
                $number++;
                echo "
                <tr>
                  <td>$number</td>
                  <td>$invoice_number</td>
                  <td>$amount</td>
                  <td>$payment_mode</td>
                  <td>$order_date</td>
                  <td><a href='index.php?delete_payment=<?php echo $payment_id ?>'  type='button' class='text-dark' data-toggle='modal'
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_payments.php" class="text-light text-decoration-none" >NO</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_payment=<?php echo $payment_id?>'
         class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>

