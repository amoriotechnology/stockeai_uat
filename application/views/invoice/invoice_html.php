<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_new_sale_invoice();

?>


   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

   
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('invoice_details') ?></h1>
            <small><?php echo display('invoice_details') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active"><?php echo display('invoice_details') ?></li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
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
        <div class="" id="Commercial">
            <div class="row">
               <div class="document active">
                  <div class="spreadSheetGroup">
                     <table class="shipToFrom">
                
                             <tr>
                              <td class=" col-md-4 commer-address">
                                <address class="margin-top10">
                                        <strong class="company_name_p"><?php echo $customer_name;?></strong><br>
                                        <?php echo $customer_address;?><br>
                                        <abbr><b><?php echo display('mobile') ?>:</b></abbr> <?php echo $customer_mobile;?><br>
                                        <abbr><b><?php echo display('email') ?>:</b></abbr> 
                                        <?php echo $customer_email;?><br>
                                        <abbr><b><?php echo display('website') ?>:</b></abbr> 
                                        <?php echo $customer_name;?><br>
                                        
                                    </address>
                             
                                
                              </td>
                               <td class="title commer-address col-md-4"><h3 >Commercial Invoice</h3></td>
                              <td class="detail commer-address "><img src="<?php echo base_url() ?>my-assets/image/logo-2.jpg" class="img-responsive"/></td>
                           </tr>
                     </table>
                     
                      <table class="shipToFrom">
                        <thead >
                           <tr>
                              <td> 
                                <div class="bill" style="width:30%; ">
                                    <p class="head"> BILL TO</p>
                                    
                                    <div class="detail">
                                      <address class="customer_name_p">  
                                        <strong  class="c_name" >{customer_name} </strong><br>
                                        <?php if ($customer_address) { ?>
                                            {customer_address}
                                        <?php } ?>
                                        <br>
                                        <abbr><b><?php echo display('mobile') ?>:</b></abbr>
                                        <?php if ($customer_mobile) { ?>
                                            {customer_mobile}
                                        <?php }if ($customer_email) {
                                            ?>
                                            <br>
                                            <abbr><b><?php echo display('email') ?>:</b></abbr> 
                                            {customer_email}
                                        <?php } ?>
                                    </address>
                                </div>
                                </div>
                              </td>
                              
                              <td></td>
                              
                           </tr>
                        </thead>
                         
                     </table> 
                    
                    
                     
                     <table class="proposedWork" width="100%" style="margin-top:20px">
                        <thead>
                           <th>COMMERCIAL INVOICE NO</th>
                           <th>DATE</th>
                           <th>TOTAL DUE</th>
                           <th>DUE DATE</th>
                           <th>TERMS</th>
                            <th>ENCLOSED</th>
                            
                         
                           
                        </thead>
                        <tbody>
                           <tr>
                              <td contenteditable="true">{invoice_no}</i></td>
                              <td class="unit" contenteditable="true">26/11/2021</td>
                              <td contenteditable="true" class="description">USD 11,437.60</td>
                                <td contenteditable="true" class="description">{payment_due_date}</td>
                                <td contenteditable="true" class="description">{payment_terms}</td>
                                <td contenteditable="true" class="description"></td>
                            
                            
                              
                           </tr>
                        </tbody>
                        
                     </table>
                   
                   
                    <table class="shipToFrom">
                        <thead >
                           <tr>
                           
                              <td><p><b>Container No:</b></p> <p>{container_no}</p></td>
                         <!--   <td><p><b>Container No:</b></p> <p>/CMAU1477625</p></td>
                              <td><p><b>Container No:</b></p> <p>CMAU1477625</p></td> -->
                           </tr>
                        </thead>
                         
                     </table> 
                   
                  
                     
                            <div class="table-responsive">
                                <table class="proposedWork" width="100%" style="margin-top:20px" id="invoice_details">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo display('sl') ?></th>
                                            <th class="text-center"><?php echo display('product_name') ?></th>
                                              <th class="text-center"><?php if($is_unit !=0){ echo display('unit');
                                              }?></th>
                                            <th class="text-center"><?php if($is_desc !=0){ echo display('item_description');} ?></th>
                                            <th class="text-center"><?php if($is_serial !=0){ echo display('serial_no');} ?></th>
                                            <th class="text-right"><?php echo display('quantity') ?></th>
                                            <?php if($is_discount > 0){ ?>
                                            <?php if ($discount_type == 1) { ?>
                                                <th class="text-right"><?php echo display('discount_percentage') ?> %</th>
                                            <?php } elseif ($discount_type == 2) { ?>
                                                <th class="text-right"><?php echo display('discount') ?> </th>
                                            <?php } elseif ($discount_type == 3) { ?>
                                                <th class="text-right"><?php echo display('fixed_dis') ?> </th>
                                            <?php } ?>
                                        <?php }else{ ?>
<th class="text-right"><?php echo ''; ?> </th>
<?php }?>
                                            <th class="text-right"><?php echo display('rate') ?></th>
                                            <th class="text-right"><?php echo display('ammount') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {invoice_all_data}
                                        <tr class="details productdatalineheight">
                                            <td class="text-center">{sl}</td>
                                            <td class="text-center"><div>{product_name} - ({product_model})</div></td>
                                            <td class="text-center"><div>{unit}</div></td>
                                            <td align="center">{description}</td>
                                            <td align="center">{serial_no}</td>
                                            <td align="right">{quantity}</td>

                                            <?php if ($discount_type == 1) { ?>
                                                <td align="right">{discount_per}</td>
                                            <?php } else { ?>
                                                <td align="right"><?php echo (($position == 0) ? "$currency {discount_per}" : "{discount_per} $currency") ?></td>
                                            <?php } ?>

                                            <td align="right"><?php echo (($position == 0) ? "$currency {rate}" : "{rate} $currency") ?></td>
                                            <td align="right"><?php echo (($position == 0) ? "$currency {total_price}" : "{total_price} $currency") ?></td>
                                        </tr>
                                        {/invoice_all_data}
                                        <tr>
                                            <td class="text-left" colspan="5"><b><?php echo display('grand_total') ?>:</b></td>
                                            <td align="right" ><b>{subTotal_quantity}</b></td>
                                            <td></td>
                                            <td></td>
                                            <td align="right" ><b><?php echo (($position == 0) ? "$currency {subTotal_ammount}" : "{subTotal_ammount} $currency") ?></b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                   
                   
                     <table width="100%">
                        <tbody>
                           <tr>
                              <td style="50%" style="vertical-align:top">
                                 <table style="width:100%; border:none;">
                                    <tbody>
                                       <tr>
                                          <td style="text-align:left; border:none">
                                            <p><i>Note: Cd.Iva: 8 Desc.: OPERAZION NON IMPONIBLE</i></p>
                                        
                                             <p>Gross Weight: 27086</p>
                                                
                                                <p>Loading port: VIGO-SPAIN</p>
                                                <p>Origin: Europe</p>
                                                <p>Bank Information:</p>
                                                <p>Account holder Name:<br>INFINITY STONES EUROPE SRL </p>
                                                <p>Routing number (ACH and Wire transfer) <br>084009516</p>
                                                <p>Evolve Bank and Trust</p>
                                                <p>Account number <br>960000000045865</p>
                                                <p>Infinity business account address <br>19 W 24th street <br>New Yor NY 10010<br>United States</p>
                                             
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                              <td style="padding-left:50px; width:50%;">
                               
                              </td>
                           </tr>
                        </tbody>
                     </table>
                   
                   
                   
                  </div>
               </div>
            </div>
         </div>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

 