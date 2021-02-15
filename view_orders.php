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
                <!-- breadcrumb Starts  --->

                <li class="active">

                    </i> Dashboard / View Orders

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

                    <div class="card">
                        <!-- panel panel-default Starts -->

                        <div class="card-header">
                            <!-- panel-heading Starts -->

                            <h1 class="card-title">
                                <!-- panel-title Starts -->

                                <b>&nbsp&nbspView Orders</b>

                            </h1><!-- panel-title Ends -->

                        </div><!-- panel-heading Ends -->



                        <div class="card-body">
                            <!-- panel-body Starts -->

                            <div class="table-responsive">
                                <!-- table-responsive Starts -->

                                <table id="example2" class="table table-bordered table-hover">
                                    <!-- table table-bordered table-hover table-striped Starts -->

                                    <thead>
                                        <!-- thead Starts -->

                                        <tr>

                                            <th>Order No:</th>
                                            <th>Customer Email:</th>
                                            <!-- <th>Invoice No:</th> -->
                                            <!-- <th>Product Title:</th> -->
                                            <!-- <th>Product Qty:</th> -->
                                            <!-- <th>Product Size:</th> -->
                                            <th>Order Date:</th>
                                            <th>Total Amount:</th>
                                            <th>Order Status:</th>
                                            <th>Order Details:</th>
                                            <th>Delete Order:</th>


                                        </tr>

                                    </thead><!-- thead Ends -->


                                    <tbody>
                                        <!-- tbody Starts -->

                                        <?php

                                        $i = 0;

                                        $get_orders = "select * from customers_orders order by order_id DESC ";

                                        $run_orders = mysqli_query($con, $get_orders);

                                        while ($row_orders = mysqli_fetch_array($run_orders)) {

                                            $order_id = $row_orders['order_id'];

                                            $c_id = $row_orders['customer_id'];

                                            // $invoice_no = $row_orders['invoice_no'];

                                            //  $product_id = $row_orders['product_id'];

                                            // $qty = $row_orders['qty'];

                                            // $size = $row_orders['size'];

                                            $due_amount  =  $row_orders['due_amount'];
                                            $order_date = $row_orders['order_date'];
                                            $invoice_no = $row_orders['invoice_no'];
                                            $order_status = $row_orders['order_status'];
                                            $order_comment = $row_orders['order_comment'];
                                            $payment_type = $row_orders['payment_type'];
                                            $delivery_zone = $row_orders['delivery_zone_id'];
                                            $delivery_address = $row_orders['delivery_address'];
                                            $trans_id = $row_orders['trans_id'];

                                            //   $get_products = "select * from products where product_id='$product_id'";

                                            //  $run_products = mysqli_query($con, $get_products);

                                            //    $row_products = mysqli_fetch_array($run_products);

                                            // $product_title = $row_products['product_title'];

                                            $i++;

                                        ?>

                                            <tr>

                                                <td><?php echo $order_id; ?></td>

                                                <td>
                                                    <?php

                                                    $get_customer = "select * from customers where customer_id='$c_id'";

                                                    $run_customer = mysqli_query($con, $get_customer);

                                                    $row_customer = mysqli_fetch_array($run_customer);


                                                    $customer_name = $row_customer['customer_name']; //get customer name
                                                    $customer_email = $row_customer['customer_email'];
                                                    $customer_ph1 = $row_customer['customer_contact'];
                                                    $customer_ph2 = $row_customer['customer_contact2'];

                                                    echo $customer_email;

                                                    ?>
                                                </td>

                                                <!-- <td bgcolor="yellow" ><?php echo $invoice_no; ?></td> -->

                                                <!-- <td><?php echo $product_title; ?></td> -->

                                                <!-- <td><?php echo $qty; ?></td>

                                      <?php echo $size; ?></td> -->

                                                <td>
                                                    <?php


                                                    echo $order_date;

                                                    ?>
                                                </td>

                                                <td>৳<?php echo $due_amount; ?></td>

                                                <td> <strong><?php
                                                                if ($order_status == "rejected") {
                                                                    $order_status = strtoupper($order_status);
                                                                    echo "<font color='red'>  $order_status  </font>";
                                                                } else if ($order_status == "pending") {
                                                                    $order_status = strtoupper($order_status);
                                                                    echo "<font color='blue'> $order_status </font>";
                                                                } else if ($order_status == "processing") {
                                                                    $order_status = strtoupper($order_status);
                                                                    echo "<font color='#F39C12'> $order_status </font>";
                                                                } else if ($order_status == "completed") {
                                                                    $order_status = strtoupper($order_status);
                                                                    echo "<font color='#27AE60'> $order_status </font>";
                                                                } else {
                                                                    echo "<font color='black'> $order_status </font>";
                                                                }
                                                                ?></strong> </td>

                                                <td>

                                                    <button class="btn btn-block btn-outline-primary" data-toggle="modal" onclick="window.location.href='index.php?view_order_list=<?php echo $invoice_no; ?>&user_id=<?php echo $c_id; ?>&order_id=<?php echo $order_id; ?>'">

                                                        View Details

                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal-<?php echo $order_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                        &times;
                                                                    </button>

                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Order info
                                                                    </h4>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <ul>
                                                                        <h5><strong>Customer Details:</strong></h5>
                                                                        <li>Name: <?php echo $customer_name; ?> (<?php echo $c_id; ?>)</li>
                                                                        <li>Contact number 1: <?php echo $customer_ph1; ?></li>
                                                                        <li>Contact number 2: <?php echo $customer_ph2; ?></li>
                                                                        <li>Payment type: <?php echo $payment_type; ?></li>
                                                                        <li>Delivery Zone: <?php echo $delivery_zone; ?></li>
                                                                        <li>Delivery Address: <?php echo $delivery_address; ?></li>
                                                                        <li>Trans_id: <?php echo $trans_id; ?></li><br>

                                                                        <h5><strong>Order List:</strong></h5>
                                                                        <table class="table table-bordered table-hover table-striped">
                                                                            <!-- table table-bordered table-hover table-striped Starts -->

                                                                            <thead>
                                                                                <!-- thead Starts -->

                                                                                <tr>
                                                                                    <th>P_Id:</th>
                                                                                    <th>Product Name:</th>
                                                                                    <th>Price:</th>
                                                                                    <th>Quantity:</th>


                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>


                                                                                <?php $data = json_decode($order_list);
                                                                                foreach ($data as $item) {

                                                                                    $P_ID = $item->product_id;
                                                                                    $TITLE = $item->title;
                                                                                    $PRICE = $item->price;
                                                                                    $QUANTITY = $item->quantity;


                                                                                    // echo '<tr>';
                                                                                    // echo '<td>' . $item->title . '</td>';
                                                                                    // echo '</tr>';

                                                                                    echo '<td>';


                                                                                    echo $P_ID;


                                                                                    echo '</td>';

                                                                                    echo '<td>';


                                                                                    echo $TITLE;


                                                                                    echo '</td>';


                                                                                    echo '<td>';


                                                                                    echo $PRICE;



                                                                                    echo '</td>';

                                                                                    echo '<td>';


                                                                                    echo $QUANTITY;



                                                                                    echo '</td>';

                                                                                    echo '</tr>';
                                                                                }                                                                   ?>

                                                                                <tr>



                                                                            </tbody>
                                                                        </table>


                                                                        <h5><strong>Order Details:</strong></h5>
                                                                        <li>Order ID: <?php echo $order_id; ?></li>
                                                                        <li>Amount to pay: <?php echo $due_amount; ?></li>
                                                                        <li>Order Date: <?php echo $order_date; ?></li>
                                                                        <li>Order Comment: <?php echo $order_comment; ?></li>
                                                                        <li>Order Status: <?php echo $order_status; ?></li>
                                                                    </ul>

                                                                </div>



                                                                <div class="modal-footer">
                                                                    Change Order Status:&nbsp;&nbsp;
                                                                    <a href="index.php?order_completed=<?php echo $order_id; ?>" class="btn btn-success">
                                                                        Complete
                                                                    </a>
                                                                    <a href="index.php?order_process=<?php echo $order_id; ?>" class="btn btn-warning">
                                                                        Processing
                                                                    </a>
                                                                    <a href="index.php?order_rejected=<?php echo $order_id; ?>" class="btn btn-danger">
                                                                        Reject
                                                                    </a>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                        Back
                                                                    </button>
                                                                </div>

                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->

                                                    </div><!-- /.modal -->
                                                </td>

                                                <td>

                                                    <button class="btn btn-block btn-outline-danger" onclick="window.location.href='index.php?order_delete=<?php echo $order_id; ?>'">

                                                        <i class="fa fa-trash-o"></i> Delete

                                                    </button>

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



        </div>

    </section>







<?php } ?>