<?php
session_start(); 
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require 'vendor/autoload.php';
require '../assets/config.php';

 $query='SELECT d.logo,d.color,c.business_name,c.phone,c.email,c.reg_number,c.website,c.address from invoice_design as d 
join
invoice_content as c
 on c.uid=d.uid

 WHERE c.uid='.$_REQUEST['id'];
$sql=mysqli_query($con,$query);
$row=mysqli_fetch_array($sql);

 use Dompdf\Dompdf;

$html='<img src="https://res.klook.com/images/fl_lossy.progressive,q_65/c_fill,w_1295,h_720/w_80,x_15,y_15,g_south_west,l_Klook_water_br_trans_yhcmh3/activities/t9ur9cc1khkup1dmcbzd/IMGWorldsofAdventure.webp">';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

$dompdf->stream('sample.pdf',['Attachment'=>0]);

?>