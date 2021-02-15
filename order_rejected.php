<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['order_rejected'])){

$rejected_id = $_GET['order_rejected'];



        $SerachQery = "select order_status as status  from customers_orders where order_id = '$rejected_id' ; ";
        $run_search_query = mysqli_query($con, $SerachQery);
        $data_dues = mysqli_fetch_assoc($run_search_query);
        $status =  $data_dues['status'];

        if ($status == "processing" || $status == "completed" || $status == "rejected") {
            echo "<script>alert(' Error !! Order Has All Ready Been Set to $status' )</script>";

            echo "<script>window.open('javascript:history.go(-1)','_self')</script>";
        }
        else {
            $rejected_order = "UPDATE customers_orders SET order_status ='rejected' where order_id='$rejected_id'";

            $run_rejected = mysqli_query($con, $rejected_order);

            if ($run_rejected) {

                echo "<script>alert('Order Has Been Set to Rejected')</script>";
                
                echo "<script>window.open('javascript:history.go(-1)','_self')</script>";

              //  echo "<script>window.open('index.php?view_orders','_self')</script>";
            }

        }




}



?>



<?php }  ?>