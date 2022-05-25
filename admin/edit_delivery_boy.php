<?php include('top.php');
//session_start();
include('database.inc.php');
$msg="";
//yhna se jo data hai use show karane ke liye code hai niche colum me
if(isset($_GET['rat'])){
  $rat_id=$_GET['rat'];
  $select= "SELECT * FROM delivery_boy WHERE id = '$rat_id'";
  $query =mysqli_query($con,$select);
  $row_user = mysqli_fetch_array($query);
  $nm = $row_user['name'];
  $mb = $row_user['mobile'];
  $ps = $row_user['password'];

  }
//yhna se jo data hai use show karane ke liye code hai niche colum me  uska end hai


?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Delivery Boy</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" placeholder="Name" name="name" required value="<?php echo $nm;?>">
					           <div class="error mt8"><?php echo $msg?></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Mobile</label>
                      <input type="text" class="form-control" placeholder="Mobile" required name="mobile"  value="<?php echo $mb;?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Password</label>
                      <input type="textbox" class="form-control" placeholder="password" required name="password"  value="<?php echo $ps;?>">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                  <?php
                // yhan pe update ke quey start kiya hai
                if(isset($_POST['submit'])){
                  $name = $_POST['name'];
                  $mobile = $_POST['mobile'];
                  $password = $_POST['password'];
                  $added_on=date('Y-m-d h:i:s');
                //  if(mysqli_num_rows(mysqli_query($con,"select * from delivery_boy where mobile='$mobile'"))>0){
                //    $msg="This Number is  Already Registered";
                //  }else {
                    $update= "UPDATE delivery_boy SET name='$name ',mobile='$mobile',password='$password',added_on='$added_on' WHERE id='$rat_id'";
                    $query = mysqli_query($con,$update);
                    if($query==true){
                      $msg="Your data is updated";
                      echo "<script>window.open('delivery_boy.php');</script>";
                    }else {
                      $msg="Opps Sory Your data is not updated";
                    }


                  }
                //  }

                // yhan pe update ke quey end kiya hai



                   ?>
                </div>
              </div>
            </div>

		 </div>



 <?php include('footer.php');?>
