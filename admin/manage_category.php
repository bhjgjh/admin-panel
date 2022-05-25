<?php include('top.php');
//session_start();
include('database.inc.php');
$msg="";
// yhan se data inset ka code start hai
if(isset($_POST['submit'])){
$category = $_POST['category'];
$order_number = $_POST['order_number'];
$added_on=date('Y-m-d h:i:s');
// ye jo niche ka code hai wo dikhaya hai ke wo data na insert ho jo alrady insert hai
if(mysqli_num_rows(mysqli_query($con,"select * from category where category='$category'"))>0){
  $msg="category already added";
}else {
  $insert = "INSERT INTO category (category,order_number,added_on)VALUES('$category','$order_number','$added_on')";
  $query  = mysqli_query($con,$insert);
  if($query==true){
    $msg="your data insert in your database";
    //header('location:category.php');
    echo "<script>location.href='category.php';</script>";

  }else {
    $msg="Ohh Sorry please try again";
  }
  }
}


// yhan se data insert karne ka code khatam hai
?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Category</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <input type="text" class="form-control" placeholder="Category" name="category" required value="">
					  <div class="error mt8"><?php echo $msg?></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Order Number</label>
                      <input type="textbox" class="form-control" placeholder="Order Number" required name="order_number"  value="">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>

		 </div>
 <?php include('footer.php');?>
