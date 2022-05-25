<?php include('top.php');
//session_start();
include('database.inc.php');
$msg="";
// yhan se data inset ka code start hai
if(isset($_POST['submit'])){
$coupon_code= $_POST['coupon_code'];
$coupon_type = $_POST['coupon_type'];
$coupon_value = $_POST['coupon_value'];
$cart_min_value = $_POST['cart_min_value'];
$expired_on = $_POST['expired_on'];
$added_on=date('Y-m-d h:i:s');
// ye jo niche ka code hai wo dikhaya hai ke mobile number jo phle he add h wo add na ho

if(mysqli_num_rows(mysqli_query($con,"select * from coupon_code where coupon_code='$coupon_code'"))>0){
  
  $msg="This Coupan Code is  Already Registered";
}else {
  $insert = "INSERT INTO coupon_code(coupon_code,coupon_type,coupon_value,cart_min_value,expired_on,added_on	)
  VALUES('$coupon_code','$coupon_type','$coupon_value','$cart_min_value','$expired_on','$added_on')";
  $query  = mysqli_query($con,$insert);
  if($query==true){
    $msg="your data insert in your database";
    //header('location:category.php');
    echo "<script>window.open('coupon_code.php');</script>";

  }else {
    $msg="Ohh Sorry please try again";
  }
  }
}



// yhan se data insert karne ka code khatam hai
?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Coupon Code</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Coupon Code</label>
                      <input type="text" class="form-control" placeholder="Coupon Code" name="coupon_code" required value="" required>
					  <div class="error mt8"><?php echo $msg?></div>
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">Coupon Type</label>
                      <select name="coupon_type" required class="form-control" required>
						<option value="">Select Type</option>
            <?php
          $arr=array('P'=>'Percentage','F'=>'Fixed');
          foreach($arr as $key=>$val){
              echo "<option value='".$key."' selected>".$val."</option>";
          }
          ?>

					  </select>

                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Coupon Value</label>
                      <input type="textbox" class="form-control" placeholder="Coupon Value" name="coupon_value"  value="" required>
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail3" required>Cart Min Value</label>
                      <input type="textbox" class="form-control" placeholder="Cart Min Value" name="cart_min_value"  value="" required>
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail3">Expired On</label>
                      <input type="date" class="form-control" placeholder="Expired On" name="expired_on"  value="" required>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>

		 </div>
 <?php include('footer.php');?>
