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
                <!-- breadcrumb Starts -->

                <li>

                    <i class="fa fa-dashboard"></i> Dashboard / Insert Location Category

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->

    <div class="row justify-content-center align-items-center h-100 ">
        <!-- 2 row Starts -->

        <div class="col-lg-8">
            <!-- col-lg-12 Starts -->

            <div class="card card-outline card-info">
                <!-- panel panel-default Starts -->
                <div class="card-header">
                    <!-- panel-heading Starts -->

                    <h3 class="card-title">
                        <!-- panel-title Starts -->
                       Insert Location Category
                    </h3><!-- panel-title Ends -->
                </div><!-- panel-heading Ends -->
                <div class="card-body">
                    <!-- panel-body Starts -->

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-6 control-label">Location Name</label>

                            <div class="col-md-12">

                                <input type="text" placeholder="Category Name" name="p_cat_title" class="form-control" required>

                            </div>

                        </div><!-- form-group Ends -->


                    


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-2">

                                <input type="submit" name="submit" value="Add Category" class="btn btn-primary form-control">

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->
            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

        <div class="card-body">
                    <!-- panel-body Starts -->

                    <div class="table-responsive">
                        <!-- table-responsive Starts -->

                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead>
                                <!-- thead Starts -->

                                <tr>

                                    <th>Category Id</th>
                                    <th>Category Title</th>
                            
                                    <th>Delete Product Category</th>
                                    <th>Edit Product Category</th>


                                </tr>

                            </thead><!-- thead Ends -->

                            <tbody>
                                <!-- tbody Starts -->

                                <?php

                                $i = 0;

                                $get_p_cats = "select * from location_db";

                                $run_p_cats = mysqli_query($con, $get_p_cats);

                                while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                                    $p_cat_id = $row_p_cats['id'];

                                    $p_cat_title = $row_p_cats['name'];
                                   


                                    $i++;

                                ?>

                                    <tr>

                                        <td> <?php echo $i; ?> </td>

                                        <td> <?php echo $p_cat_title; ?> </td>

                                        <!-- <td><img src="all_images/<?php echo $pro_image; ?>" width="50" height="50"></td> -->


                                        <td>

                                            <a href="index.php?delete_location_cat=<?php echo $p_cat_id; ?>">

                                                <i class="fas fa-trash-o"></i> Delete

                                            </a>

                                        </td>

                                        <td>

                                        <button type="button" class="btn btn-block btn-outline-primary " data-toggle="modal" data-target="#modal-edit-<?php echo $p_cat_id; ?>">
                             <i class="fas fa-pencil"></i> Edit
                                </button>

<div class="modal fade" id="modal-edit-<?php echo $p_cat_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    >

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Location Category : <?php echo $p_cat_id ?> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body">

                <form class="form-horizontral" action="" method="post" enctype="multipart/form-data">
                    <input value=<?php echo $p_cat_id; ?> name="var_id" class="form-control" type="hidden">
                    <label class="col-md-12 control-label">Update Name : </label>
                    <input class="col-md-6 control-label" value=<?php echo '"' . $p_cat_title . '"'; ?> type="text" name="update_status" class="form-control" required>
                    <br>
                    <!-- <label class="col-md-6 control-label">Update Qty : </label>
                    <input value=<?php echo '"' . $p_cat_id . '"'; ?> name="update_qty" class="form-control" required> -->

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

                            </tbody><!-- tbody Ends -->

                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                </div><!-- panel-body Ends -->



    </div><!-- 2 row Ends -->

    <?php

    if (isset($_POST['submit'])) {

        $p_cat_title = $_POST['p_cat_title'];
        $p_cat_title = addslashes($p_cat_title) ; 
        $p_cat_top = 'yes';

        $insert_p_cat = "insert into location_db (name) values ('$p_cat_title')";

        $run_p_cat = mysqli_query($con, $insert_p_cat);

        if ($run_p_cat) {

            echo "<script>alert('New Location Category Has been Inserted')</script>";

            echo "<script>window.open('index.php?location_cat','_self')</script>";
        }
        else {
            echo "Error MySQLI QUERY: " . mysqli_error($con);
        }
    }
    if (isset($_POST['updateBtn'])) {

        $state = $_POST['update_status'];
        $v_id = $_POST['var_id'];
    
        $updated_query = "UPDATE location_db  Set name = '$state' where id = $v_id  ";
    
    
        $run_stored = mysqli_query($con, $updated_query);
    
        if ($run_stored) {
    
            echo "<script>alert('Location Updated')
        </script>";
    
            echo "<script>window.open('index.php?location_cat','_self')</script>";
        } else {
    
            echo "Error MySQLI QUERY: " . mysqli_error($con);
        }
    }


    ?>


<?php } ?>