Purchase Payment Ledger Start -->
<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	        <i class="pe-7s-note2"></i>
	    </div>
	    <div class="header-title">
	        <h1><?php echo display('purchase_ledger') ?></h1>
	        <small><?php echo display('purchase_ledger') ?></small>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#"><?php echo display('purchase') ?></a></li>
	            <li class="active"><?php echo display('purchase_ledger') ?></li>
	        </ol>
	    </div>
	</section>

	<!-- Invoice information -->
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

	  <div class="" id="expence">
            <div class="row">
               <div class="document active" id='content'>
                  <div class="spreadSheetGroup">
                     <table class="shipToFrom">
                        <thead style="font-weight:bold">
                           <tr>
                              <th class="title">{supplier_name}</th>
                              <th class="detail"><p><b>{address}</b><br>
								T. +{mobile} | F. +{mobile}
								<hr>
								
								www.dfg.es | {email_address}  
							  </p></th>
                           </tr>
                        </thead>
						
						
                     </table>
					 
					 <table class="shipToFrom">
                        <thead id="address">
                           <tr>
                              <td>
								<div class="col-md-12 invoice">
									<p><b>INVOICE</b></p>
									
									<div class="col-md-6 num">
										<p><b>Number</b></p>
										<p>{chalan_no}</p>
									</div>
									<div class="col-md-6 num">
									<p><b>Date</b></p>
										<p>{final_date}</p>
									</div>
									<br>
									<p><b>Customer: {supplier_name}</b></p>
									<!-- <p><b>Vat No. IT16058324003</b></p> -->
								</div>

							  </td>
							  
							  
								 <td><img src="<?php echo base_url() ?>my-assets/image/qr.png" class="img-responsive" style="margin:0 auto;"/></td>
							<td>
							<div class="invoice" style="min-height:205px;">
								
								<p style="border:none;">INFINITY STONES EUROPE, SRL <br> PIAZZA DEL MERCATO, 18 <br> 00044 FRASCATI - LAZIO<br>ROMA- ITALIA</p>
							</div>
							</td>
							  
                           </tr>
                        </thead>
                         
                     </table> 
					 
					 
                     <hr style="visibility:hidden"/>
                     
                       <table  class="table table-bordered table-striped table-hover">
                        <thead>
									<tr>
										<th><?php echo display('sl') ?></th>
										<th><?php echo display('product_name') ?></th>
										<th>Description</th>
										<th class="text-center"><?php echo display('quantity') ?></th>
										<th class="text-center"><?php echo display('rate') ?></th>
										<th class="text-center"><?php echo display('total_ammount') ?></th>
									</tr>
                           
                        </thead>
                        <tbody>
                        	<?php
									if ($purchase_all_data) {
								?>
								{purchase_all_data}

                           <tr>
                           		<td>{sl}</td>
                           			<td>{description}</td>
                           		<td>
											
											{product_name}-({product_model})
											
										</td>

										<td class="text-right">{quantity}</td>


										<td class="text-right"><?php echo (($position==0)?"$currency {rate}":"{rate} $currency") ?></td>
										<td class="text-right"><?php echo (($position==0)?"$currency {total_amount}":"{total_amount} $currency") ?></td>


                           <!--    <td contenteditable="true" class="description"><p><b>Delivery Note: 071/18/18 Date: 14/08/2021</b><p>
								<p>SLAB SPARKLING GREY POLISH 3CM</p>
								<p>DESCRIPTION: POLISHED GRANTEE SLABS TOTAL BUNDELS: 14</p>
								<p>GROSS WEIGHTS:51:688 KG</p>
								<p>PLACE OF LOADING : MONGOA-PORTUGAL</p>
								<p>PORT OF LOADING :MARING-SPAIN</p>
								<p>FINAL DESTINATION: USA</p>
								<p>COUNTRY OF ORIGIN : PORTUGAL</p>
								<p>DELIVERY NOTE: 071/18.18 DATE: 14/08/2021</p>
								<br>
								
							  
							  </td>
                              <td class="unit" contenteditable="true">51</td>
                              <td contenteditable="true" class="description">295390 m2 / 3179 SQ FT</td>
							  
								<td contenteditable="true" class="description">26910 /2050 SQ. FT.</td>
								<td  class="description"></td>
                              <td class="amount" contenteditable="true">794787</td> -->
                            

                              
                           </tr>




                           {/purchase_all_data}
								<?php
									}
									?>
                        </tbody>

                        <tfoot>


                        	   <tr>
                           	      <td colspan="6" style="
    text-align: left;
">{remarks}</td>
                           	  </tr>
									<tr>
										<td class="text-right" colspan="5"><b><?php echo display('total') ?>:</b></td>
										<td  class="text-right"><b><?php echo (($position==0)?"$currency {total}":"{total} $currency") ?></b></td>
									</tr>
									 <?php if($discount > 0){?>
									<tr>
										<td class="text-right" colspan="5"><b><?php echo display('discounts') ?>:</b></td>
										<td  class="text-right"><b><?php echo (($position==0)?"$currency {discount}":"{discount} $currency") ?></b></td>
									</tr>
								<?php }?>
									<tr>
										<td class="text-right" colspan="5"><b><?php echo display('grand_total') ?>:</b></td>
										<td  class="text-right"><b><?php echo (($position==0)?"$currency {sub_total_amount}":"{sub_total_amount} $currency") ?></b></td>
									</tr>
									 <?php if($paid_amount > 0){?>
									<tr>
										<td class="text-right" colspan="5"><b><?php echo display('paid_amount') ?>:</b></td>
										<td  class="text-right"><b><?php echo (($position==0)?"$currency {paid_amount}":"{paid_amount} $currency") ?></b></td>
									</tr>
								<?php }?>
                              <?php if($due_amount > 0){?>
									<tr>
										<td class="text-right" colspan="5"><b><?php echo display('due_amount') ?>:</b></td>
										<td  class="text-right"><b><?php echo (($position==0)?"$currency {due_amount}":"{due_amount} $currency") ?></b></td>
									</tr>
								<?php }?>
								</tfoot>
							</table>

							  <div class="row">

                                <div class="col-xs-8 invoicefooter-content">

                                    <p>Message on Invoice</p>
                                    <p><strong>{message_invoice}</strong></p> 
                                   
                                </div>
                               
                         </div>


					 
					
                  </div>
               </div>
            </div>
         </div>
	</section>
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
      window.location='<?php  echo base_url();   ?>'+'Cpurchase/manage_purchase';
  }).save();



  
   });
   </script>