<?php include('top.php');
//session_start();
//include('database.inc.php');
$msg="";
$id="";
$image_error="";

// yhan se data inset ka code start hai
if(isset($_POST['submit'])){


$category_id= $_POST['category_id'];
$dish = $_POST['dish'];
$type = $_POST['type'];
$price= $_POST['price'];
$dish_detail = $_POST['dish_detail'];
$image = $_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$added_on=date('Y-m-d h:i:s');
// ye jo niche ka code hai wo dikhaya hai ke mobile number jo phle he add h wo add na ho

if(mysqli_num_rows(mysqli_query($con,"select * from dish where dish='$dish'"))>0){

  $msg="This dish is  Already Registered";
}else {
  $insert = "INSERT INTO dish(category_id	,dish,type,price	,dish_detail,image,added_on	)
  VALUES('$category_id','$dish','$type','$price','$dish_detail','$image','$added_on')";



  $query  = mysqli_query($con,$insert);
  if($query==true){
    $msg="your data insert in your database";
    //header('location:category.php');
    //echo "<script>window.open('dish.php');</script>";
    move_uploaded_file($tmp_name,"images/$image");
    echo "<script>location.href='dish.php';</script>";

  //redirect('dish.php');
  //header('location:dish.php');

  }else {
    $msg="Ohh Sorry please try again";
  }
  //}
}
}


// yhan se data insert karne ka code khatam hai
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
						    	//if($row_category['id']==$category_id){
							   	echo "<option value='".$row_category['id']."' selected>".$row_category['category']."</option>";
                }//else{
							    	//echo "<option value='".$row_category['id']."'>".$row_category['category']."</option>";

					 	?>
					       </select>

      </div>
      <div class="form-group">
      <label for="exampleInputName1">Dish</label>
      <input type="text" class="form-control" placeholder="dish" name="dish" required value="" required>
        <div class="error mt8"><?php echo $msg?></div>
        </div>

        <div class="form-group">
          <label for="exampleInputName1">Type</label>
          <select class="form-control" name="type" required>
       <option value="">Select type</option>
       <?php
           foreach($arrType as $list){
             if($list==$type){
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
        <input type="text" class="form-control" placeholder="price" name="price" required value="" required>
          </div>
          <div class="form-group">
          <label for="exampleInputEmail3" required>Dish Detail</label>
              <textarea name="dish_detail" class="form-control" placeholder="Dish Detail" required></textarea>
              </div>
              <div class="form-group">
          <lable for"image">Dish image: </lable>
            <input type="file" class="form-control" name="image" required>
              </div>


              <!------------------------------------------->
              <div class="form-group" id="dish_box1">
        <label for="exampleInputEmail3">Dish Attributes</label>
      <?php if($id==0){?>
        <div class="row">
          <div class="col-5">
            <input type="text" class="form-control" placeholder="Attribute" name="attribute[]" >
          </div>

        </div>
      <?php } else{
        $dish_details_res=mysqli_query($con,"select * from dish_details where dish_id='$id'");
        $ii=1;
        while($dish_details_row=mysqli_fetch_assoc($dish_details_res)){
        ?>
        <div class="row mt8">
          <div class="col-5">
            <input type="hidden" name="dish_details_id[]" value="<?php echo $dish_details_row['id']?>">
            <input type="text" class="form-control" placeholder="Attribute" name="attribute[]" required value="<?php echo $dish_details_row['attribute']?>">
          </div>
          <div class="col-5">
            <input type="text" class="form-control" placeholder="Price" name="price[]" required  value="<?php echo $dish_details_row['price']?>">
          </div>
          <?php if($ii!=1){
          ?>
          <div class="col-2"><button type="button" class="btn badge-danger mr-2" onclick="remove_more_new('<?php echo $dish_details_row['id']?>')">Remove</button></div>

          <?php
          }
          ?>
        </div>
      <?php
      $ii++;
      } } ?>
      </div>


                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    <button type="button" class="btn badge-danger mr-2" onclick="add_more()">Add More</button>

                  </form>
                </div>
              </div>
            </div>
        </div>
        <script>
		function add_more(){
			var add_more=jQuery('#add_more').val();
			add_more++;
			jQuery('#add_more').val(add_more);
			var html='<div class="row mt8" id="box'+add_more+'"><div class="col-5"><input type="text" class="form-control" placeholder="Attribute" name="attribute[]" required></div><div class="col-5"><input type="text" class="form-control" placeholder="Price" name="price[]" required></div><div class="col-2"><button type="button" class="btn badge-danger mr-2" onclick=remove_more("'+add_more+'")>Remove</button></div></div>';
			jQuery('#dish_box1').append(html);
		}

		function remove_more(id){
			jQuery('#box'+id).remove();
		}

		function remove_more_new(id){
			var result=confirm('Are you sure?');
			if(result==true){
				var cur_path=window.location.href;
				window.location.href=cur_path+"&dish_details_id="+id;
			}
		}
		</script>
 <?php include('footer.php');?>
