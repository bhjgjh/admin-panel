<?php include('top.php');
//session_start();
include('database.inc.php');
$msg="";
//yhna se jo data hai use show karane ke liye code hai niche colum me
if(isset($_GET['rat'])){
  $rat_id=$_GET['rat'];
  $select= "SELECT * FROM coupon_code WHERE id = '$rat_id'";
  $query =mysqli_query($con,$select);
  $row_user = mysqli_fetch_array($query);
  $cp_code = $row_user['coupon_code'];
  $cp_type = $row_user['coupon_type'];
  $cp_value = $row_user['coupon_value'];
  $cm_value = $row_user['cart_min_value'];
  $exp = $row_user['expired_on'];
  }
//yhna se jo data hai use show karane ke liye code hai niche colum me  uska end hai


?>

     <div class="row">
     			<h1 class="grid_title ml10 ml15">Update Coupon Code</h1>
                 <div class="col-12 grid-margin stretch-card">
                   <div class="card">
                     <div class="card-body">
                       <form class="forms-sample" method="post">
                         <div class="form-group">
                           <label for="exampleInputName1">Coupon Code</label>
                           <input type="text" class="form-control" placeholder="Coupon Code" name="coupon_code" required value="<?php echo $cp_code;?>" required>
     					  <div class="error mt8"><?php echo $msg?></div>
                         </div>
     					<div class="form-group">
                           <label for="exampleInputName1">Coupon Type</label>
                           <select name="coupon_type" required class="form-control" required>
     						<option value="">Select Type</option>
                <?php
          $arr=array('P'=>'Percentage','F'=>'Fixed');
          foreach($arr as $key=>$val){
            if($key==$cp_type){
              echo "<option value='".$key."' selected>".$val."</option>";
            }else{
              echo "<option value='".$key."'>".$val."</option>";
            }

          }
           ?>
     					  </select>

                         </div>
                         <div class="form-group">
                           <label for="exampleInputEmail3" required>Coupon Value</label>
                           <input type="textbox" class="form-control" placeholder="Coupon Value" name="coupon_value"  value="<?php echo $cp_value;?>" required>
                         </div>
     					<div class="form-group">
                           <label for="exampleInputEmail3" required>Cart Min Value</label>
                           <input type="textbox" class="form-control" placeholder="Cart Min Value" name="cart_min_value"  value="<?php echo $cm_value;?>" required>
                         </div>
     					<div class="form-group">
                           <label for="exampleInputEmail3">Expired On</label>
                           <input type="date" class="form-control" placeholder="Expired On" name="expired_on"  value="<?php echo   $exp;?>" required>
                         </div>

                         <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                       </form>
                       <?php
                     // yhan pe update ke quey start kiya hai
                     if(isset($_POST['submit'])){
                       $coupon_code= $_POST['coupon_code'];
                       $coupon_type = $_POST['coupon_type'];
                       $coupon_value = $_POST['coupon_value'];
                       $cart_min_value = $_POST['cart_min_value'];
                       $expired_on = $_POST['expired_on'];
                       $added_on=date('Y-m-d h:i:s');

                     //  if(mysqli_num_rows(mysqli_query($con,"select * from delivery_boy where mobile='$mobile'"))>0){
                     //    $msg="This Number is  Already Registered";
                     //  }else {
                         $update= "UPDATE coupon_code SET coupon_code	='$coupon_code',coupon_type='$coupon_type',coupon_value	=' $coupon_value'
                         ,cart_min_value=' $cart_min_value',expired_on='$expired_on',added_on='$added_on' WHERE id='$rat_id'";
                         $query = mysqli_query($con,$update);
                         if($query==true){
                           $msg="Your data is updated";
                           echo "<script>window.open('coupon_code.php');</script>";
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
