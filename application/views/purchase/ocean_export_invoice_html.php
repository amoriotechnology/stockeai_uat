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
            <h1>Ocean Export Invoice Detail</h1>
            <small>Ocean Export Invoice Detail</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active">Ocean Export Invoice Detail</li>
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
      <div class="" id="ocean">
            <div class="row">
               <div class="document">
                  <div class="spreadSheetGroup">
                     <table class="shipToFrom">
                        <thead>
                           <tr>
                              <th class="col-md-6 oc-head1"><p style="font-size:25px;">MAERSK</p></th>
                              <th class="col-md-4 oc-head2">NON-NEGOTAION WAYBALL</th>
                              <th class="col-md-2 oc-head3"><p>MAEU </p>
                                <p>214250582</p></th>
                              </th>
                              
                             
                           </tr>
                           
                         
                              
                        
                        </thead>
                  
                     </table>
                     
                     
                     
                     
                     <table class="shipToFrom">
                        <thead >
                           <tr>
                              <th class="col-md-6"> Shiper: INFINITY STONES EUROPE SRL <br> INFINITY STONES EUROPE SRL <br> 
                              FRASCATI <br> 00044<br>RM <br> ITALY</th>
                             <th class="booking col-md-6"><em>Booking No.</em>
                                214250582 </th>
                                
                           </tr>
                           
                        </thead>
                         
                     </table> 
                     
                     
                      <table class="shipToFrom">
                        <thead >
                           <tr>
                              <td class="col-md-6">Consignee:<br> UNITED GRANITY DISTRIBUTORS INC<br>585 EXCEUTIVE DRIVE<br> 
                              WILLOBROOK <br> 60527<br>UNITED STATES </td>
                             <td class="col-md-6"><p>This contact is usbject to the terms, condistions and exceptions, 
                                including the low & justdiction clause and limitation of liability
                                 & declared value clauses, of current. maersk Bill of Lading (available form the Carries, 
                                its agent and at ters maeask). To the extent necessary to enable the consignee to
                                 sue and to be sued under this contract, the shiper on entering into this contract
                                 does so on his own behalf and as agent for and on behalf of the consignee and warrants
                                 that he has the authority to do so. The shipper shall be entited to change the consignee 
                                at any time before deliver of the good provided he gives the carrier reasonable notice in
                                 writing.</p><p>This contact is usbject to the terms, condistions and exceptions, 
                                including the low & justdiction clause and limitation of liability
                                 & declared value clauses, of current. maersk Bill of Lading (available form the Carries, 
                                its agent and at ters maeask).</p>
                                
                                <p style="border-top:1px solid #000" >  Ownerd inhand outing (Not part of Carriage as defined in clause 1. For account ans risk of Merchant)</p>
                                
                                </td>
                                                                
                           </tr>
                           
                        </thead>
                         
                     </table> 
                     
                      <table class="shipToFrom maeask">
                        <thead >
                           <tr>
                              <td class="col-md-3 " > <p><em>Vessel</em> <br>MAERSK VILNIUS</p> <p><em>Voyapge No</em><br>MAERSK VILNIUS</p></td>
                              <td class="col-md-3" > <p><em>Port of Loading</em> <br>MAERSK VILNIUS</p><p><em>Vessel</em><br>Port of Discharge</p></td>
                            
                              
                              
                             <td class="col-md-6">
                                
                                <p >  Ownerd inhand outing (Not part of Carriage as defined in clause 1
                                . For account ans risk of Merchant)</p>
                                <p>  Ownerd inhand outing (Not part of Carriage as defined in clause 1
                                . For account ans risk of Merchant)</p>
                                </td>

                                                                
                           </tr>
                           
                        </thead>
                         
                     </table> 
                  
                  
                       <table class="shipToFrom">
                        <thead>
                           <tr>
                              <th style="text-align:center;">PARTICULARS FURNISHED BY SHIPPER</th>
                            
                              </th>
                              
                             
                           </tr>
                           
                         
                              
                        
                        </thead>
                  
                     </table>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                     
                     <table class="proposedWork" id="price" width="100%" style="margin-top:20px">
                        
                        <tbody>
                           <tr >
                              <td Class="col-md-8"><p><small>Kind of packages; Description of goods, Marks and Numbers; Container No./Seal No. </small></p>
                                <p>1 Container Said to Contain 41 SLABS</p>
                              <p>GRANITY SLABS</p>
                              <br>
                              <br>
                              <p>ISE0090</p>
                              <br>
                              <br>
                              <p>TRHU1150339 ML-ZA5708205 20 DRY 8'6 41 SLABS 20560.000 KGS </p>
                               <p>SHIPPERS'S LOAD, STOW, WEIGHT AND COUNT </p>
                                <p>FREIGHT PREPAID</p>
                                 <p>CY/CY</p>
                                 
                              </td>
                              <td Class="col-md-2"><p><small>Weight</small></p><p>20560.000 KGS</p></td>
                              <td Class="col-md-2"><p><small>Messurement</small></p></td>
                               
                            <div class="verify">
                            <p class="copy">Verify copy<p>
                        </div>
                              
                           </tr>
                        </tbody>
                        
                        <tfoot>
                          
                         
                        </tfoot>
                     </table>
                
                  </div>
               </div>
            </div>
         </div>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

 