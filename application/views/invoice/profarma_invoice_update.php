<!-- Product Purchase js -->

<script src="<?php echo base_url() ?>my-assets/js/admin_js/proforma.js" type="text/javascript"></script>


<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Proforma Invoice Update</h1>
            <small>Generate New Proforma Invoice</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Proforma</a></li>
                <li class="active">Proforma Invoice</li>
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
                            <h4>Create New Proforma Invoice</h4>
                        </div>
                    </div>

                    <div class="panel-body">
                    <?php echo form_open_multipart('Cinvoice/add_profarma_invoice',array('class' => 'form-vertical', 'id' => 'insert_purchase','name' => 'insert_purchase'))?>
                        

                        <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Exporter
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                               <textarea rows="4" cols="50" name="billing_address" class=" form-control" placeholder='Add Exporter Detail' id="">{billing_address} </textarea>
                                    </div>
                                
                                </div> 
                            </div>

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="purchase_date" value="<?php echo $date; ?>" id="date" value="{purchase_date}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('invoice_no') ?>
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="chalan_no" placeholder="<?php echo display('invoice_no') ?>" id="invoice_no" value="{chalan_no}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Customer
                                    </label>
                                    <div class="col-sm-8">
                                        <select name="customer_id" id="" class="form-control">
                                            <?php foreach($customer as $customer){ ?>
                                                <option value="<?=$customer['customer_id']; ?>"><?=$customer['customer_name']; ?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="etd" class="col-sm-4 col-form-label">Pre Carriage By
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="pre_carriage" value="{pre_carriage}" placeholder="Pre Carriage By" id="etd" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="eta" class="col-sm-4 col-form-label">Place of Receipt
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="eta" name="receipt" value="{receipt}" placeholder="Place of Receipt" rows="1"></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>




                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="shipping_line" class="col-sm-4 col-form-label">Country of origin of goods
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="country_goods" value="{country_goods}" placeholder="Country of origin of goods" id="shipping_line" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Country of final destination
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="container_no" name="country_destination" value="{country_destination}" placeholder="Country of final destination" rows="1"></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>


                          <div class="row">


                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Port of loading
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="loading" value="{loading}" placeholder="Port of loading" id="bl_number" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Port of discharge
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="discharge" value="{discharge}" placeholder="Port of discharge" id="bl_number" />
                                    </div>
                                </div>
                            </div>

                           
                        </div>



                        <div class="row">


                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Terms of payment and delivery
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="terms_payment" value="{terms_payment}" placeholder="Terms of payment and delivery" id="bl_number" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Description of goods
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">

                                    <textarea rows="4" cols="50" name="description_goods" value="" class=" form-control" placeholder='Description of goods' id="">{description_goods} </textarea>

                                    </div>
                                </div>
                            </div>
                        </div>




<br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                     <tr>
                                            <th class="text-center" width="20%"><?php echo display('item_information') ?><i class="text-danger">*</i></th> 
                                            <th class="text-center"><?php echo display('stock_ctn') ?></th>
                                            <th class="text-center"><?php echo display('quantity') ?> <i class="text-danger">*</i></th>
                                            <th class="text-center"><?php echo display('rate') ?><i class="text-danger">*</i></th>
                                            <th class="text-center"><?php echo display('total') ?></th>
                                            <th class="text-center"><?php echo display('action') ?></th>
                                        </tr>
                                </thead>
                                <tbody id="addPurchaseItem">
                                      {purchase_info}
                                    <tr>

                                        <td class="product_field">
                                            <input type="text" name="product_name[]" onkeypress="invoice_productList({sl});" value="{product_name}-({product_model})" class="form-control productSelection" required placeholder='<?php echo display('product_name') ?>' id="product_name_{sl}" tabindex="3">

                                            <input type="hidden" class="product_id_{sl} autocomplete_hidden_value" name="product_id[]" value="{product_id}" id="SchoolHiddenId"/>
                                        </td>


                                        <td>
                                            <input type="text" name="available_quantity[]" class="form-control text-right available_quantity_{sl}" value="{p_quantity}" readonly="" />
                                        </td>

                                        <td>
                                            <input type="text" name="product_quantity[]" onkeyup="quantity_calculate({sl});" onchange="quantity_calculate({sl});" value="{quantity}" class="total_qntt_{sl} form-control text-right" id="total_qntt_{sl}" min="0" placeholder="0.00" tabindex="4" required="required"/>
                                        </td>

                                         <td>
                                            <input type="text" name="product_rate[]" onkeyup="quantity_calculate({sl});" onchange="quantity_calculate({sl});" value="{rate}" id="price_item_{sl}" class="price_item{sl} form-control text-right" min="0" tabindex="5" required="" placeholder="0.00"/>
                                        </td>

                                             <td>
                                            <input class="total_price form-control text-right" type="text" name="total_price[]" id="total_price_{sl}" value="{total}" readonly="readonly" />

                                            <input type="hidden" name="invoice_details_id[]" id="invoice_details_id" value="{invoice_details_id}"/>
                                        </td>
                                            <td>

                                               

                                                <button  class="btn btn-danger text-right red" type="button" value="<?php echo display('delete')?>" onclick="deleteRow(this)" tabindex="8"><i class="fa fa-close"></i></button>
                                            </td>
                                    </tr>
                                    {/purchase_info}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        
                                        <td class="text-right" colspan="4"><b><?php echo display('total') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="Total" class="text-right form-control" name="total" value="0.00" readonly="readonly" />
                                        </td>
                                        <td> <button type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addInputField('addPurchaseItem');"  tabindex="9"><i class="fa fa-plus"></i></button>

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                    </tr>
           

                                       
                                        
                                    

                                  
                                     

                                   
                                </tfoot>
                            </table>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="add_purchase" class="btn btn-primary btn-large" name="add-purchase" value="<?php echo display('submit') ?>" />
                                <input type="submit" value="<?php echo display('submit_and_add_another') ?>" name="add-purchase-another" class="btn btn-large btn-success" id="add_purchase_another" >
                            </div>
                        </div>


                           <div class="form-group row">

                                    <label for="billing_address" class="col-sm-4 col-form-label">Account Details</label>

                                    <div class="col-sm-8">

                                        <textarea rows="4" cols="50" id="details" name="ac_details" class=" form-control" placeholder='This will show upon the invoice' id=""> </textarea>

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






