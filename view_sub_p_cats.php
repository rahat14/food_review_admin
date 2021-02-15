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

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / View Products Categories

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row">
        <!-- 2 row Starts -->

        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->

            <div class="card">
                <!-- panel panel-default Starts -->

                <div class="card-header">
                    <!-- panel-heading Starts -->

                    <h3 class="card-title">
                        <!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"> </i> View Products Categories

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="card-body">
                    <!-- panel-body Starts -->

                    <div class="table-responsive">
                        <!-- table-responsive Starts -->

                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead>
                                <!-- thead Starts -->

                                <tr>

                                    <th>Sub-Category Id</th>
                                    <th>Sub-Category Title</th>
                                    <th>Parent Category</th>
                                    <th>Delete Product Category</th>
                                    <th>Edit Product Category</th>


                                </tr>

                            </thead><!-- thead Ends -->

                            <tbody>
                                <!-- tbody Starts -->

                                <?php

                                $i = 0;

                                $get_p_cats = "select * from product_sub_categories";

                                $run_p_cats = mysqli_query($con, $get_p_cats);

                                while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                                    $p_cat_id = $row_p_cats['sub_cat_id'];

                                    $p_cat_title = $row_p_cats['sub_cat_title'];
                                    $parent_cat_id = $row_p_cats['parent_cat_id'];

                                    $get_sub_p_cats = "select * from product_categories where p_cat_id = $parent_cat_id";

                                    $run_p_sub_cats = mysqli_query($con, $get_sub_p_cats);
                                    $row_sub_p_cats = mysqli_fetch_array($run_p_sub_cats);
                                    $p_cat = $row_sub_p_cats['p_cat_title'];
                                    $i++;

                                ?>

                                    <tr>

                                        <td> <?php echo $p_cat_id; ?> </td>

                                        <td> <?php echo $p_cat_title; ?> </td>

                                        <td><?php echo $p_cat; ?></td>


                                        <td>

                                            <a href="index.php?delete_sub_p_cat=<?php echo $p_cat_id; ?>">

                                                <i class="fa fa-trash-o"></i> Delete

                                            </a>

                                        </td>

                                        <td>

                                            <a href="index.php?edit_sub_p_cat=<?php echo $p_cat_id; ?>">

                                                <i class="fa fa-pencil"></i> Edit

                                            </a>

                                        </td>


                                    </tr>

                                <?php } ?>

                            </tbody><!-- tbody Ends -->

                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->



<?php } ?>