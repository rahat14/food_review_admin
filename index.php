<?php

session_start();

include("includes/db.php");

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {




?>

    <?php

    $admin_session = $_SESSION['admin_email'];

    $get_admin = "select * from admins  where admin_email='$admin_session'";

    $run_admin = mysqli_query($con, $get_admin);

    $row_admin = mysqli_fetch_array($run_admin);

    $admin_id = $row_admin['admin_id'];

    $admin_name = $row_admin['admin_name'];

    $admin_email = $row_admin['admin_email'];



    // $count_job_circular = mysqli_num_rows($run_products);




    // $get_products = "select * from products";
    // $run_products = mysqli_query($con, $get_products);
    // $count_products = mysqli_num_rows($run_products);

    // $get_customers = "select * from customers";
    // $run_customers = mysqli_query($con, $get_customers);
    // $count_customers = mysqli_num_rows($run_customers);

    // $get_p_categories = "select * from product_categories";
    // $run_p_categories = mysqli_query($con, $get_p_categories);
    // $count_p_categories = mysqli_num_rows($run_p_categories);


    // $get_pending_orders = "select * from customers_orders";
    // $run_pending_orders = mysqli_query($con, $get_pending_orders);
    // $count_pending_orders = mysqli_num_rows($run_pending_orders);


    ?>


    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>One Shop Admin</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">



        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">


        <div id="wrapper">
            <!-- wrapper Starts -->

            <?php include("includes/sidebar.php");  ?>

            <div id="page-wrapper">
                <!-- page-wrapper Starts -->

                <div class="container-fluid">
                    <!-- container-fluid Starts -->

                    <?php

                    if (isset($_GET['dashboard'])) {

                        include("dashboard.php");
                    }

                    if (isset($_GET['insert_product'])) {

                        include("insert_product.php");
                    }

                    if (isset($_GET['view_products'])) {

                        include("view_products.php");
                    }

                    if (isset($_GET['delete_product'])) {

                        include("delete_product.php");
                    }

                    if (isset($_GET['edit_product'])) {

                        include("edit_product.php");
                    }

                    if (isset($_GET['insert_p_cat'])) {

                        include("insert_p_cat.php");
                    }
                    if (isset($_GET['insert_resturant'])) {

                        include("insert_resturant.php");
                    }

                    if (isset($_GET['view_p_cats'])) {

                        include("view_p_cats.php");
                    }

                    if (isset($_GET['view_sub_p_cats'])) {

                        include("view_sub_p_cats.php");
                    }

                    if (isset($_GET['delete_sub_p_cat'])) {

                        include("delete_sub_p_cat.php");
                    }
                    if (isset($_GET['edit_sub_p_cat'])) {

                        include("edit_sub_p_cat.php");
                    }
                    if (isset($_GET['insert_sub_p_cat'])) {

                        include("insert_sub_p_cat.php");
                    }

                    if (isset($_GET['delete_p_cat'])) {

                        include("delete_p_cat.php");
                    }

                    if (isset($_GET['edit_p_cat'])) {

                        include("edit_p_cat.php");
                    }

                    if (isset($_GET['insert_zone'])) {

                        include("insert_zone.php");
                    }



                    if (isset($_GET['view_zone'])) {

                        include("view_zone.php");
                    }
                    if (isset($_GET['view_order_list'])) {

                        include("view_order_list.php");
                    }

                    if (isset($_GET['delete_cat'])) {

                        include("delete_cat.php");
                    }

                    if (isset($_GET['edit_cat'])) {

                        include("edit_cat.php");
                    }

                    if (isset($_GET['insert_slide'])) {

                        include("insert_slide.php");
                    }

                    if (isset($_GET['insert_job_circular'])) {

                        include("insert_job_circular.php");
                    }

                    if (isset($_GET['view_resturant'])) {
                        include("view_resturant.php");
                    }

                    if (isset($_GET['edit_job_circular'])) {
                        include("edit_job_circular.php");
                    }
                    if (isset($_GET['delete_job_circular'])) {
                        include("delete_job_circular.php");
                    }
                    if (isset($_GET['delete_resturant'])) {
                        include("delete_resturant.php");
                    }
                    // if (isset($_GET['view_resturant'])) {
                    //     include("view_resturant.php");
                    // }

                    if (isset($_GET['view_model_qus'])) {
                        include("view_model_qus.php");
                    }
                    if (isset($_GET['add_model_qus'])) {
                        include("add_model_qus.php");
                    }
                    if (isset($_GET['view_model_qus_list'])) {
                        include("view_model_qus_list.php");
                    }

                    if (isset($_GET['edit_resturant'])) {
                        include("edit_resturant.php");
                    }
                    if (isset($_GET['view_slides'])) {

                        include("view_slides.php");
                    }

                    if (isset($_GET['delete_slide'])) {

                        include("delete_slide.php");
                    }


                    if (isset($_GET['edit_slide'])) {

                        include("edit_slide.php");
                    }


                    if (isset($_GET['view_customers'])) {

                        include("view_customers.php");
                    }

                    if (isset($_GET['customer_delete'])) {

                        include("customer_delete.php");
                    }


                    if (isset($_GET['view_orders'])) {

                        include("view_orders.php");
                    }

                    if (isset($_GET['order_delete'])) {

                        include("order_delete.php");
                    }

                    if (isset($_GET['order_process'])) {

                        include("order_process.php");
                    }

                    if (isset($_GET['order_completed'])) {

                        include("order_completed.php");
                    }
                    if (isset($_GET['shop_page'])) {

                        include("shop_page.php");
                    }

                    if (isset($_GET['order_rejected'])) {

                        include("order_rejected.php");
                    }

                    if (isset($_GET['view_payments'])) {

                        include("view_payments.php");
                    }

                    if (isset($_GET['payment_delete'])) {

                        include("payment_delete.php");
                    }

                    if (isset($_GET['insert_user'])) {

                        include("insert_user.php");
                    }

            

                    if (isset($_GET['user_delete'])) {

                        include("user_delete.php");
                    }



                    if (isset($_GET['view_users'])) {

                        include("view_users.php");
                    }

                    if (isset($_GET['location_cat'])) {

                        include("location_cat.php");
                    }

                    if (isset($_GET['delete_location_cat'])) {

                        include("delete_location_cat.php");
                    }

                    if (isset($_GET['offer_list'])) {

                        include("offer_list.php");
                    }

                    if (isset($_GET['new_opened_list'])) {

                        include("new_opened_list.php");
                    }
                    if (isset($_GET['delete_new_opened'])) {

                        include("delete_new_opened.php");
                    }
                    if (isset($_GET['insert_term'])) {

                        include("insert_term.php");
                    }

                    if (isset($_GET['view_terms'])) {

                        include("view_terms.php");
                    }

                    if (isset($_GET['delete_model_qus'])) {

                        include("delete_model_qus.php");
                    }
                    
                 if (isset($_GET['delete_comment'])) {

                      include("delete_comment.php");
                    }
                    

                    if (isset($_GET['delete_notification'])) {

                        include("delete_notification.php");
                    }
                 if (isset($_GET['delete_offer'])) {

                    include("delete_offer.php");
             }               
                    
                        if (isset($_GET['view_all_comment'])) {

                        include("view_all_comment.php");
                     }
                    if (isset($_GET['send_notification'])) {

                        include("send_notification.php");
                    }
                    // if (isset($_GET['delete_term'])) {

                    //     include("delete_term.php");
                    // }

                    // if (isset($_GET['edit_term'])) {

                    //     include("edit_term.php");
                    // }

                    // if (isset($_GET['edit_css'])) {

                    //     include("edit_css.php");
                    // }

                    // if (isset($_GET['insert_manufacturer'])) {

                    //     include("insert_manufacturer.php");
                    // }

                    // if (isset($_GET['view_manufacturers'])) {

                    //     include("view_manufacturers.php");
                    // }

                    // if (isset($_GET['delete_manufacturer'])) {

                    //     include("delete_manufacturer.php");
                    // }

                    // if (isset($_GET['edit_manufacturer'])) {

                    //     include("edit_manufacturer.php");
                    // }


                    // if (isset($_GET['insert_coupon'])) {

                    //     include("insert_coupon.php");
                    // }

                    // if (isset($_GET['view_coupons'])) {

                    //     include("view_coupons.php");
                    // }

                    // if (isset($_GET['delete_coupon'])) {

                    //     include("delete_coupon.php");
                    // }


                    // if (isset($_GET['edit_coupon'])) {

                    //     include("edit_coupon.php");
                    // }


                    // if (isset($_GET['insert_icon'])) {

                    //     include("insert_icon.php");
                    // }


                    // if (isset($_GET['view_icons'])) {

                    //     include("view_icons.php");
                    // }

                    // if (isset($_GET['delete_icon'])) {

                    //     include("delete_icon.php");
                    // }

                    // if (isset($_GET['edit_icon'])) {

                    //     include("edit_icon.php");
                    // }

                    // if (isset($_GET['insert_bundle'])) {

                    //     include("insert_bundle.php");
                    // }

                    // if (isset($_GET['view_bundles'])) {

                    //     include("view_bundles.php");
                    // }

                    // if (isset($_GET['delete_bundle'])) {

                    //     include("delete_bundle.php");
                    // }


                    // if (isset($_GET['edit_bundle'])) {

                    //     include("edit_bundle.php");
                    // }


                    // if (isset($_GET['insert_rel'])) {

                    //     include("insert_rel.php");
                    // }

                    // if (isset($_GET['view_rel'])) {

                    //     include("view_rel.php");
                    // }

                    // if (isset($_GET['delete_rel'])) {

                    //     include("delete_rel.php");
                    // }


                    // if (isset($_GET['edit_rel'])) {

                    //     include("edit_rel.php");
                    // }


                    // if (isset($_GET['edit_contact_us'])) {

                    //     include("edit_contact_us.php");
                    // }

                    // if (isset($_GET['insert_enquiry'])) {

                    //     include("insert_enquiry.php");
                    // }


                    // if (isset($_GET['view_enquiry'])) {

                    //     include("view_enquiry.php");
                    // }

                    // if (isset($_GET['delete_enquiry'])) {

                    //     include("delete_enquiry.php");
                    // }

                    // if (isset($_GET['edit_enquiry'])) {

                    //     include("edit_enquiry.php");
                    // }


                    // if (isset($_GET['edit_about_us'])) {

                    //     include("edit_about_us.php");
                    // }


                    // if (isset($_GET['insert_store'])) {

                    //     include("insert_store.php");
                    // }

                    if (isset($_GET['store_setup'])) {

                        include("store_setup.php");
                    }

                    if (isset($_GET['delete_store'])) {

                        include("delete_store.php");
                    }

                    if (isset($_GET['edit_store'])) {

                        include("edit_store.php");
                    }

                    ?>

                </div><!-- container-fluid Ends -->

            </div><!-- page-wrapper Ends -->

        </div><!-- wrapper Ends -->





        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- AdminLTE App -->
        <!-- ChartJS -->
        <script src="plugins/chart.js/Chart.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>

        <!-- <script src="dist/js/adminlte.min.js"></script> -->
        <script src="dist/js/adminlte.js"></script>

        <!-- for Data Table                 -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <!-- <script src="plugins/datatables/jquery.dataTables.js"></script> -->
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>


        <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                bsCustomFileInput.init();
            });
        </script>

        <script>
            $(function() {

                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "order": [
                        [0, "desc"]
                    ],
                    "info": true,
                    "autoWidth": true,
                    "responsive": true,
                });
            });
        </script>




        <script>
            $(function() {

                $('#example3').DataTable({
                    "paging": false,
                    "lengthChange": true,
                    "searching": false,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true,
                    "responsive": false,
                });
            });
        </script>
        <script>
            $(function() {

                $('#order_list_table').DataTable({
                    "paging": false,
                    "lengthChange": true,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": true,
                    "responsive": false,
                });
            });
        </script>
        <script>
            $(function() {
                $('#payment_details').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true,
                });
            });
        </script>

        <script>
            $(function() {
                $('#payment_details2').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": false,
                    "info": false,
                    "autoWidth": true,
                    "responsive": false,
                });
            });
        </script>

        <script>
            var url = window.location;
            // for sidebar menu entirely but not cover treeview
            $('ul.nav-sidebar a').filter(function() {
                return this.href == url;
            }).addClass('active');

            // for treeview
            $('ul.nav-treeview a').filter(function() {
                return this.href == url;
            }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
        </script>

        <script>
            $(document).ready(function() {
                $('#category').on('change', function() {
                    var category_id = this.value;
                    $.ajax({
                        url: "get_subcat.php",
                        type: "POST",
                        data: {
                            category_id: category_id
                        },
                        cache: false,
                        success: function(dataResult) {
                            $("#sub_category").html(dataResult);
                        }
                    });


                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#category2').on('change', function() {
                    var category_id = this.value;
                    $.ajax({
                        url: "get_model_subcat.php",
                        type: "POST",
                        data: {
                            category_id: category_id
                        },
                        cache: false,
                        success: function(dataResult) {
                            $("#sub_category").html(dataResult);
                        }
                    });


                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#category').on('change', function() {
                    var category_id = this.value;
                    $.ajax({
                        url: "get_model_subcat.php",
                        type: "POST",
                        data: {
                            category_id: category_id
                        },
                        cache: false,
                        success: function(dataResult) {
                            $("#sub_category_2").html(dataResult);
                        }
                    });


                });
            });
        </script>

        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php
                                $get_products = "select * from job_circular_db";
                                $run_products = mysqli_query($con, $get_products);
                                while ($b = mysqli_fetch_array($run_products)) {
                                    echo '"' . $b['title'] . '",';
                                } ?>],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {

                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                },
                type: 'line',
            });
        </script>



    </body>


    </html>

<?php } ?>