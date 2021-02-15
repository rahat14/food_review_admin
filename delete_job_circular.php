<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<?php

    if (isset($_GET['delete_job_circular'])) {

        $delete_p_cat_id = $_GET['delete_job_circular'];

        $delete_p_cat = "delete from job_circular_db where id='$delete_p_cat_id'";

        $run_delete = mysqli_query($con, $delete_p_cat);

        if ($run_delete) {

            echo "<script>alert('One Job Circular Has been Deleted')</script>";

            echo "<script>window.open('index.php?view_job_circular','_self')</script>";
        }
    }



?>



<?php } ?>