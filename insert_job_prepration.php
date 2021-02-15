<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

    //$result = mysqli_query($con, "SELECT * FROM job_prep_category");

?>

    <!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: 'textarea'
    });
  </script> -->

    <div class="row">
        <!-- 1 row Starts -->

        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->

            <ol class="breadcrumb">
                <!-- breadcrumb Starts -->

                <li class="active">


                    <i class="fas fas-dashboard"></i> Dashboard / Add Job Prepration

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <!--  -->

    <div class="row justify-content-center align-items-center h-100 ">
        <!-- 2 row Starts -->

        <div class="col-lg-8">
            <!-- col-lg-12 Starts -->

            <div class="card card-outline card-info">
                <!-- panel panel-default Starts -->

                <div class="card-header">
                    <!-- panel-heading Starts -->

                    <h3>
                        <!-- <i class="fas fa-money fa-fw"></i> -->
                        Add Job Circular

                    </h3>

                </div>

                <div class="card-body  pad">



                    <form class="form-horizontral" action="" method="post" enctype="multipart/form-data">


                        <div class="form-group">

                            <label class="col-md-6 control-label">Add Job Circular Title : </label>

                            <div class="col-md-12">

                                <input type="text" name="store_title" class="form-control" required placeholder="Write The Title">

                            </div>

                        </div>

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Job Circular Description : </label>

                            <div class="col-md-12">



                                <textarea name="store_desc" class="form-control" rows="9" cols="20" placeholder="Write The Description"></textarea>

                            </div>

                        </div><!-- form-group Ends -->



                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label for="exampleInputFile"> Add Image 1 : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="store_image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Add image 1 </label>

                                </div>
                            </div>
                        </div><!-- form-group Ends -->
                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label for="exampleInputFile"> Add Image 2 : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="store_image2" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Add image 2 </label>

                                </div>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label for="exampleInputFile"> Add Image 3 : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="store_image3" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Add image 3 </label>

                                </div>
                            </div>
                        </div><!-- form-group Ends -->

                   


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label for="exampleInputFile"> Add Pdf : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="circular_pdf" class="custom-file-input" id="exampleInputFile" placeholder="Write The Description">
                                    <label class="custom-file-label" for="exampleInputFile">Add Pdf File</label>

                                </div>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group">

                            <label class="col-md-6 control-label"> Add Search Keywords : </label>

                            <div class="col-md-12">

                                <input type="text" name="keywords" class="form-control" required placeholder="Add Search Keyword">

                            </div>

                        </div>



                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-sm-4"> Select Category </label>

                            <div class="col-sm-4">

                                <select class="form-control" name="marchant_id" id="category">
                                    <!-- select manufacturer Starts -->

                                    <option>Select A Category </option>

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

                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-3 ">

                                <input type="submit" name="submit" value="Add Circular" class="btn btn-primary form-control">

                            </div>

                        </div><!-- form-group Ends -->


                    </form><!-- form-horizontal Ends -->




                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->











    <?php

    if (isset($_POST['submit'])) {

        $store_title = $_POST['store_title'];

        $store_desc = $_POST['store_desc'];

        $store_merchant_id = $_POST['marchant_id'];
        $keywords = $_POST['keywords'];


        // $sub_cat = $_POST['color'];  // Storing Selected Value In Variable
        //  echo "You have selected :" . $sub_cat;  // Displaying Selected Value

        if (isset($_POST['color'])) {
            if (empty($_POST['color'])) {
                $sub_cat = 0;
            } else {
                $sub_cat = $_POST['color'];
            }
        }
        // echo "You have selected :" . $sub_cat;



        if ($_FILES['circular_pdf']['size'] == 0 && $_FILES['circular_pdf']['error'] == 4) {

            // pdf  is empty (and not an error)

            $circular_pdf = "NULL";
        } else {

            //pdf upload 
            $circular_pdf = $_FILES['circular_pdf']['name'];

            $circular_pdf = round(microtime(true)) . $circular_pdf;
            $tmp_pdf = $_FILES['circular_pdf']['tmp_name'];

            move_uploaded_file($tmp_pdf, "all_pdf/$circular_pdf");
        }


        if ($_FILES['store_image']['size'] == 0 && $_FILES['store_image']['error'] == 4) {

            // pdf  is empty (and not an error)

            $store_image = "NULL";
        } else {

            //image upload 
            $store_image = $_FILES['store_image']['name'];
            $store_image = round(microtime(true)) . $store_image;
            $tmp_image = $_FILES['store_image']['tmp_name'];

            move_uploaded_file($tmp_image, "all_images/$store_image");
        }


        if ($_FILES['store_image2']['size'] == 0 && $_FILES['store_image2']['error'] == 4) {

            // pdf  is empty (and not an error)

            $store_image2 = "NULL";
        } else {

            //image upload 
            $store_image2 = $_FILES['store_image2']['name'];
            $store_image2 = round(microtime(true)) . $store_image2;
            $tmp_image2 = $_FILES['store_image2']['tmp_name'];

            move_uploaded_file($tmp_image2, "all_images/$store_image2");
        }

        if ($_FILES['store_image3']['size'] == 0 && $_FILES['store_image3']['error'] == 4) {

            // pdf  is empty (and not an error)

            $store_image3 = "NULL";
        } else {

            //image upload 
            $store_image3 = $_FILES['store_image3']['name'];
            $store_image3 = round(microtime(true)) . $store_image3;
            $tmp_image3 = $_FILES['store_image3']['tmp_name'];

            move_uploaded_file($tmp_image3, "all_images/$store_image3");
        }



        $date = date("Y-m-d") . "";




        $insert_store = "insert into job_prep_db (title ,image,pdf ,description , cat_id , sub_cat_id ,date , keywords , image2 ,image3) values ('$store_title','$store_image', '$circular_pdf','$store_desc' , '$store_merchant_id', $sub_cat ,'$date' , '$keywords' , '$store_image2'  , '$store_image3')";

        $run_store = mysqli_query($con, $insert_store);

        if ($run_store) {

            echo "<script>alert(' job Prep  Has Been Updated')</script>";

            echo "<script>window.open('index.php?view_job_prepration','_self')</script>";
        } else {
            echo "Error MySQLI QUERY: " . mysqli_error($con);
        }
    }

    ?>



<?php } ?>