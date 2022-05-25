<?php include('top.php');
//session_start();
//include('database.inc.php');
$msg="";

// yhan se status ko active dactive karne ka kaam start h
if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
  	$type=$_GET['type'];
    $id=$_GET['id'];
if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update dish set status='$status' where id='$id'");

	}

}
$sql="select dish.*,category.category from dish,category where dish.category_id=category.id order by dish.id desc";
$res=mysqli_query($con,$sql);

// yhan se status ko active dactive karne ka kaam khatam h

?>

<div class="card">
  <div class="card-body">
    <h1 class="card-title" style="font-size:30px;">Dish Master</h1>
     <a href="manage_dish.php" class="add_link">Add Dish</a>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                <th style="width:10%;">S.No</th>
                <th style="width:15%;">Category</th>
                  <th style="width:25%;">Dish</th>
                  <th style="width:25%;">price</th>
                  <th style="width:15%;">Image</th>
                  <th style="width:15%;">Added On</th>
                  <th style="width:20%;">Action</th>

              </tr>
            </thead>
            <tbody>
              <?php
              // yhan data fetdh karne ka kaam start hai
          // $sql="select dish.*,category from dish,category where dish.category_id	= category.id order by dish.id desc";
          //$sql="SELECT * FROM dish";

            //  $res=mysqli_query($con,$sql);
              if(mysqli_num_rows($res)>0){
                while($row=mysqli_fetch_assoc($res)){
                //  $i =1; // ye jo hai wo iche $i++ wale ke liye hai jo order ke niche mumber show krega
               ?>

              <tr>
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['category'];?></td>
                  <td><?php echo $row['dish'];?>(<?php echo strtoupper($row['type'])?>)</td>
                  <td><?php echo $row['price'];?></td>


                    <td><a target="_blank" href="<?php echo $row['image'];?>"><img src="images/<?php echo $row['image'];?>"</a></td>

                  <td>
                 <?php
                  $dateStr=strtotime($row['added_on']);
                   echo date('d-m-Y',$dateStr);
                     ?>
                  </td>
                  <td>
                    <a href="edit_dish.php?rat=<?php echo $row['id'];?>"><label class="badge badge-success hand_cursor">Edit</label></a>

                 &nbsp;
                 <?php
               if($row['status']==1){
               ?>
               <a href="?id=<?php echo $row['id']?>&type=deactive"><label class="badge badge-danger hand_cursor">Active</label></a>
               <?php
               }else{
               ?>
               <a href="?id=<?php echo $row['id']?>&type=active"><label class="badge badge-info hand_cursor">Deactive</label></a>
               <?php
               }

               ?>
               &nbsp;
            </td>

              </tr>
            <?php
          } } else { ?>
            <tr>
              <td colspan="5">No Data Found</td>
            </tr>
            <?php
          //  $i++;
           } ?>

            </tbody>
          </table>
          <div class="login_msg">
         <?php echo $msg?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php');?>
