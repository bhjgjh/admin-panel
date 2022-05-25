<?php include('top.php');
//session_start();
include('database.inc.php');
$msg="";
// yhan se data inset ka code start hai
if(isset($_POST['submit'])){
  $image = $_FILES['image']['name'];
  $tmp_name=$_FILES['image']['tmp_name'];
  $heading = $_POST['heading'];
  $sub_heading= $_POST['sub_heading'];
  $link = $_POST['link'];
  $link_txt = $_POST['link_txt'];
  $order_number=$_POST['order_number'];
  $added_on=date('Y-m-d h:i:s');


// ye jo niche ka code hai wo dikhaya hai ke wo data na insert ho jo alrady insert hai
//if(mysqli_num_rows(mysqli_query($con,"select * from banner where category='$category'"))>0){
//  $msg="category already added";
//}else {
  $insert = "INSERT INTO banner (image,heading,sub_heading,link,link_text,order_number,added_on)VALUES('$image ','$heading','$sub_heading','$link','$link_txt','$order_number','$added_on')";
  $query  = mysqli_query($con,$insert);
  if($query==true){
    $msg="your data insert in your database";
      move_uploaded_file($tmp_name,"images/$image");
    //header('location:category.php');
    echo "<script>location.href='banner.php';</script>";

  }else {
    $msg="Ohh Sorry please try again";
  }
  }



// yhan se data insert karne ka code khatam hai
?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Banner</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                  <lable for"image">Banner image: </lable>
                  <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Heading</label>
                      <input type="text" class="form-control" placeholder="heading" name="heading" required value="">
					          <div class="error mt8"><?php echo $msg?></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Sub Heading</label>
                      <input type="text" class="form-control" placeholder="sub heading" required name="sub_heading"  value="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Link</label>
                      <input type="textbox" class="form-control" placeholder="link" required name="link"  value="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Link txt</label>
                      <input type="textbox" class="form-control" placeholder="link txt" required name="link_txt"  value="">
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
