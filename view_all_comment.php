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

                    <i class="fa fa-dashboard"></i> Dashboard / All Comments List

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

                        <i class="fas fa-money fa-fw"></i>All Comments

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
                                    <th>Post ID </th>
                                    <th>User Id</th>
                                    <th>Content</th>
                                    <!-- <th>Description</th> -->
                                    <th>Date</th>
                                    <th>Delete</th>


                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                $i = 0;

                                $get_pro = "select * from comment_db ORDER BY id DESC";

                                $run_pro = mysqli_query($con, $get_pro);

                                while ($row_pro = mysqli_fetch_array($run_pro)) {

                                    $pro_id = $row_pro['id'];

                                    $pro_pid = $row_pro['post_id'];
                                    $content = $row_pro['content'];
                                    $pro_uid = $row_pro['user_id'];
                                    $pro_date = $row_pro['date'];

                                    $i++;

                                ?>

                                    <tr>


                                        <td><?php echo $pro_id; ?></td>
                                        <td><?php echo $pro_pid; ?></td>
                                        <td><?php echo $pro_uid; ?></td>
                                        <td>

                                            <?php echo $content; ?>

                                        </td>
                                        <td>‎ <?php echo $pro_date; ?> </td>



                                        <td>
                                            <button class="btn btn-block btn-outline-danger" data-toggle="modal" onclick="window.location.href='index.php?delete_comment=<?php echo $pro_id; ?>'">

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