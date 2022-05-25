<?php include('top.php');
//session_start();
include('database.inc.php');

$msg="";
//yhna se jo data hai use show karane ke liye code hai niche colum me
if(isset($_GET['rat'])){
  $rat_id=$_GET['rat'];
  $select= "SELECT * FROM banner WHERE id = '$rat_id'";
  $query =mysqli_query($con,$select);
  $row_user = mysqli_fetch_array($query);
  $img = $row_user['image'];
  $head = $row_user['heading'];
  $sub_head= $row_user['sub_heading'];
  $lin = $row_user['link'];
  $lin_txt = $row_user['link_text'];
  $ord_number=$row_user['order_number'];

  }
//yhna se jo data hai use show karane ke liye code hai niche colum me  uska end hai
//$res_category=mysqli_query($con,"select * from category where status='1' order by category asc")



?>

      <div class="row">
      			<h1 class="grid_title ml10 ml15">Update Banner</h1>
                  <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <form class="forms-sample" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                           <lable for"image">Dish image: </lable>
                            <img src="images/<?php echo $img; ?>"style="height:100px; width:200px;">
                               <input type="file" class="form-control" name="image" value="images/<?php echo $img; ?>">
                                </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Heading</label>
                            <input type="text" class="form-control" placeholder="heading" name="heading" required value="<?php echo $head;?>">
      					          <div class="error mt8"><?php echo $msg?></div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail3" required>Sub Heading</label>
                            <input type="text" class="form-control" placeholder="sub heading" required name="sub_heading"  value="<?php echo $sub_head;?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail3" required>Link</label>
                            <input type="textbox" class="form-control" placeholder="link" required name="link"  value="<?php echo   $lin;?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail3" required>Link txt</label>
                            <input type="textbox" class="form-control" placeholder="link txt" required name="link_text"  value="<?php echo $lin_txt;?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail3" required>Order Number</label>
                            <input type="text" class="form-control" placeholder="Order Number" required name="order_number"  value="<?php echo $ord_number;?>">
                          </div>

                          <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                        </form>
                        <?php
                      // yhan pe update ke quey start kiya hai
                      if(isset($_POST['submit'])){
                        $image = $_FILES['image']['name'];
                        $tmp_name=$_FILES['image']['tmp_name'];
                        $heading = $_POST['heading'];
                        $sub_heading= $_POST['sub_heading'];
                        $link = $_POST['link'];
                        $link_text = $_POST['link_text'];
                        $order_number=$_POST['order_number'];
                        $added_on=date('Y-m-d h:i:s');
                       if(empty($image)){
                    $image=$img;

                    }
                  //  $oldImageRow=mysqli_fetch_assoc(mysqli_query($con,"select image from dish WHERE id='$rat_id'"));
                  //$oldImage=$oldImageRow['image'];
                  //unlink(images.$oldImageRow);



                        $update= "UPDATE banner SET image	='$image',heading	='$heading ',sub_heading='$sub_heading',link='$link',link_text='$link_text',order_number='$order_number',
                        added_on='$added_on' WHERE id='$rat_id'";
                        $query = mysqli_query($con,$update);

                        if($query==true){
                          $msg="Your data is updated";
                          move_uploaded_file($tmp_name,"images/$image");
                          $oldImageRow=mysqli_fetch_assoc(mysqli_query($con,"select image from dish where id='$rat_id'"));

                          echo "<script>location.href='banner.php';</script>";

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
