<?php include('top.php');
//session_start();
include('database.inc.php');
$msg="";
// yhan se data inset ka code start hai

// yhan se data insert karne ka code khatam hai
?>
<div class="card">
            <div class="card-body">
              <h1 class="grid_title">Contact Us</h1>
              <div class="row grid_box">

                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="10%">S.No #</th>
                            <th width="10%">Name</th>
							<th width="10%">Email</th>
							<th width="10%">Mobile</th>
							<th width="19%">Subject</th>
							<th width="40%">Message</th>
                            <th width="10%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // yhan data fetdh karne ka kaam start hai
                        $sql="select * from  contect_us order by id";
                        $res=mysqli_query($con,$sql);
                        if(mysqli_num_rows($res)>0){
                          while($row=mysqli_fetch_assoc($res)){
                          //  $i =1; // ye jo hai wo iche $i++ wale ke liye hai jo order ke niche mumber show krega
                         ?>
					                 	<tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['name']?></td>
						            	<td><?php echo $row['email']?></td>
							             <td><?php echo $row['mobile']?></td>
							                <td><?php echo $row['subject']?></td>
							                <td><?php echo $row['message']?></td>
							                   <td>
                          <a href="del_contact.php?sat=<?php echo $row['id'];?>"><label class="badge badge-danger delete_red hand_cursor">Delete</label></a>

							                 </td>

                        </tr>
                        <?php

						} } else { ?>
						<tr>
							<td colspan="5">No data found</td>
						</tr>
						<?php } ?>
                      </tbody>
                    </table>
                  </div>
				</div>
              </div>
            </div>
          </div>
 <?php include('footer.php');?>
