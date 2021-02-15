<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>


    <div class="row">
        <!--  1 row Starts -->

        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->

            <ol class="breadcrumb">
                <!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / All Products

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!--  1 row Ends -->

    <div class="row">
        <!-- 2 row Starts -->

        <div class="col-12">
            <!-- col-lg-12 Starts -->

            <div class="panel panel-default">
                <!-- panel panel-default Starts -->

                <div class="panel-heading">
                    <!-- panel-heading Starts -->

                    <h3 class="panel-title">
                        <!-- panel-title Starts -->

                        <i class="fas fa-money fa-fw"></i>All Products

                    </h3><!-- panel-title Ends -->


                </div><!-- panel-heading Ends -->

                <div class="card-body">
                    <!-- panel-body Starts -->

                    <div class="table-responsive">
                        <!-- table-responsive Starts -->

                        <table id="example2" class="table table-bordered table-hover ">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead>

                                <tr>

                                    <th>Product ID</th>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Product Price</th>
                                    <th>Product SKU</th>
                                    <th>Product Added</th>
                                    <th>Edit</th>
                                    <th>Delete</th>


                                </tr>

                            </thead>

                            <tbody>

                                <?php



                                $get_pro = "select * from products";

                                $run_pro = mysqli_query($con, $get_pro);

                                while ($row_pro = mysqli_fetch_array($run_pro)) {

                                    $pro_id = $row_pro['product_id'];

                                    $pro_title = $row_pro['product_title'];

                                    $pro_image = $row_pro['product_img1'];
                                    $pro_image2 = $row_pro['product_img2'];
                                    $pro_image3 = $row_pro['product_img3'];

                                    $pro_price = $row_pro['product_price'];

                                    $sku = $row_pro['sku'];

                                    $pro_keywords = $row_pro['product_keywords'];

                                    $pro_date = $row_pro['date'];



                                ?>

                                    <tr>


                                        <td><?php echo $pro_id; ?></td>
                                        <td><?php echo $pro_title; ?></td>

                                        <td><img src="all_images/<?php echo $pro_image; ?>" width="50" height="50">
                                        <img src="all_images/<?php echo $pro_image2; ?>" width="50" height="50">
                                        <img src="all_images/<?php echo $pro_image3; ?>" width="50" height="50">
                                        
                                        </td>
                                        <td>‎৳ <?php echo $pro_price; ?></td>

                                        <td> <?php echo $sku; ?> </td>

                                        <td><?php echo $pro_date; ?></td>

                                        <td><button class="btn btn-block btn-outline-primary" data-toggle="modal" onclick="window.location.href='index.php?edit_product=<?php echo $pro_id;  ?>'">

                                                View Details

                                            </button></td>

                                        <td>
                                            <button class="btn btn-block btn-outline-danger" onclick="window.location.href='index.php?delete_product=<?php echo $pro_id; ?>'">

                                                <i class="fa fa-trash-o"></i> Delete

                                            </button>

                                        </td>

                                    </tr>

                                <?php } ?>


                            </tbody>


                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->




<?php } ?>