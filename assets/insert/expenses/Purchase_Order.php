<?php
include '../../config.php';
$id= date ('YmdHis');
$supplier_id= $_POST['supplier_id'];
$purchase_date= $_POST['purchase_date'];
$created_by= $_POST['created_by'];
$shipment_terms= $_POST['shipment_terms'];
$ship_to= $_POST['ship_to'];
$chalan_no= $_POST['chalan_no'];
$payment_terms= $_POST['payment_terms'];
$est_ship_date= $_POST['est_ship_date'];
$product_id= $_POST['product_id'];
$total= $_POST['total'];
$slabs= $_POST['slabs'];
$available_quantity= $_POST['available_quantity'];
$product_quantity= $_POST['product_quantity'];
$product_rate= $_POST['product_rate'];
$total_price= $_POST['total_price'];
$remarks= $_POST['remarks'];
$ac_details=$_POST['ac_details'];
$blank='';
 $query='insert into `purchase_order`(`purchase_order_id`, `chalan_no`, `supplier_id`, `ship_to`, `created_by`, `payment_terms`, `shipment_terms`, `est_ship_date`,
  `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `payment_due_date`, `remarks`, 
 `message_invoice`) value("'.$id.'","'.$chalan_no.'","'.$supplier_id.'","'.$ship_to.'","'.$created_by.'",
"'.$payment_terms.'","'.$shipment_terms.'","'.$est_ship_date.'","'.$total.'","'.$blank.'","'.$blank.'","'.$blank.'","'.$purchase_date.'","'.$blank.'",
"'.$remarks.'","'.$ac_details.'")';
//echo $query;
mysqli_query($con,$query);



$rowCount = count($_POST['product_id']);
    for ($i = 0; $i < $rowCount; $i++) {
        if(!empty($_POST['product_id']) && !empty($_POST['slab_no']) && !empty($_POST['product_quantity']) && 
        !empty($_POST['product_rate']) ){
            $product_id= $_POST['product_id'][$i];
        $slab_no = $_POST['slab_no'][$i];
        $product_quantity= $_POST['product_quantity'][$i];
        $product_rate= $_POST['product_rate'][$i];
        $total_price= $_POST['total_price'][$i];
       
        $query2 ="insert into `purchase_order_details`( `purchase_id`, `product_id`, `quantity`, `slabs`, `rate`, `total_amount`) 
        values ('$id', '$product_id', '$product_quantity', '$slab_no',
         '$product_rate', '$width','$total_price')";
         echo $query2;
        mysqli_query($con,$query2);
       
    }
    
    //mysqli_query($con,$query2);
}


?>