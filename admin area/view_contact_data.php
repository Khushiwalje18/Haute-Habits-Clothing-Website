<h3 class="text-center" style="color:rgb(19,61,31);">All users suggestions/queries/questions</h3>
<table class="table table-bpaymented mt-5">
    <thead style="background-color:rgb(19,61,31); color:white;" class="text-center">
        <?php
            $get_contact_data="SELECT * FROM `contact_details`";
            $result_contact_data=mysqli_query($connect,$get_contact_data);
            $count_contact_data=mysqli_num_rows($result_contact_data);
            

    if($count_contact_data==0){
        echo "<h2 class='text-center mt-5' style='color:red;'>No Suggestions/queries/questions yet</h2>";
    }else{
            
                echo "
                <tr>
                  <th>Sr.no</th>
                  <th>Username</th>
                  <th>User Email</th>
                  <th>Suggestion/Query/Question/Messages</th>
                  <th>delete</th>
                </tr>
                </thead>
                <tbody class='bg-light text-dark text-center'>";
                $number=0;
            while($row_contact_data=mysqli_fetch_assoc($result_contact_data)){
                $contact_id=$row_contact_data['contact_id'];
                $contact_username=$row_contact_data['contact_username'];
                $contact_email=$row_contact_data['contact_email'];
                $contact_message=$row_contact_data['contact_message'];
                $number++;
                echo "
                <tr>
                  <td>$number</td>
                  <td>$contact_username</td>
                  <td>$contact_email</td>
                  <td>$contact_message</td>
                  <td><a href='index.php?delete_contact_data=<?php echo $contact_id ?>'  type='button' class='text-dark' data-toggle='modal'
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_contact_data.php" class="text-light text-decoration-none" >NO</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_contact_data=<?php echo $contact_id ?>'
         class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>