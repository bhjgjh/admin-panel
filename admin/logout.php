<?php

session_start();
include('database.inc.php');
unset($_SESSION['IS_LOGIN']);
header('location:login.php')


 ?>
