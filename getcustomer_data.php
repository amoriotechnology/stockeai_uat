<?php 
include 'config.php';
if($_REQUEST['val']!=='')
{
$val=$_REQUEST['val'];
 $query='SELECT * FROM `customer_information` where customer_name="'.$val.'"';

$sql=mysqli_query($con,$query);
$row=mysqli_fetch_array($sql);
// print_r($row);
echo  'Address- '.$row['customer_address'].',';
?>

<?php
 
echo 'Email-'.$row['email_address'].',';

?>

<?php
  echo 'Phone- '.$row['phone'].'.';
}
?>