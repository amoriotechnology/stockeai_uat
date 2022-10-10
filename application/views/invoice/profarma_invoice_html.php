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
        <div class="" id="PROFORMA">
            <div class="row">
               <div class="document active">
                  <div class="spreadSheetGroup">
                     <table class="shipToFrom">
                        <thead >
                           <tr >
                              <td class=" col-md-4"><img src="<?php echo base_url() ?>my-assets/image/logo.jpg" class="img-responsive" width="100px"></td>
                              <td class="title col-md-4">PFROFORMA INVOICE</td>
                  <td class=" col-md-4"><img src="<?php echo base_url() ?>my-assets/image/logo.jpg" class="img-responsive" width="100" style="float:right;"></td>
                           </tr>
                        </thead>
                      
                  
          
              <tbody class="Exporter">
                           <tr>
                              <td contenteditable="true" >
                  <small>Exporter</small>
                  <P><b>EURO STOES</b></P>
                  <P>Leksmondhof 140, 1100bet, amsterdam</P>
                  <P>Hand phone: +31 611 792 2131</P>
                  <P>Email: eursones@gail.com</P>
                              </td>
                              <td contenteditable="true">
                                  <P>Invoice Date:</P>
                  <P>ES2021003 DT: 16.08.2021</P>
                  <P>BURYERS ORDER NO. & DATE</P>
                  
                  <hr>
                  <p><b>OTHER REFRENCE</b></p>
                  
                              </td>
                 <td contenteditable="true" >
                                  <P>exporter's REF</P>
                  <P>TAX CODE: NL.82172R7</P>
                              </td>
                           </tr>
                        </tbody>
            
            
            
              <tbody class="Exporter">
                           <tr>
                              <td contenteditable="true" >
                  <small>CONSIGNEE</small>
                  <P><b>EA ST WE ST MARBLE COMPANY</b></P>
                  <P>VA:3920 stoneward BVD</P>
                  <P>chartily VA 20151</P>
                  <P>Ph: 703-376-8585, Fax:708-817-0666</P>
                  <p>Email:txmaa@ewmarble.com</p>
                  
                  
                
                  
                              </td>
                              <td contenteditable="true">
                                  <P><b>Container Pick Up Factory Address</b></P>
                
                  
                  
                              </td>
                 <td contenteditable="true" >
                  
                              </td>
                           </tr>
                        </tbody>
            
           </table>
           
           
           <table>
              <tbody class="Exporter">
                           <tr>
                              <td class="col-md-3">
                  
                    <div class="destination">
                    <p><b>PREF CARRIAGE</b></p>
                    <p>Road</p>
                    
                    <p><b>VES & SEL</b><p>
                </div>
                  
                
                  
                              </td>
                              <td class="col-md-3">
                                    <p><b>PLACE OF RECEIVE </b></p>
                      <p>Port of Loading</p>
                      
                      <p><b>Durbal South Africa</b><p>
                </div>
                
                  
                  
                              </td>
                <td class="col-md-3" >
                  <div class="destination">
                  <p><b>Country of orgigin goods</b></p>
                    <p>South Africa</p>
                    
                    <p><b>TERMS AND PAYMENT DELIVER </b><br> 50% advance before loading & 50% CAD<p>
                </div>
                              </td>
                 <td class="col-md-3" >
                  <div class="destination">
                    <p><b>Country of final Destination</b></p>
                      <p>UNITED STATES OF AMERICA</p>
                </div>
                              </td>
                           </tr>
                        </tbody>
          </table>
           
        
           
  
           
           
           
           
                     <hr style="visibility:hidden"/>
                     
                     <table class="proposedWork" width="100%" style="margin-top:20px">
                        <thead>
                           <th>PORT OF DISCHARGE</th>
                           <th>PLACE OF DELIVERY</th>
                           <th>QTY IN SQ. FT.</th>
              <th>PRINCE IN USD</th>
                           <th class="amountColumn">Amount IN USD</th>
                           
                        </thead>
                        <tbody>
                           <tr>
                              <td contenteditable="true">MARK SSNOS/ COUNT ANER NO. 1*20 COUNT AINER</td>
                              <td class="unit" contenteditable="true">NO. &  KIND OF PKG &. <br>50 Slabe to max 26 or 27 tone <br> DESCRIPTION OF GOODS POLISHED GRANITE SLABS
                African Rainbow-5749-26 slabe<br> African Rainbow -532-18 slabe
                </td>
                              <td contenteditable="true" class="description"></td>
                  <td contenteditable="true" class="description">7.50 <br> 7.50</td>
                
                              <td class="amount" contenteditable="true"></td>
                            
                              
                           </tr>
                        </tbody>
            
                        <tfoot>
                          
                           <tr>
                            
                   <td style="border:none;" class="account-detail">
                  <p><b>Account Detail: </b></p>
                  <p>Account holder :Euro Stones</p>
                  <p>Rounting Number</p>
                  <p>080 400 09519</p>
                  <p>Account number</p>
                  <p>960000000579542</p>
                  <p>Address Transfer wise </p>
                  <p>19 w 24th street </p>
                  <p>New York NY 10010</p>
                  <p>United States</p>
                 
                 
                 </td>
                   <td style="border:none" class="account-detail"> Ammoun in Word: <br> US DOLLARS: TWENTY FOUR THOUSAND AND ZERO CENT ONLY/-</td>
                   <td style="border:none" class="account-detail">32000 SQ.FT.</td>
                              <td style="border:none;text-align:right"class="account-detail">TOTAL:</td>
                              <td class="total amount"  class="account-detail" style="vertical-align:bottom;"> 24000.00</td>
                              <td class="docEdit"></td>
                           </tr>
               
               
                <tr>
                            
                 
                   <td style="border:none"></td>
                   <td style="border:none"></td>
                              
                              <td class="sign " style="border:none" >Please sign and seal </td>
                <td class="sign " style="border:none"> Authorised Signature</td>
                             
                           </tr>
                        </tfoot>
                     </table>
          
                  </div>
               </div>
            </div>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

 