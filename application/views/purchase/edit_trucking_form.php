<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>my-assets/js/admin_js/trucking.js" type="text/javascript"></script>


<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Trucking</h1>
            <small>Edit Trucking Invoice</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Trucking</a></li>
                <li class="active">Edit Trucking Invoice</li>
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
                            <h4>Edit Trucking Invoice</h4>
                        </div>
                    </div>

                    <div class="panel-body">
                    <?php echo form_open_multipart('Ccpurchase/update_trucking',array('class' => 'form-vertical', 'id' => 'update_trucking','name' => 'update_trucking'))?>
                        

                        <div class="row">

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('invoice_no') ?>
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" value="{invoice_no}" class="form-control" name="invoice_no" placeholder="<?php echo display('invoice_no') ?>" id="invoice_no" />
                                    </div>
                                </div>
                            </div>

                           <!--  <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Exporter
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                               <textarea rows="4" cols="50" name="billing_address" class=" form-control" placeholder='Add Exporter Detail' id=""> </textarea>
                                    </div>
                                
                                </div> 
                            </div> -->

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Invoice Date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="invoice_date" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Bill to
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">


                                            <select name="bill_to" id="bill_to" class="form-control" onchange="load_customer_code(this.value,1)" required>

                            <<option value="">Select Customer</option>}

                            option

                             <?php foreach ($customer_list as $customer) {?>

                       <option value="<?php echo html_escape($customer->customer_id);?>"><?php echo html_escape($customer->customer_name);?></option>

                             <?php }?>

                           </select>

                           
                                            <!--    <textarea rows="4" cols="50" name="bill_to" class=" form-control" placeholder='Add Exporter Detail' id=""> </textarea> -->
                                    </div>
                                
                                </div> 
                            </div>


                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Shipment company
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                               <textarea rows="4" cols="50" name="shipment_company" class=" form-control" placeholder='Shipment company' id="">{shipment_company} </textarea>
                                    </div>
                                
                                </div> 
                            </div>


                           
                        </div>




                        <div class="row">

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Container / Goods Pick up date
                                        <i class="text-danger">*</i>
                                    </label>
                                       <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="container_pick_up_date" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                
                                </div> 
                            </div>


                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Delivery date
                                        <i class="text-danger">*</i>
                                    </label>
                                     <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="delivery_date" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                
                                </div> 
                            </div>


                           
                        </div>

                    



<br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="truckingTable">
                                <thead>
                                     <tr>
                                            <th class="text-center" width="20%">Date<i class="text-danger">*</i></th> 
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Description<i class="text-danger">*</i></th>
                                            <th class="text-center">Rate<i class="text-danger">*</i></th>
                                            <th class="text-center">Pro No / Reference<i class="text-danger">*</i></th>
                                           

                                            <th class="text-center"><?php echo display('total') ?></th>
                                            <th class="text-center"><?php echo display('action') ?></th>
                                        </tr>
                                </thead>
                                <tbody id="addPurchaseItem">
                                        {purchase_info}
                                    <tr>
                                        <td class="span3 supplier">


                                                 <?php $date = date('Y-m-d'); ?>
                                               <input type="text" required tabindex="2" class="form-control datepicker" name="trucking_date[]" value="<?php echo $date; ?>" id="date"  />

                                        </td>

                                       <td class="wt">
                                                <input type="text" name="product_quantity[]" id="cartoon_1" required="" min="0" class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="0.00" value="{qty}"  tabindex="6"/>
                                        </td>
                                        
                                            <td class="text-right">
                                                <input type="text" name="description[]" id="" required="" min="0" class="form-control text-right" value="{description}"  tabindex="6"/>
                                            </td>
                                            <td class="test">
                                                <input type="text" name="product_rate[]" required="" onkeyup="calculate_store(1);" onchange="calculate_store(1);" id="product_rate_1" class="form-control product_rate_1 text-right" placeholder="0.00" value="{rate}" min="0" tabindex="7"/>
                                            </td>

                                            <td class="text-right">
                                                <input class="form-control" type="text" name="pro_no[]" id="pro_no" value="{pro_no_reference}"  />
                                            </td>
                                           

                                            <td class="text-right">
                                                <input class="form-control total_price text-right" type="text" name="total_price[]" id="total_price_1" value="{total}" readonly="readonly" />
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
                                            <input type="text" id="Total" class="text-right form-control" name="total" value="0.00" readonly="readonly" />
                                        </td>
                                        <td> <button type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addTruckingOrderField('addPurchaseItem')"  tabindex="9"/><i class="fa fa-plus"></i></button>

                                       <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                    </tr>
                                    <!--     <tr>
                                       
                                        <td class="text-right" colspan="4"><b><?php echo display('discounts') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="discount" class="text-right form-control discount" onkeyup="calculate_store(1)" name="discount" placeholder="0.00" value="" />
                                        </td>
                                        <td> 

                                           </td>
                                    </tr> -->

<!--                                         <tr>
                                        
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
                                <!--     <tr>
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
                                <input type="submit" id="add_purchase" class="btn btn-primary btn-large" name="add-trucking" value="<?php echo display('submit') ?>" />
                                <input type="submit" value="<?php echo display('submit_and_add_another') ?>" name="add-trucking-another" class="btn btn-large btn-success" id="add_purchase_another" >
                            </div>
                        </div>


                           <div class="form-group row">

                                    <label for="remarks" class="col-sm-4 col-form-label">Remarks</label>

                                    <div class="col-sm-8">

                                        <textarea rows="4" cols="50" name="remarks" class=" form-control" placeholder="Remarks" id=""> </textarea>

                                    </div>
                          </div> 


                    <?php echo form_close()?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<!-- Purchase Report End -->






