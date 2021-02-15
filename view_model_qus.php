<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

<?php
    // getting the order id  

    if (isset($_GET['view_model_qus'])) {

        $invoice_no = $_GET['view_model_qus'];
        $store_id  =  $_GET['view_model_qus'];

        // echo "<script>alert('ID is $order_id')</script>";

        // run query to 
        $get_shop = "select * from model_qus_list where id = $store_id";

        $run_shop = mysqli_query($con, $get_shop);

        $row_orders = mysqli_fetch_array($run_shop);

        $store_title = $row_orders['title'];
        $store_desc = $row_orders['description'];
        $store_type = $row_orders['type'];
        $date = $row_orders['date'];
        $pro_cat_id = $row_orders['cat_id'];
        $pro_sub_cat_id = $row_orders['sub_cat_id'];
        if (number_format($store_type) == 1) {
            $store_type = "Subjective";
        } else $store_type = "Whole";


        //  
        // get the marchant  details 

        // $getMerchant = "select * from marchants where id = $merchat_id";
        // // run query 
        // $run_getMerchant = mysqli_query($con, $getMerchant);
        // $row_Merchant = mysqli_fetch_array($run_getMerchant);
        // $m_name =  $row_Merchant['name'];
        // $m_email = $row_Merchant['email'];
        // $m_phone = $row_Merchant['phone'];
        // echo "<script>alert('ID is $deliveryCharge')</script>";

        // statistics query 
        //  query 
        $cat_query = "SELECT name  as namee  FROM model_qus_category where id = $pro_cat_id ";
        $run_query = mysqli_query($con, $cat_query);
        $datas  = mysqli_fetch_assoc($run_query);
        $pro_cat_name =  $datas['namee'];
        // get sub cat name 
        $sub_query = "SELECT name  as nameee  FROM job_prep_sub_category where id = $pro_sub_cat_id ";
        $run_sub_query = mysqli_query($con, $sub_query);
        $datass  = mysqli_fetch_assoc($run_sub_query);
        $pro_sub_cat_name =  $datass['nameee'];

        if (strlen($pro_sub_cat_name) == 0) {
            $pro_sub_cat_name = "N/A";
        }
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

                </i> Dashboard / View Model Qustion Details

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

                        <b>&nbsp&nbspQustion Details Page</b>

                    </h1><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->



                <div class="invoice p-3 mb-3">

                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> <?php echo $store_title ?>
                                <small class="float-right"> Qus ID: <?php echo $store_id ?></small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">

                        <div class="col-sm-4 invoice-col ">
                            <strong>Details </strong>
                            <address>
                                <?php echo $store_title; ?><br>
                                Type : &nbsp<?php echo $store_type; ?>
                                <br> Category :&nbsp <?php echo $pro_cat_name; ?>
                                <br> Sub-Category :&nbsp<?php echo $pro_sub_cat_name; ?>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-8 invoice-col">
                            <strong> Description</strong>
                            <address>
                                <?php echo $store_desc; ?>
                            </address>
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>

                    <hr>

                    <h4>Qustion List : </h4>
                    <div class="row no-print">
                        <div class="col-12">

                            <button type="button" class="btn btn-success float-right" data-toggle="modal"
                                data-target="#modal-default">
                                <i class="fas fa-plus"></i> Add Qustion
                            </button>

                        </div>

                        <br>
                        <br>


                    </div>
                    <div class="row">


                        <div class=" col-12 table-responsive">
                            <!-- table-responsive Starts -->

                            <table id="payment_details" class="table table-bordered table-hover">
                                <!-- table table-bordered table-hover table-striped Starts -->

                                <thead>
                                    <!-- thead Starts -->

                                    <tr>

                                        <th>ID:</th>
                                        <th>Qus</th>
                                        <th>op-1</th>
                                        <th>op-2</th>
                                        <th>op-3</th>
                                        <th>op-4</th>
                                        <th>op-5</th>
                                        <th>ans</th>
                                        <th>edit</th>


                                    </tr>

                                </thead><!-- thead Ends -->


                                <tbody>
                                    <!-- tbody Starts -->

                                    <?php

                                    $i = 0;

                                    $get_orders = "select * from model_question_db where qustion_id = $store_id  ";

                                    $run_orders = mysqli_query($con, $get_orders);

                                    while ($row_orders = mysqli_fetch_array($run_orders)) {

                                        $id = $row_orders['id'];
                                        $qus_id = $store_id;
                                        $title = $row_orders['title'];

                                        $op1 = $row_orders['option_one'];

                                        $op2 = $row_orders['option_two'];
                                        $op3 = $row_orders['option_three'];
                                        $op4 = $row_orders['option_four'];
                                        $op5 = $row_orders['option_five'];
                                        $ans = $row_orders['right_ans'];


                                        $i++;

                                    ?>

                                    <tr>

                                        <td><?php echo $id; ?></td>

                                        <td>
                                            <?php

                                                echo $title;

                                                ?>
                                        </td>

                                        <td><?php echo $op1; ?></td>

                                        <td><?php echo $op2; ?></td>

                                        <td><?php echo $op3; ?> </td>

                                        <td><?php echo $op4; ?> </td>
                                        <td><?php if ($pro_cat_id == 2) {
                                                    echo "N/A";
                                                } else {

                                                    echo $op5;
                                                } ?> </td>
                                        <td><?php echo $ans; ?> </td>

                                        <td> <button type="button " class="btn btn-info" data-toggle="modal"
                                                data-target="#modal-edit-<?php echo $id; ?>">
                                                Edit
                                            </button>

                                            <div class="modal fade" id="modal-edit-<?php echo $id; ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                >

                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit The Qustion</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>


                                                        </div>
                                                        <div class="modal-body">

                                                            <form class="form-horizontral" action="" method="post"
                                                                enctype="multipart/form-data">
                                                                <input value=<?php echo $id;  ?> name="id"
                                                                    class="form-control" type="hidden">

                                                                <input value=<?php echo  '"' . $title . '"';  ?>
                                                                    type="text" name="qus" class="form-control"
                                                                    required>
                                                                <br>
                                                                <div
                                                                    class="row  justify-content-center align-items-center h-100">
                                                                    <div class="column">
                                                                        <input value=<?php echo '"' . $op1 . '"';  ?>
                                                                            name="op1" class="form-control" required>
                                                                        &nbsp
                                                                        <input value=<?php echo '"' . $op2 . '"';  ?>
                                                                            name="op2" class="form-control" required>
                                                                    </div>
                                                                    &nbsp &nbsp
                                                                    <div class="column">

                                                                        <input value=<?php echo '"' . $op3 . '"';  ?>
                                                                            name="op3" class="form-control" required>
                                                                        &nbsp
                                                                        <input value=<?php echo '"' . $op4 . '"';  ?>
                                                                            name="op4" class="form-control" required>

                                                                    </div>
                                                                    <div class="column">
                                                                        &nbsp
                                                                        <input value=<?php echo '"' . $op5 . '"';  ?>
                                                                            name="op5" class="form-control"
                                                                            placeholder="Option-D (Bank Only)">

                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <input value=<?php echo '"' . $ans . '"';  ?> name="ans"
                                                                    class="form-control" required>

                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" name="updateBtn"
                                                                class="btn btn-primary ">Update </button>
                                                        </div>
                                                        </form>
                                                    </div> <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>

                                        </td>

                                    </tr>

                                    <?php } ?>

                                </tbody><!-- tbody Ends -->

                            </table><!-- table table-bordered table-hover table-striped Ends -->

                        </div><!-- table-responsive Ends -->


                    </div>
                    <hr>



                    <hr>
                    <!-- this row will not appear when printing -->


                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create A Qustion</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form class="form-horizontral" action="" method="post"
                                        enctype="multipart/form-data">

                                        <input placeholder="Qustion" name="qus" class="form-control" required>
                                        <br>
                                        <div class="row  justify-content-center align-items-center h-100">
                                            <div class="column">
                                                <input placeholder="option a" name="op1" class="form-control" required>
                                                &nbsp
                                                <input placeholder="option b" name="op2" class="form-control" required>
                                            </div>
                                            &nbsp &nbsp
                                            <div class="column">

                                                <input placeholder="option c" name="op3" class="form-control" required>
                                                &nbsp
                                                <input placeholder="option d" name="op4" class="form-control" required>

                                            </div>
                                            <div class="column">
                                                &nbsp
                                                <input name="op5" class="form-control"
                                                    placeholder="Option-D (Bank Only)">

                                            </div>
                                        </div>
                                        <br>
                                        <input placeholder="right ans" name="ans" class="form-control" required>

                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary ">Add </button>
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
        <a class="float-right">Developed By Metacoders </a>
    </tfoot>

</section>
<?php
// $now =  new DateTime();
// $newDate = date_format($now, 'd/m/Y');
if (isset($_POST['submit'])) {
    $qus = $_POST['qus'];
    $op1 = $_POST['op1'];
    $op2 = $_POST['op2'];
    $op3 = $_POST['op3'];
    $op4 = $_POST['op4'];
    $op5 = $_POST['op5'];
    $ans = $_POST['ans'];
    $q_id = $store_id;
    if ($op5 == ''){

        $op5 ="NULL" ; 
    }

   



    $insertion_Query = "INSERT INTO model_question_db (qustion_id,title,option_one, option_two, option_three, option_four , option_five , right_ans) VALUES ($q_id , '$qus' ,'$op1','$op2','$op3','$op4','$op5' , '$ans')";


    $run_store = mysqli_query($con, $insertion_Query);

    if ($run_store) {

        echo "<script>alert('Qustion Added')
        </script>";

        echo "<script>window.open('index.php?view_model_qus=$store_id','_self')</script>";
    } else {

        echo "Error MySQLI QUERY: " . mysqli_error($con);
    }
}
if (isset($_POST['updateBtn'])) {

    $qus = $_POST['qus'];
    $op1 = $_POST['op1'];
    $op2 = $_POST['op2'];
    $op3 = $_POST['op3'];
    $op4 = $_POST['op4'];
    $op5 = $_POST['op5'];
    $ans = $_POST['ans'];
    if ($op5 == '') {

        $op5 = "NULL";
    }
    $qusiton_id = $_POST['id'];




    $update_query = "UPDATE model_question_db  set  title ='$qus',option_one ='$op1',option_two = '$op2',option_three='$op3', option_four='$op4' , option_five='$op5' , right_ans = '$ans' WHERE id = $qusiton_id";


    $run_store = mysqli_query($con, $update_query);

    if ($run_store) {

        echo "<script>alert('Qustion Updated')
        </script>";

        echo "<script>window.open('index.php?view_model_qus=$store_id','_self')</script>";
    } else {

        echo "Error MySQLI QUERY: " . mysqli_error($con);
    }
}

?>