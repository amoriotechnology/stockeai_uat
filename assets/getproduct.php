<?php
include 'config.php';

  $_REQUEST['val'];
   echo  $query='select * from product_information where product_name="'.$_REQUEST['val'].'"';
   $sql=mysqli_query($con,$query);
   $row=mysqli_fetch_array($sql);
   $num=mysqli_num_rows($sql);

   if($num>0)
   {

   echo $row['p_quantity'];
}

?>