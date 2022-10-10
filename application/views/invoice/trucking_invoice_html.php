<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
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
            <h1>Trucking Invoice Detail</h1>
            <small>Trucking Invoice Detail</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active">Trucking Invoice Detail</li>
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
         <div class="" id="trucking">
            <div class="row">
               <div class="document active">
                  <div class="spreadSheetGroup">
                     <table class="shipToFrom">
                        <thead>
                           <tr >
                              <th class="address">PHASE III TRUCKING, INC. <br>2151 ATCO AVE <br>ATCO, NU 080004<br>609-561-1599 , fAX 609-561-2069</th>
                              <th class="title"><p>INVOICE</p></th>

                           </tr>
                        </thead>
            
                <tbody>
                           <tr>
                <td contenteditable="true" style="width:50%; border:none;">
                                 
                              </td>
                              <td style="width:50%; border:none;" >
                  <div class="col-md-6 date">
                    <div class="col-md-6"><p>Date</p> <div class="no">07/19/2021</div></div>
                    <div class="col-md-6"><p>Invoice<p><div class="no">135708</div></div>
                  </div>
                  
                              </td>
                             
                           </tr>
                        </tbody>
            
                        <tbody>
                           <tr>
                              <td contenteditable="true" style="width:50%; border:none;">
                
                <p class="billto">Bill To</p>
                  <p>3920 STONECROFT BLVD SUITE # I, CHANTLLY, VA- 20151-1031</p>
                  <P>www.ewmarble.com</P>
                              </td>
                              <td contenteditable="true" style="width:50%; border:none;">
                                 
                              </td>
                           </tr>
                        </tbody>
                     </table>
           
           
                     <hr style="visibility:hidden"/>
            <table>
              <tbody>
                           <tr>
                <td contenteditable="true" style="width:60%; border:none;">
                                 
                              </td>
                              <td contenteditable="true" style="width:20%; border:none;">
                
                <p class="billto">Terms</p>
                  
                              </td>
                 <td contenteditable="true" style="width:20%; border:none;">
                                 
                              </td>
                             
                           </tr>
                        </tbody>
            </table>
                     
                     <table class="proposedWork" width="100%" style="margin-top:20px">
                        <thead>
                           <th>DATE</th>
                           <th>QNTY</th>
                           <th>DESCRIPTION</th>
                           <th>RATE</th>
               
                <th>PRO *</th>
              
                           <th class="amountColumn">Amount</th>
                           
                        </thead>
                        <tbody>
                           <tr>
                              <td contenteditable="true">07/08/2021</td>
                              <td class="unit" contenteditable="true">1</td>
                              <td contenteditable="true" class="description">Pickup container of Slabs form Maher deliver to
                AMG Stone Corp and retun.DO # 0120</td>
                  <td contenteditable="true" class="description">475.00</td>
                
                <td  class="description">365701</td>
                              <td class="amount" contenteditable="true">475.00</td>
                            
                              
                           </tr>
                        </tbody>
             <tbody>
                          <tr>
                              <td contenteditable="true"></td>
                              <td class="unit" contenteditable="true">1</td>
                              <td contenteditable="true" class="description">Charge for over wight permit $100.00 permit required.</td>
                  <td contenteditable="true" class="description">100.00</td>
                
                <td  class="description"></td>
                              <td class="amount" contenteditable="true">100.00</td>
                            
                              
                           </tr>
                        </tbody>
            
            <tbody>
                          <tr>
                              <td contenteditable="true"></td>
                              <td class="unit" contenteditable="true">1</td>
                              <td contenteditable="true" class="description">21% Surcharge for Fue.
ADDICTIONAL CHARGE FOR MAHER TERMINAL DUE TO CONGESTION AT THE PIER</td>
                  <td contenteditable="true" class="description">180.00</td>
                
                <td  class="description"></td>
                              <td class="amount" contenteditable="true">180.00</td>
                            
                              
                           </tr>
                        </tbody>
            
            
            <tbody>
                          <tr>
                              <td contenteditable="true"></td>
                              <td class="unit" contenteditable="true">1</td>
                              <td contenteditable="true" class="description">Aa of 12/01.2020 fee for use of chassis averaged at four (4) days @ @ 28.25 per container.</td>
                  <td contenteditable="true" class="description">113.00</td>
                
                <td  class="description"></td>
                              <td class="amount" contenteditable="true">113.00</td>
                            
                              
                           </tr>
                        </tbody>
            
            
            <tbody>
                          <tr>
                              <td contenteditable="true"></td>
                              <td class="unit" contenteditable="true">4</td>
                              <td contenteditable="true" class="description">Additional chassis charge.</td>
                  <td contenteditable="true" class="description">28.00</td>
                
                <td  class="description"></td>
                              <td class="amount" contenteditable="true">113.00</td>
                            
                              
                           </tr>
                        </tbody>
            
            
          
          
                        <tfoot>
                          
                           <tr>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                   <td style="border:none"></td>
                  
                              <td style="border:none;text-align:right">TOTAL:</td>
                              <td class="total amount" contenteditable="true"> 975.00</td>
                              <td class="docEdit"></td>
                           </tr>
                        </tfoot>
                     </table>
                    
                  </div>
               </div>
            </div>
         </div>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

 