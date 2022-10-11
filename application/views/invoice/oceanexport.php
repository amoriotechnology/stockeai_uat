

<!-- Invoice js -->

<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js" type="text/javascript"></script>


<style>
    .headBg th{
        background: #0f0f0f;
    color: #fff;
    }

</style>



<!-- Customer type change by javascript end -->



<!-- Add New Invoice Start -->

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Trucking</h1>

            <small>Add Trucking</small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('invoice') ?></a></li>

                <li class="active">Trucking</li>

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

               

       <?php if($this->permission1->method('manage_invoice','read')->access()){ ?>

                    <a href="<?php echo base_url('Cinvoice/manage_invoice') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('manage_invoice') ?> </a>

                    <?php }?>

         <?php if($this->permission1->method('pos_invoice','create')->access()){ ?>

                    <a href="<?php echo base_url('Cinvoice/pos_invoice') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('pos_invoice') ?> </a>

                <?php }?>



               

            </div>

        </div>





        <!--Add Invoice -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                        <div class="panel-title">

                            <h4>Trucking</h4>

                           

                        </div>

                    </div>

                 



                    

                    <div class="panel-body">

                        <?php echo form_open_multipart('Cinvoice/manual_sales_insert',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>

                        <div class="row">



                            <div class="col-sm-8" id="payment_from_1">

                                <div class="form-group row">

                                    <div for="customer_name" class="col-sm-6 col-form-label" style="display: flex;
    justify-content: flex-start;
    text-align: center;
    font-size: 13px;
    font-weight: 600;">
 
                                       <img src="  <?php echo base_url('my-assets/image/logo/truck.png') ?>" width="20%">
                                  
                                    <span>PHASE III TRUCKING, INC. <br>  2151 ATCO AVE, <br> ATCO, NJ 06005 <br>809-561-1599 + FAX 809-561-2069</span> 

                                    </div>


                                    <div  class=" col-sm-6">

                                           <div class="invDetails">
                                        <h3 style="color: #000; margin-top: 0;
    text-align: right;"><b>Invoice</b> </h3>


                                    </div>

                                     <div class="table-responsive">

                            <table class="table table-bordered table-hover" id="normalinvoice">

                                <thead>

                                    <tr class="headBg">

                                        <th class="text-center product_field">DATE</th>

                                        <th class="text-center">INVOICE NO.</th>
                                    </tr>

                                     <tr>

                                        <td class="text-center product_field">17-19-2021</td>

                                        <td class="text-center">135708</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>


                                    </div>

                                

                                </div>

                            </div>




                               <div class="col-sm-8" id="payment_from">

                                <div class="row">

                                  

                                    <div class="col-sm-6">

                                       
                                      

                                     <div class="table-responsive">

                            <table class="table table-bordered table-hover" id="normalinvoice">

                                <thead>

                                    <tr class="headBg">

                                        <th class="text-center product_field">BILL TO</th>
                                    </tr>

                                    <tr>
                                   <td> <span>PHASE III TRUCKING, INC. <br>  2151 ATCO AVE, <br> ATCO, NJ 06005 <br>809-561-1599 + FAX 809-561-2069</span></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>


                                     

                                    </div>

                                 

                                </div>

                            </div>

                        </div>

                        <br>

                        <div class="table-responsive">

                            <table class="table table-bordered table-hover" id="normalinvoice">

                                <thead>

                                    <tr>

                                         <th class="text-center">Date</th>

                                              <th class="text-center"><?php echo display('available_qnty') ?></th>

                                    

                                        <th class="text-center"><?php echo display('item_description')?></th>

                                           <th class="text-center"><?php echo display('rate') ?> <i class="text-danger">*</i></th>

                                         <th class="text-center"><?php echo display('serial_no')?></th>
                                   

                                        <th class="text-center"><?php echo display('quantity') ?> <i class="text-danger">*</i></th>

                                     



                                        <?php if ($discount_type == 1) { ?>

                                            <th class="text-center invoice_fields"><?php echo display('discount_percentage') ?> %</th>

                                        <?php } elseif ($discount_type == 2) { ?>

                                            <th class="text-center invoice_fields"><?php echo display('discount') ?> </th>

                                        <?php } elseif ($discount_type == 3) { ?>

                                            <th class="text-center invoice_fields"><?php echo display('fixed_dis') ?> </th>

                                        <?php } ?>

                                        <th class="text-center"><?php echo display('action') ?></th>

                                    </tr>

                                </thead>

                                <tbody id="addinvoiceItem">

                                    <tr>

                                        <td class="product_field">
                                           17-08-2021


                                        </td>

                                          <td>

                                            <input type="text" name="desc[]" class="form-control text-right "  tabindex="6"/>

                                        </td>

                                        <td  class="invoice_fields">

                                             <select class="form-control" id="serial_no_1" name="serial_no[]"   tabindex="7">

                                                <option></option>

                                            </select>

                                        </td>

                                        <td>

                                            <input type="text" name="available_quantity[]" id="available_quantity_1" class="form-control text-right available_quantity_1" value="0" readonly="" />

                                            <a href="<?php echo base_url()."Cpurchase";?>" class="client-add-btn btn btn-info">Add<i class="ti-plus m-r-2"></i></a>

                                        </td>

                                        <td>

                                            <input name="" id="" class="form-control text-right unit_1 valid" value="None" readonly="" aria-invalid="false" type="text">

                                        </td>

                                        <td>

                                            <input type="text" name="product_quantity[]" required="" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" class="total_qntt_1 form-control text-right" id="total_qntt_1" placeholder="0.00" min="0" tabindex="8"  value="1" />

                                        </td>

                                        <td class="invoice_fields">

                                            <input type="text" name="product_rate[]" id="price_item_1" class="price_item1 price_item form-control text-right" tabindex="9" required="" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" placeholder="0.00" min="0" />

                                        </td>

                                        <!-- Discount -->

                                        <td>

                                            <input type="text" name="discount[]" onkeyup="quantity_calculate(1);"  onchange="quantity_calculate(1);" id="discount_1" class="form-control text-right" min="0" tabindex="10" placeholder="0.00"/>

                                            <input type="hidden" value="" name="discount_type" id="discount_type_1">



                                        </td>





                                        <td class="invoice_fields">

                                            <input class="total_price form-control text-right" type="text" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly" />

                                        </td>



                                        <td>

                                            <!-- Tax calculate start-->

                                            <?php $x=0;

                                     foreach($taxes as $taxfldt){?>

                                            <input id="total_tax<?php echo $x;?>_1" class="total_tax<?php echo $x;?>_1" type="hidden">

                                            <input id="all_tax<?php echo $x;?>_1" class="total_tax<?php echo $x;?>" type="hidden" name="tax[]">

                                           

                                            <!-- Tax calculate end-->



                                            <!-- Discount calculate start-->

                                           

                                            <?php $x++;} ?>

                                            <!-- Tax calculate end-->



                                            <!-- Discount calculate start-->

                                            <input type="hidden" id="total_discount_1" class="" />

                                            <input type="hidden" id="all_discount_1" class="total_discount dppr" name="discount_amount[]" />

                                            <!-- Discount calculate end -->



                                         <button  class='btn btn-danger text-right' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-close'></i></button>

                                        </td>

                                    </tr>

                                </tbody>

                                <tfoot>

                                     <tr>

                                        <td colspan="7" rowspan="2">

                                <center><label  for="details" class="  col-form-label text-center"><?php echo display('invoice_details') ?></label></center>

                                <textarea name="inva_details" id="details" class="form-control" placeholder="<?php echo display('invoice_details') ?>" tabindex="12"></textarea>

                                </td>

                                    <td class="text-right" colspan="1"><b><?php echo display('invoice_discount') ?>:</b></td>

                                    <td class="text-right">

                                        <input type="text" onkeyup="quantity_calculate(1);"  onchange="quantity_calculate(1);" id="invoice_discount" class="form-control text-right total_discount" name="invoice_discount" placeholder="0.00"   tabindex="13"/>

                                        <input type="hidden" id="txfieldnum">

                                    </td>

                                    <td><a  id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addInputField('addinvoiceItem');"  tabindex="11"><i class="fa fa-plus"></i></a></td>

                                </tr>

                                <tr>

                                    <td class="text-right" colspan="1"><b><?php echo display('total_discount') ?>:</b></td>

                                    <td class="text-right">

                                        <input type="text" id="total_discount_ammount" class="form-control text-right" name="total_discount" value="0.00" readonly="readonly" />

                                    </td>

                                </tr>

                                    <?php $x=0;

                                     foreach($taxes as $taxfldt){?>

                                    <tr class="hideableRow hiddenRow">

                                       

                                <td class="text-right" colspan="8"><b><?php echo html_escape($taxfldt['tax_name']) ?></b></td>

                                <td class="text-right">

                                    <input id="total_tax_ammount<?php echo $x;?>" tabindex="-1" class="form-control text-right valid totalTax" name="total_tax<?php echo $x;?>" value="0.00" readonly="readonly" aria-invalid="false" type="text">

                                </td>

                               

                               

                                 

                                </tr>

                            <?php $x++;}?>

                                 

                    <tr>

                                    <tr>

                                <td class="text-right" colspan="8"><b><?php echo display('total_tax') ?>:</b></td>

                                <td class="text-right">

                                    <input id="total_tax_amount" tabindex="-1" class="form-control text-right valid" name="total_tax" value="0.00" readonly="readonly" aria-invalid="false" type="text">

                                </td>

                                 <td><button type="button" class="toggle btn-warning">

                <i class="fa fa-angle-double-down"></i>

              </button></td>

                                </tr>

                               

                                 <tr>

                                    <td class="text-right" colspan="8"><b><?php echo display('shipping_cost') ?>:</b></td>

                                    <td class="text-right">

                                        <input type="text" id="shipping_cost" class="form-control text-right" name="shipping_cost" onkeyup="quantity_calculate(1);"  onchange="quantity_calculate(1);"  placeholder="0.00" tabindex="14" />

                                    </td>

                                </tr>

                                <tr>

                                    <td colspan="8"  class="text-right"><b><?php echo display('grand_total') ?>:</b></td>

                                    <td class="text-right">

                                        <input type="text" id="grandTotal" class="form-control text-right" name="grand_total_price" value="0.00" readonly="readonly" />

                                    </td>

                                </tr>

                                 <tr>

                                    <td colspan="8"  class="text-right"><b><?php echo display('previous'); ?>:</b></td>

                                    <td class="text-right">

                                        <input type="text" id="previous" class="form-control text-right" name="previous" value="0.00" readonly="readonly" />

                                    </td>

                                </tr>

                                <tr>

                                    <td colspan="8"  class="text-right"><b><?php echo display('net_total'); ?>:</b></td>

                                    <td class="text-right">

                                        <input type="text" id="n_total" class="form-control text-right" name="n_total" value="0" readonly="readonly" placeholder="" />

                                    </td>

                                </tr>

                                <tr>

                                    

                                    <td class="text-right" colspan="8"><b><?php echo display('paid_ammount') ?>:</b></td>

                                    <td class="text-right">

                                         <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url(); ?>"/>

                                        <input type="text" id="paidAmount" 

                                               onkeyup="invoice_paidamount();" class="form-control text-right" name="paid_amount" placeholder="0.00" tabindex="15" value=""/>

                                    </td>

                                </tr>

                                <tr>

                                   



                                    <td class="text-right" colspan="8"><b><?php echo display('due') ?>:</b></td>

                                    <td class="text-right">

                                        <input type="text" id="dueAmmount" class="form-control text-right" name="due_amount" value="0.00" readonly="readonly"/>

                                    </td>

                                </tr>

                                <tr>

                                     <td align="center">

                                        <input type="button" id="full_paid_tab" class="btn btn-warning" value="<?php echo display('full_paid') ?>" tabindex="16" onClick="full_paid()"/>



                                        <input type="submit" id="add_invoice" class="btn btn-success" name="add-invoice" value="<?php echo display('submit') ?>" tabindex="17"/>

                                    </td>

                                    <td colspan="7"  class="text-right"><b><?php echo display('change'); ?>:</b></td>

                                    <td class="text-right">

                                        <input type="text" id="change" class="form-control text-right" name="change" value="0" readonly="readonly" placeholder="" />

                                    </td>

                                </tr>

                                </tfoot>

                            </table>

                        </div>

                               <?php echo form_close()?>

                    </div>

                   

                </div>

            </div>

             <div class="modal fade" id="printconfirmodal" tabindex="-1" role="dialog" aria-labelledby="printconfirmodal" aria-hidden="true">

      <div class="modal-dialog modal-sm">

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <h4 class="modal-title" id="myModalLabel"><?php echo display('print') ?></h4>

          </div>

          <div class="modal-body">

            <?php echo form_open('Cinvoice/invoice_inserted_data_manual', array('class' => 'form-vertical', 'id' => '', 'name' => '')) ?>

            <div id="outputs" class="hide alert alert-danger"></div>

            <h3> <?php echo display('successfully_inserted') ?></h3>

            <h4><?php echo display('do_you_want_to_print') ?> ??</h4>

            <input type="hidden" name="invoice_id" id="inv_id">

          </div>

          <div class="modal-footer">

            <button type="button" onclick="cancelprint()" class="btn btn-default" data-dismiss="modal"><?php echo display('no') ?></button>

            <button type="submit" class="btn btn-primary" id="yes"><?php echo display('yes') ?></button>

            <?php echo form_close() ?>

          </div>

        </div>

      </div>

    </div>



  <!------ add new product-->  
  <div class="modal fade modal-success" id="product_info" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h3 class="modal-title"><?php echo display('new_product') ?></h3>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                      <?php echo form_open_multipart('Cproduct/insert_product', array('class' => 'form-vertical', 'id' => 'insert_product', 'name' => 'insert_product')) ?>

                    <div class="panel-body">

 <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

                      <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="barcode_or_qrcode" class="col-sm-4 col-form-label"><?php echo display('barcode_or_qrcode') ?> <i class="text-danger"></i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="product_id" type="text" id="product_id" placeholder="<?php echo display('barcode_or_qrcode') ?>"  tabindex="1" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="quantity" class="col-sm-4 col-form-label"><?php echo 'Quantity' ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="quantity" type="number" id="quantity" placeholder="Enter Product Quantity only" required tabindex="1" >
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="product_name" class="col-sm-4 col-form-label"><?php echo display('product_name') ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="product_name" type="text" id="product_name" placeholder="<?php echo display('product_name') ?>" required tabindex="1" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="serial_no" class="col-sm-4 col-form-label"><?php echo display('serial_no') ?> </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="" class="form-control " id="serial_no" name="serial_no" placeholder="111,abc,XYz"   />
                                    </div>
                                </div>
                            </div>

                        </div>



                       <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="product_model" class="col-sm-4 col-form-label"><?php echo display('model') ?> <i class="text-danger"></i></label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="" class="form-control" id="product_model" name="model" placeholder="<?php echo display('model') ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="category_id" class="col-sm-4 col-form-label"><?php echo display('category') ?></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="category_id" name="category_id" tabindex="3">
                                            <option value=""></option>
                                            <?php if ($category_list) { ?>
                                                {category_list}
                                                <option value="{category_id}">{category_name}</option>
                                                {/category_list}
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>      



                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="sell_price" class="col-sm-4 col-form-label"><?php echo display('sell_price') ?> <i class="text-danger">*</i> </label>
                                    <div class="col-sm-8">
                                        <input class="form-control text-right" id="sell_price" name="price" type="text" required="" placeholder="0.00" tabindex="5" min="0">
                                    </div>
                                </div> 
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="unit" class="col-sm-4 col-form-label"><?php echo display('unit') ?></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="unit" name="unit" tabindex="-1" aria-hidden="true">
                                            <option value="">Select One</option>
                                            <?php if ($unit_list) { ?>
                                                {unit_list}
                                                <option value="{unit_name}">{unit_name}</option>
                                                {/unit_list}
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>



                       <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="image" class="col-sm-4 col-form-label"><?php echo display('image') ?> </label>
                                    <div class="col-sm-8">
                                        <input type="file" name="image" class="form-control" id="image" tabindex="4">
                                    </div>
                                </div> 
                            </div>
                             <?php  $i=0;
                    foreach ($taxfield as $taxss) {?>
                   
                            <div class="col-sm-6">
                         <div class="form-group row">
                            <label for="tax" class="col-sm-4 col-form-label"><?php echo $taxss['tax_name']; ?> <i class="text-danger"></i></label>
                            <div class="col-sm-7">
                              <input type="text" name="tax<?php echo $i;?>" class="form-control" value="<?php echo number_format($taxss['default_value'], 2, '.', ',');?>">
                            </div>
                            <div class="col-sm-1"> <i class="text-success">%</i></div>
                        </div>
                    </div>
               
                       <?php $i++;}?>
                        </div> 
                        <div class="table-responsive product-supplier">
                            <table class="table table-bordered table-hover"  id="product_table">
                                <thead>
                                    <tr>
                                        <th class="text-center"><?php echo display('supplier') ?> <i class="text-danger">*</i></th>
                                        <th class="text-center"><?php echo display('supplier_price') ?> <i class="text-danger">*</i></th>


                                        <!-- <th class="text-center"><?php// echo display('action') ?> <i class="text-danger"></i></th> -->
                                    </tr>
                                </thead>
                                <tbody id="proudt_item">
                                    <tr class="">

                                        <td width="300">
                                            <select name="supplier_id[]" class="form-control"  required="">
                                                <option value=""> select Supplier</option>
                                                <?php if ($supplier) { ?>
                                                    {supplier}
                                                    <option value="{supplier_id}">{supplier_name}</option>
                                                    {/supplier}
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td class="">
                                            <input type="text" tabindex="6" class="form-control text-right" name="supplier_price[]" placeholder="0.00"  required  min="0"/>
                                        </td>

                                        <!-- <td width="100"> <a  id="add_purchase_item" class="btn btn-info btn-sm" name="add-invoice-item" onClick="addpruduct('proudt_item');"  tabindex="9"/><i class="fa fa-plus-square" aria-hidden="true"></i></a> <a class="btn btn-danger btn-sm"  value="<?php //echo display('delete') ?>" onclick="deleteRow(this)" tabindex="10"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                   <div class="row">
                            <div class="col-sm-12">
                                <center><label for="description" class="col-form-label"><?php echo display('product_details') ?></label></center>
                                <textarea class="form-control" name="description" id="description" rows="2" placeholder="<?php echo display('product_details') ?>" tabindex="2"></textarea>
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <div class="col-sm-6">

                                <input type="submit" id="add-product" class="btn btn-primary btn-large" name="add-product" value="<?php echo display('save') ?>" tabindex="10"/>
                                <input type="submit" value="<?php echo display('save_and_add_another') ?>" name="add-product-another" class="btn btn-large btn-success" id="add-product-another" tabindex="9">
                            </div>
                        </div>

                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>

                            
                            <input type="submit" id="add-deposit" class="btn btn-success" name="add-deposit" value="<?php echo display('save') ?>" tabindex="6"/>
                           <!--  <input type="submit" class="btn btn-success" value="Submit"> -->

                        </div>

                        <?php echo form_close() ?>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->

  <!------ add new bank -->  
      <div class="modal fade modal-success" id="bank_info" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h3 class="modal-title"><?php echo display('add_new_bank') ?></h3>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                      <?php echo form_open_multipart('Csettings/add_new_bank',array('class' => 'form-vertical','id' => 'validate' ))?>

                    <div class="panel-body">

 <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

                        <div class="form-group row">

                            <label for="bank_name" class="col-sm-3 col-form-label"><?php echo display('bank_name') ?> <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="bank_name" id="bank_name" required="" placeholder="<?php echo display('bank_name') ?>" tabindex="1"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="ac_name" class="col-sm-3 col-form-label"><?php echo display('ac_name') ?> <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="ac_name" id="ac_name" required="" placeholder="<?php echo display('ac_name') ?>" tabindex="2"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="ac_no" class="col-sm-3 col-form-label"><?php echo display('ac_no') ?> <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="ac_no" id="ac_no" required="" placeholder="<?php echo display('ac_no') ?>" tabindex="3"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="branch" class="col-sm-3 col-form-label"><?php echo display('branch') ?> <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="branch" id="branch" required="" placeholder="<?php echo display('branch') ?>" tabindex="4"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="signature_pic" class="col-sm-3 col-form-label"><?php echo display('signature_pic') ?></label>

                            <div class="col-sm-6">

                                <input type="file" class="form-control" name="signature_pic" id="signature_pic" placeholder="<?php echo display('signature_pic') ?>" tabindex="5"/>

                            </div>

                        </div>

                   

                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>

                            
                            <input type="submit" id="add-deposit" class="btn btn-success" name="add-deposit" value="<?php echo display('save') ?>" tabindex="6"/>
                           <!--  <input type="submit" class="btn btn-success" value="Submit"> -->

                        </div>

                        <?php echo form_close() ?>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->
  <!------ add new customer -->  

    <div class="modal fade modal-success" id="cust_info" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h3 class="modal-title"><?php echo display('add_new_customer') ?></h3>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                       <?php echo form_open('Cinvoice/instant_customer', array('class' => 'form-vertical', 'id' => 'newcustomer')) ?>

                    <div class="panel-body">

 <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

                        <div class="form-group row">

                            <label for="customer_name" class="col-sm-3 col-form-label"><?php echo display('customer_name') ?> <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input class="form-control" name ="customer_name" id="" type="text" placeholder="<?php echo display('customer_name') ?>"  required="" tabindex="1">

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="email" class="col-sm-3 col-form-label"><?php echo display('customer_email') ?></label>

                            <div class="col-sm-6">

                                <input class="form-control" name ="email" id="email" type="email" placeholder="<?php echo display('customer_email') ?>" tabindex="2"> 

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="mobile" class="col-sm-3 col-form-label"><?php echo display('customer_mobile') ?></label>

                            <div class="col-sm-6">

                                <input class="form-control" name ="mobile" id="mobile" type="number" placeholder="<?php echo display('customer_mobile') ?>" min="0" tabindex="3">

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="address " class="col-sm-3 col-form-label"><?php echo display('customer_address') ?></label>

                            <div class="col-sm-6">

                                <textarea class="form-control" name="address" id="address " rows="3" placeholder="<?php echo display('customer_address') ?>" tabindex="4"></textarea>

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

         

        </div>

    </section>

</div>

<!-- Invoice Report End -->









