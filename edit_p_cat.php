<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <?php

    if (isset($_GET['edit_p_cat'])) {

        $edit_p_cat_id = $_GET['edit_p_cat'];

        $edit_p_cat_query = "select * from food_type where id='$edit_p_cat_id'";

        $run_edit = mysqli_query($con, $edit_p_cat_query);

        $row_edit = mysqli_fetch_array($run_edit);

        $p_cat_id = $row_edit['id'];

        $p_cat_title = $row_edit['name'];

        $p_cat_image = $row_edit['image'];

        $new_p_cat_image = $row_edit['image'];
    }


    ?>

    <div class="row">
        <!-- 1 row Starts -->

        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->

            <ol class="breadcrumb">
                <!-- breadcrumb Starts -->

                <li>

                    <i class="fa fa-dashboard"></i> Dashboard / Edit Food Category

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

                        <i class="fa fa-money fa-fw"></i> Edit Food Category

                    </h3><!-- panel-title Ends -->


                </div><!-- panel-heading Ends -->


                <div class="card-body">
                    <!-- panel-body Starts -->

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-6 control-label">Food Category Title</label>

                            <div class="col-md-12">

                                <input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title; ?>">

                            </div>

                        </div><!-- form-group Ends -->


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label for="exampleInputFile"> Category Image : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="p_cat_image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>

                                </div>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-2">

                                <input type="submit" name="update" value="Update Now" class="btn btn-primary form-control">

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->


            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->

    <?php

    if (isset($_POST['update'])) {

        $p_cat_title = $_POST['p_cat_title'];

        $p_cat_image = $_FILES['p_cat_image']['name'];

        $temp_name = $_FILES['p_cat_image']['tmp_name'];


        move_uploaded_file($temp_name, "all_images/$p_cat_image");

        if (empty($p_cat_image)) {

            $p_cat_image = $new_p_cat_image;
        }

        $update_p_cat = "update food_type set name='$p_cat_title',image='$p_cat_image' where id='$p_cat_id'";

        $run_p_cat = mysqli_query($con, $update_p_cat);

        if ($run_p_cat) {

            echo "<script>alert('Food Category has been Updated')</script>";

            echo "<script>window.open('index.php?insert_p_cat','_self')</script>";
        }
    }



    ?>


<?php } ?>