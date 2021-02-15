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


                    <i class="fas fas-dashboard"></i> Dashboard / Register New Merchants

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
                        Merchants Details

                    </h3>

                </div>

                <div class="card-body  pad">



                    <form class="form-horizontral" action="" method="post" enctype="multipart/form-data">


                        <div class="form-group">

                            <label class="col-md-6 control-label"> Name : </label>

                            <div class="col-md-12">

                                <input type="text" name="name" class="form-control" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-6 control-label"> Email : </label>

                            <div class="col-md-12">

                                <input type="text" name="email" class="form-control" required>

                            </div>

                        </div>




                        <div class="form-group">

                            <label class="col-md-6 control-label"> Phone : </label>

                            <div class="col-md-12">

                                <input type="number" name="phone" class="form-control" required>

                            </div>

                        </div>

                        <!-- 
                        <div class="form-group">
                           

                            <label class="col-md-3 control-label"> Store Description : </label>

                            <div class="col-md-12">



                                <textarea name="store_desc" class="form-control" rows="8" cols="19"></textarea>

                            </div>

                        </div> -->






                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-3 ">

                                <input type="submit" name="submit" value="Add Merchant" class="btn btn-primary form-control">

                            </div>

                        </div><!-- form-group Ends -->


                    </form><!-- form-horizontal Ends -->




                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->











    <?php

    if (isset($_POST['submit'])) {

        $merchanet_name = $_POST['name'];

        $merchanet_phone = $_POST['phone'];

        $merchanet_email = $_POST['email'];




        // $count = mysqli_num_rows($run_store);

        // if ($count == 123) {

        //   echo "<script>alert('You Have already Inserted 3 store columns')</script>";
        // } else {

        // move_uploaded_file($tmp_image, "store_images/$store_image");

        $insert_store = "insert into marchants (name,phone,email) values ('$merchanet_name','$merchanet_phone','$merchanet_email')";

        $run_store = mysqli_query($con, $insert_store);

        if ($run_store) {

            echo "<script>alert('New Marchants  Has Been Inserted')</script>";

            echo "<script>window.open('index.php?view_merchants','_self')</script>";
        }
    }

    ?>

<?php } ?>