<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js" type="text/javascript"></script>

<!-- Edit Invoice Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('invoice_edit') ?></h1>
            <small><?php echo display('invoice_edit') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active"><?php echo display('invoice_edit') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
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
        <!-- Invoice report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('invoice_edit') ?></h4>
                        </div>
                    </div>
                    <?php echo form_open('Cinvoice/invoice_update', array('class' => 'form-vertical', 'id' => 'invoice_update')) ?>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-6" id="payment_from_1">
                                <div class="form-group row">
                                    <label for="product_name" class="col-sm-4 col-form-label"><?php echo display('customer_name').'/'.display('phone') ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="customer_name" value="{customer_name}"  onkeyup="customer_autocomplete()" class="form-control customerSelection" placeholder='<?php echo display('customer_name') ?>' required id="customer_name" tabindex="1">

                                        <input type="hidden" class="customer_hidden_value" name="customer_id" value="{customer_id}" id="autocomplete_customer_id"/>
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-6" id="payment_from_1">
                                <div class="form-group row">
                                    <label for="payment_type" class="col-sm-4 col-form-label"><?php
                                        echo display('payment_type');
                                        ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <select name="paytype" class="form-control" required="" onchange="bank_paymet(this.value)">
                                            <option value="">Select Payment Option</option>
                                            <option value="1" <?php if($paytype ==1){echo 'selected';}?>>Cash Payment</option>
                                            <option value="2"  <?php if($paytype ==2){echo 'selected';}?>>Bank Payment</option> 
                                        </select>
                                      

                                     
                                    </div>
                                 
                                </div>
                            </div>
                        </div>

                        


                        <div class="row">

                            <div class="col-sm-6">

                                <div class="form-group row">

                                    <label for="date" class="col-sm-4 col-form-label">Sales Invoice date <i class="text-danger">*</i></label>
                                      <div class="col-sm-8">
                                        <input type="text" tabindex="2" class="form-control datepicker" name="invoice_date" value="{date}"  required />
                                    </div>

                                </div>


                                      <div class="form-group row">

                                    <label for="billing_address" class="col-sm-4 col-form-label">Billing Address</label>

                                    <div class="col-sm-8">

                                        <textarea rows="4" cols="50" name="billing_address" class=" form-control" value="" placeholder='Billing Address' id="billing_address"> {billing_address}</textarea>

                                    </div>

                                </div> 

                            </div>


                             <div class="col-sm-6">

                                <div class="form-group row">

                                    <label for="date" class="col-sm-4 col-form-label">Commercial Invoice Number<i class="text-danger">*</i></label>

                                    <div class="col-sm-8">
                                        <input class="form-control" placeholder="Commercial Invoice Number" type="text" size="50" name="commercial_invoice_number" id="commercial_invoice_number" required value="{commercial_invoice_number}"/>
                                    </div>
                                </div>


                                      <div class="form-group row">

                                    <label for="container_number" class="col-sm-4 col-form-label">Container Number</label>

                                    <div class="col-sm-8">

                                       <input class="form-control" placeholder="Container Number" type="text" size="50" name="container_number" id="date" required value="{container_no}" tabindex="4" />

                                    </div>

                                </div> 

                            </div>



                                <div class="col-sm-6">

                                <div class="form-group row">

                                    <label for="date" class="col-sm-4 col-form-label">B/L No<i class="text-danger">*</i></label>

                                    <div class="col-sm-8">


                                        <input class="form-control" placeholder="BL Number" type="text" size="50" name="bl_no" required value="{bl_no}"/>

                                    </div>

                                </div>



                                <div class="form-group row">

                                    <label for="port_of_discharge
