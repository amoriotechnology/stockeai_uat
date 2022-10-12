

<!-- Manage Invoice Start -->

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Manage Packing Invoice</h1>

            <small>Manage Packing Invoice</small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('invoice') ?></a></li>

                <li class="active">Manage Packing Invoice</li>

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



        <div class="row">

            <div class="col-sm-12">

               

    <?php if($this->permission1->method('new_invoice','create')->access()){ ?>

                    <a href="<?php echo base_url('Cinvoice/packing_list') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> New Packing Invoice </a>

                <?php }?>

           

                

            </div>

        </div>



        <!-- date between search -->

        <div class="row">

             <div class="col-sm-12">

                <div class="panel panel-default">

                    <div class="panel-body"> 

                        <div class="col-sm-10">

                        <?php echo form_open('', array('class' => 'form-inline', 'method' => 'get')) ?>

                        <?php

                      

                        $today = date('Y-m-d');

                        ?>

                        <div class="form-group">

                            <label class="" for="from_date"><?php echo display('start_date') ?></label>

                            <input type="text" name="from_date" class="form-control datepicker" id="from_date" value="" placeholder="<?php echo display('start_date') ?>" >

                        </div> 



                        <div class="form-group">

                            <label class="" for="to_date"><?php echo display('end_date') ?></label>

                            <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="">

                        </div>  



                        <button type="button" id="btn-filter" class="btn btn-success"><?php echo display('find') ?></button>



                        <?php echo form_close() ?>

                    </div>

                  

          

                </div>

            </div>

            </div>

        </div>

        <div class="row"> 

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

                                    <th><?php echo display('invoice_no') ?></th>

                                    <th><?php echo display('sale_by') ?></th>

                                    <th><?php echo display('customer_name') ?></th>

                                    <th><?php echo display('date') ?></th>

                                    <th><?php echo display('total_amount') ?></th>

                                    <th class="text-center"><?php echo display('action') ?></th>

                                    </tr>

                                </thead>

                                <tbody>
                               
                                    <tr role="row" class="odd">
                                        <td tabindex="0">1</td>
                                        <td>  <a href="<?php echo base_url('Cinvoice/invoice_inserted_data/5124714587') ?>" class="">1000</a></td>
                                        <td>Admin User</td>
                                        <td>Stonemart Corp</td>
                                        <td>20 - NOV - 2021</td>
                                        <td class=" total_sale text-right">$0.00</td>
                                        <td>  <a href="<?php echo base_url('Cinvoice/packing_invoice_inserted_data') ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="View Invoice"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                </tbody>

                                <tfoot>

                    <th colspan="5" class="text-right"><?php echo display('total') ?>:</th>

                

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
