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

                    <i class="fa fa-dashboard"></i> Dashboard / Insert Products Category

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
                       Insert Food Category
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


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label for="exampleInputFile"> Category Image : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="p_cat_image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>

                                </div>
                            </div>
                        </div><!-- form-group Ends -->


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

        <div class="card-body">
                    <!-- panel-body Starts -->

                    <div class="table-responsive">
                        <!-- table-responsive Starts -->

                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead>
                                <!-- thead Starts -->

                                <tr>

                                    <th>Category Id</th>
                                    <th>Category Title</th>
                                    <th>Category Image</th>
                                    <th>Delete Product Category</th>
                                    <th>Edit Product Category</th>


                                </tr>

                            </thead><!-- thead Ends -->

                            <tbody>
                                <!-- tbody Starts -->

                                <?php

                                $i = 0;

                                $get_p_cats = "select * from food_type";

                                $run_p_cats = mysqli_query($con, $get_p_cats);

                                while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                                    $p_cat_id = $row_p_cats['id'];

                                    $p_cat_title = $row_p_cats['name'];
                                    $pro_image = $row_p_cats['image'];


                                    $i++;

                                ?>

                                    <tr>

                                        <td> <?php echo $i; ?> </td>

                                        <td> <?php echo $p_cat_title; ?> </td>

                                        <td><img src="all_images/<?php echo $pro_image; ?>" width="50" height="50"></td>


                                        <td>

                                            <a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">

                                                <i class="fa fa-trash-o"></i> Delete

                                            </a>

                                        </td>

                                        <td>

                                            <a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">

                                                <i class="fa fa-pencil"></i> Edit

                                            </a>

                                        </td>


                                    </tr>

                                <?php } ?>

                            </tbody><!-- tbody Ends -->

                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                </div><!-- panel-body Ends -->



    </div><!-- 2 row Ends -->

    <?php

    if (isset($_POST['submit'])) {

        $p_cat_title = $_POST['p_cat_title'];
        $p_cat_title = addslashes($p_cat_title) ; 
        $p_cat_top = 'yes';

        $p_cat_image = $_FILES['p_cat_image']['name'];

        $temp_name = $_FILES['p_cat_image']['tmp_name'];

        move_uploaded_file($temp_name, "all_images/$p_cat_image");

        $insert_p_cat = "insert into food_type (name,image) values ('$p_cat_title','$p_cat_image')";

        $run_p_cat = mysqli_query($con, $insert_p_cat);

        if ($run_p_cat) {

            echo "<script>alert('New Product Category Has been Inserted')</script>";

            echo "<script>window.open('index.php?insert_p_cat','_self')</script>";
        }
        else {
            echo "Error MySQLI QUERY: " . mysqli_error($con);
        }
    }



    ?>


<?php } ?>