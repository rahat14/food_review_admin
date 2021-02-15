<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<?php

    if (isset($_GET['delete_notification'])) {

        $delete_p_cat_id = $_GET['delete_notification'];

        $delete_p_cat = "delete from notification_db where id='$delete_p_cat_id'";

        $run_delete = mysqli_query($con, $delete_p_cat);

        if ($run_delete) {

            echo "<script>alert('One Notification Has been Deleted')</script>";

            echo "<script>window.open('index.php?send_notification','_self')</script>";
        }
    }



?>



<?php } ?>