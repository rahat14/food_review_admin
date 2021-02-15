<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

    ?>

    <div class="row">
        <!-- 1 row Starts -->

        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->

            <ol class="breadcrumb">
                <!-- breadcrumb Starts  --->

                <li class="active">

                    </i> Dashboard / View User

                </li>

            </ol><!-- breadcrumb Ends  --->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->



    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <!-- 2 row Starts -->

                <div class="col-12">
                    <!-- col-lg-12 Starts -->

                    <div class="card">
                        <!-- panel panel-default Starts -->

                        <div class="card-header">
                            <!-- panel-heading Starts -->

                            <h1 class="card-title">
                                <!-- panel-title Starts -->

                                <b>&nbsp&nbspView Users</b>

                            </h1><!-- panel-title Ends -->

                        </div><!-- panel-heading Ends -->



                        <div class="card-body">
                            <!-- panel-body Starts -->

                            <div class="table-responsive">
                                <!-- table-responsive Starts -->

                                <table id="example2" class="table table-bordered table-hover">
                                    <!-- table table-bordered table-hover table-striped Starts -->

                                    <thead>
                                        <!-- thead Starts -->

                                        <tr>

                                            <th>id:</th>
                                            <th>Profile pic:</th>
                                            <th>Name:</th>
                                            <th>Phone:</th>
                                            <th>Is_Active</th>
                                            <th>View Details:</th>


                                        </tr>

                                    </thead><!-- thead Ends -->


                                    <tbody>
                                        <!-- tbody Starts -->

                                        <?php

    $i = 0;

    $get_orders = "select * from user order by id DESC ";

    $run_orders = mysqli_query($con, $get_orders);

    while ($row_orders = mysqli_fetch_array($run_orders)) {

        $order_id = $row_orders['id'];
        $image = $row_orders['image'];
        $name = $row_orders['name'];
        $phone = $row_orders['number'];
        $is_Active = $row_orders['is_ban'];

        $i++;

        ?>

                                            <tr>

                                                <td><?php echo $order_id; ?></td>

                                                <td>
                                                <img src="all_images/<?php echo $image; ?>" width="80" height="80">
                                                </td>

                                                <td>
                                                    <?php echo $name; ?>
                                                </td>

                                                <td><?php echo $phone; ?></td>



                                                <td>
                                                    <?php

        if ($is_Active == 0) {
            echo "DE-ACTIVE";
        } else {
            echo "ACTIVE";
        }

        ?>
                                                </td>


                                        <td>

                            <button type="button" class="btn btn-block btn-outline-primary " data-toggle="modal" data-target="#modal-edit-<?php echo $order_id; ?>">
                             <i class="fas fa-pencil"></i> Edit
                                </button>

<div class="modal fade" id="modal-edit-<?php echo $order_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    >

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Profile : <?php echo $order_id ?> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body">

                <form class="form-horizontral" action="" method="post" enctype="multipart/form-data">
                    <input value=<?php echo $order_id; ?> name="var_id" class="form-control" type="hidden">
                    <label class="col-md-12 control-label">Update Status : (0= ban ,1= active)</label>
                    <input class="col-md-6 control-label" value=<?php echo '"' . $is_Active . '"'; ?> type="text" name="update_status" class="form-control" required>
                    <br>
                    <!-- <label class="col-md-6 control-label">Update Qty : </label>
                    <input value=<?php echo '"' . $order_id . '"'; ?> name="update_qty" class="form-control" required> -->

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

                                        <?php }?>

                                    </tbody><!-- tbody Ends -->

                                </table><!-- table table-bordered table-hover table-striped Ends -->

                            </div><!-- table-responsive Ends -->

                        </div><!-- panel-body Ends -->

                    </div><!-- panel panel-default Ends -->

                </div><!-- col-lg-12 Ends -->

            </div><!-- 2 row Ends -->



        </div>

    </section>




    <?php

if (isset($_POST['updateBtn'])) {

    $state = $_POST['update_status'];
    $v_id = $_POST['var_id'];

    $updated_query = "UPDATE user  Set is_ban = '$state' where id = $v_id  ";


    $run_stored = mysqli_query($con, $updated_query);

    if ($run_stored) {

        echo "<script>alert('Variation Updated')
    </script>";

        echo "<script>window.open('index.php?view_users','_self')</script>";
    } else {

        echo "Error MySQLI QUERY: " . mysqli_error($con);
    }
}


}
?>