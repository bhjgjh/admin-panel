<?php

include('top.php');
include('database.inc.php');

?>
<h1 style="margin-bottom:20px; color:black; text-align:center;">Admin-Dashboard</h1>
<div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100" style="color:red; background:green;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="text-align:center;">Category</div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align:center;">
                                <?php
                             $dash_categoru_query = "Select * from category";
                             $dash_categoru_query_run = mysqli_query($con,$dash_categoru_query);
                             if($category_total = mysqli_num_rows($dash_categoru_query_run))
                             {
                                echo "$category_total";
                             }else {
                              echo "category Not Found";
                             }

                               ?>
                             </div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                                <span></span>
                                <a href="category.php" style="text-decoration:none;" class="text-xs font-weight-bold text-uppercase mb-1">View Category</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100" style="color:red; background:pink;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="text-align:center; text-decoration:none;">Dish</div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align:center;">
                              <?php
                          $dash_dish_query = "Select * from dish";
                          $dash_dish_query_run = mysqli_query($con,$dash_categoru_query);
                          if($category_total = mysqli_num_rows($dash_dish_query_run))
                          {
                             echo "$category_total";


                          }else {
                           echo "Dish Not Found";
                          }
                            ?>

                             </div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                                <span></span>
                                <a href="dish.php" style="text-decoration:none; text-align:center; margin-left:30px;" class="text-xs font-weight-bold text-uppercase mb-1">View Dish</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100" style="color:pink; background:red;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="text-align:center;">Enquery</div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align:center;">
                              <?php
                             $dash_enq_query = "Select * from contect_us";
                             $dash_enq_query_run = mysqli_query($con,$dash_enq_query);
                             if($category_total = mysqli_num_rows($dash_enq_query_run))
                             {
                                echo "$category_total";
                             }else {
                              echo "Enquery Not Found";
                             }
                               ?>

                             </div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                                <span></span>
                                <a href="contect_us.php" style="text-decoration:none;" style="text-decoration:none;" class="text-xs font-weight-bold text-uppercase mb-1">View Enquery</a>
                            </div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100" style="color:pink; background:blue;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="text-align:center;">Delivery  Boy</div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align:center;">
                              <?php
                             $dash_enq_query = "Select * from delivery_boy";
                             $dash_enq_query_run = mysqli_query($con,$dash_enq_query);
                             if($category_total = mysqli_num_rows($dash_enq_query_run))
                             {
                                echo "$category_total";
                             }else {
                              echo "Enquery Not Found";
                             }
                               ?>

                             </div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                                <span></span>
                                <a href="delivery_boy.php" style="text-decoration:none;" class="text-xs font-weight-bold text-uppercase mb-1">View
                                Delivery &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Boy </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
        <!-- Earnings (Annual) Card Example -->

        <?php
include('footer.php');

 ?>
