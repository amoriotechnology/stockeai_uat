<?php
include 'config.php';
error_reporting(1);
$total_developer_sql='';
$developer_sql='';

$limit = 10;
if(!empty($request['searchPhrase'])) {   
	$where_condition .=" WHERE ";
	$where_condition .=" ( customer_information.customer_name LIKE '".$request['searchPhrase']."%' ";    
	$where_condition .=" OR users.first_name LIKE '".$request['searchPhrase']."%' ";
	$where_condition .=" OR invoice.customer_id LIKE '".$request['searchPhrase']."%' ";
	$where_condition .=" OR users.last_name LIKE '".$request['searchPhrase']."%' )";
}
if( !empty($request['sort']) ) {  
	$where_condition .=" ORDER By ".key($request['sort']) .' '.current($request['sort'])." ";
}
$sql_query = "SELECT invoice.sales_by,invoice.customer_id, customer_information.customer_name, users.first_name, users.last_name
FROM invoice
LEFT JOIN customer_information
ON customer_information.customer_id = invoice.customer_id
LEFT JOIN users
ON users.user_id = invoice.sales_by";
$total_developer_sql .= $sql_query;
$developer_sql .= $sql_query;
if(isset($where_condition) && $where_condition != '') {
	$total_developer_sql .= $where_condition;
	$developer_sql .= $where_condition;
}
if ($limit!=-1) {
//	$developer_sql .= "LIMIT $start, $limit";
}
// Getting total number of developer record count
$result_total = mysqli_query($con, $total_developer_sql) or die("database error:". mysqli_error($con));
$total_developer = mysqli_num_rows($result_total);
// getting eployee records and store into an array
$resultset = mysqli_query($con, $developer_sql) or die("database error:". mysqli_error($con));
while( $developer = mysqli_fetch_assoc($resultset) ) { 
	$developer_records[] = $developer;       
}
// creating developer data array according to jQuery Bootgrid requirement to display records
$developer_json_data = array(
	//"current"   => intval($request['current']), 
	//'rowCount'  => 10,
	//"total"     => intval($total_developer),
	"rows"      => $developer_records 
);
// return developer data array as JSON data
echo json_encode($developer_records);
?>

<?php

/*



$sql="SELECT invoice.sales_by,invoice.customer_id, customer_information.customer_name, users.first_name, users.last_name
        FROM invoice
        LEFT JOIN customer_information
        ON customer_information.customer_id = invoice.customer_id
        LEFT JOIN users
        ON users.user_id = invoice.sales_by";
             $row = mysqli_query($con, $sql);
             $rows= array();
             while($r = mysqli_fetch_assoc($row)) {
                 $rows[] = $r;
             }
          //  return $rows;
//echo $rows;
echo json_encode($rows);
foreach ($rows as $x){
    foreach ($x as $xx){
      //  echo $xx;
    }
  
}
  //  mysql_free_result($rows);
    //

// return $response; 
*/

    
    ?>