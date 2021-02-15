<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['order_process'])){

$process_id = $_GET['order_process'];


        $SerachQery = "select order_status as status  from customers_orders where order_id = '$process_id' ; ";
        $run_search_query = mysqli_query($con, $SerachQery);
        $data_dues = mysqli_fetch_assoc($run_search_query);
        $status =  $data_dues['status'];

        if ($status == "processing" || $status == "completed" || $status == "rejected") {
            echo "<script>alert(' Error !! Order Has All Ready Been Set to $status' )</script>";

            echo "<script>window.open('javascript:history.go(-1)','_self')</script>";
        }
        else 
        {
            $process_order = "UPDATE customers_orders SET order_status ='processing' where order_id='$process_id'";

            $run_process = mysqli_query($con, $process_order);

            if ($run_process) {

                echo "<script>alert('Order Has Been Set to Processing')</script>";

                echo "<script>window.open('javascript:history.go(-1)','_self')</script>";
               // echo "<script>window.open('index.php?view_orders','_self')</script>";
            }

        }




}



?>



<?php }  ?>