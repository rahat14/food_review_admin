<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {





?>


    <div class="row">
        <!--  1 row Starts -->

        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->

            <ol class="breadcrumb">
                <!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / All Model Qusiton

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!--  1 row Ends -->

    <div class="row">
        <!-- 2 row Starts -->

        <div class="col-12">
            <!-- col-lg-12 Starts -->

            <div class="panel panel-default">
                <!-- panel panel-default Starts -->

                <div class="panel-heading">
                    <!-- panel-heading Starts -->

                    <h3 class="panel-title">
                        <!-- panel-title Starts -->

                        <i class="fas fa-money fa-fw"></i>All Model Qusiton

                    </h3><!-- panel-title Ends -->


                </div><!-- panel-heading Ends -->

                <div class="card-body">
                    <!-- panel-body Starts -->

                    <div class="table-responsive">
                        <!-- table-responsive Starts -->

                        <table id="example2" class="table table-bordered table-hover ">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead>

                                <tr>

                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                
                                    <!-- <th>Description</th> -->
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Date</th>
                                    <th>Details</th>
                                    <th>Delete</th>


                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                $i = 0;

                                $get_pro = "select * from model_qus_list ORDER BY id DESC";

                                $run_pro = mysqli_query($con, $get_pro);

                                while ($row_pro = mysqli_fetch_array($run_pro)) {

                                    $pro_id = $row_pro['id'];

                                    $pro_title = $row_pro['title'];

                                    $pro_image = $row_pro['type'];
                                    
                                    if(number_format($pro_image) == 1 )
                                    {
                                        $pro_image = "Subjective" ; 
                                    }
                                    else $pro_image = "Whole"; 

                                    //  $pro_desc = $row_pro['description'];

                                    $pro_cat_id = $row_pro['cat_id'];
                                    $pro_sub_cat_id = $row_pro['sub_cat_id'];

                                    // get cat name 
                                    //  query 
                                    $cat_query = "SELECT name  as namee  FROM model_qus_category where id = $pro_cat_id ";
                                    $run_query = mysqli_query($con, $cat_query);
                                    $datas  = mysqli_fetch_assoc($run_query);
                                    $pro_cat_name =  $datas['namee'];
                                    // get sub cat name 
                                    $sub_query = "SELECT name  as nameee  FROM job_prep_sub_category where id = $pro_sub_cat_id ";
                                    $run_sub_query = mysqli_query($con, $sub_query);
                                    $datass  = mysqli_fetch_assoc($run_sub_query);
                                    $pro_sub_cat_name =  $datass['nameee'];


                                    $pro_date = $row_pro['date'];

                                    $i++;

                                ?>

                                    <tr>


                                        <td><?php echo $pro_id; ?></td>
                                        <td><?php echo $pro_title; ?></td>

                                        <td><?php echo $pro_image; ?></td>
                                      
                                        <td><?php echo $pro_cat_name; ?></td>

                                        <td><?php if (strlen($pro_sub_cat_name) == 0) {
                                                echo "N/A";
                                            } else {
                                                echo $pro_sub_cat_name;
                                            }

                                            ?></td>



                                        <td><?php echo $pro_date; ?></td>


                                        <td>


                                            <button class="btn btn-block btn-outline-primary" data-toggle="modal" onclick="window.location.href='index.php?view_model_qus=<?php echo $pro_id; ?>'">

                                                Details

                                            </button>

                                        </td>


                                        <td>
                                            <button class="btn btn-block btn-outline-danger" data-toggle="modal" onclick="window.location.href='index.php?delete_model_qus=<?php echo $pro_id; ?>'">

                                                Delete

                                            </button>
                                        </td>

                                    </tr>

                                <?php } ?>


                            </tbody>


                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->




<?php } ?>