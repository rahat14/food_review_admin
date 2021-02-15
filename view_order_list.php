<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <?php
    // getting the order id  

    if (isset($_GET['view_order_list'])) {

        $invoice_no = $_GET['view_order_list'];

        $user_id = $_GET['user_id'];
        $order_id = $_GET['order_id'];

        // echo "<script>alert('ID is $order_id')</script>";
        // get the perchant of the amdin  

        // run query to 
        $get_orders = "select * from customers_orders where order_id = $order_id";

        $run_orders = mysqli_query($con, $get_orders);

        $row_orders = mysqli_fetch_array($run_orders);

        $delivery_zone_id = $row_orders['delivery_zone_id'];
        $amount = $row_orders['due_amount'];
        $order_date = $row_orders['order_date'];
        $status = $row_orders['order_status'];


        //  
        // delivery query 

        $getDeliveryCharge = "select * from delivery_zone_list where zone_id = $delivery_zone_id";
        // run query 
        $run_deliver_query = mysqli_query($con, $getDeliveryCharge);
        $row_DeliveryCharge = mysqli_fetch_array($run_deliver_query);
        $deliveryCharge =  $row_DeliveryCharge['zone_charge'];
        $delivery_zone_name = $row_DeliveryCharge['zone_name'];
        // echo "<script>alert('ID is $deliveryCharge')</script>";

        // get User Information  
        $getUserInformation = "select * from customers where customer_id = $user_id";
        // run query 
        $run_UserInformation = mysqli_query($con, $getUserInformation);
        $row_User = mysqli_fetch_array($run_UserInformation);
        $c_name =  $row_User['customer_name'];
        $c_email =  $row_User['customer_email'];
        $c_contact =  $row_User['customer_contact'];
        $c_address =  $row_User['customer_address'];
        //echo "<script>alert('ID is ')</script>";
    }

    ?>

<?php } ?>

<div class="row">
    <!-- 1 row Starts -->

    <div class="col-lg-12">
        <!-- col-lg-12 Starts -->

        <ol class="breadcrumb">
            <!-- breadcrumb Starts  --->

            <li class="active">

                </i> Dashboard / Order List

            </li>

        </ol><!-- breadcrumb Ends  --->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->



