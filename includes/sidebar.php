<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>


    <body class="hold-transition sidebar-mini">

        <div class="wrapper">


            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="index.php?dashboard" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="index.php?send_notification" class="nav-link">Contact</a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->


                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->

                </ul>


            </nav>

            <aside class="main-sidebar sidebar-dark-primary elevation-4">



                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Chakri Admin</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item ">
                                <a href="index.php?dashboard" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                        <i class="right fas fa-angle-right"></i>
                                    </p>
                                </a>

                            </li>

                            <!-- <li class="nav-item">
                                <a href="index.php?view_orders" class="nav-link">
                                    <i class="nav-icon fa fa-credit-card"></i>
                                    <p>
                                        Orders

                                    </p>
                                </a>
                            </li> -->

<!-- 
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>&nbsp
                                        Job Circulars
                                        <i class="fas fa-angle-left right"></i>
                                        <span class="badge badge-info right"></span>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="index.php?insert_job_circular" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Insert Circular</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?view_job_circular" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Circular</p>
                                        </a>
                                    </li>



                                </ul>
                            </li> -->



                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon nav-icon fas fa-copy"></i>
                                    <p>
                                        Resturants
                                        <i class="fas fa-angle-left right"></i>
                                        <span class="badge badge-info right"></span>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="index.php?insert_resturant" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add a Resturants</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?view_resturant" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Resturants</p>
                                        </a>
                                    </li>



                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Category
                                        <i class="fas fa-angle-left right"></i>
                                        <span class="badge badge-info right"></span>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="index.php?insert_p_cat" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Food Category</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?location_cat" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Location Category</p>
                                        </a>
                                    </li>

                                    <!-- <li class="nav-item">
                                        <a href="index.php?insert_sub_p_cat" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Insert Sub-Category</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?view_sub_p_cats" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Sub-Category</p>
                                        </a>
                                    </li> -->

                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="index.php?offer_list" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>

                                    <p>
                                        Offer Section 

                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="index.php?new_opened_list" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>

                                    <p>
                                        Newly Opened List

                                    </p>
                                </a>
                            </li>


                           

                            <li class="nav-item">
                                <a href="index.php?view_users" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>

                                    <p>
                                        User List

                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="index.php?view_all_comment" class="nav-link">
                                    <i class="nav-icon fas fa-comment"></i>

                                    <p>
                                        Comment List

                                    </p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="index.php?send_notification" class="nav-link">
                                    <i class="nav-icon fas fa-bell"></i>

                                    <p>
                                        Notificaiton

                                    </p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="index.php?view_qustion_list" class="nav-link">
                                    <i class="nav-icon fas fa-comment"></i>

                                    <p>
                                        User Qustions

                                    </p>
                                </a>
                            </li>


                            <!-- <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Charts
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/charts/chartjs.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>ChartJS</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/charts/flot.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Flot</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/charts/inline.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Inline</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tree"></i>
                                    <p>
                                        UI Elements
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/UI/general.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>General</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/UI/icons.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Icons</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/UI/buttons.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Buttons</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/UI/sliders.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sliders</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/UI/modals.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Modals & Alerts</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/UI/navbar.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Navbar & Tabs</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/UI/timeline.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Timeline</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/UI/ribbons.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ribbons</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Forms
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/forms/general.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>General Elements</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/forms/advanced.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Advanced Elements</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/forms/editors.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Editors</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/forms/validation.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Validation</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Tables
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/tables/simple.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Simple Tables</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/tables/data.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>DataTables</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/tables/jsgrid.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>jsGrid</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-header">EXAMPLES</li>
                            <li class="nav-item">
                                <a href="pages/calendar.html" class="nav-link">
                                    <i class="nav-icon far fa-calendar-alt"></i>
                                    <p>
                                        Calendar
                                        <span class="badge badge-info right">2</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/gallery.html" class="nav-link">
                                    <i class="nav-icon far fa-image"></i>
                                    <p>
                                        Gallery
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-envelope"></i>
                                    <p>
                                        Mailbox
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/mailbox/mailbox.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Inbox</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/mailbox/compose.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Compose</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/mailbox/read-mail.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Read</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Pages
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/examples/invoice.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Invoice</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/profile.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Profile</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/e-commerce.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>E-commerce</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/projects.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Projects</p>
                                        </a>
                                    </li>
                                    updated somethin to cehcel 
                                    <li class="nav-item">
                                        <a href="pages/examples/project-add.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Project Add</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/project-edit.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Project Edit</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/project-detail.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Project Detail</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/contacts.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Contacts</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-plus-square"></i>
                                    <p>
                                        Extras
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/examples/login.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Login</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/register.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Register</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/forgot-password.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Forgot Password</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/recover-password.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Recover Password</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/lockscreen.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Lockscreen</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Legacy User Menu</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/language-menu.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Language Menu</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/404.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Error 404</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/500.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Error 500</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/pace.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pace</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/blank.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Blank Page</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="starter.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Starter Page</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-header">MISCELLANEOUS</li>
                            <li class="nav-item">
                                <a href="https://adminlte.io/docs/3.0" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Documentation</p>
                                </a>
                            </li>
                            <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-circle nav-icon"></i>
                                    <p>Level 1</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>
                                        Level 1
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Level 2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Level 2
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Level 3</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Level 3</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Level 3</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Level 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-circle nav-icon"></i>
                                    <p>Level 1</p>
                                </a>
                            </li>
                            <li class="nav-header">LABELS</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-circle text-danger"></i>
                                    <p class="text">Important</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-circle text-warning"></i>
                                    <p>Warning</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>Informational</p>
                                </a>
                            </li> -->
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>
                <!-- /.content-header -->





    </body>








<?php } ?>