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

                    <i class="fa fa-dashboard"></i> Dashboard / Send New Notificaiton

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

                        Send New Notificaiton

                    </h3><!-- panel-title Ends -->


                </div><!-- panel-heading Ends -->


                <div class="card-body">
                    <!-- panel-body Starts -->

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-6 control-label">Title</label>

                            <div class="col-md-12">

                                <input type="text" placeholder="Title of Your Nottification" name="p_cat_title" class="form-control" required>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-6 control-label"> Description</label>

                            <div class="col-md-12">


                                <textarea name="p_cat_desc" class="form-control" rows="5" cols="20" placeholder="Description of Your Nottification"></textarea>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label for="exampleInputFile">Notification Image : </label>

                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" name="p_cat_image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>

                                </div>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-6 control-label">Post ID</label>

                            <div class="col-md-12">

                                <input type="text" placeholder="Post ID" name="id" class="form-control">

                            </div>

                        </div><!-- form-group Ends -->

                        555 for job preparation
                        666 for job circular
                        000 for Default

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-6 control-label">Post Type</label>

                            <div class="col-md-12">

                                <input type="text" placeholder="Type" name="type" class="form-control">

                            </div>

                        </div><!-- form-group Ends -->



                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-2">

                                <input type="submit" name="submit" value="Add Notification" class="btn btn-primary form-control">

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->



                </div><!-- panel-body Ends -->


            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->

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

                        <i class="fas fa-money fa-fw"></i>Previous Notification

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

                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Delete</th>



                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                $i = 0;

                                $get_pro = "select * from notification_db ORDER BY id DESC";

                                $run_pro = mysqli_query($con, $get_pro);

                                while ($row_pro = mysqli_fetch_array($run_pro)) {

                                    $pro_id = $row_pro['id'];

                                    $pro_title = $row_pro['title'];

                                    $pro_desc = $row_pro['description'];

                                    $pro_date = $row_pro['date'];

                                    $i++;

                                ?>

                                    <tr>


                                        <td><?php echo $pro_id; ?></td>
                                        <td><?php echo $pro_title; ?></td>
                                        <td><?php echo $pro_desc; ?></td>
                                        <td><?php echo $pro_date; ?></td>

                                        <td>
                                            <button class="btn btn-block btn-outline-danger" data-toggle="modal" onclick="window.location.href='index.php?delete_notification=<?php echo $pro_id; ?>'">

                                                Delete

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



    <?php

    if (isset($_POST['submit'])) {
        $date = date("Y-m-d") . "";
        $p_cat_title = $_POST['p_cat_title'];

        $p_cat_desc = $_POST['p_cat_desc'];
        $type = $_POST['type'];
        $id = $_POST['id'];

        $p_cat_image = $_FILES['p_cat_image']['name'];

        $p_cat_image = round(microtime(true)) . $p_cat_image;

        $temp_name = $_FILES['p_cat_image']['tmp_name'];

        move_uploaded_file($temp_name, "all_images/$p_cat_image");

        echo  $p_cat_image;

        // trigger nottification 


        function sendMessage($title, $desc, $p_cat_image, $type, $id)
        {
            $content      = array(
                "en" => $desc,

            );
            $headings = array(
                "en" => $title,
            );

            $hashes_array = array();
            array_push($hashes_array, array(
                "id" => "like-button",
                "text" => "Like",
                "icon" => "http://i.imgur.com/N8SN8ZS.png",
                "url" => "https://yoursite.com"
            ));
            array_push($hashes_array, array());
            $fields = array(
                'app_id' => "680413e3-cee6-4ad2-a9f6-318c23bae953",
                'included_segments' => array(
                    'All'
                ),
                'data' => array(
                    "post_type" => "" . $type,
                    "id" => "" . $id,
                ),
                'contents' => $content,
                'headings' => $headings,
                'big_picture' => $p_cat_image

            );

            $fields = json_encode($fields);
            print("\nJSON sent:\n");
            print($fields);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Authorization: Basic YWVkM2QzNjctZjY5Yi00ZGUxLTk5ZjgtNWUwODM0MmVjZjNm'
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            $response = curl_exec($ch);
            curl_close($ch);

            return $response;
        }


        $image = 'https://rajokiofashion.com/chakri_admin/all_images/' . $p_cat_image;
        echo $image;
        $response = sendMessage($p_cat_title, $p_cat_desc, $image, $type, $id);
        $return["allresponses"] = $response;
        $return = json_encode($return);

        $data = json_decode($response, true);
        print_r($data);
        $id = $data['id'];
        print_r($id);

        print("\n\nJSON received:\n");
        print($return);
        print("\n");


        // load data 
        $insert_p_cat = "insert into notification_db(title , description , date  ) values ('$p_cat_title' , '$p_cat_desc' , '$date')";

        $run_p_cat = mysqli_query($con, $insert_p_cat);

        if ($run_p_cat) {

            echo "<script>alert('New Notificaiton Has been Inserted')</script>";

            echo "<script>window.open('index.php?send_notification','_self')</script>";
        }
    }



    ?>


<?php } ?>