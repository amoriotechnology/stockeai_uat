

<!-- Manage Invoice Start -->


<style>
    .address.bb1 {
    border-bottom: 1px solid;
    margin-bottom: 10px;
}

.address.bb1 span {
    display: block;
    color: #f44336;
    font-size: 12px;
    font-weight: 600;
}

.importTable td span{
    display: block;
    font-size: 11px;
}
.importTable td{
    font-size: 13px;
}

.headNo span{
    font-size: 10px;
    color: #635d5e;
}

</style>

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Ocean Import Tracking</h1>

            <small>Ocean Import</small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('invoice') ?></a></li>

                <li class="active">Ocean Import</li>

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

        <!-- Manage Invoice report -->

        <div class="row">

            <div class="col-sm-6">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                        <a href="#"><img src="<?php echo base_url('my-assets/image/logo/233deb0f402440c907ab85a36b70f9de.JPG') ?>"></a>
                       
                         
                    </div>

                    <div class="panel-body importTable">

                       <div class="address bb1">
                        <p><span>Shipper</span>INFINITY STONES EUROPE SRL<br>
                            18,PIAZZA DEL MERCATO<br>
                            FRASCATI<br>
                            00044<br>
                            RM<br>
                            Italy
                        </p>

                       </div>

                       <div class="address bb1">
                        <p><span>Shipper</span>INFINITY STONES EUROPE SRL<br>
                            18,PIAZZA DEL MERCATO<br>
                            FRASCATI<br>
                            00044<br>
                            RM<br>
                            Italy
                        </p>

                       </div>

                       <div class="address bb1">
                        <p><span>Shipper</span>INFINITY STONES EUROPE SRL<br>
                            18,PIAZZA DEL MERCATO<br>
                            FRASCATI<br>
                            00044<br>
                            RM<br>
                            Italy
                        </p>

                       </div>

                         <div class="table-responsive" >


                            <table class="table table-bordered table-striped table-hover">
                                   
                                    <tbody>


                                         <tr>
                                            <td colspan="3" align="left"><span>Vessel</span>MAERSK VILNIUS</td>
                                            <td class="text-left"><span>Voyage No.</span>142N</td>
                                        </tr>

                                         <tr>
                                            <td colspan="3" align="left"><span>Port of Loading</span>DURBAN, SOUTH AFRICA</td>
                                            <td class="text-left"><span>Port of Discharge</span>Norfolk, VA(USA Port)</td>
                                        </tr>
                                        
                                     </tbody>
                                </table>

                           
                            

                        </div>


                    </div>

                </div>

                

            </div>

              <div class="col-sm-6">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading" style="display: flex;
    justify-content: space-between;">

    <p><b>NON-NEGOTIABLE WAYBILL</b>
                    </p>

                    <div class="headNo"> <p><span>SCAC
                    </span>MAEU</p> <p><span>B/L No.
                    </span>214250582</p>
                </div>

                   

                    

                    </div>

                    <div class="panel-body">

                          <div class="table-responsive" >


                            <table class="table table-bordered table-striped table-hover">
                                   
                                    <tbody>


                                         <tr>
                                            <td colspan="3" align="left"><span style="display: block;
    font-size: 10px; font-weight: 600;">Booking No.</span>214250582</td>
                                        
                                        </tr>

                                          <tr>
                                            <td colspan="3" align="left" style="display: flex;
    justify-content: space-between;
    font-size: 10px; font-weight: 600;"><span>Export references</span> <span>Svc Contract</span></td>
                                        
                                        </tr>

                                         </tbody>
                                </table>

                                <div>


                                         
                                            <p colspan="3" align="left">This contract is subject to the terms conditions and exceptions, including the law jurisdiction clauseand limitation of liability and declared values clauses of the current Mearsk Bill of Lading (available from the carrier, its agent and
                                                                                        at terms 


                                            </p>
                                        
                                       
                                </div>



                                          <div class="table-responsive" >


                            <table class="table table-bordered table-striped table-hover">


                                         <tbody>
                                



                                          <tr>
                                            <td colspan="3" align="left"><span style="font-size: 10px; font-weight: 600;">Onward Inland routing</span></td>
                                        
                                        </tr>
                                          <tr>
                                            <td colspan="3" align="left"><span style="font-size: 10px; font-weight: 600;">Place of Receipt, Applicable only when ducument used as Multimodal Waybill</span></td>
                                        
                                        </tr>
                                          <tr>
                                            <td colspan="3" align="left"><span style="display: block; font-size: 10px; font-weight: 600;">Place of Delivery, Applicable only when ducument used as Multimodal Transport B/L</span>Chicago</td>
                                        
                                        </tr>
                                        
                                     </tbody>
                                </table>

                            </div>

                           
                            

                        </div>
                       



                    </div>

                </div>

                

            </div>

        </div>




         <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">
                        <h3>PARTICULARS FURNISHED BY SHIPPER</h3>

                    </div>


                      <div class="panel-body">

                          <div class="table-responsive" >


                            <table class="table table-bordered table-striped table-hover">
                                   
                                    <tbody>


                                         <tr>
                                            <td colspan="3" align="left">
                                                <span>Kind of Packages; Ddescription of goods; Mark and Numbers; Container No./Seal No.</span>

                                            </td>

                                          <td colspan="3" align="left">
                                                <span style="display: block; font-size: 10px; font-weight: 600;">Weight</span>
                                                20560.000 KGS
                                            </td>


                                           <td colspan="3" align="left">
                                                <span>Measurement</span>
                                            </td>

                                        
                                        </tr>

                                        <tr>

                                        </tr>

                                         </tbody>
                                </table>

                                <div>
                                </div>




                </div>
            </div>
        </div>

    </section>

</div>

<!-- Manage Invoice End -->

<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">



<script type="text/javascript">
$(function() {
 
  $('table th').resizable({
    handles: 'e',
    stop: function(e, ui) {
      $(this).width(ui.size.width);
    }
  });

});

</script>
