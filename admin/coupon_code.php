<?php include('top.php');
//session_start();
include('database.inc.php');
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
		mysqli_query($con,"update coupon_code set status='$status' where id='$id'");

	}

}
// yhan se status ko active dactive karne ka kaam khatam h

?>

<div class="card">
  <div class="card-body">
    <h1 class="card-title" style="font-size:30px;">Coupon Code Master</h1>
     <a href="manage_coupon_code.php" class="add_link">Add Coupon Code</a>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                <th style="width:10%;">S.No</th>
                <th style="width:20%;">Code/Value</th>
                  <th style="width:20%;">Type</th>
                  <th style="width:20%;">Cart Min</th>
                  <th style="width:20%;">Expired On</th>
                   <th style="width:15%;">Added On</th>
                  <th style="width:15%;">Action</th>

              </tr>
            </thead>
            <tbody>
              <?php
              // yhan data fetdh karne ka kaam start hai
              $sql="select * from  coupon_code";
              $res=mysqli_query($con,$sql);
              if(mysqli_num_rows($res)>0){
                while($row=mysqli_fetch_assoc($res)){
                //  $i =1; // ye jo hai wo iche $i++ wale ke liye hai jo order ke niche mumber show krega
               ?>

              <tr>
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['coupon_code']?><br/>
                  <?php echo $row['coupon_value']?></td>
                  <td><?php echo $row['coupon_type'];?></td>
                  <td><?php echo $row['cart_min_value'];?></td>
                  <td>
                <?php
                if($row['expired_on']=='0000-00-00'){
                }else{
              echo $row['expired_on'];
               }
            ?>
            </td>
                  <td>
                 <?php
                  $dateStr=strtotime($row['added_on']);
                   echo date('d-m-Y',$dateStr);
                     ?>
                  </td>
                  <td>
                    <a href="edit_cupon.php?rat=<?php echo $row['id'];?>"><label class="badge badge-success hand_cursor">Edit</label></a>

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
              <a href="del_cupon.php?sat=<?php echo $row['id'];?>"><label class="badge badge-danger delete_red hand_cursor">Delete</label></a>
            </td>

              </tr>
            <?php } } else { ?>
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
