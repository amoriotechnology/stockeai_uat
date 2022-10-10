<?php 
include 'config.php';


//$result = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM sales_invoice_settings ORDER BY 'Time' ASC LIMIT 1"));

  // return $row['Time'];


  
  
  $result = mysqli_query($con,"SELECT * FROM `sales_invoice_settings` ORDER BY `Time` DESC LIMIT 1");
  while ($row = mysqli_fetch_array($result)) {
echo  $row["invoice_template"]. "/";
echo  $row["account"]. "/";
echo  $row["remarks"];
  }
   
  
   $con->close();


        ?>






