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


                    <i class="fas fas-dashboard"></i> Dashboard / Add A Resturant

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
                        Add A Resturant

                    </h3>

                </div>

                <div class="card-body  pad">



                    <form class="form-horizontral" action="" method="post" enctype="multipart/form-data">


                        <div class="form-group">

                            <label class="col-md-6 control-label">Name : </label>

                            <div class="col-md-12">

                                <input type="text" name="store_title" class="form-control" required placeholder="Write The Name">

                            </div>

                        </div>

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label">Description : </label>

                            <div class="col-md-12">


                                <textarea name="store_desc" class="form-control" rows="5" cols="20" placeholder="Write The Description"></textarea>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label">Address : </label>

                            <div class="col-md-12">


                                <textarea name="store_address" class="form-control" rows="3" cols="15" placeholder="Write The Address"></textarea>

                            </div>

                        </div><!-- form-group Ends -->


                        <div class="form-group">

                            <label class="col-md-6 control-label">Phone 1  : </label>

                            <div class="col-md-12">

                                <input   type="number" name="phone_1" class="form-control" required placeholder="Write The Phone ">

                            </div>

                        </div>

                        
                        <div class="form-group">

                            <label class="col-md-6 control-label">Phone 2  : </label>

                            <div class="col-md-12">

                                <input type="number" name="phone_2" class="form-control"  placeholder="Write The Optional Phone">

                            </div>

                        </div>
                         
                        <div class="form-group">

                            <label class="col-md-6 control-label">Latitude  : </label>

                            <div class="col-md-12">

                                <input type="text" name="lat" class="form-control"  placeholder="Latitiude Of The Location">

                            </div>

                        </div>
                        <div class="form-group">

                            <label class="col-md-6 control-label">Longtitude  : </label>

                            <div class="col-md-12">

                                <input type="text" name="lon" class="form-control"  placeholder="Longtitude Of The Locaiton">

                            </div>

                        </div>



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

                            <label class="col-sm-4"> Select location</label>

                            <div class="col-sm-4">

                                <select class="form-control" name="store_loc_id" id="location">
                                    <!-- select manufacturer Starts -->

                                    <option>Select A Location </option>

                                    <?php

                                    $get_manufacturer = "select * from location_db";
                                    $run_manufacturer = mysqli_query($con, $get_manufacturer);
                                    while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
                                        $loc_id = $row_manufacturer['id'];
                                        $manufacturer_title = $row_manufacturer['name'];

                                        echo "<option value='$loc_id'>
                                                    $manufacturer_title
                                            </option>";
                                    }

                                    ?>

                                </select><!-- select manufacturer Ends -->

                            </div>

                        </div><!-- form-group Ends -->


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-sm-4"> Select Food Type  </label>

                            <div class="col-sm-4">

                                <select class="form-control" name="food_id" id="category">
                                    <!-- select manufacturer Starts -->

                                    <option>Select A Type </option>

                                    <?php

                                    $get_manufacturer = "select * from food_type";
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



                        <!-- <div class="form-group">
                            <label class="col-sm-4" for="sel1">Sub Category</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="color" id="sub_category">

                                </select>
                            </div>
                        </div> -->


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-3 ">

                                <input type="submit" name="submit" value="Add Resturant" class="btn btn-primary form-control">

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

        $store_ph1 = $_POST['phone_1'];
        $store_ph2 = $_POST['phone_2'];

        $store_lat = $_POST['lat'];
        $store_long = $_POST['lon'];

        $store_address = $_POST['store_address']; 
        $store_loc_id = $_POST['store_loc_id'];
        $store_food_id = $_POST['food_id'];
       // $keywords = $_POST['keywords'];



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




        $date = date("Y-m-d") . "";




        $insert_store = "insert into resturant_db(name ,image,description ,address , food_type , phone1 , phone2, lat , lon, location_id ) values ('$store_title','$store_image','$store_desc' , '$store_address', '$store_food_id', '$store_ph1' ,'$store_ph2' , '$store_lat' , '$store_long' , '$store_loc_id')";

        $run_store = mysqli_query($con, $insert_store);

        if ($run_store) {

            echo "<script>alert('New Resturant Has Been Added')</script>";

            echo "<script>window.open('index.php?view_job_prepration','_self')</script>";
        } else {
            echo "Error MySQLI QUERY: " . mysqli_error($con);
        }
    }

    ?>



<?php } ?>