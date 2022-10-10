<?php
include 'config.php';
session_start();
$cname=$_REQUEST['cname'];
$cemail=$_REQUEST['email'];
$cphone=$_REQUEST['cphone'];
$caddress=$_REQUEST['caddress'];
$cwebsite=$_REQUEST['cwebsite'];
 $uid=$_REQUEST['uid'];
 $query='insert into company_information(`company_name`,`email`,`address`,`mobile`,`website`,`status`,`create_by`) values("'.$cname.'","'.$cemail.'","'.$caddress.'","'.$cphone.'","'.$cwebsite.'",1,"'.$uid.'")';
	 $sql=mysqli_query($con,$query);

	 $id = mysqli_insert_id($con);

	 $query='insert into '
?>