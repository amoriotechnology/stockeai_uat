

<!-- Manage Invoice Start -->
<style>
    
    table.table.table-hover.table-borderless td {
    border: 0;
}
</style>

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Federal Taxes</h1>

            <small>Manage Your Federal Taxes</small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#">Federal Taxes</a></li>

                <li class="active">Manage Your Federal Taxes</li>

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



       



        <!-- date between search -->

          <div class="row">

             <div class="col-sm-12">

                <div class="panel panel-default">

                    <div class="panel-body"> 


                        <div class="row">

                         <h3 class="col-sm-3" style="margin: 0;">Federal Taxes </h3>

                         

                    </div>



                </div>

            </div>

            </div>

        </div>

       

        <!-- Manage Invoice report -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                    </div>

                    <div class="panel-body">

                        <div class="table-responsive" >

                            <table class="table table-hover table-bordered" cellspacing="0" width="100%" id=""> 

                                <thead>

                                    <tr>

                                    <th><?php echo display('sl') ?></th>

                                    <th>Tax Name</th>

                               

                                    <th class="text-center"><?php echo display('action') ?></th>

                                    </tr>

                                </thead>

                               <tbody>

                                    <tr role="row" class="odd">
                                        <td tabindex="0">1</td>
                                        
                                        <td>Federal Income Tax</td>

                                        <?php echo base_url('Chrm/add_taxes_detail') ?>
                                        
                                        <td>  <a href="<?php echo base_url('Chrm/add_taxes_detail') ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>


                                    <tr role="row" class="odd">
                                        <td tabindex="0">2</td>
                                        
                                        <td>Social Security</td>


                                        
                                        <td>  <a href="<?php echo base_url('Chrm/add_taxes_detail') ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>




                                    <tr role="row" class="odd">
                                        <td tabindex="0">3</td>
                                        
                                        <td>Medicare</td>


                                        
                                        <td>  <a href="<?php echo base_url('Chrm/add_taxes_detail') ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>


                                    <tr role="row" class="odd">
                                        <td tabindex="0">4</td>
                                        
                                        <td>Federal Unemployment</td>


                                        
                                        <td>  <a href="<?php echo base_url('Chrm/add_taxes_detail') ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                </tbody>

                                <tfoot>

                   

                

                  <th></th>  

                  <th></th> 

                                </tfoot>

                            </table>

                            

                        </div>

                       



                    </div>

                </div>

                <input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">

                 <input type="hidden" id="currency" value="{currency}" name="">

            </div>

        </div>















        <!-- date between search -->

        <div class="row">

             <div class="col-sm-12">

                <div class="panel panel-default">

                    <div class="panel-body"> 


                        <div class="row">

                         <h3 class="col-sm-3" style="margin: 0;">State and Local Taxes </h3>

                          <div class="col-sm-9 text-right">



                         <a href="#" data-toggle="modal" data-target="#add_states" class="btn btn-info"> Add States </a>


                             <a href="#" data-toggle="modal" data-target="#add_state_tax" class="btn btn-info">Add New State Tax </a>

                    </div>

                    </div>




                       

                  

          

                </div>

            </div>

            </div>

        </div>

       

        <!-- Manage Invoice report -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                    </div>

                    <div class="panel-body">

                        <div class="table-responsive" >

                            <table class="table table-hover table-borderless" cellspacing="0" width="100%" id=""> 

                                <thead>

                                    <tr>

                                    <th>State Name</th>

                                    <th>State Taxes</th>

                               

                                    <th class="text-center"><?php echo display('action') ?></th>

                                    </tr>

                                </thead>

                               <tbody>

                                    <tr role="row" class="odd">
                                        <td tabindex="0">New Jersey</td>
                                        
                                        <td>Income Tax NJ</td>


                                        
                                        <td>  <a href="<?php echo base_url('Chrm/add_taxes_detail') ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>


                                    <tr role="row" class="odd">
                                        <td tabindex="0"></td>
                                        
                                        <td>Disability tax</td>


                                        
                                        <td>  <a href="<?php echo base_url('Chrm/add_taxes_detail') ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>




                                    <tr role="row" class="odd">
                                        <td tabindex="0"></td>
                                        
                                        <td>Unemployment</td>


                                        
                                        <td>  <a href="<?php echo base_url('Chrm/add_taxes_detail') ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                     <tr role="row" class="odd">
                                        <td tabindex="0"></td>
                                        
                                        <td>NJ WF Work dev</td>


                                        
                                        <td>  <a href="<?php echo base_url('Chrm/add_taxes_detail') ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                      <tr role="row" class="odd">
                                        <td tabindex="0"></td>
                                        
                                        <td>NJ FLI</td>

                                        <?php echo base_url('Chrm/add_taxes_detail') ?>
                                        
                                        <td>  <a href="<?php echo base_url('Chrm/add_taxes_detail') ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>


                                   
                                </tbody>

                                <tfoot>

                   

                

                  <th></th>  

                  <th></th> 

                                </tfoot>

                            </table>

                            

                        </div>

                       



                    </div>

                </div>

                <input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">

                 <input type="hidden" id="currency" value="{currency}" name="">

            </div>

        </div>





    </section>

</div>




   <div class="modal fade modal-success" id="add_states" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h3 class="modal-title">Add New States</h3>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                       <?php echo form_open('Cinvoice/instant_customer', array('class' => 'form-vertical', 'id' => 'newcustomer')) ?>

                    <div class="panel-body">

 <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

                        <div class="form-group row">

                            <label for="customer_name" class="col-sm-3 col-form-label">State Name<i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input class="form-control" name ="customer_name" id="" type="text" placeholder="State Name"  required="" tabindex="1">

                            </div>

                        </div>

                      

                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>

                            

                            <input type="submit" class="btn btn-success" value="Submit">

                        </div>

                        <?php echo form_close() ?>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->






   <div class="modal fade modal-success" id="add_state_tax" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h3 class="modal-title">Add New States Tax</h3>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                       <?php echo form_open('Cinvoice/instant_customer', array('class' => 'form-vertical', 'id' => 'newcustomer')) ?>

                    <div class="panel-body">

 <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">


             <div class="form-group row">

                            <label for="customer_name" class="col-sm-3 col-form-label">State Name<i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <select class="form-control"> 
                                    <option>New Jersey</option>
                                </select>

                            </div>

                        </div>




                        <div class="form-group row">

                            <label for="customer_name" class="col-sm-3 col-form-label">Tax Name<i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input class="form-control" name ="customer_name" id="" type="text" placeholder="State Tax Name"  required="" tabindex="1">

                            </div>

                        </div>

                      

                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>

                            

                            <input type="submit" class="btn btn-success" value="Submit">

                        </div>

                        <?php echo form_close() ?>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->

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
