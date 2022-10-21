<style type="text/css">
  

  th {
    background:blue;
    color: #fff;
  }
</style>

<?php 

if($design[0]['template']==1)
  { ?>

<div class="jumbotron text-center" id="content">
 
<div class="row" style="font-size:14px;">
  <div class="col-sm-4">Company name:<?php echo  $company_info[0]['company_name']; ?><br>
Address:<?php echo  $company_info[0]['address']; ?><br>
Email:<?php echo  $company_info[0]['email']; ?><br>
Contact:<?php echo  $company_info[0]['mobile']; ?></div>
  <div class="col-sm-4"><h4>Sales invoice</h4>  </div>
  <div class="col-sm-4"><img src="<?php echo base_url().'/assets/'.$design[0]['logo']; ?>" width='130px;'></div>
</div>
<br>
<br>

<div class="row">
<div class="col-sm-4"><table class="table table-bordered">
  <tr style="font-size:14px;">
    <th>Bill To</th>
  </tr >
  <tr>
    <td>
      Cutomer name : <?php echo $bill_to[0]['customer_name']; ?><br>
      Cutomer phone : <?php echo $bill_to[0]['customer_mobile']; ?><br>
      Cutomer email : <?php echo $bill_to[0]['customer_email']; ?><br>

    
    </td>
  </tr>
</table>  
</div>
</div>
<br>
<br>
<table class="table table-bordered">
  <tr align="center">
    <th>sno</th>
    <th>Material</th>
    <th>Description</th>
    <th>Qty</th>
    <th>Rate</th>

  </tr>
  <?php 

  for($i=0;$i<count($product);$i++)
  {

  ?>

  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $product['product_name']; ?></td>
    <td><?php echo $product['product_details']; ?></td>
    <td><?php echo $product['p_quantity']; ?></td>
    <td><?php echo $product['price']; ?></td>
  
   
  </tr>
<?php  $price[$i]=$product[0]['price']; } ?>

<tr>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td >Total</td>
  <td ><?php echo array_sum($price); ?></td>
</tr>
</table>


<div></div>

</div>
  
<?php } ?>



<?php 

if($design[0]['template']==2)
  { ?>

<div class="jumbotron text-center" id="content">
 
<div class="row" style="font-size:14px;">
  <div class="col-sm-4">Company name:<?php echo  $company_info[0]['company_name']; ?><br>
Address:<?php echo  $company_info[0]['address']; ?><br>
Email:<?php echo  $company_info[0]['email']; ?><br>
Contact:<?php echo  $company_info[0]['mobile']; ?></div>
  <div class="col-sm-4"><h4>Sales invoice</h4>  </div>
  <div class="col-sm-4"><img src="<?php echo base_url().'/assets/'.$design[0]['logo']; ?>" width='130px;'></div>
</div>
<br>
<br>

<div class="row">
<div class="col-sm-4"><table class="table table-bordered">
  <tr style="font-size:14px;">
    <th>Bill To</th>
  </tr >
  <tr>
    <td>
      Cutomer name : <?php echo $bill_to[0]['customer_name']; ?><br>
      Cutomer phone : <?php echo $bill_to[0]['customer_mobile']; ?><br>
      Cutomer email : <?php echo $bill_to[0]['customer_email']; ?><br>

    
    </td>
  </tr>
</table>  
</div>
</div>
<br>
<br>
<table class="table table-bordered">
  <tr align="center">
    <th>sno</th>
    <th>Material</th>
    <th>Description</th>
    <th>Qty</th>
    <th>Rate</th>

  </tr>
  <?php 

  for($i=1;$i<=count($product);$i++)
  {

  ?>

  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $product[0]['product_name']; ?></td>
    <td><?php echo $product[0]['product_details']; ?></td>
    <td><?php echo $product[0]['p_quantity']; ?></td>
    <td><?php echo $product[0]['price']; ?></td>
  
   
  </tr>
<?php  $price[$i]=$product[0]['price']; } ?>

<tr>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td >Total</td>
  <td ><?php echo array_sum($price); ?></td>
</tr>
</table>


<div></div>

</div>
  
<?php } ?>


<?php 

if($design[0]['template']==3)
  { ?>

<div class="jumbotron text-center" id="content">
 
<div class="row" style="font-size:14px;">
  <div class="col-sm-4">Company name:<?php echo  $company_info[0]['company_name']; ?><br>
Address:<?php echo  $company_info[0]['address']; ?><br>
Email:<?php echo  $company_info[0]['email']; ?><br>
Contact:<?php echo  $company_info[0]['mobile']; ?></div>
  <div class="col-sm-4"><h4>Sales invoice</h4>  </div>
  <div class="col-sm-4"><img src="<?php echo base_url().'/assets/'.$design[0]['logo']; ?>" width='130px;'></div>
</div>
<br>
<br>

<div class="row">
<div class="col-sm-4"><table class="table table-bordered">
  <tr style="font-size:14px;">
    <th>Bill To</th>
  </tr >
  <tr>
    <td>
      Cutomer name : <?php echo $bill_to[0]['customer_name']; ?><br>
      Cutomer phone : <?php echo $bill_to[0]['customer_mobile']; ?><br>
      Cutomer email : <?php echo $bill_to[0]['customer_email']; ?><br>

    
    </td>
  </tr>
</table>  
</div>
</div>
<br>
<br>
<table class="table table-bordered">
  <tr align="center">
    <th>sno</th>
    <th>Material</th>
    <th>Description</th>
    <th>Qty</th>
    <th>Rate</th>

  </tr>
  <?php 

  print_r($product);
    ?>
    
    
</table>


<div></div>

</div>
  
<?php } ?>

</body>
</html>


<!-- 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"/>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
$(document).ready(function () {
 
 var pdf = new jsPDF('p','pt','a4');
    const invoice = document.getElementById("content");
             console.log(invoice);
             console.log(window);
             var pageWidth = 8.5;
             var margin=0.5;
             var opt = {
   lineHeight : 1.2,
   margin : 0.2,
   maxLineWidth : pageWidth - margin *1,
                 filename: 'invoice'+'.pdf',
                 allowTaint: true,
                
                 html2canvas: { scale: 3 },
                 jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
             };
              html2pdf().from(invoice).set(opt).toPdf().get('pdf').then(function (pdf) {
  var totalPages = pdf.internal.getNumberOfPages();
 for (var i = 1; i <= totalPages; i++) {
    pdf.setPage(i);
    pdf.setFontSize(10);
    pdf.setTextColor(150);
    
  }
      window.location='<?php  echo base_url();   ?>'+'Cinvoice/manage_invoice';
  }).save();



  
   });
   </script> -->