<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <?php

    if (isset($_GET['edit_sub_p_cat'])) {

        $edit_p_cat_id = $_GET['edit_sub_p_cat'];


        $edit_p_cat_query = "select * from product_sub_categories where sub_cat_id= $edit_p_cat_id";

        $run_edit = mysqli_query($con, $edit_p_cat_query);

        $row_edit = mysqli_fetch_array($run_edit);

        $p_cat_id = $row_edit['sub_cat_id'];

        $p_cat_title = $row_edit['sub_cat_title'];


        $parent_cat_id = $row_edit['parent_cat_id'];
        // get parent category details 
        $get_ma = "select * from product_categories where p_cat_id = $parent_cat_id ";
        $run_ma = mysqli_query($con, $get_ma);

        $row = mysqli_fetch_array($run_ma);
        // get the title 
        $p_cat_name = $row['p_cat_title'];
    }


    ?>

    <div class="row">
        <!-- 1 row Starts -->

        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->

            <ol class="breadcrumb">
                <!-- breadcrumb Starts -->

                <li>

                    <i class="fa fa-dashboard"></i> Dashboard / Edit Product Sub-Category

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

                        <i class="fa fa-money fa-fw"></i> Edit Product Sub-Category

                    </h3><!-- panel-title Ends -->


                </div><!-- panel-heading Ends -->


                <div class="card-body">
                    <!-- panel-body Starts -->

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-6 control-label">Product Sub-Category Title</label>

                            <div class="col-md-12">

                                <input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title; ?>">

                            </div>

                        </div><!-- form-group Ends -->


                        <div class="col-sm-6">
                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-sm-6"> Assaign Parent Category </label>

                                <div class="col-sm-6">

                                    <select class="form-control" name="cat_id">
                                        <!-- select manufacturer Starts -->

                                        <option value="<?php echo $parent_cat_id; ?>">
                                            <?php echo $p_cat_name; ?>
                                        </option>

                                        <?php

                                        $get_manufacturer = "select * from product_categories";
                                        $run_manufacturer = mysqli_query($con, $get_manufacturer);
                                        while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
                                            $manufacturer_id = $row_manufacturer['p_cat_id'];
                                            $manufacturer_title = $row_manufacturer['p_cat_title'];

                                            echo "<option value='$manufacturer_id'>
                                     $manufacturer_title
                                             </option>";
                                        }

                                        ?>

                                    </select><!-- select manufacturer Ends -->

                                </div>

                            </div><!-- form-group Ends -->

                        </div>

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

        $parent_cat_id = $_POST['cat_id'];





        $update_p_cat = "update product_sub_categories set sub_cat_title='$p_cat_title',parent_cat_id='$parent_cat_id' where sub_cat_id='$p_cat_id'";

        $run_p_cat = mysqli_query($con, $update_p_cat);

        if ($run_p_cat) {

            echo "<script>alert('Product sub  Category has been Updated')</script>";

            echo "<script>window.open('index.php?view_sub_p_cats','_self')</script>";
        }
    }



    ?>


<?php } ?>