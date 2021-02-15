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


          <i class="fas fas-dashboard"></i> Dashboard / Insert store

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
            Insert store

          </h3>

        </div>

        <div class="card-body  pad">



          <form class="form-horizontral" action="" method="post" enctype="multipart/form-data">


            <div class="form-group">

              <label class="col-md-6 control-label"> Store Title : </label>

              <div class="col-md-12">

                <input type="text" name="store_title" class="form-control">

              </div>

            </div>



            <div class="form-group">
              <!-- form-group Starts -->

              <label for="exampleInputFile"> Store Image : </label>

              <div class="input-group">
                <div class="custom-file">

                  <input type="file" name="store_image" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose image</label>

                </div>
              </div>
            </div><!-- form-group Ends -->


            <div class="form-group">
              <!-- form-group Starts -->

              <label class="col-md-3 control-label"> Store Description : </label>

              <div class="col-md-12">



                <textarea name="store_desc" class="form-control" rows="8" cols="19"></textarea>

              </div>

            </div><!-- form-group Ends -->

            
              <div class="col-sm-6">
                <div class="form-group">
                  <!-- form-group Starts -->

                  <label class="col-sm-6"> Assaign a Marchant </label>

                  <div class="col-sm-6">

                    <select class="form-control" name="marchant_id">
                      <!-- select manufacturer Starts -->

                      <option>Select The Marchant </option>

                      <?php

                      $get_manufacturer = "select * from marchants";
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

                  <label class="col-md-3 control-label"> </label>

                  <div class="col-md-3 ">

                    <input type="submit" name="submit" value="Insert store" class="btn btn-primary form-control">

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

    $store_merchant_id = $_POST['marchant_id'] ; 

    $store_image = $_FILES['store_image']['name'];

    $tmp_image = $_FILES['store_image']['tmp_name'];

    //$sel_store = "select * from store";

   // $run_store = mysqli_query($con, $sel_store);

    // $count = mysqli_num_rows($run_store);

    // if ($count == 123) {

    //   echo "<script>alert('You Have already Inserted 3 store columns')</script>";
    // } else {

    move_uploaded_file($tmp_image, "store_images/$store_image");

    $insert_store = "insert into store (store_title,store_image,store_desc,merchant_id) values ('$store_title','$store_image','$store_desc' , '$store_merchant_id')";

    $run_store = mysqli_query($con, $insert_store);

    if ($run_store) {

      echo "<script>alert('New store  Has Been Inserted')</script>";

      echo "<script>window.open('index.php?view_store','_self')</script>";
    }
  }

  ?>

<?php } ?>