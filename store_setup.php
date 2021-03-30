<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {
    // load all the basic data 

    $query = "select * from misc where id = 1 ";

    $run_edit = mysqli_query($con, $query);

    $row_edit = mysqli_fetch_array($run_edit);

    $admin_perchant  = $row_edit['admin_perchant'];
    $slider1 = $row_edit['slider1'];
    $slider2 = $row_edit['slider2'];
    $slider3 = $row_edit['slider3'];
    $store_id_1 = $row_edit['f_id'];
    $store_id_2 = $row_edit['s_id'];
    $store_id_3 = $row_edit['t_id'];
    $f_page_top_banner = $row_edit['f_page_top_banner'];
    $f_page_bottom_banner = $row_edit['f_page_bottom_banner'];
    $s_page_bottom_banner = $row_edit['s_page_bottom_banner'];

   


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


                    <i class="fas fas-dashboard"></i> Dashboard / App Setup

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
                        App Setup

                    </h3>

                </div>

                <div class="card-body  pad">



                    <form class="form-horizontral" action="" method="post" enctype="multipart/form-data">


                        <!-- <div class="form-group">

                            <label class="col-md-6 control-label"> Admin Parchantage : (with out "%")</label>

                            <div class="col-md-12">

                                <input type="number" value="<?php echo $admin_perchant; ?>" name="admin_perchant" class="form-control">

                            </div>

                        </div> -->


                        <h5>Slider 1 </h5>
                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label for="exampleInputFile"> Add Image : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="slider1" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>

                                </div>
                            </div>
                        </div><!-- form-group Ends -->
<!-- 
                        <div class="col-sm-6">
                            <div class="form-group">
                              

                                <label class="col-sm-12"> Assaign a Product (It will show the Store When Click On The Slider) </label>

                                <div class="col-sm-6">

                                    <select class="form-control" name="marchant_id_1">
                                       

                                        <option value="<?php echo $store_id_1; ?>">
                                            <?php echo $store_name_1; ?>
                                        </option>


                                        <?php

                                        $get_manufacturer = "select * from products";
                                        $run_manufacturer = mysqli_query($con, $get_manufacturer);
                                        while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
                                            $store_id_1 = $row_manufacturer['product_id'];
                                            $manufacturer_title = $row_manufacturer['product_title'];

                                            echo "<option value='$store_id_1'>
                                 $manufacturer_title
                                         </option>";
                                        }

                                        ?>

                                    </select>

                                </div>

                            </div>

                        </div>
 -->


                        <h5>Slider 2 </h5>
                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label for="exampleInputFile"> Add Image : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="slider2" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>

                                </div>
                            </div>
                        </div><!-- form-group Ends -->

                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                          

                                <label class="col-sm-12"> Assaign a Product (It will show the Store When Click On The Slider) </label>

                                <div class="col-sm-6">

                                    <select class="form-control" name="marchant_id_2">
                                       

                                        <option value="<?php echo $store_id_2; ?>">
                                            <?php echo $store_name_2; ?>
                                        </option>


                                        <?php

                                        $get_manufacturer = "select * from products";
                                        $run_manufacturer = mysqli_query($con, $get_manufacturer);
                                        while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
                                            $store_id_2 = $row_manufacturer['product_id'];
                                            $manufacturer_title2 = $row_manufacturer['product_title'];

                                            echo "<option value='$store_id_2'>
                                 $manufacturer_title2
                                         </option>";
                                        }

                                        ?>

                                    </select>

                                </div>

                            </div>
                        </div>
 -->


                        <h5>Slider 3 </h5>
                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label for="exampleInputFile"> Add Image : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="slider3" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>

                                </div>
                            </div>
                        </div><!-- form-group Ends -->

                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                               

                                <label class="col-sm-12"> Assaign a Product (It will show the Store When Click On The Slider) </label>

                                <div class="col-sm-6">

                                    <select class="form-control" name="marchant_id_3">
                                        

                                        <option value="<?php echo $store_id_3; ?>">
                                            <?php echo $store_name_3; ?>
                                        </option>


                                        <?php

                                        $get_manufacturer = "select * from products";
                                        $run_manufacturer = mysqli_query($con, $get_manufacturer);
                                        while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
                                            $store_id_3 = $row_manufacturer['product_id'];
                                            $manufacturer_title3 = $row_manufacturer['product_title'];

                                            echo "<option value='$store_id_3'>
                                 $manufacturer_title3
                                         </option>";
                                        }

                                        ?>

                                    </select>
                                </div>

                            </div>
                        </div> -->


                        <!-- <hr>
                        <h5>Banner Section</h5>


                        <div class="form-group">
                           

                            <label for="exampleInputFile">Top Banner : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="f_page_top_banner" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                           

                            <label for="exampleInputFile">Middle Banner : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="f_page_bottom_banner" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>

                                </div>
                            </div>
                        </div>
                           
                            <label for="exampleInputFile">Bottom Banner : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="s_page_bottom_banner" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>

                                </div>
                            </div>
                        </div>
 -->


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-3 ">

                                <input type="submit" name="submit" value="Update App Information" class="btn btn-primary form-control">

                            </div>

                        </div><!-- form-group Ends -->


                    </form><!-- form-horizontal Ends -->




                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->











    <?php

    if (isset($_POST['submit'])) {

        $admin_perchant = $_POST['admin_perchant'] ; 

        // $store_id_1 = $_POST['marchant_id_1'];
        // $store_id_2 = $_POST['marchant_id_2'];
        // $store_id_3 = $_POST['marchant_id_3'];
        $store_id_1 = 0;
        $store_id_2 = 0;
        $store_id_3 = 0;

        // slider  images here 

        if ($_FILES['slider1']['size'] == 0 && $_FILES['slider1']['error'] == 4) {

            // pdf  is empty (and not an error)

            $store_image = $slider1;
        } else {

            //image upload 
            $store_image = $_FILES['slider1']['name'];
            $store_image = round(microtime(true)) . $store_image;
            $tmp_image = $_FILES['slider1']['tmp_name'];

            move_uploaded_file($tmp_image, "all_images/$store_image");
        }


        if ($_FILES['slider2']['size'] == 0 && $_FILES['slider2']['error'] == 4) {

            // pdf  is empty (and not an error)

            $store_image2 = $slider2;
        } else {

            //image upload 
            $store_image2 = $_FILES['slider2']['name'];
            $store_image2 = round(microtime(true)) . $store_image2;
            $tmp_image2 = $_FILES['slider2']['tmp_name'];

            move_uploaded_file($tmp_image2, "all_images/$store_image2");
        }

        if ($_FILES['slider3']['size'] == 0 && $_FILES['slider3']['error'] == 4) {

            // pdf  is empty (and not an error)

            $store_image3 = $slider3;
        } else {

            //image upload 
            $store_image3 = $_FILES['slider3']['name'];
            $store_image3 = round(microtime(true)) . $store_image3;
            $tmp_image3 = $_FILES['slider3']['tmp_name'];

            move_uploaded_file($tmp_image3, "all_images/$store_image3");
        }



        // banner image here 


        if ($_FILES['f_page_top_banner']['size'] == 0 && $_FILES['f_page_top_banner']['error'] == 4) {

            // pdf  is empty (and not an error)

            $store_f_top_banner = $f_page_top_banner;
        } else {

            //image upload 
            $store_f_top_banner = $_FILES['f_page_top_banner']['name'];
            $store_f_top_banner = round(microtime(true)) . $store_f_top_banner;
            $tmp_image = $_FILES['f_page_top_banner']['tmp_name'];

            move_uploaded_file($tmp_image, "all_images/$store_f_top_banner");
        }


        if ($_FILES['f_page_bottom_banner']['size'] == 0 && $_FILES['f_page_bottom_banner']['error'] == 4) {

            // pdf  is empty (and not an error)

            $store_f_page_bottom_banner = $f_page_bottom_banner;
        } else {

            //image upload 
            $store_f_page_bottom_banner = $_FILES['f_page_bottom_banner']['name'];
            $store_f_page_bottom_banner = round(microtime(true)) . $store_f_page_bottom_banner;
            $tmp_image2 = $_FILES['f_page_bottom_banner']['tmp_name'];

            move_uploaded_file($tmp_image2, "all_images/$store_f_page_bottom_banner");
        }

        if ($_FILES['s_page_bottom_banner']['size'] == 0 && $_FILES['s_page_bottom_banner']['error'] == 4) {

            // pdf  is empty (and not an error)

            $s_page_bottom_banner = $s_page_bottom_banner;
        } else {

            //image upload 
            $s_page_bottom_banner = $_FILES['s_page_bottom_banner']['name'];
            $s_page_bottom_banner = round(microtime(true)) . $s_page_bottom_banner;
            $tmp_image3 = $_FILES['s_page_bottom_banner']['tmp_name'];

            move_uploaded_file($tmp_image3, "all_images/$s_page_bottom_banner");
        }



        // update query here 

        $insert_store = "UPDATE  misc  SET  slider1 = '$store_image' , slider2 = '$store_image2' , slider3 = '$store_image3' ,f_id =$store_id_1 , s_id  = $store_id_2, t_id =$store_id_3 , f_page_top_banner= '$store_f_top_banner',f_page_bottom_banner ='$store_f_page_bottom_banner' , s_page_bottom_banner= '$s_page_bottom_banner'  where id =1  ";

        $run_store = mysqli_query($con, $insert_store);

        if ($run_store) {

            echo "<script>alert('App Information Updated')</script>";

            echo "<script>window.open('index.php?store_setup','_self')</script>";
        }
        else {
            echo "Error MySQLI QUERY: " . mysqli_error($con);
        }
    }

    ?>

<?php } ?>