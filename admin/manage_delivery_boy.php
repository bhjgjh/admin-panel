<?php include('top.php');
//session_start();
include('database.inc.php');
$msg="";
// yhan se data inset ka code start hai
if(isset($_POST['submit'])){
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$added_on=date('Y-m-d h:i:s');
// ye jo niche ka code hai wo dikhaya hai ke mobile number jo phle he add h wo add na ho
if(mysqli_num_rows(mysqli_query($con,"select * from delivery_boy where mobile='$mobile'"))>0){
  $msg="This Number is  Already Registered";
}else {
  $insert = "INSERT INTO delivery_boy (name,mobile,password,added_on)VALUES('$name','$mobile','$password','$added_on')";
  $query  = mysqli_query($con,$insert);
  if($query==true){
    $msg="your data insert in your database";
    //header('location:category.php');
    //echo "<script>window.open('deli');</script>";
    echo "<script>location.href='delivery_boy.php';</script>";


  }else {
    $msg="Ohh Sorry please try again";
  }
  }
}



// yhan se data insert karne ka code khatam hai
?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Delivery Boy</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" placeholder="Name" name="name" required value="">
					           <div class="error mt8"><?php echo $msg?></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Mobile</label>
                      <input type="text" class="form-control" placeholder="Mobile" required name="mobile"  value="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Password</label>
                      <input type="textbox" class="form-control" placeholder="password" required name="password"  value="">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>

		 </div>
 <?php include('footer.php');?>
