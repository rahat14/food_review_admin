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

                    <i class="fa fa-dashboard"></i> Dashboard / Insert Sub-Category

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

                        Insert Sub Category

                    </h3><!-- panel-title Ends -->


                </div><!-- panel-heading Ends -->


                <div class="card-body">
                    <!-- panel-body Starts -->

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-6 control-label">Product Category Title</label>

                            <div class="col-md-12">

                                <input type="text" placeholder="Category Name" name="p_cat_title" class="form-control" required>

                            </div>

                        </div><!-- form-group Ends -->


                        <div class="col-sm-6">
                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-sm-6"> Assaign Parent Category </label>

                                <div class="col-sm-6">

                                    <select class="form-control" name="cat_id">
                                        <!-- select manufacturer Starts -->

                                        <option>Select The Parent Category </option>

                                        <?php

                                        $get_manufacturer = "select * from job_prep_category";
                                        $run_manufacturer = mysqli_query($con, $get_manufacturer);
                                        while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
                                            $manufacturer_id = $row_manufacturer['id'];
                                            $manufacturer_title = $row_manufacturer['name'];

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

                                <input type="submit" name="submit" value="Add Category" class="btn btn-primary form-control">

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->


            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->

    <?php

    if (isset($_POST['submit'])) {

        $p_cat_title = $_POST['p_cat_title'];
        
        $parent_cat_id = $_POST['cat_id'];

        // $p_cat_image = $_FILES['p_cat_image']['name'];

        // $temp_name = $_FILES['p_cat_image']['tmp_name'];



        $insert_p_cat = "insert into product_sub_categories (sub_cat_title, parent_cat_id) values ('$p_cat_title','$parent_cat_id')";

        $run_p_cat = mysqli_query($con, $insert_p_cat);

        if ($run_p_cat) {

            echo "<script>alert('New Product Sub Category Has been Inserted')</script>";

            echo "<script>window.open('index.php?view_sub_p_cats','_self')</script>";
        }
    }



    ?>


<?php } ?>