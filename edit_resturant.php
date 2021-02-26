<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {




?>

    <?php

    if (isset($_GET['edit_resturant'])) {

        $edit_id = $_GET['edit_resturant'];

        $edit_p_cat_query = "select * from resturant_db where id='$edit_id'";

        $run_edit = mysqli_query($con, $edit_p_cat_query);

        $row_edit = mysqli_fetch_array($run_edit);

        //  $p_cat_id = $row_edit['sub_cat_id'];

        $p_cat_keywords = $row_edit['address'];

        $p_cat_title = $row_edit['name'];

        $p_cat_desc = $row_edit['description'];
        $p_cat_image = $row_edit['image'];

    
        $p_adress = $row_edit['address'];
        $store_location_id  = $row_edit['location_id'];

        $store_food_id = $row_edit['food_type'];

        $store_lat = $row_edit['lat'];

        $store_long = $row_edit['lon'];




        $sub_query = "SELECT name  as nameee  FROM food_type where id = $store_food_id ";
        $run_sub_query = mysqli_query($con, $sub_query);
        $datass  = mysqli_fetch_assoc($run_sub_query);
        $food_name =  $datass['nameee'];


        $get_ma = "select * from location_db where id = $store_location_id ";
        $run_ma = mysqli_query($con, $get_ma);

        $row = mysqli_fetch_array($run_ma);
        // get the title 
        $locationName = $row['name'];
  

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


                    <i class="fas fas-dashboard"></i> Dashboard / Update Resturant

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
                       
                        Update Resturant
                    </h3>

                </div>

                <div class="card-body  pad">



                    <form class="form-horizontral" action="" method="post" enctype="multipart/form-data">


                        <div class="form-group">

                            <label class="col-md-6 control-label">Update Resturant Name : </label>

                            <div class="col-md-12">

                                <input type="text" name="store_title" class="form-control" required value="<?php echo $p_cat_title; ?>">

                            </div>

                        </div>


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Update  Description : </label>

                            <div class="col-md-12">

                                <textarea name="store_desc" class="form-control" rows="5" cols="20"><?php echo $p_cat_desc; ?></textarea>

                            </div>

                        </div><!-- form-group Ends -->


                        <!-- <img src="all_images/<?php echo $p_cat_image; ?>" width="120" height="80"> -->


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-5 control-label"> Update Restuant Address  : </label>

                            <div class="col-md-12">

                                <textarea name="store_address" class="form-control" rows="3" cols="20"><?php echo $p_adress; ?></textarea>

                            </div>

                        </div><!-- form-group Ends -->



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

                            <label class="col-md-6 control-label"> Update  Address  : </label>

                            <div class="col-md-12">

                                <input type="text" name="keywords" class="form-control" required value="<?php echo $p_cat_keywords; ?>">

                            </div>

                        </div>



                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-sm-4"> Update Food Type</label>

                            <div class="col-sm-4">

                                <select class="form-control" name="food_type_id" id="category">
                                    <!-- select manufacturer Starts -->

                                    <option value="<?php echo $store_food_id; ?>">
                                        <?php echo $food_name . " (selected)"; ?>
                                    </option>

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


                        <div class="form-group">
                            <label class="col-sm-4" >Update Location Type</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="loc_id" >
                                    <option value="<?php echo $store_location_id; ?>"> <?php echo $locationName . " (selected)"; ?></option>
                                    <?php

                                    $get_locaiton = "select * from location_db";
                                    $run_manufacturer = mysqli_query($con, $get_locaiton);
                                    while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
                                        $id = $row_manufacturer['id'];
                                        $_title = $row_manufacturer['name'];

                                        echo "<option value='$id'>
                                                    $_title
                                            </option>";
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">

<label class="col-md-6 control-label">Update Resturant lattitude : </label>

<div class="col-md-12">

    <input type="text" name="store_lat" class="form-control" required value="<?php echo $store_lat; ?>">

</div>

</div>


<div class="form-group">

<label class="col-md-6 control-label">Update Resturant longtitude : </label>

<div class="col-md-12">

    <input type="text" name="store_long" class="form-control" required value="<?php echo $store_long; ?>">

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

    

        $store_address = $_POST['store_address'];
        $store_lat = $_POST['store_lat'];
        $store_long = $_POST['store_long'];

        $food_type_id = $_POST['food_type_id'];
        $loc_id = $_POST['loc_id'];





        if ($_FILES['store_image']['size'] == 0 && $_FILES['store_image']['error'] == 4) {

    

            $store_image = $p_cat_image;
        } else {

            //image upload 
            $store_image = $_FILES['store_image']['name'];
            $store_image = round(microtime(true)) . $store_image;
            $tmp_image = $_FILES['store_image']['tmp_name'];

            move_uploaded_file($tmp_image, "all_images/$store_image");
        }




        $insert_store = "UPDATE  resturant_db  set  name ='$store_title' ,image ='$store_image'  ,description ='$store_desc', address ='$store_address',lat ='$store_lat' ,lon='$store_long' , food_type = '$food_type_id' , location_id = '$loc_id'    where  id = $edit_id";

        $run_store = mysqli_query($con, $insert_store);

        if ($run_store) {

            echo "<script>alert('Resturant Has Been Updated')</script>";

            echo "<script>window.open('index.php?view_resturant','_self')</script>";
        } else {
            echo "Error MySQLI QUERY: " . mysqli_error($con);
        }
    }

    ?>

<?php } ?>