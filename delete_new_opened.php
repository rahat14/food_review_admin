<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<?php

    if (isset($_GET['delete_new_opened'])) {

        $delete_p_cat_id = $_GET['delete_new_opened'];

        $delete_p_cat = "delete from new_resturant_db where resturant_id='$delete_p_cat_id'";

        $run_delete = mysqli_query($con, $delete_p_cat);

        if ($run_delete) {

            echo "<script>alert('New Resturant Has been Removed From The List')</script>";

            echo "<script>window.open('index.php?new_opened_list','_self')</script>";
        }
    }



?>



<?php } ?>