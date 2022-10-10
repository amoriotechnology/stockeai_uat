<!-- Purchase Payment Ledger Start -->
<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	        <i class="pe-7s-note2"></i>
	    </div>
	    <div class="header-title">
	        <h1>Purchase Order Invoice</h1>
	        <small>Purchase Order Invoice</small>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#">Purchase Order Invoice</a></li>
	            <li class="active">Purchase Order Invoice</li>
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

	  <div class="" id="invoice">
            <div class="row">
               <div class="document active">
                  <div class="spreadSheetGroup">
                     <table class="shipToFrom">
                        <thead style="font-weight:bold">
                           <tr id="top-head">
                              <th class="title">East West Marble Company</th>
                              <th class="detail">Tel: 703-376-8585 <br> Fax: 703-817-0666</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td contenteditable="true" style="width:50%">
									<p>3920 STONECROFT BLVD SUITE # I, CHANTLLY, VA- 20151-1031</p>
									<P>www.ewmarble.com</P>
                              </td>
                              <td contenteditable="true" style="width:50%">
                                 
                              </td>
                           </tr>
                        </tbody>
                     </table>
					 
					   <table class="shipToFrom">
                        <thead>
                           <tr id="order">
                              <th class="title text-center">Purchase Order</th>
                             
                           </tr>
                        </thead>
                       
                     </table>
					 
					 <table class="shipToFrom">
                        <thead id="address">
                           <tr>
                              <th style="width: 28%;"> Supplier: <br> <strong><?= $invoice->address ?: 'Not Set'; ?></strong></th>
                              <th style="width: 28%;">Ship to: <br> <b><?= $invoice->ship_to ?: 'Not Set'; ?></b></th>
							   <th>
								  <form>
									  <div class="form-group invoice-form" style="text-align:right">
										<span class="col-sm-5" style="font-size:16px;">P.O. Number: </span> <input type="text" class="col-sm-7 form-control" value="<?= $invoice->chalan_no ?: 'Not Set'; ?>" readonly /><br>
										
										<span class="col-sm-5">Date: </span> <input type="text" class="col-sm-7 form-control" value="<?= date("Y/m/d"); ?>" readonly><br>
										 
										<span class="col-sm-5">Create By: </span><input type="text" class="col-sm-7 form-control" readonly value="<?= $invoice->create ?: 'Not Set'; ?>"><br>

										<span class="col-sm-5">Payment Terms: </span><input type="text" class="col-sm-7 form-control" readonly value="<?= $invoice->payment_terms ?: 'Not Set'; ?>"><br>
										<span class="col-sm-5">Shipment Terms: </span><input type="text" class="col-sm-7 form-control" readonly value="<?= $invoice->shipment_terms ?: 'Not Set'; ?>"><br>
										<span class="col-sm-5">Est. Ship Date: </span><input type="text" class="col-sm-7 form-control" readonly value="<?= $invoice->est_ship_date ?: 'Not Set'; ?>">
									  </div>
									  
									</form>  
								  </th>
                           </tr>
                        </thead>
                         
                     </table> 
					 
					 
					 
					 
                     <hr style="visibility:hidden"/>
                     
                     <table class="proposedWork" width="100%" style="margin-top:20px">
                        <thead>
                           <th>Product Name (SKU)</th>
                           <th>Slab</th>
                           <th>Quantity</th>
                           <!-- <th>Received</th> -->
								   <th>Balance</th>
								   <th>Unit Cost</th>
                           <th class="amountColumn">Amount</th>
                           
                        </thead>
                        <tbody>
                           <?php
                           foreach($order as $value){ ?>
                           <tr>
                              <td contenteditable="true"><?= $value->product_name; ?> </td>
                              <td class="unit" contenteditable="true"><?= $value->slabs; ?></td>
                              <td contenteditable="true" class="description"><?= $value->quantity; ?>.</td>
							   
								<td contenteditable="true" class="description"><?= $value->price; ?>.</td>
								<td  class="description"><?= $value->rate; ?></td>
                              <td class="amount" contenteditable="true"><?= $value->total_amount; ?></td>
                            
                              
                           </tr>
                           <?php } ?>
                        </tbody>
						 <tbody>
      
                        </tbody>
                        <tfoot>
                          
                           <tr>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                          
							     <td style="border:none"></td>
								   <td style="border:none"></td>
                              <td style="border:none;text-align:right">TOTAL:</td>
                              <td class="total amount" contenteditable="true""><?= $invoice->grand_total_amount ?: 'Not Set'; ?></td>
                              <td class="docEdit"></td>
                           </tr>
                        </tfoot>
                     </table>
                     <table width="100%">
                        <tbody>
                           <tr>
                              <td style="50%" style="vertical-align:top">
                                 <table style="width:100%">
                                    <tbody>
                                       <tr>
                                          <td style="text-align:left">
										    <p><i>Notes</i></p>
											<div class="notes">
                                             <p>-Cargo needs to be insured tilthe destinationport due to incresing numbers of possible accident at ports</p>
                                             <p>-90% CAD against BOL release and 10% in 2 days after arrivel to warehouse</p>
                                            </div>
                                             <p >
												<b style="border-bottom:2px solid 	">Terms:</b></br>
												PLEASE FOLLOW THE IMPORTANT THERMS AS BELOW:</p>
												
												<p>- proforma Ref#: ES001</p>
												<p>-Please DO NOT SHIP less than 26-27 MT or 3200 SQF on each container</p>
												<p>-Please refer PO number on related shipping documents</p>
											    <p>-Please DESCRIBE the stone type AS GRANITE (HTS CODE: 6802.93.0025); on </p>
												<p>Commercial invoice and packing List.</p>
												<p>-Cracks/Fissures/Sports/Color Varriations are not accepted for the receipt of goods at EWM Company</p>
												<p>-Shipment Must be insured and Must be CIF term.</p>
												<p>-Shipers Must accept and ship 2size allowance from the edge for industry practice.</p>
                                             
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                              <td style="padding-left:50px; width:50%; vertical-align:top">
                                 <table style="width:100%">
                                    <tbody>
                                    
                                       <tr>
                                          <td style="padding-top:60px">
                                             Name: _____________________________ 
                                          </td>
										  </tr>
										  <tr>
										   <td style="padding-top:60px">
                                             Signature: _____________________________
                                          </td>

                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
	</section>
</div>
<!-- Purchase ledger End  -->