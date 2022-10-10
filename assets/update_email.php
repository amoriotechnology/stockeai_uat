<?php
include 'config.php';
	session_start();
$pdf=0;
if(isset($_POST['pdf']))
{
 $pdf=$_POST['pdf'];
}

if(isset($_POST['dear']) && isset($_POST['first']))
{
	$greeting =$_POST['dear'].'_'.$_POST['first'];
}
$query='SELECT * from invoice_email where uid='.$_POST['uid'];
$sql=mysqli_query($con,$query);
$count=mysqli_num_rows($sql);
if($count>0)
{

echo $query='update invoice_email set pdf_attached="'.$pdf.'",subject="'.$_POST['subject'].'",greeting="'.$greeting.'",message="'.$_POST['message'].'" where uid='.$_POST['uid'];
}
else
{
 $query='insert into invoice_email(pdf_attached,subject,greeting,message,uid) values("'.$pdf.'","'.$_POST['subject'].'","'.$greeting.'","'.$_POST['message'].'","'.$_POST['uid'].'")';
}
 $sql=mysqli_query($con,$query);

 if($sql)
 {
 	header('location:../Cweb_setting/email_template');
 }


?>