<section class="content">
    <div class="container-fluid">

        <div class="row">
            <!-- 2 row Starts -->

            <div class="col-12">
                <!-- col-lg-12 Starts -->


                <!-- panel panel-default Starts -->

                <div class="card-header">
                    <!-- panel-heading Starts -->

                    <h1 class="card-title">
                        <!-- panel-title Starts -->

                        <b>&nbsp&nbspOrder Details Page</b>

                    </h1><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->



                <div class="invoice p-3 mb-3">

                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> One Shop
                                <small class="float-right">Date: <?php $now = new DateTime();
                                                                    echo $now->format('d-m-Y');
                                                                    ?></small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>Admin, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (804) 123-5432<br>
                                Email: info@almasaeedstudio.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong><?php echo $c_name; ?></strong><br>
                                <?php echo $c_address ?><br>
                                <?php echo $delivery_zone_name; ?><br>
                                Phone: <?php echo $c_contact; ?><br>
                                Email:<?php echo $c_email; ?>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #<?php echo $invoice_no; ?></b>
                            <br>
                            <br>
                            <b>Order ID:</b> <?php echo $order_id; ?><br>
                            <b>Payment Due:</b> <?php echo $deliveryCharge + $amount; ?><br>
                            <b>Order Date:</b> <?php echo $order_date; ?><br>
                            <b>Order Status: </b> <b>
                                <?php 
                                if($status == "rejected")
                                {
                                    $status = strtoupper($status) ; 
                                    echo "<font color='red'>  $status  </font>" ; 
                                }
                                else if($status == "pending")
                                {
                                    $status = strtoupper($status); 
                                    echo "<font color='blue'> $status </font>"; 
                                } else if ($status == "processing")
                                 {
                                    $status = strtoupper($status); 
                                    echo "<font color='#F39C12'> $status </font>"; 
                                                    } 
                                 else if ($status == "completed") {
                                    $status = strtoupper($status); 
                                    echo "<font color='green'> $status </font>"; 
                                                    }
                                 ?> 
                            </b><br>

                        </div>
                        <!-- /.col -->
                    </div>


                    <div class="row">


                        <div class=" col-12 table-responsive">
                            <!-- table-responsive Starts -->

                            <table id="order_list_table" class="table  table-striped">
                                <!-- table table-bordered table-hover table-striped Starts -->

                                <thead>
                                    <!-- thead Starts -->

                                    <tr>

                                        <th>Product ID:</th>
                                        <th>Product Name:</th>
                                        <!-- <th>Invoice No:</th> -->
                                        <!-- <th>Product Title:</th> -->
                                        <!-- <th>Product Qty:</th> -->
                                        <!-- <th>Product Size:</th> -->
                                        <th>Shop ID:</th>
                                        <th>Product Qty:</th>
                                        <th>Product Size:</th>
                                        <th>Product Color:</th>

                                        <th>Subtotal:</th>

                                    </tr>

                                </thead><!-- thead Ends -->


                                <tbody>
                                    <!-- tbody Starts -->

                                    <?php

                                    $i = 0;

                                    $get_orders = "select * from order_list where invoice_no = '$invoice_no' ";

                                    $run_orders = mysqli_query($con, $get_orders);

                                    while ($row_orders = mysqli_fetch_array($run_orders)) {

                                        $id = $row_orders['id'];

                                        $c_id = $row_orders['customer_id'];

                                        $invoice_no = $row_orders['invoice_no'];

                                        $product_id = $row_orders['product_id'];

                                        $qty = $row_orders['qty'];
                                        $color = $row_orders['color'];
                                        $subtotal = $row_orders['sub_total'];

                                        $size = $row_orders['size'];

                                        $shop_id = $row_orders['shop_id'];

                                        $get_products = "select * from products where product_id='$product_id'";

                                        $run_products = mysqli_query($con, $get_products);

                                        $row_products = mysqli_fetch_array($run_products);

                                        $product_title = $row_products['product_title'];

                                        $i++;

                                    ?>

                                        <tr>

                                            <td><?php echo $id; ?></td>

                                            <td>
                                                <?php

                                                echo $product_title;

                                                ?>
                                            </td>



                                            <td>
                                                <?php


                                                echo $shop_id;

                                                ?>
                                            </td>

                                            <td><?php echo $qty; ?></td>

                                            <td><?php echo $size; ?> </td>

                                            <td><?php echo $color; ?> </td>
                                            <td><?php echo $subtotal; ?> </td>




                                        </tr>

                                    <?php } ?>

                                </tbody><!-- tbody Ends -->

                            </table><!-- table table-bordered table-hover table-striped Ends -->

                        </div><!-- table-responsive Ends -->


                    </div>

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">

                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <p class="lead">Amount BreakDown</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td><?php echo $amount; ?> &#2547</td>
                                    </tr>

                                    <tr>
                                        <th>Shipping:</th>
                                        <td><?php echo $deliveryCharge; ?> ৳</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td><?php echo $deliveryCharge + $amount; ?> ৳</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a onclick="window.print()" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                            <!-- 
                            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                Payment
                            </button>

                            <button type="button" class="btn btn-primary float-right"  style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generate PDF
                            </button> -->

                            <a href="index.php?order_completed=<?php echo $order_id; ?>&invoice_no=<?php echo $invoice_no; ?>" style="margin-right: 5px;" class="btn btn-success float-right">
                                Complete
                            </a>
                            <a href="index.php?order_process=<?php echo $order_id; ?>" style="margin-right: 5px;" class="btn btn-warning float-right">
                                Processing
                            </a>
                            <a href="index.php?order_rejected=<?php echo $order_id; ?>" style="margin-right: 5px;" class="btn btn-danger float-right">
                                Reject
                            </a>

                            <h5 class="float-right"> Change Order Status:&nbsp;&nbsp; </h5>


                        </div>

                        <br>
                        <br>


                    </div>

                    <!-- <tfoot class="main-footer">
                        <a class="float-right">Developer By spinnertech.com</a>
                    </tfoot> -->

                    <br>
                </div>



            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->


    </div><!-- 2 row Ends -->



    <tfoot class="main-footer">
        <a class="float-right">Developed By spinnertech.com </a>
    </tfoot>

</section>