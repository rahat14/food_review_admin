<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {



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


                    <i class="fas fas-dashboard"></i> Dashboard / Add Model Qustion

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
                        Add Model Qustion

                    </h3>

                </div>

                <div class="card-body  pad">



                    <form class="form-horizontral" action="" method="post" enctype="multipart/form-data">


                        <div class="form-group">

                            <label class="col-md-6 control-label">Model Qustion Title : </label>

                            <div class="col-md-12">

                                <input type="text" name="store_title" class="form-control" required placeholder="Write The Title">

                            </div>

                        </div>

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label">Model Qustion Description : </label>

                            <div class="col-md-12">



                                <textarea name="store_desc" class="form-control" rows="9" cols="20" placeholder="Write The Description"></textarea>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-sm-4"> Select Category </label>

                            <div class="col-sm-4">

                                <select class="form-control" name="marchant_id" id="category2">
                                    <!-- select manufacturer Starts -->

                                    <option>Select A Category </option>

                                    <?php

                                    $get_manufacturer = "select * from model_qus_category";
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
                            <label class="col-sm-4" for="sel1">Type</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="type" id="type">
                                    <option value="0">Whole</option>
                                    <option value="1">Subjective</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-3 ">

                                <input type="submit" name="submit" value="Add Model Qustion" class="btn btn-primary form-control">

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

        $type = $_POST['type'];

        

        if (isset($_POST['color'])) {
            if (empty($_POST['color'])) {
                $sub_cat = 0;
            } else {
                $sub_cat = $_POST['color'];
            }
        }

        if(number_format($type) == 0 )
        {
                // that means this model quston is descriptive 
                // no need of sub cat id 
                $sub_cat = 0 ; 
        }


        $date = date("Y-m-d") . "";


        $insert_store = "insert into model_qus_list (title ,description , cat_id , sub_cat_id ,date ,type ) values ('$store_title','$store_desc' , '$store_merchant_id', $sub_cat ,'$date' , $type)";

        $run_store = mysqli_query($con, $insert_store);
       
        if ($run_store) {

            $last_id = mysqli_insert_id($con);

            echo "<script>alert('Model Qusiton Has Been Added ')</script>";

            echo "<script>window.open('index.php?view_model_qus=$last_id','_self')</script>";
        } else {
            echo "Error MySQLI QUERY: " . mysqli_error($con);
        }
    }

    ?>

<?php } ?>