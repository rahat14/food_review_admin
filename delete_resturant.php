<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<?php
//insert_resturant
    if (isset($_GET['delete_resturant'])) {

        $delete_p_cat_id = $_GET['delete_resturant'];

        $delete_p_cat = "delete from resturant_db where id='$delete_p_cat_id'";

        $run_delete = mysqli_query($con, $delete_p_cat);

        if ($run_delete) {

            echo "<script>alert('One Resturant Has been Deleted')</script>";

            echo "<script>window.open('index.php?view_resturant','_self')</script>";
        }
    }



?>



<?php } ?>