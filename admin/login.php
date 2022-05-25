
<?php
session_start();
include('database.inc.php');
$msg="";

if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $sql = "SELECT * FROM admin WHERE username = '$username' and password = '$password'";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
  $row=mysqli_fetch_assoc($res);
  $_SESSION['IS_LOGIN']='yes';
  $_SESSION['ADMIN_USER']=$row['name'];
  header ('location:index.php');

}else {
  	$msg="Please enter valid login details";
}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Food - Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo ('assets/css/materialdesignicons.min.css');?>">
  <link rel="stylesheet" href="<?php echo('assets/css/vendor.bundle.base.css');?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo('assets/css/bootstrap-datepicker.min.css');?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo('assets/css/style.css');?>">
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo text-center">
                <img src="<?php echo ('assets/images/logo.png');?>" alt="logo">
              </div>
              <h6 class="font-weight-light">Sign in to continue.</h6>
            <form class="" action="" method="post">
                    <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" id="exampleInputEmail1" placeholder="username" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="exampleInputPassword1" placeholder="Password">

                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN" name="submit"/>

                </div>

              </form>
              <div class="login_msg">
             <?php echo $msg?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- plugins:js -->
  <script src="<?php echo('assets/js/vendor.bundle.base.js');?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?php echo('assets/js/Chart.min.js');?>"></script>
  <script src="<?php echo('assets/js/bootstrap-datepicker.min.js');?>"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo('assets/js/off-canvas.js');?>"></script>
  <script src="<?php echo('assets/js/hoverable-collapse.js');?>"></script>
  <script src="<?php echo('assets/js/template.js');?>"></script>
  <script src="<?php echo('assets/js/settings.js');?>"></script>
  <script src="<?php echo('assets/js/todolist.js');?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo('assets/js/dashboard.js');?>"></script>
  <!-- End custom js for this page-->
</body>
</html>
