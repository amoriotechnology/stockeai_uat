<?php 
echo base_url() ;


?>

<!-- Add new customer start -->
<style type="text/css">

#templates>img:hover
{

background-color: orange;
border: 1px solid orange;
}
#templates>img
{
    width: 50%;
}
#templatetext
{
    margin-left:20px;
     font-size: 10px;
    font-style: italic;
    font-family: ui-monospace;
}
</style>
<div class="content-wrapper" >
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>invoice design</h1>
            
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('ads') ?></a></li>
                <li class="active"><?php echo display('update_setting') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Alert Message -->      
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('error_message');
        }
        ?>



        <!-- New customer -->
       
            <?php
            //////////////Design one///////////// 
            if($template==1)
            {
            ?>

        <div class="col-sm-8" > <div class="panel panel-default" id="content">
    <div class="panel-body">
        
        <div class="row" >
        
              <div class="col-sm-3" id='company_info'>
                  
                  Company name:<?php echo $cname; ?><br>
                  Address:<?php echo $address; ?><br>
                  Email:<?php echo $email; ?><br>
                  Contact:<?php echo $phone; ?><br>
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 40%;'></div>
        </div>
        <div class="row">
            <br>
            <br>
            <table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO </b> </td>
  </tr>
  <tr>
    <td>{bill_to}</td>
  </tr>
</table>
<br>
<br>
<table width="100%"  border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table class="proposedWork" width="100%" style="margin-top:20px">
                        <thead>
                        <tr style="background-color: #<?php echo $color; ?>;color: white;">
                           <th>DATE</th>
                           <th>QNTY</th>
                           <th>DESCRIPTION</th>
                           <th>RATE</th>
                           <th>PRO *</th>
                           <th class="amountColumn">Amount</th>
                           <tr>
                        </thead>
                        <tbody>

                                <?php
                                    if ($purchase_all_data) {
                                ?>
                                    {purchase_all_data}
                           <tr>
                              <td contenteditable="true">{trucking_date}</td>
                              <td class="unit" contenteditable="true">{qty}</td>
                              <td contenteditable="true" class="description">{description}</td>
                              <td contenteditable="true" class="description">{rate}</td>
                              <td  class="description">{pro_no_reference}</td>
                              <td class="amount" contenteditable="true">475.00</td>

                           </tr>
                            {/purchase_all_data}
                           <?php
                            }
                                ?>
                        </tbody>
              <tfoot>
                          
                           <tr>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                   <td style="border:none"></td>
                  
                              <td style="border:none;text-align:right">TOTAL:</td>
                              <td class="total amount" contenteditable="true"> {grand_total}</td>
                              <td class="docEdit"></td>
                           </tr>
                        </tfoot>
                     </table>

   <br>
        </div>
    </div>
  </div></div>

            <?php 

            }
    elseif($template==2)
    {
            ?>
          <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-2"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 40%;'>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
           <div class="col-sm-4" id='company_info'>
                  
                  Company name:<?php echo $cname; ?><br>
                  Address:<?php echo $address; ?><br>
                  Email:<?php echo $email; ?><br>
                  Contact:<?php echo $phone; ?><br>
              </div>
        </div>

        <div class="row">
            <div class="col-sm-6"><table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO </b> </td>
  </tr>
  <tr>
  <td>{bill_to}</td>
  </tr>
</table>
<br>
<br>


</div>
            <div class="col-sm-6"></div>
            
<br>
<table width="100%"  border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<table class="proposedWork" width="100%" style="margin-top:20px">
                        <thead>
                        <tr style="background-color: #<?php echo $color; ?>;color: white;">
                           <th>DATE</th>
                           <th>QNTY</th>
                           <th>DESCRIPTION</th>
                           <th>RATE</th>
                           <th>PRO *</th>
                           <th class="amountColumn">Amount</th>
                           <tr>
                        </thead>
                        <tbody>

                                <?php
                                    if ($purchase_all_data) {
                                ?>
                                    {purchase_all_data}
                           <tr>
                              <td contenteditable="true">{trucking_date}</td>
                              <td class="unit" contenteditable="true">{qty}</td>
                              <td contenteditable="true" class="description">{description}</td>
                              <td contenteditable="true" class="description">{rate}</td>
                              <td  class="description">{pro_no_reference}</td>
                              <td class="amount" contenteditable="true">475.00</td>

                           </tr>
                            {/purchase_all_data}
                           <?php
                            }
                                ?>
                        </tbody>
              <tfoot>
                          
                           <tr>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                   <td style="border:none"></td>
                  
                              <td style="border:none;text-align:right">TOTAL:</td>
                              <td class="total amount" contenteditable="true"> {grand_total}</td>
                              <td class="docEdit"></td>
                           </tr>
                        </tfoot>
                     </table>

   <br>
        </div>
    </div>
  </div></div>

            <?php 
                   }
    elseif($template==3)
    {
        ?>
    <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-2"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 40%;height:40%;'>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
           <div class="col-sm-4" id='company_info'>
                  
           
              </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-8"><table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO </b> </td>
  </tr>
  <tr>
  <td>{bill_to}</td>
  </tr>
</table>
<br>
<br>


</div>
            <div class="col-sm-4 " id="">Company namea:<?php echo $cname; ?><br>
                  Address:<?php echo $address; ?><br>
                  Email:<?php echo $email; ?><br>
                  Contact:<?php echo $phone; ?><br>
              </div></div>
            
<br>
<table width="100%"  border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<table class="proposedWork" width="100%" style="margin-top:20px">
                        <thead>
                        <tr style="background-color: #<?php echo $color; ?>;color: white;">
                           <th>DATE</th>
                           <th>QNTY</th>
                           <th>DESCRIPTION</th>
                           <th>RATE</th>
                           <th>PRO *</th>
                           <th class="amountColumn">Amount</th>
                           <tr>
                        </thead>
                        <tbody>

                                <?php
                                    if ($purchase_all_data) {
                                ?>
                                    {purchase_all_data}
                           <tr>
                              <td contenteditable="true">{trucking_date}</td>
                              <td class="unit" contenteditable="true">{qty}</td>
                              <td contenteditable="true" class="description">{description}</td>
                              <td contenteditable="true" class="description">{rate}</td>
                              <td  class="description">{pro_no_reference}</td>
                              <td class="amount" contenteditable="true">475.00</td>

                           </tr>
                            {/purchase_all_data}
                           <?php
                            }
                                ?>
                        </tbody>
              <tfoot>
                          
                           <tr>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                   <td style="border:none"></td>
                  
                              <td style="border:none;text-align:right">TOTAL:</td>
                              <td class="total amount" contenteditable="true"> {grand_total}</td>
                              <td class="docEdit"></td>
                           </tr>
                        </tfoot>
                     </table>


   <br>
        </div>
    </div>
  </div></div>
        <?php
               }
    elseif($template==4)
    {
    ?>
 <div class="col-sm-8" > 
    <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-3"><br>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 40%;height:40%;'></div>
        </div>
        <div class="row">
            <table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO</b> </td>
  </tr>
  <tr>
  <td>{bill_to}</td>
  </tr>
</table>
<br>
<br>
<table width="100%"  border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table class="proposedWork" width="100%" style="margin-top:20px">
                        <thead>
                        <tr style="background-color: #<?php echo $color; ?>;color: white;">
                           <th>DATE</th>
                           <th>QNTY</th>
                           <th>DESCRIPTION</th>
                           <th>RATE</th>
                           <th>PRO *</th>
                           <th class="amountColumn">Amount</th>
                           <tr>
                        </thead>
                        <tbody>

                                <?php
                                    if ($purchase_all_data) {
                                ?>
                                    {purchase_all_data}
                           <tr>
                              <td contenteditable="true">{trucking_date}</td>
                              <td class="unit" contenteditable="true">{qty}</td>
                              <td contenteditable="true" class="description">{description}</td>
                              <td contenteditable="true" class="description">{rate}</td>
                              <td  class="description">{pro_no_reference}</td>
                              <td class="amount" contenteditable="true">475.00</td>

                           </tr>
                            {/purchase_all_data}
                           <?php
                            }
                                ?>
                        </tbody>
              <tfoot>
                          
                           <tr>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                   <td style="border:none"></td>
                  
                              <td style="border:none;text-align:right">TOTAL:</td>
                              <td class="total amount" contenteditable="true"> {grand_total}</td>
                              <td class="docEdit"></td>
                           </tr>
                        </tfoot>
                     </table>

   <br>
        </div>
    </div>
  </div></div>
    <?php 
           }
    else
    {
    ?>
    <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-3"><br>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 40%;height:40%;'></div>
        </div>
        <div class="row">
            <table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO</b> </td>
  </tr>
  <tr>
  <td>{bill_to}</td>
  </tr>
</table>
<br>
<br>
<table width="100%"  border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

   <br>
        </div>
    </div>
  </div></div>
    <?php 

}
?>
</div>
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
  }).save();

   
   });
   </script>
