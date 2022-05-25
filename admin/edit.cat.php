<?php include('top.php');
//session_start();
include('database.inc.php');
$msg="";
//yhna se jo data hai use show karane ke liye code hai niche colum me
if(isset($_GET['rat'])){
  $rat_id=$_GET['rat'];
  $select= "SELECT * FROM category WHERE id = '$rat_id'";
  $query =mysqli_query($con,$select);
  $row_user = mysqli_fetch_array($query);
  $cat = $row_user['category'];
  $ord = $row_user['order_number'];
  }
//yhna se jo data hai use show karane ke liye code hai niche colum me  uska end hai


?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Update Category</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <input type="text" class="form-control" placeholder="Category" name="category" required value="<?php echo $cat;?>">
					           <div class="error mt8"><?php echo $msg?></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Order Number</label>
                      <input type="textbox" class="form-control" placeholder="Order Number" required name="order_number"  value="<?php echo $ord;?>">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                  <?php
                // yhan pe update ke quey start kiya hai
                if(isset($_POST['submit'])){
                  $category = $_POST['category'];
                  $order_number = $_POST['order_number'];
                  $added_on=date('Y-m-d h:i:s');
                  $update= "UPDATE category SET category='$category ',order_number='$order_number',added_on='$added_on' WHERE id='$rat_id'";
                  $query = mysqli_query($con,$update);
                  if($query==true){
                    $msg="Your data is updated";
                    echo "<script>window.open('category.php');</script>";
                  }else {
                    $msg="Opps Sory Your data is not updated";
                  }


                }
                // yhan pe update ke quey end kiya hai



                   ?>
                </div>
              </div>
            </div>

		 </div>

 <?php include('footer.php');?>
