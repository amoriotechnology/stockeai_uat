<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>


<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Ocean Import Tracking</h1>
            <small>Generate New Ocean Import Tracking</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Ocean Import Tracking</a></li>
                <li class="active">Generate New Ocean Import Tracking</li>
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
                            <h4>Create New Ocean Import Tracking Invoice</h4>
                        </div>
                    </div>

                    <div class="panel-body">
                    <?php echo form_open_multipart('Cpurchase/insert_ocean_import',array('class' => 'form-vertical', 'id' => 'insert_ocean_import','name' => 'insert_ocean_import'))?>
                        

                        <div class="row">
                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Shipper / Vendor
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="supplier_id" id="supplier_id" class="form-control " required="" tabindex="1"> 
                                            <option value=" "><?php echo display('select_one') ?></option>
                                            {all_supplier}
                                            <option value="{supplier_id}">{supplier_name}</option>
                                            {/all_supplier}
                                        </select>
                                    </div>
                                  <?php if($this->permission1->method('add_supplier','create')->access()){ ?>
                                    <div class="col-sm-2">


                                     <!--    <a class="btn btn-success" title="Add New Supplier" href="<?php echo base_url('Csupplier'); ?>"><i class="fa fa-user"></i></a> -->



                                          <a href="#" class="client-add-btn btn btn-info" aria-hidden="true" data-toggle="modal" data-target="#add_vendor"><i class="fa fa-user"></i></a>


                                    </div>
                                <?php }?>
                                </div> 
                            </div>

                            


                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label"> Booking / BL No
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="booking_no" placeholder="Booking No." id="invoice_no" />
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Container No
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                               <textarea rows="1" cols="50" name="container_no" class=" form-control" placeholder='Container No' id=""> </textarea>
                                    </div>
                                
                                </div> 
                            </div>


                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label">Seal No
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="seal_no" placeholder="Seal No" id="invoice_no" />
                                    </div>
                                </div>
                            </div>
                        </div>



                         <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">ETD (Estimated time of depature)
                                        <i class="text-danger">*</i>
                                    </label>
                                        <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="etd" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                
                                </div> 
                            </div>


                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label">ETA (Estimated time of Arrival)
                                        <i class="text-danger"></i>
                                    </label>
                                       <div class="col-sm-8">
                                        <?php $date1 = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="eta" value="<?php echo $date1; ?>" id="date1"  />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"> Ocean Import Tracking date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date3 = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="invoice_date" value="<?php echo $date3; ?>" id="date3"  />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Customer / Consignee
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="1" cols="50" tabindex="4" id="adress" name="consignee" placeholder="Consignee" rows="1"></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="etd" class="col-sm-4 col-form-label">Notify Party Email
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="notify_party" placeholder="Notify Party" id="etd" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="eta" class="col-sm-4 col-form-label">Vessel
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="eta" name="vessel" placeholder="Vessel" rows="1"></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>




                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="shipping_line" class="col-sm-4 col-form-label">Voyage No.
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="voyage_no" placeholder="Voyage No." id="shipping_line" />
                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Port of loading
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="port_of_loading" placeholder="Port of loading" id="bl_number" />
                                    </div>
                                </div>
                            </div>
                          
                        </div>


                          <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Port of discharge
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="port_of_discharge" placeholder="Port of discharge" id="bl_number" />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Place of Delivery
                                          <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        
                                        <input type="text" required tabindex="2" class="form-control " name="place_of_delivery" value=""   />
                                  
                                    </div>
                                </div> 
                            </div>
                        
                           
                        </div>




                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="etd" class="col-sm-4 col-form-label">Freight Forwarder
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                           <textarea class="form-control" tabindex="4" id="eta" name="freight_forwarder" placeholder="Freight Forwarder" rows="1"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="eta" class="col-sm-4 col-form-label">Particulars
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="eta" name="particulars" placeholder="Particulars" rows="1"></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>



                        <div class="row">

                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="eta" class="col-sm-4 col-form-label">BL / Shipment created date
                                    </label>
                                    <div class="col-sm-8">
                                           <?php $date2 = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="bl_shipment" value="<?php echo $date2; ?>" id="date2"  />
                                    </div>
                                </div> 
                            </div>

                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Attachements
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="file" name="attachments" class="form-control">
                                    </div>
                                </div> 
                            </div>
                        </div>




                        <div class="row">

                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="eta" class="col-sm-4 col-form-label">Country of Origin
                                          <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" required tabindex="2" class="form-control" placeholder="Country of Origin" name="country_of_origin" value=""  />
                                    </div>
                                </div> 
                            </div>
                        </div>


                         <div class="row">

                            <div class="col-sm-12">
                               <div class="form-group row">
                                    <label for="eta" class="col-sm-2 col-form-label">Remarks / Details
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="4" cols="50" name="remarks" placeholder="Remarks / Details" ></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>

        <br>
                       

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="add_purchase" class="btn btn-primary btn-large" name="add-ocean-import" value="<?php echo display('submit') ?>" />
                                <input type="submit" value="<?php echo display('submit_and_add_another') ?>" name="add-ocean-import-another" class="btn btn-large btn-success" id="" >
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
<div class="modal fade modal-success" id="add_vendor" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h3 class="modal-title">Add New Vendor</h3>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                           

                             <?php echo form_open_multipart('Csupplier/insert_supplier', array('id' => 'insert_supplier')) ?>


                    <div class="panel-body">



                        <div class="col-sm-6">

                        <div class="form-group row">
                            <label for="supplier_name" class="col-sm-4 col-form-label">Vendor Name<i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name ="supplier_name" id="supplier_name" type="text" placeholder="Vendor Name"  required="" tabindex="1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label">Vendor Mobile<i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="mobile" id="mobile" type="number" placeholder="Vendor Mobile"  min="0" tabindex="2">
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label"><?php echo display('phone') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="phone" id="phone" type="number" placeholder="<?php echo display('phone') ?>"  min="0" tabindex="2">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label"><?php echo display('email') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="email" id="email" type="email" placeholder="<?php echo display('email') ?>"   tabindex="2">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="emailaddress" class="col-sm-4 col-form-label"><?php echo display('email').' '.display('address'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="emailaddress" id="emailaddress" type="email" placeholder="<?php echo display('email').' '.display('address') ?>"  >
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="contact" class="col-sm-4 col-form-label"><?php echo display('contact'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="contact" id="contact" type="text" placeholder="<?php echo display('contact') ?>"  >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fax" class="col-sm-4 col-form-label"><?php echo display('fax'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="fax" id="fax" type="text" placeholder="<?php echo display('fax') ?>"  >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-4 col-form-label"><?php echo display('city'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="city" id="city" type="text" placeholder="<?php echo display('city') ?>"  >
                            </div>
                        </div>


                         <div class="form-group-row">
                        <label for="" class="col-sm-4 col-form-label">Service Provider</label>
                            <div class="col-sm-8">
                               <select class="form-control" name="service_provider">
                                <option value="1">Yes</option>
                                <option value="0" selected>No</option>
                               </select>
                            </div>
                    </div>


                         
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group row">
                            <label for="state" class="col-sm-4 col-form-label"><?php echo display('state'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="state" id="state" type="text" placeholder="<?php echo display('state') ?>"  >
                            </div>
                        </div>
                      
                         
                         <div class="form-group row">
                            <label for="zip" class="col-sm-4 col-form-label"><?php echo display('zip'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="zip" id="zip" type="text" placeholder="<?php echo display('zip') ?>"  >
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="country" class="col-sm-4 col-form-label"><?php echo display('country') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="country" id="country" type="text" placeholder="<?php echo display('country') ?>"  >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address " class="col-sm-4 col-form-label"><?php echo display('supplier_address') ?></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address" id="address " rows="2" placeholder="<?php echo display('supplier_address') ?>" ></textarea>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="address2 " class="col-sm-4 col-form-label"><?php echo display('address') ?>2</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address2" id="address2" rows="2" placeholder="<?php echo display('supplier_address') ?>2" ></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-sm-4 col-form-label"><?php echo display('supplier_details') ?></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="details" id="details" rows="2" placeholder="<?php echo display('supplier_details') ?>" tabindex="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('previous_balance') ?></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="previous_balance" id="previous_balance" type="text" min="0" placeholder="<?php echo display('previous_balance') ?>" tabindex="5">
                            </div>
                        </div>
                    </div> 

                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>

                            

                            <input type="submit" id="add-supplier-from-oit" name="add-supplier-from-oit"  class="btn btn-success" value="Submit">

                        </div>

                        <?php echo form_close() ?>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>


            <script type="text/javascript">
             CKEDITOR.replace('remarks');
         </script>
