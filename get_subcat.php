 <?php
    include("includes/db.php");
    $category_id = $_POST["category_id"];
    $result = mysqli_query($con, "SELECT * FROM job_prep_sub_category where parent_category_id=$category_id");
    // $row1     = mysqli_fetch_assoc($result);
    // $lengths = mysqli_fetch_lengths($result);
    ?>
 <option value="">Select Sub-Category</option>
 <?php
    while ($row = mysqli_fetch_array($result)) {
        
    ?>
    
   
    
     <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
 <?php
    }
    ?>