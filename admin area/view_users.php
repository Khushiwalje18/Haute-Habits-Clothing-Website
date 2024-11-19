<h3 class="text-center" style="color:rgb(19,61,31);">All users</h3>
<table class="table table-bpaymented mt-5">
    <thead style="background-color:rgb(19,61,31); color:white;" class="text-center">
        <?php
            $get_users="SELECT * FROM `user_details`";
            $result_users=mysqli_query($connect,$get_users);
            $count_users=mysqli_num_rows($result_users);
            

    if($count_users==0){
        echo "<h2 class='text-center mt-5' style='color:red;'>No users registered yet</h2>";
    }else{
            
                echo "
                <tr>
                  <th>Sr.no</th>
                  <th>Username</th>
                  <th>User Email</th>
                  <th>User Profile</th>
                  <th>User Address</th>
                  <th>User Mobile</th>
                  <th>delete</th>
                </tr>
                </thead>
                <tbody class='bg-light text-dark text-center'>";
                $number=0;
            while($row_user_data=mysqli_fetch_assoc($result_users)){
                $user_id=$row_user_data['user_id'];
                $username=$row_user_data['username'];
                $user_email=$row_user_data['user_email'];
                $user_image=$row_user_data['user_image'];
                $user_address=$row_user_data['user_address'];
                $user_mobile=$row_user_data['user_mobile'];
                $number++;
                echo "
                <tr>
                  <td>$number</td>
                  <td>$username</td>
                  <td>$user_email</td>
                  <td><img src='../users area/user images/$user_image' style='width:100px; height:200px; object-fit:contain; '></td>
                  <td>$user_address</td>
                  <td>$user_mobile</td>
                  <td><a href='index.php?delete_payment=<?php echo $user_id ?>'  type='button' class='text-dark' data-toggle='modal'
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_users.php" class="text-light text-decoration-none" >NO</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_user=<?php echo $user_id?>'
         class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>

