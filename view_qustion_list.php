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

                    <i class="fa fa-dashboard"></i> Dashboard / Latest User Qus

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

                        <i class="fas fa-money fa-fw"></i>Latest User Qus

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
                                    <th>Qusition</th>
                                    <th>Answer</th>
                                    <th>Date</th>
                                    <th>Add Ans</th>



                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                $i = 0;

                                $get_pro = "select * from user_qus_list ORDER BY id DESC";

                                $run_pro = mysqli_query($con, $get_pro);

                                while ($row_pro = mysqli_fetch_array($run_pro)) {

                                    $pro_id = $row_pro['id'];

                                    $pro_title = $row_pro['qus'];

                                    $pro_ans = $row_pro['ans'];

                                    $user_id = $row_pro['user_id'];

                                    $pro_date = $row_pro['date'];

                                    $i++;

                                ?>

                                    <tr>


                                        <td><?php echo $pro_id; ?></td>

                                        <td>
                                            <?php echo $user_id; ?>
                                        </td>

                                        <td><?php echo $pro_title; ?></td>

                                        <td>

                                            <?php echo $pro_ans; ?>
                                        </td>


                                        <td><?php echo $pro_date; ?></td>


                                        <td>
                                            <button type="button " class="btn btn-info" data-toggle="modal" data-target="#modal-edit-<?php echo $pro_id; ?>">
                                                Add Ans
                                            </button>

                                            <div class="modal fade" id="modal-edit-<?php echo $pro_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                >

                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"> User Qustion</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>


                                                        </div>
                                                        <div class="modal-body">

                                                            <form class="form-horizontral" action="" method="post" enctype="multipart/form-data">
                                                                <input value=<?php echo $pro_id;  ?> name="id" class="form-control" type="hidden">

                                                                <h5><?php echo  '' . $pro_title . '';  ?></h5>
                                                                <br>

                                                                <textarea name="ans" class="form-control" rows="9" cols="20" placeholder="Add Answer" required></textarea>



                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="updateBtn" class="btn btn-primary ">Update </button>
                                                        </div>
                                                        </form>
                                                    </div> <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>

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

<?php
if (isset($_POST['updateBtn'])) {


    $ans = $_POST['ans'];

    $qusiton_id = $_POST['id'];




    $update_query = "UPDATE user_qus_list  set   ans = '$ans' WHERE id = $qusiton_id";


    $run_store = mysqli_query($con, $update_query);

    if ($run_store) {

        echo "<script>alert('Qustion Updated')
        </script>";

        echo "<script>window.open('index.php?view_qustion_list','_self')</script>";
    } else {

        echo "Error MySQLI QUERY: " . mysqli_error($con);
    }
}
?>