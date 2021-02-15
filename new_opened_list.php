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

                    <i class="fa fa-dashboard"></i> Dashboard / New Opened List

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
                       Insert New Opened List
                    </h3><!-- panel-title Ends -->
                </div><!-- panel-heading Ends -->
                <div class="card-body">
                    <!-- panel-body Starts -->

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        
                    <div class="form-group">
                        <!-- form-group Starts -->

                        <label class="col-sm-4"> Select Resturant </label>

                        <div class="col-sm-4">

                            <select class="form-control" name="resturant_id">
                                <!-- select manufacturer Starts -->

                                <option>Select A Resturant </option>

                                <?php

                                    $get_manufacturer = "select * from resturant_db";
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
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-2">

                                <input type="submit" name="submit" value="Add Offer" class="btn btn-primary form-control">

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->



            </div><!-- panel panel-default Ends -->


        </div><!-- 2 row Ends -->  

       
    
         
    </div><!-- 2 row Ends -->

   <div class ="col-lg-12">
   <div class="card card-outline card-info" style="padding: 10px;">
                    <!-- panel-body Starts -->

                    <div class="card-body">
                    <div class="table-responsive">
                        <!-- table-responsive Starts -->

                        <table table id="example2" class="table table-bordered table-hover">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead>
                                <!-- thead Starts -->

                                <tr>

                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>phone</th>
                                    <th>Delete</th>
                                    


                                </tr>

                            </thead><!-- thead Ends -->

                            <tbody>
                                <!-- tbody Starts -->

                                <?php

                                $i = 0;

                                $get_p_cats = "select * from new_resturant_db";

                                $run_p_cats = mysqli_query($con, $get_p_cats);

                                while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
                                    $p_cat_id = $row_p_cats['resturant_id'];

                                    $getResDetails = "select * from resturant_db where id =  $p_cat_id LIMIT 1 ";

                                    $run_qry = mysqli_query($con, $getResDetails);

                                    $row = mysqli_fetch_row($run_qry);

                                    $resName = $row[1];
                                    $resImage = $row[10];
                                    $resPhone = $row[3];
                                    $resAddress = $row[2];



                                ?>

                                    <tr>

                                        <td> <?php echo $p_cat_id; ?> </td>

                                        <td> <?php echo $resName; ?> </td>

                                        <td><img src="all_images/<?php echo $resImage; ?>" width="50" height="50"></td>

                                        <td> <?php echo $resPhone; ?> </td>

                                        <td>


                                            <a href="index.php?delete_offer=<?php echo $p_cat_id; ?>">

                                                <i class="fa fa-trash-o"></i> Delete

                                            </a>

                                        </td>



                                    </tr>

                                <?php } ?>

                            </tbody><!-- tbody Ends -->

                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->


                    </div>
     
                  </div>
   </div>
   
    <?php


if (isset($_POST['updateBtn'])) {

    $title = $_POST['update_title'];
    $sub_title = $_POST['update_sub_title'];
    $v_id = $_POST['var_id'];

    $updated_query = "UPDATE offer_db  Set title = '$title'  , description ='$sub_title'  where id = $v_id  ";


    $run_stored = mysqli_query($con, $updated_query);

    if ($run_stored) {

        echo "<script>alert('Offer Updated')
    </script>";

        echo "<script>window.open('index.php?offer_list','_self')</script>";
    } else {

        echo "Error MySQLI QUERY: " . mysqli_error($con);
    }
}

    if (isset($_POST['submit'])) {

        $p_res_id = $_POST['resturant_id'];
        // $p_cat_desc = $_POST['p_cat_sub_title'];
        // $p_cat_title = addslashes($p_cat_title) ; 
        // $p_cat_desc = addslashes($p_cat_desc);
    

        // $p_cat_image = $_FILES['p_cat_image']['name'];

        // $temp_name = $_FILES['p_cat_image']['tmp_name'];

        // move_uploaded_file($temp_name, "all_images/$p_cat_image");

        $insert_p_cat = "insert into new_resturant_db (resturant_id) values ('$p_res_id')";

        $run_p_cat = mysqli_query($con, $insert_p_cat);

        if ($run_p_cat) {

            echo "<script>alert('Data Has been Inserted')</script>";

            echo "<script>window.open('index.php?new_opened_list','_self')</script>";
        }
        else {
            echo "Error MySQLI QUERY: " . mysqli_error($con);
        }
    }



    ?>


<?php } ?>