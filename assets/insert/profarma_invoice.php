<?php 
include '../config.php';	
session_start();
$purchase_id = date('YmdHis');
// print_r($_REQUEST);
// exit;


 $query='insert into profarma_invoice(
purchase_id,
chalan_no,
purchase_date,
billing_address,
customer_id,
pre_carriage,
receipt,
country_goods,
country_destination,
loading,
discharge,
terms_payment,
description_goods,
total,
ac_details,
sales_by) values(

"'.$purchase_id.'",
"'.$_REQUEST['chalan_no'].'",
"'.$_REQUEST['purchase_date'].'",
"'.$_REQUEST['billing_address'].'",
"'.$_REQUEST['customer_id'].'",
"'.$_REQUEST['pre_carriage_'].'",
"'.$_REQUEST['receipt'].'",
"'.$_REQUEST['country_goods'].'",
"'.$_REQUEST['country_destination'].'",
"'.$_REQUEST['loading'].'",
"'.$_REQUEST['discharge'].'",
"'.$_REQUEST['terms_payment'].'",
"'.$_REQUEST['description_goods'].'",
"'.$_REQUEST['total'].'",
"'.$_REQUEST['ac_details'].'",
"'.$_REQUEST['uid'].'"




)';

$rand=rand();
$session=$rand.'-'.$purchase_id;
$_SESSION['Purchase']=$session;
$sql=mysqli_query($con,$query);

if($sql)
{

for($i=0;$i<count($_REQUEST['product_id']);$i++)
{
	 $query='insert into profarma_invoice_details(
	purchase_detail_id,
	purchase_id,
	product_id,
	quantity,
	rate,
	total_amount,
	create_by,
	status
)
values(
"'.$rand.'",
"'.$purchase_id.'",
"'.$_REQUEST['product_id'][$i].'",
"'.$_REQUEST['product_quantity'][$i].'",
"'.$_REQUEST['product_rate'][$i].'",
"'.$_REQUEST['total_price'][$i].'",
"'.$_REQUEST['uid'].'",
"1"



)';
mysqli_query($con,$query);
}
echo 'success';
}
?>
