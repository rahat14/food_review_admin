<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <?php
    // getting the order id  

    if (isset($_GET['shop_page'])) {

        $invoice_no = $_GET['shop_page'];
        $store_id  =  $_GET['shop_page'];

        // echo "<script>alert('ID is $order_id')</script>";

        // run query to 
        $get_shop = "select * from store where store_id = $store_id";

        $run_shop = mysqli_query($con, $get_shop);

        $row_orders = mysqli_fetch_array($run_shop);

        $store_title = $row_orders['store_title'];
        $store_desc = $row_orders['store_desc'];
        $store_image = $row_orders['store_image'];
        $merchat_id = $row_orders['merchant_id'];


        //  
        // get the marchant  details 

        $getMerchant = "select * from marchants where id = $merchat_id";
        // run query 
        $run_getMerchant = mysqli_query($con, $getMerchant);
        $row_Merchant = mysqli_fetch_array($run_getMerchant);
        $m_name =  $row_Merchant['name'];
        $m_email = $row_Merchant['email'];
        $m_phone = $row_Merchant['phone'];
        // echo "<script>alert('ID is $deliveryCharge')</script>";

        // statistics query 
        $total_products_query = "SELECT COUNT(product_id) as total  FROM products where store_id = $store_id ";
        $run_total_products_query = mysqli_query($con, $total_products_query);
        $datas  = mysqli_fetch_assoc($run_total_products_query);
        $total_productsCount =  $datas['total'];

        $total_sells_query = "SELECT COUNT(shop_id) as total_count  FROM transaction_history where shop_id = $store_id  AND payment_type = 'debit'";
        $run_total_sells_query = mysqli_query($con, $total_sells_query);
        $data = mysqli_fetch_assoc($run_total_sells_query);
        $total_Sells_Count =  $data['total_count'];

        $lifetime_sells_query = "select NVL(sum(shop_gained),0) as amount from transaction_history where shop_id = $store_id AND payment_type = 'debit'";
        $run_lifetime_sells_query = mysqli_query($con, $lifetime_sells_query);
        $dataa = mysqli_fetch_assoc($run_lifetime_sells_query);
        $lifetime_sells_amount =  $dataa['amount'];

        //due amount 
        $due_query = "select (select NVL(sum(shop_gained),0) from transaction_history where shop_id = $store_id AND payment_type = 'debit'  ) - (select NVL(sum(shop_gained),0) from transaction_history where shop_id =$store_id AND payment_type = 'credit') as difference";
        $run_due_query = mysqli_query($con, $due_query);
        $data_due = mysqli_fetch_assoc($run_due_query);
        $due_amount =  $data_due['difference'];
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

                </i> Dashboard / View Store

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

                        <b>&nbsp&nbspStore Details Page</b>

                    </h1><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->



                <div class="invoice p-3 mb-3">

                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> <?php echo $store_title ?>
                                <small class="float-right"> Store ID: <?php echo $store_id ?></small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">



                        <div class="col-sm-4 invoice-col ">
                            <strong>Details </strong>
                            <address>
                                <strong><?php echo $store_title; ?></strong><br>
                                795 Folsom Ave, Suite 600<br>
                                Store Id : <?php echo $store_id; ?><br>
                                Phone: (804) 123-5432<br>
                                Email: info@almasaeedstudio.com

                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <strong>Marchant Details</strong>
                            <address>
                                <strong><?php echo $m_name; ?></strong><br>
                                Marchant Id : <?php echo $merchat_id; ?><br>
                                Phone: <?php echo $m_phone; ?><br>
                                Email:<?php echo $m_email; ?>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Store Stats</b><br>
                            Total Products Count: <?php echo $total_productsCount; ?><br>
                            Lifetime Sells Count: <?php echo $total_Sells_Count; ?><br>
                            Lifetime Sells : <?php echo $lifetime_sells_amount; ?> BDT<br>
                            
                            Due Amount: <?php echo $due_amount; ?> BDT<br>

                        </div>
                        <!-- /.col -->
                    </div>

                    <hr>

                    <h4>Sells Details : </h4>
                    <div class="row">


                        <div class=" col-12 table-responsive">
                            <!-- table-responsive Starts -->

                            <table id="payment_details" class="table table-bordered table-hover">
                                <!-- table table-bordered table-hover table-striped Starts -->

                                <thead>
                                    <!-- thead Starts -->

                                    <tr>

                                        <th>Product ID:</th>
                                        <th>Invoice No:</th>
                                        <th>Product Qty:</th>
                                        <th>Date:</th>
                                        <th>Subtotal:</th>

                                    </tr>

                                </thead><!-- thead Ends -->


                                <tbody>
                                    <!-- tbody Starts -->

                                    <?php

                                    $i = 0;

                                    $get_orders = "select * from transaction_history where shop_id = $store_id  AND payment_type = 'debit' ";

                                    $run_orders = mysqli_query($con, $get_orders);

                                    while ($row_orders = mysqli_fetch_array($run_orders)) {

                                        $id = $row_orders['id'];

                                        $invoice_no = $row_orders['invoice_no'];

                                        $product_id = $row_orders['product_id'];

                                        $qty = $row_orders['quantity'];
                                        $date = $row_orders['payment_date'];

                                        $subtotal = $row_orders['amount'];

                                        $shop_id = $row_orders['shop_id'];

                                        // $get_products = "select * from products where product_id='$product_id'";

                                        // $run_products = mysqli_query($con, $get_products);

                                        // $row_products = mysqli_fetch_array($run_products);

                                        // $product_title = $row_products['product_title'];

                                        $i++;

                                    ?>

                                        <tr>

                                            <td><?php echo $id; ?></td>

                                            <td>
                                                <?php

                                                echo $invoice_no;

                                                ?>
                                            </td>

                                            <td><?php echo $qty; ?></td>

                                            <td><?php echo $date; ?></td>

                                            <td><?php echo $subtotal; ?> </td>




                                        </tr>

                                    <?php } ?>

                                </tbody><!-- tbody Ends -->

                            </table><!-- table table-bordered table-hover table-striped Ends -->

                        </div><!-- table-responsive Ends -->


                    </div>
                    <hr>
                    <h4>Payment Details : </h4>
                    <div class="row">


                        <div class=" col-12 table-responsive">
                            <!-- table-responsive Starts -->

                            <table id="payment_details2" class="table table-bordered table-hover">
                                <!-- table table-bordered table-hover table-striped Starts -->

                                <thead>
                                    <!-- thead Starts -->

                                    <tr>

                                        <th>ID:</th>
                                        <th>Date:</th>
                                        <th>Recived Amount:</th>

                                    </tr>

                                </thead><!-- thead Ends -->


                                <tbody>
                                    <!-- tbody Starts -->

                                    <?php

                                    $i = 0;

                                    $get_orders = "select * from transaction_history where shop_id = $store_id  AND payment_type = 'credit' ";

                                    $run_orders = mysqli_query($con, $get_orders);

                                    while ($row_orders = mysqli_fetch_array($run_orders)) {

                                        $id = $row_orders['id'];

                                        $invoice_no = $row_orders['invoice_no'];

                                        $product_id = $row_orders['product_id'];

                                        $qty = $row_orders['quantity'];
                                        $date = $row_orders['payment_date'];

                                        $subtotal = $row_orders['amount'];

                                        $shop_id = $row_orders['shop_id'];

                                        // $get_products = "select * from products where product_id='$product_id'";

                                        // $run_products = mysqli_query($con, $get_products);

                                        // $row_products = mysqli_fetch_array($run_products);

                                        // $product_title = $row_products['product_title'];

                                        $i++;

                                    ?>

                                        <tr>

                                            <td><?php echo $i; ?></td>


                                            <td><?php echo $date; ?></td>

                                            <td><?php echo $subtotal; ?> </td>




                                        </tr>

                                    <?php } ?>

                                </tbody><!-- tbody Ends -->

                            </table><!-- table table-bordered table-hover table-striped Ends -->

                        </div><!-- table-responsive Ends -->


                    </div>


                    <hr>
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">


                            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default">
                                <i class="far fa-credit-card"></i> Make a
                                Payment
                            </button>

                        </div>

                        <br>
                        <br>


                    </div>

                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Make A Payment To <?php echo $store_title ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form class="form-horizontral" action="" method="post" enctype="multipart/form-data">

                                        <input type="number" placeholder="Enter The Amount" name="amount" class="form-control">
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary ">Make Payment</button>
                                </div>
                                </form>
                            </div> <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
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
<?php
$now =  new DateTime();
$newDate = date_format($now, 'd/m/Y');
if (isset($_POST['submit'])) {
    $amount = $_POST['amount'];

    // $count = mysqli_num_rows($run_store);

    // if ($count == 123) {

    //   echo "<script>alert('You Have already Inserted 3 store columns')</script>";
    // } else {

    $insertion_Query = "INSERT INTO transaction_history (shop_id,amount,payment_type, payment_date, product_id, quantity , invoice_no) VALUES ($store_id , $amount ,'credit','$newDate',0,0 , 'credited')";


    $run_store = mysqli_query($con, $insertion_Query);

    if ($run_store) {

        echo "<script>alert('Payment Has Been Updated')
        </script>";

        echo "<script>window.open('index.php?shop_page=$store_id','_self')</script>";
    }
}

?>