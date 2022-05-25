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
		mysqli_query($con,"update category set status='$status' where id='$id'");

	}

}
// yhan se status ko active dactive karne ka kaam khatam h

?>

<div class="card">
  <div class="card-body">
    <h1 class="card-title" style="font-size:30px;">Category Master</h1>
     <a href="manage_category.php" class="add_link">Add Category</a>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                  <th style="width:10%;">Order #</th>
                  <th style="width:50%;">Category</th>
                  <th style="width:15%;">order_number</th>
                  <th style="width:25%;">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // yhan data fetdh karne ka kaam start hai
              $sql="select * from category order by order_number";
              $res=mysqli_query($con,$sql);
              if(mysqli_num_rows($res)>0){
                $i=1;

                while($row=mysqli_fetch_assoc($res)){
                //  $i =1; // ye jo hai wo iche $i++ wale ke liye hai jo order ke niche mumber show krega
               ?>

              <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['category'];?></td>
                  <td><?php echo $row['order_number'];?></td>
                  <td>
                 <a href="edit.cat.php?rat=<?php echo $row['id'];?>"><label class="badge badge-success hand_cursor">Edit</label></a>
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
              <a href="del_cat.php?sat=<?php echo $row['id'];?>"><label class="badge badge-danger delete_red hand_cursor">Delete</label></a>
            </td>

              </tr>
            <?php
            $i++;

           } } else { ?>
            <tr>
              <td colspan="5">No Data Found</td>
            </tr>
            <?php
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
