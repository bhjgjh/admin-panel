<?php
session_start();
include('database.inc.php');

if(isset($_GET['sat'])){
  $sat_id = $_GET['sat'];
  $delete = "DELETE FROM category WHERE id='$sat_id'";
  $query = mysqli_query($con,$delete);
  if($query==true){
    	$msg="Your data deleted";
    header('location:category.php');
  }else {
     	$msg="Your data no deleted";
  }

}

 ?>
