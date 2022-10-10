<!-- Add new customer start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('update_setting') ?></h1>
            <small>Configure Expense Invoice</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('web_settings') ?></a></li>
                <li class="active"><?php echo display('update_setting') ?></li>
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



        <!-- New customer -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Update New Expense Invoice </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cweb_setting/updateinvoice2', array('class' => 'form-vertical', 'id' => '')) ?>
                    <div class="panel-body">

                         <input name ="invoice_type" type="hidden" value="new_expense">

                         <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label">Heading<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="invoice_heading" id="invoice_heading" type="text" tabindex="2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label"><?php echo display('logo') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="logo" id="logo" type="file" tabindex="1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6">
                                <img src="{logo}" class="img img-responsive" height="100" width="100">
                                <input name ="old_logo" type="hidden" value="{logo}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label">Company Address <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="4" cols="50" name ="company_address" id="company_address" type="text" tabindex="2"></textarea>
                            </div>
                        </div>


                    


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit"  id="add-customer" class="btn btn-success btn-large" name="add-customer" value="<?php echo display('save_changes') ?>" tabindex="13"/>
                            </div>
                        </div>
                    </div>
<?php echo form_close() ?>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Update Purchase Order(PO) Invoice </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cweb_setting/update_expense_invoice_setting/purchase_order', array('class' => 'form-vertical', 'id' => '')) ?>
                    <div class="panel-body">

                         <input name ="invoice_type" type="hidden" value="purchase_order">

                         <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label">Heading<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="invoice_heading" id="invoice_heading" type="text" tabindex="2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label"><?php echo display('logo') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="logo" id="logo" type="file" tabindex="1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6">
                                <img src="{logo}" class="img img-responsive" height="100" width="100">
                                <input name ="old_logo" type="hidden" value="{logo}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label">Company Address <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="4" cols="50" name ="company_address" id="company_address" type="text" tabindex="2"></textarea>
                            </div>
                        </div>


                    


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit"  id="add-customer" class="btn btn-success btn-large" name="add-customer" value="<?php echo display('save_changes') ?>" tabindex="13"/>
                            </div>
                        </div>
                    </div>
<?php echo form_close() ?>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Update Ocean Import Invoice </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cweb_setting/update_expense_invoice_setting/oit', array('class' => 'form-vertical', 'id' => 'insert_customer')) ?>
                    <div class="panel-body">

                         <input name ="invoice_type" type="hidden" value="oit">
                         <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label">Heading<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="invoice_heading" id="invoice_heading" type="text" tabindex="2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label"><?php echo display('logo') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="logo" id="logo" type="file" tabindex="1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6">
                                <img src="{logo}" class="img img-responsive" height="100" width="100">
                                <input name ="old_logo" type="hidden" value="{logo}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label">Company Address <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="4" cols="50" name ="company_address" id="company_address" type="text" tabindex="2"></textarea>
                            </div>
                        </div>


                    


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit"  id="add-customer" class="btn btn-success btn-large" name="add-customer" value="<?php echo display('save_changes') ?>" tabindex="13"/>
                            </div>
                        </div>
                    </div>
<?php echo form_close() ?>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Update Trucking(expense) Invoice </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cweb_setting/update_expense_invoice_setting/trucking_expense', array('class' => 'form-vertical', 'id' => '')) ?>
                    <div class="panel-body">

                         <input name ="invoice_type" type="hidden" value="trucking_expense">
                         <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label">Heading<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="invoice_heading" id="invoice_heading" type="text" tabindex="2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label"><?php echo display('logo') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="logo" id="logo" type="file" tabindex="1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6">
                                <img src="{logo}" class="img img-responsive" height="100" width="100">
                                <input name ="old_logo" type="hidden" value="{logo}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label">Company Address <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="4" cols="50" name ="company_address" id="company_address" type="text" tabindex="2"></textarea>
                            </div>
                        </div>


                    


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit"  id="add-customer" class="btn btn-success btn-large" name="add-customer" value="<?php echo display('save_changes') ?>" tabindex="13"/>
                            </div>
                        </div>
                    </div>
<?php echo form_close() ?>
                </div>
            </div>
        </div>



         



    </section>
</div>
<!-- Add new customer end -->



