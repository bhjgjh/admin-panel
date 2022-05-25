<?php include('top.php');
//session_start();
include('database.inc.php');

$msg="";
//yhna se jo data hai use show karane ke liye code hai niche colum me
if(isset($_GET['rat'])){
  $rat_id=$_GET['rat'];
  $select= "SELECT * FROM dish WHERE id = '$rat_id'";
  $query =mysqli_query($con,$select);
  $row_user = mysqli_fetch_array($query);
  $cat_id = $row_user['category_id'];
  $dis = $row_user['dish'];
  $typ = $row_user['type'];
  $prc = $row_user['price'];

  $dis_det = $row_user['dish_detail'];
  $img = $row_user['image'];

  }
//yhna se jo data hai use show karane ke liye code hai niche colum me  uska end hai
$res_category=mysqli_query($con,"select * from category where status='1' order by category asc");
$arrType=array("veg","non-veg");


?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Dish</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <select class="form-control" name="category_id" required>
						       <option value="">Select Category</option>
					        	<?php
						      while($row_category=mysqli_fetch_assoc($res_category)){
						    	if($row_category['id']==$cat_id ){
							   	echo "<option value='".$row_category['id']."' selected>".$row_category['category']."</option>";
							    }else{
							    	echo "<option value='".$row_category['id']."'>".$row_category['category']."</option>";
						  	}
					  	}
					 	?>
					       </select>

      </div>
      <div class="form-group">
      <label for="exampleInputName1">Dish</label>
      <input type="text" class="form-control" placeholder="dish" name="dish" required value="<?php echo $dis;?> ">
        <div class="error mt8"><?php echo $msg?></div>
        </div>

        <div class="form-group">
          <label for="exampleInputName1">Type</label>
          <select class="form-control" name="type" value="<?php echo $typ;?>" required>
       <option value="">Select type</option>
       <?php
           foreach($arrType as $list){
             if($list==$typ){
               echo "<option value='$list' selected>".strtoupper($list)."</option>";
             }else{
               echo "<option value='$list'>".strtoupper($list)."</option>";
             }
           }
           ?>
     </select>

  </div>
        <div class="form-group">
        <label for="exampleInputName1">Price</label>
        <input type="text" class="form-control" placeholder="price" name="price" required value="<?php echo $prc;?>" required>
          </div>
          <div class="form-group">
          <label for="exampleInputEmail3" required>Dish Detail</label>
              <textarea name="dish_detail" class="form-control"  placeholder="Dish Detail"><?php echo $dis_det; ?></textarea>
              </div>
              <div class="form-group">
               <lable for"image">Dish image: </lable>
                <img src="images/<?php echo $img; ?>"style="height:100px; width:200px;">
                   <input type="file" class="form-control" name="image" value="images/<?php echo $img; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                  <?php
                // yhan pe update ke quey start kiya hai
                if(isset($_POST['submit'])){
                  $category_id= $_POST['category_id'];
                 $dish = $_POST['dish'];
                 $type = $_POST['type'];
                 $dish_detail=$_POST['dish_detail'];
                 $price = $_POST['price'];
                $image = $_FILES['image']['name'];
                 $tmp_name=$_FILES['image']['tmp_name'];
                 $added_on=date('Y-m-d h:i:s');


                 if(empty($image)){
              $image=$img;

              }
            //  $oldImageRow=mysqli_fetch_assoc(mysqli_query($con,"select image from dish WHERE id='$rat_id'"));
            //$oldImage=$oldImageRow['image'];
            //unlink(images.$oldImageRow);



                  $update= "UPDATE dish SET category_id	='$category_id',dish='$dish',type='$type',price='$price',dish_detail='$dish_detail',image='$image',
                  added_on='$added_on' WHERE id='$rat_id'";
                  $query = mysqli_query($con,$update);

                  if($query==true){
                    $msg="Your data is updated";
                    move_uploaded_file($tmp_name,"images/$image");
                    $oldImageRow=mysqli_fetch_assoc(mysqli_query($con,"select image from dish where id='$rat_id'"));

                    echo "<script>location.href='dish.php';</script>";

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
