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
		mysqli_query($con,"update user set status='$status' where id='$id'");

	}

}
// yhan se status ko active dactive karne ka kaam khatam h

?>

<div class="card">
  <div class="card-body">
    <h1 class="card-title" style="font-size:30px;">User Master</h1>
     <a href="manage_category.php" class="add_link"></a>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                <th style="width:10%;">S.No</th>
                <th style="width:20%;">Name</th>
                  <th style="width:20%;">Email</th>
                  <th style="width:20%;">Mobile</th>
                  <th style="width:15%;">Added On</th>
                  <th style="width:15%;">Action</th>

              </tr>
            </thead>
            <tbody>
              <?php
              // yhan data fetdh karne ka kaam start hai
              $sql="select * from  user";
              $res=mysqli_query($con,$sql);
              if(mysqli_num_rows($res)>0){
                while($row=mysqli_fetch_assoc($res)){
                //  $i =1; // ye jo hai wo iche $i++ wale ke liye hai jo order ke niche mumber show krega
               ?>

              <tr>
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['mobile'];?></td>
                  <td>
                   <?php
                   $dateStr=strtotime($row['added_on']);
                    echo date('d-m-Y',$dateStr);
                     ?>
                  </td>
                  <td>
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
