<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {




?>

    <?php

    if (isset($_GET['edit_job_prepration'])) {

        $edit_id = $_GET['edit_job_prepration'];

        $edit_p_cat_query = "select * from job_prep_db where id='$edit_id'";

        $run_edit = mysqli_query($con, $edit_p_cat_query);

        $row_edit = mysqli_fetch_array($run_edit);

        //  $p_cat_id = $row_edit['sub_cat_id'];

        $p_cat_keywords = $row_edit['keywords'];

        $p_cat_title = $row_edit['title'];

        $p_cat_desc = $row_edit['description'];

        $p_cat_image = $row_edit['image'];

        $p_cat_pdf = $row_edit['pdf'];

        $store_merchant_id = $row_edit['cat_id'];

        $store_sub_cat_id = $row_edit['sub_cat_id'];
        $store_image2 = $row_edit['image2'];
        $store_image3 = $row_edit['image3'];  

        if (strlen($store_sub_cat_id) == 0) {
            $store_sub_cat_id = 0;
        }

        $sub_query = "SELECT name  as nameee  FROM job_prep_sub_category where id = $store_sub_cat_id ";
        $run_sub_query = mysqli_query($con, $sub_query);
        $datass  = mysqli_fetch_assoc($run_sub_query);
        $pro_sub_cat_name =  $datass['nameee'];


        $get_ma = "select * from job_prep_category where id = $store_merchant_id ";
        $run_ma = mysqli_query($con, $get_ma);

        $row = mysqli_fetch_array($run_ma);
        // get the title 
        $p_cat_name = $row['name'];
        $store_image2 = $row_edit['image2'];
        $store_image3 = $row_edit['image3'];  

        //$new_p_cat_image = $row_edit['p_cat_image'];
    }




    ?>



    <div class="row">
        <!-- 1 row Starts -->

        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->

            <ol class="breadcrumb">
                <!-- breadcrumb Starts -->

                <li class="active">


                    <i class="fas fas-dashboard"></i> Dashboard / Update Job Prepration

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <!--  -->

    <div class="row justify-content-center align-items-center h-100 ">
        <!-- 2 row Starts -->

        <div class="col-lg-8 ">
            <!-- col-lg-12 Starts -->

            <div class="card card-outline card-info">
                <!-- panel panel-default Starts -->

                <div class="card-header">
                    <!-- panel-heading Starts -->

                    <h3>
                        <!-- <i class="fas fa-money fa-fw"></i> -->
                        Update Job Prepration

                    </h3>

                </div>

                <div class="card-body  pad">



                    <form class="form-horizontral" action="" method="post" enctype="multipart/form-data">


                        <div class="form-group">

                            <label class="col-md-6 control-label">Update Job Circular Title : </label>

                            <div class="col-md-12">

                                <input type="text" name="store_title" class="form-control" required value="<?php echo $p_cat_title; ?>">

                            </div>

                        </div>


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Update Job Circular Description : </label>

                            <div class="col-md-12">



                                <textarea name="store_desc" class="form-control" rows="9" cols="20"><?php echo $p_cat_desc; ?></textarea>

                            </div>

                        </div><!-- form-group Ends -->


                        <!-- <img src="all_images/<?php echo $p_cat_image; ?>" width="120" height="80"> -->





                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label for="exampleInputFile"> Update Image 1 : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="store_image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Update image 1 </label>

                                </div>
                            </div>
                        </div><!-- form-group Ends -->
                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label for="exampleInputFile"> Update Image 2 : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="store_image2" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Update image 2 </label>

                                </div>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label for="exampleInputFile"> Update Image 3 : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="store_image3" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Update image 3 </label>

                                </div>
                            </div>
                        </div><!-- form-group Ends -->


                        <!-- <a href="all_pdf/"><?php echo $p_cat_pdf; ?>,</a> -->

                        <div class="form-group">
                            <!-- form-group Starts -->



                            <label for="exampleInputFile"> Update Pdf : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="circular_pdf" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Update Pdf File</label>

                                </div>
                            </div>
                        </div><!-- form-group Ends -->



                        <div class="form-group">

                            <label class="col-md-6 control-label"> Update Search Keywords : </label>

                            <div class="col-md-12">

                                <input type="text" name="keywords" class="form-control" required value="<?php echo $p_cat_keywords; ?>">

                            </div>

                        </div>



                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-sm-4"> Update Category </label>

                            <div class="col-sm-4">

                                <select class="form-control" name="marchant_id" id="category">
                                    <!-- select manufacturer Starts -->

                                    <option value="<?php echo $store_merchant_id; ?>">
                                        <?php echo $p_cat_name . " (selected)"; ?>
                                    </option>

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



                        <div class="form-group">
                            <label class="col-sm-4" for="sel1">Sub Category</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="color" id="sub_category">
                                    <option value="<?php echo $store_sub_cat_id; ?>"> <?php echo $pro_sub_cat_name . " (selected)"; ?></option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-3 ">

                                <input type="submit" name="submit" value="Update Circular" class="btn btn-primary form-control">

                            </div>

                        </div><!-- form-group Ends -->


                    </form><!-- form-horizontal Ends -->




                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->





    <?php

    // echo $store_sub_cat_id;

    if (isset($_POST['submit'])) {

        $store_title = $_POST['store_title'];

        $store_desc = $_POST['store_desc'];

        $store_merchant_id = $_POST['marchant_id'];
        $keywords = $_POST['keywords'];

        if (isset($_POST['color'])) {
            if (empty($_POST['color'])) {
                $store_sub_cat_id = $store_sub_cat_id;
                echo $store_sub_cat_id;
            } else {
                $store_sub_cat_id = $_POST['color'];
                echo "sub_cat_id : " . $store_sub_cat_id;
            }
        }

        if ($store_merchant_id == 2 || $store_merchant_id == 3 || $store_merchant_id == 5) {

            $store_sub_cat_id = $store_sub_cat_id;
        } else {
            $store_sub_cat_id = 0;
        }


        if ($_FILES['circular_pdf']['size'] == 0 && $_FILES['circular_pdf']['error'] == 4) {

            // pdf  is empty (and not an error)

            $circular_pdf = $p_cat_pdf;
        } else {

            //pdf upload 
            $circular_pdf = $_FILES['circular_pdf']['name'];

            $circular_pdf = round(microtime(true)) . $circular_pdf;
            $tmp_pdf = $_FILES['circular_pdf']['tmp_name'];

            move_uploaded_file($tmp_pdf, "all_pdf/$circular_pdf");
        }


        if ($_FILES['store_image']['size'] == 0 && $_FILES['store_image']['error'] == 4) {

            // pdf  is empty (and not an error)

            $store_image = $p_cat_image;
        } else {

            //image upload 
            $store_image = $_FILES['store_image']['name'];
            $store_image = round(microtime(true)) . $store_image;
            $tmp_image = $_FILES['store_image']['tmp_name'];

            move_uploaded_file($tmp_image, "all_images/$store_image");
        }




        if ($_FILES['store_image2']['size'] == 0 && $_FILES['store_image2']['error'] == 4) {

            // pdf  is empty (and not an error)

            $store_image2 = $store_image2;
        } else {

            //image upload 
            $store_image2 = $_FILES['store_image2']['name'];
            $store_image2 = round(microtime(true)) . $store_image2;
            $tmp_image2 = $_FILES['store_image2']['tmp_name'];

            move_uploaded_file($tmp_image2, "all_images/$store_image2");
        }

        if ($_FILES['store_image3']['size'] == 0 && $_FILES['store_image3']['error'] == 4) {

            // pdf  is empty (and not an error)

            $store_image3 = $store_image3;
        } else {

            //image upload 
            $store_image3 = $_FILES['store_image3']['name'];
            $store_image3 = round(microtime(true)) . $store_image3;
            $tmp_image3 = $_FILES['store_image3']['tmp_name'];

            move_uploaded_file($tmp_image3, "all_images/$store_image3");
        }


        // echo "Image NAMe  : " . $store_image;
        // echo "PDF name : " . $circular_pdf;

        $insert_store = "UPDATE  job_prep_db  set  title ='$store_title' ,image ='$store_image' ,pdf ='$circular_pdf' ,description ='$store_desc' , cat_id =$store_merchant_id , sub_cat_id  = $store_sub_cat_id , keywords ='$keywords', image2 = '$store_image2' , image3 = '$store_image3'  where  id = $edit_id";

        $run_store = mysqli_query($con, $insert_store);

        if ($run_store) {

            echo "<script>alert('Job  Prep  Has Been Updated')</script>";

            echo "<script>window.open('index.php?view_job_prepration','_self')</script>";
        } else {
            echo "Error MySQLI QUERY: " . mysqli_error($con);
        }
    }

    ?>

<?php } ?>