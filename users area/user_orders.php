
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$username=$_SESSION['username'];
$get_user="SELECT * FROM `user_details` WHERE username='$username'";
$result=mysqli_query($connect,$get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];
// echo $user_id;


?>
<h3 style="color:rgb(19,61,31);">My Orders</h3>
<table class="table table-bordered mt-5" >
    <thead style="background-color:rgb(19,61,31); color:white;">
        <tr>
            <th>Sr. no</th>
            <!-- <th>Order number</th> -->
            <th>Amount Due</th>
            <th>Total products</th>
            <th>Invoice number</th>
            <th>Date</th>
            <th>Payment</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $get_oder_details="SELECT * FROM `user_orders` WHERE user_id=$user_id";
        $result_orders=mysqli_query($connect,$get_oder_details);
        $number=1;
        while($row_orders=mysqli_fetch_assoc($result_orders)){
            $order_id=$row_orders['order_id'];
            $amount_due=$row_orders['amount_due'];
            $total_products=$row_orders['total_products'];
            $invoice_number=$row_orders['invoice_number'];
            $order_date=$row_orders['order_date'];
            $order_status=$row_orders['order_status'];
            if($order_status=='Pending'){
                $order_status='Incomplete';
            }else{
                $order_status='Complete';
            }
            echo "<tr>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$total_products</td>
                    <td>$invoice_number</td>
                    <td>$order_date</td>
                    <td>$order_status</td>";
                    ?>
                    <?php
                    if($order_status=='Complete'){
                        echo "<td>Paid</td>";
                    }else{
                         echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-dark'>Confirm</a></td>
                        </tr>";
                    }
            $number++;
        }
        ?>
    </tbody>
</table>
</body>
</html>