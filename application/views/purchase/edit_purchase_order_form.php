<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>



<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>





<!-- Add New Purchase Start -->

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Manage Purchase Order</h1>

            <small><?php echo display('add_new_purchase') ?></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('purchase') ?></a></li>

                <li class="active"><?php echo display('manage_purchase') ?></li>

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

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>

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



        <!-- Purchase report -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                        <div class="panel-title">

                            <h4><?php echo display('edit_purchase') ?></h4>

                        </div>

                    </div>



                    <div class="panel-body">

                    <?php echo form_open_multipart('Cpurchase/purchase_order_update',array('class' => 'form-vertical', 'id' => 'purchase_order_update'))?>

                        



                        <div class="row">

                            <div class="col-sm-6">

                               <div class="form-group row">

                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Vendor

                                        <i class="text-danger">*</i>

                                    </label>

                                    <div class="col-sm-6">

                                        <select name="supplier_id" id="supplier_id" class="form-control " required=""> 

                                          

                                            {supplier_list}

                                            <option value="{supplier_id}">{supplier_name}</option>

                                            {/supplier_list} 

                                            {supplier_selected}

                                            <option value="{supplier_id}" selected="">{supplier_name}</option>

                                            {/supplier_selected}

                                        </select>

                                    </div>



                                 

                                </div> 

                            </div>



                             <div class="col-sm-6">

                                 <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Ship To
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                         <textarea rows="4" cols="50" name="ship_to" class=" form-control" value="{ship_to}" id="">{ship_to} </textarea>
                                    </div>
                                </div> 


                            </div>

                        </div>



                        <div class="row">

                          <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php echo display('purchase_date') ?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="purchase_date" value="{est_ship_date}" id="date"  />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label">P.O Number
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="chalan_no" value="{chalan_no}" placeholder="P.O Number" id="invoice_no" />
                                        <input type="hidden" tabindex="3" class="form-control" name="purchase_id" value="<?=$this->uri->segment(3); ?>" />
                                    </div>
                                </div>
                            </div>

                        </div>

                            <div class="row">

                                <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Created By
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="adress" name="created_by" value="" placeholder="Created By" rows="1">{created_by}</textarea>
                                    </div>
                                </div> 
                            </div>



                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Payment Terms
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="adress" name="payment_terms" value="" placeholder="Payment Terms" rows="1">{payment_terms}</textarea>
                                    </div>
                                </div> 
                            </div>
                           

                        </div>




                        <div class="row">


                               <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Shipment Terms
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="adress" name="shipment_terms" value="" placeholder="Shipment Terms" rows="1">{shipment_terms}</textarea>
                                    </div>
                                </div> 
                            </div>


                               <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Est. Ship Date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="est_ship_date" value="{est_ship_date}" id="date"  />
                                    </div>
                                </div>
                            </div>




                           <!--  <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="shipping_line" class="col-sm-4 col-form-label">Shipping Line
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="shipping_line" placeholder="Shipping Line" id="shipping_line" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Container No
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="container_no" name="container_no" placeholder="Container No" rows="1"></textarea>
                                    </div>
                                </div> 
                            </div> -->
                        </div>




                      <br>

                        <div class="table-responsive">

                             <table class="table table-bordered table-hover" id="purchaseTable">
                                <thead>
                                     <tr>
                                            <th class="text-center" width="20%">Product Name(SKU)<i class="text-danger">*</i></th> 
                                            <th class="text-center" width="20%">Slabs<i class="text-danger">*</i></th> 
                                            <th class="text-center">Balance</th> 
                                            <th class="text-center">Quantity (Sq. ft)<i class="text-danger">*</i></th>
                                            <th class="text-center">Unit Cost<i class="text-danger">*</i></th>
                                            <th class="text-center"><?php echo display('total') ?></th>
                                            <th class="text-center"><?php echo display('action') ?></th>
                                        </tr>
                                </thead>
                                <tbody id="addPurchaseItem">

                                     {purchase_info}
                                    <tr>
                                         <td class="span3 supplier">

                                           <input type="text" name="product_name" required class="form-control product_name productSelection" onkeypress="product_pur_or_list({sl});" placeholder="<?php echo display('product_name') ?>" id="product_name_{sl}" tabindex="5" value="{product_name}"  >



                                            <input type="hidden" class="autocomplete_hidden_value product_id_{sl}" name="product_id[]" id="SchoolHiddenId" value="{product_id}"/>



                                            <input type="hidden" class="sl" value="{sl}">

                                        </td>

                                    <td class="wt">
                                                <input type="text" id="" name="slabs[]" value="{slabs}" class="form-control text-right" placeholder="0.00"/>
                                            </td>



                                           <td class="wt">
                                                <input type="text" id="available_quantity_1" class="form-control text-right stock_ctn_1" placeholder="0.00" readonly/>
                                            </td>
                                        
                                            <td class="text-right">
                                                <input type="text" name="product_quantity[]" id="cartoon_1" required="" min="0" class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="0.00" value="{quantity}"  tabindex="6"/>
                                            </td>
                                            <td class="test">
                                                <input type="text" name="product_rate[]" required="" onkeyup="calculate_store(1);" onchange="calculate_store(1);" id="product_rate_1" class="form-control product_rate_1 text-right" placeholder="0.00" value="{rate}" min="0" tabindex="7"/>
                                            </td>
                                           

                                            <td class="text-right">
                                                <input class="form-control total_price text-right" type="text" name="total_price[]" id="total_price_1" value="{total_amount}" readonly="readonly" />
                                            </td>
                                            <td>

                                               

                                                <button  class="btn btn-danger text-right red" type="button" value="<?php echo display('delete')?>" onclick="deleteRow(this)" tabindex="8"><i class="fa fa-close"></i></button>
                                            </td>
                                    </tr>
                                         {/purchase_info}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        
                                        <td class="text-right" colspan="5"><b>Overall Total:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="Total" class="text-right form-control" name="total" value="{grand_total}" readonly="readonly" />
                                        </td>
                                        <td> <button type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addPurchaseOrderField2('addPurchaseItem')"  tabindex="9"/><i class="fa fa-plus"></i></button>

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                    </tr>
                                       <!--  <tr>
                                       
                                        <td class="text-right" colspan="4"><b><?php echo display('discounts') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="discount" class="text-right form-control discount" onkeyup="calculate_store(1)" name="discount" placeholder="0.00" value="" />
                                        </td>
                                        <td> 

                                           </td>
                                    </tr> -->

                                    <!--     <tr>
                                        
                                        <td class="text-right" colspan="4"><b><?php echo display('grand_total') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="0.00" readonly="readonly" />
                                        </td>
                                        <td> </td>
                                    </tr> -->
                                    <!--      <tr>
                                        
                                        <td class="text-right" colspan="4"><b><?php echo display('paid_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="paidAmount" class="text-right form-control" onKeyup="invoice_paidamount()" name="paid_amount" value="" />
                                        </td>
                                        <td> </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td colspan="2" class="text-right">
                                             <input type="button" id="full_paid_tab" class="btn btn-warning" value="<?php echo display('full_paid') ?>" tabindex="16" onClick="full_paid()"/>
                                        </td>
                                        <td class="text-right" colspan="2"><b><?php echo display('due_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="dueAmmount" class="text-right form-control" name="due_amount" value="0.00" readonly="readonly" />
                                        </td>
                                        <td></td>
                                    </tr> -->
                                </tfoot>
                            </table>

                        </div>



                        <div class="form-group row">

                            <div class="col-sm-6">

                                <input type="submit" id="add_purchase" class="btn btn-primary btn-large" name="add-purchase" value="<?php echo display('submit') ?>" />

                                <input type="submit" value="<?php echo display('submit_and_add_another') ?>" name="add-purchase-another" class="btn btn-large btn-success" id="add_purchase_another" >

                            </div>

                        </div>

                    <?php echo form_close()?>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>





