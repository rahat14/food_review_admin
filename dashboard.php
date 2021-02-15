<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {




?>
    <?php

    $dataPoints = array(
        array("y" => 25, "label" => "Sunday"),
        array("y" => 15, "label" => "Monday"),
        array("y" => 25, "label" => "Tuesday"),
        array("y" => 5, "label" => "Wednesday"),
        array("y" => 10, "label" => "Thursday"),
        array("y" => 0, "label" => "Friday"),
        array("y" => 20, "label" => "Saturday")
    );
    $test_data_point = array();


    $get_products = "select * from job_circular_db";
    $run_products = mysqli_query($con, $get_products);
    $count_job_circular = mysqli_num_rows($run_products);

    $row_test = mysqli_fetch_assoc($run_products);

    $get_customers = "select * from model_question_db";
    $run_customers = mysqli_query($con, $get_customers);
    $count_total_qus = mysqli_num_rows($run_customers);

    $get_p_categories = "select * from user_db";
    $run_p_categories = mysqli_query($con, $get_p_categories);
    $count_users = mysqli_num_rows($run_p_categories);


    $get_pending_orders = "select * from user_score_db";
    $run_pending_orders = mysqli_query($con, $get_pending_orders);
    $count_test_atend = mysqli_num_rows($run_pending_orders);



    while ($row = mysqli_fetch_array($run_products)) {
       array_push($test_data_point, array("y" => $row['id'], "label" => $row['title']));
    }


    ?>


    <div class="row">
        <!-- 1 row Starts -->

        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->

            <h1 class="page-header">Dashboard</h1>

            <ol class="breadcrumb">
                <!-- breadcrumb Starts -->


            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $count_job_circular; ?> </h3>

                            <p>Circulars</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-document"></i>
                        </div>
                        <a href="index.php?view_job_circular" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3> <?php echo $count_total_qus; ?></h3>

                            <p>Qustions</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="index.php?view_model_qus_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $count_users; ?></h3>

                            <p>Total Registered Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="index.php?view_users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $count_test_atend; ?></h3>

                            <p>Total Model Test Attended</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="index.php?view_all_user_result" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>


    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <!-- 3 row Starts -->

                <div class="col-12">
                    <!-- col-lg-8 Starts -->

                    <div class="card">
                        <!-- panel panel-primary Starts -->

                        <div class="card-header">
                            <!-- panel-heading Starts -->

                            <h3 class="card-title">
                                <!-- panel-title Starts -->

                                New Users

                            </h3><!-- panel-title Ends -->

                        </div><!-- panel-heading Ends -->

                        <div class="card-body">
                            <!-- panel-body Starts -->


                            <!-- table-responsive Starts -->

                            <table id="example3" class="table table-bordered table-hover ">
                                <!-- table table-bordered table-hover table-striped Starts -->

                                <thead>
                                    <!-- thead Starts -->

                                    <tr>
                                        <th>id</th>
                                        <th>User Name:</th>
                                        <th>User Phone:</th>

                                        <th>Reg Date:</th>



                                    </tr>

                                </thead><!-- thead Ends -->

                                <tbody>
                                    <!-- tbody Starts -->

                                    <?php

                                    $i = 0;

                                    $get_order = "select * from user_db ORDER BY  id DESC  ";
                                    $run_order = mysqli_query($con, $get_order);

                                    while ($row_order = mysqli_fetch_array($run_order)) {

                                        $order_id = $row_order['id'];
                                        $c_id = $row_order['id'];
                                        $name  =  $row_order['user_name'];
                                        $phone  =  $row_order['phone'];
                                        $date  =  $row_order['date'];
                                        $i++;

                                    ?>

                                        <tr>

                                            <td><?php echo $order_id; ?></td>
                                            <td>
                                                <?php



                                                echo $name;
                                                ?>
                                            </td>

                                            <td>
                                                <?php


                                                echo $phone;
                                                ?>
                                            </td>




                                            <td>
                                                <?php


                                                echo $date;

                                                ?>
                                            </td>





                                        </tr>

                                    <?php } ?>

                                </tbody><!-- tbody Ends -->


                            </table><!-- table table-bordered table-hover table-striped Ends -->

                            <!-- table-responsive Ends -->

                            <div class="text-right">
                                <!-- text-right Starts -->
                                <br>

                                <a href="index.php?view_orders">

                                    View All Users <i class="fa fa-arrow-circle-right"></i>

                                </a>

                            </div><!-- text-right Ends -->


                        </div><!-- panel-body Ends -->

                    </div><!-- panel panel-primary Ends -->

                    <!-- <script>
                        window.onload = function() {

                            var chart = new CanvasJS.Chart("chartContainer", {
                                title: {
                                    text: "Demo Table"
                                },
                                axisY: {
                                    title: "Number id"
                                },
                                data: [{
                                    type: "line",
                                    dataPoints: <?php echo json_encode($test_data_point, JSON_NUMERIC_CHECK); ?>
                                }]
                            });
                            chart.render();

                        }
                    </script> -->



                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

                    <div class="container">
                        <canvas id="myChart" width="100" height="100">
                        </canvas>
                    </div>

                </div><!-- 3 row Ends -->

                <br>
            </div>
    </section>
 
    <br>
    <!-- <div class="footer">
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.5
            </div>
            <strong>Copyright &copy; 2020 <a href="#">SpinnerTech</a>.</strong> All rights
            reserved.
        </footer>
    </div> -->



    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
        }
    </style>

<?php } ?>