" class="col-sm-4 col-form-label">Port of discharge</label>

                                    <div class="col-sm-8">

                                        <input name="port_of_discharge" class=" form-control" placeholder='Port of discharge' value="{port_of_discharge}" id="port_of_discharge" />
                                    </div>

                                </div> 

                            </div>




                        <div class="col-sm-6" id="bank_div">

                            <div class="form-group row">

                                <label for="bank" class="col-sm-3 col-form-label"><?php

                                    echo display('bank');

                                    ?> <i class="text-danger">*</i></label>

                                <div class="col-sm-6">

                                   <select name="bank_id" class="form-control bankpayment"  id="bank_id">

                                        <option value="">Select Location</option>

                                        <?php foreach($bank_list as $bank){?>

                                            <option value="<?php echo html_escape($bank['bank_id'])?>"><?php echo html_escape($bank['bank_name']);?></option>

                                        <?php }?>

                                    </select>

                                 

                                </div>
                                 <?php if($this->permission1->method('add_customer','create')->access()){ ?>

                                    <div  class=" col-sm-3">

                                         <a href="#" class="client-add-btn btn btn-info" aria-hidden="true" data-toggle="modal" data-target="#bank_info"><i class="ti-plus m-r-2"></i></a>

                                    </div>

                                <?php } ?>
                             

                            </div>

                        </div>

                        </div>
                        <br>
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                    <tr>
                                        <th class="text-center product_field">Product Name<i class="text-danger">*</i></th>
                                        <th class="text-center">Description</th>
                                       
                                        <th class="text-center">In stock</th>
                                       
                                        <th class="text-center">QTY/SQ. FT<i class="text-danger">*</i></th>
                                        <th class="text-center"><?php echo display('rate') ?> <i class="text-danger">*</i></th>

                                      
                                        <th class="text-center invoice_fields"><?php echo display('total') ?> 
                                        </th>
                                        <th class="text-center"><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody id="addinvoiceItem">
                                      {invoice_all_data}
                                    <tr>
                                         <td class="product_field">
                                            <input type="text" name="product_name1" onkeypress="invoice_productList({sl});" value="{product_name}-({product_model})" class="form-control productSelection" required placeholder='<?php echo display('product_name') ?>' id="product_name_{sl}" tabindex="3">
                                            <input type="hidden" class="product_id_{sl} autocomplete_hidden_value" name="product_id[]" value="{product_id}" id="SchoolHiddenId"/>
                                        </td>

                                        <td>
                                            <input type="text" name="desc[]" class="form-control text-right "  value="{description}"/>
                                        </td>
                                       
                                         <td>
                                            <input type="text" name="available_quantity[]" class="form-control text-right available_quantity_{sl}" value="{stock_qty}" readonly="" />
                                        </td>
                                       
                                          <td>
                                            <input type="text" name="product_quantity[]" onkeyup="quantity_calculate({sl});" onchange="quantity_calculate({sl});" value="{quantity}" class="total_qntt_{sl} form-control text-right" id="total_qntt_{sl}" min="0" placeholder="0.00" tabindex="4" required="required"/>
                                        </td>
                                        <td>
                                            <input type="text" name="product_rate[]" onkeyup="quantity_calculate({sl});" onchange="quantity_calculate({sl});" value="{rate}" id="price_item_{sl}" class="price_item{sl} form-control text-right" min="0" tabindex="5" required="" placeholder="0.00"/>
                                        </td>
                                        <!-- Discount -->
                                      


                                       <td>
                                            <input class="total_price form-control text-right" type="text" name="total_price[]" id="total_price_{sl}" value="{total_price}" readonly="readonly" />

                                            <input type="hidden" name="invoice_details_id[]" id="invoice_details_id" value="{invoice_details_id}"/>
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
                                      {/invoice_all_data}
                                </tbody>
                                <tfoot>
                                     <tr>
                                        <td colspan="6" rowspan="2">
                                <center><label  for="details" class="  col-form-label text-center">Message on invoice</label></center>
                                <textarea name="inva_details" id="details" class="form-control" placeholder="Message on invoice" tabindex="12">{invoice_details}</textarea>
                                </td>
                                   
                                    
                                    <td><a  id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addInputField('addinvoiceItem');"  tabindex="11"><i class="fa fa-plus"></i></a></td>
                                </tr>


                                  <input type="hidden" id="shipping_cost" class="form-control text-right" name="shipping_cost" onkeyup="quantity_calculate(1);"  onchange="quantity_calculate(1);"  placeholder="0.00" tabindex="14" />


                                 
                                
                                 
                                 
                    <tr>
                               
                               
                                
                                <tr>
                                    <td colspan="5"  class="text-right"><b>Overall Total:</b></td>
                                    <td class="text-right">
                                           <input type="text" id="grandTotal" class="form-control text-right" name="grand_total_price" value="{total_amount}" readonly="readonly" />
                                    </td>
                                  
                                </tr>
                                <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url(); ?>"/>
                                          <input type="hidden" name="invoice_id" id="invoice_id" value="{invoice_id}"/>
                                            <input type="hidden" name="invoice" id="invoice" value="{invoice}"/>
                              
                                <!-- <tr>
                                    
                                    <td class="text-right" colspan="4"><b><?php echo display('paid_ammount') ?>:</b></td>
                                    <td class="text-right">
                                         <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url(); ?>"/>
                                        <input type="text" id="paidAmount" 
                                               onkeyup="invoice_paidamount();" class="form-control text-right" name="paid_amount" placeholder="0.00" tabindex="15" value=""/>
                                    </td>
                                </tr> -->
                             <!--    <tr>
                                   

                                    <td class="text-right" colspan="4"><b><?php echo display('due') ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="dueAmmount" class="form-control text-right" name="due_amount" value="0.00" readonly="readonly"/>
                                    </td>
                                </tr> -->
                                <tr>
                                     <td align="center">
                                      <!--   <input type="button" id="full_paid_tab" class="btn btn-warning" value="<?php echo display('full_paid') ?>" tabindex="16" onClick="full_paid()"/> -->

                                        <input type="submit" id="add_invoice" class="btn btn-success" name="add-invoice" value="<?php echo display('submit') ?>" tabindex="17"/>
                                    </td>
                                   
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>

