<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['delete_sub_p_cat'])){

$delete_p_cat_id = $_GET['delete_sub_p_cat'];

$delete_p_cat = "delete from product_sub_categories where sub_cat_id='$delete_p_cat_id'";

$run_delete = mysqli_query($con,$delete_p_cat);

if($run_delete){

echo "<script>alert('One Product Sub-Category Has been Deleted')</script>";

echo "<script>window.open('index.php?view_sub_p_cats','_self')</script>";

}

}



?>



<?php } ?>