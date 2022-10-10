<!-- Add new customer start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Invoice Setting
</h1>
            <small>Configure Invoice</small>
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
                            <h4>Update Sales & Profarma  Invoice </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cweb_setting/web_Invoice',array('class' => 'form-vertical', 'id' => 'form1','name' => 'form1'))?>
                 
                  
                                        <div class="panel-body">

                         <input name ="form_type" type="hidden" value="sales&Profarma">

                         

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label">Account details/Additional Information<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                               <textarea rows="4" cols="50" required name="acc"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6">
                             
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label">Remarks/Conditions <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <textarea required class="form-control" rows="4" cols="50" name ="company_address" id="company_address" type="text" tabindex="2"></textarea>
                            </div>
                        </div>


                    


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="hidden" name="form_type" value="sales&Profarma">
                                <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
                                <input type="submit"  id="add-customer" class="btn btn-success btn-large" name="add-customer" value="<?php echo display('save_changes') ?>" tabindex="13"/>
                                 <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
                                 <?php echo form_close()?>
                            </div>
                            <div id="Update_Alert"></div>
                        </div>
                    </div>
                      
                </div>
            </div>
        </div>


        


        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Update Packing List Invoice </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cweb_setting/web_Invoice',array('class' => 'form-vertical', 'id' => 'form2','name' => 'form2'))?>
                 
          
                    <div class="panel-body">

                         <input name ="form_type" type="hidden" value="packing_List">
 <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label">Remarks/Conditions<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <textarea required class="form-control" rows="4" cols="50" name ="company_address" id="company_address" type="text" tabindex="2"></textarea>
                            </div>
                        </div>
  <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit"  id="add-customer" class="btn btn-success btn-large" name="add-customer" value="<?php echo display('save_changes') ?>" tabindex="13"/>
                                <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
                                <?php echo form_close()?>
                            </div>
                        </div>
  
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Update OET Invoice </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cweb_setting/web_Invoice',array('class' => 'form-vertical', 'id' => 'form3','name' => 'form3'))?>
                 
                <div class="panel-body">

                         <input name ="form_type" type="hidden" value="oet">

                         

                       <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label">Remarks/Conditions<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="4" required cols="50" name ="company_address" required id="company_address" type="text" tabindex="2"></textarea>
                            </div>
                        </div>

             


                    


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit"  id="add-customer" class="btn btn-success btn-large" name="add-customer" value="<?php echo display('save_changes') ?>" tabindex="13"/>
                                 <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
                                 <?php echo form_close()?>
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
                        <div class="panel-title">
                            <h4>Update Trucking Invoice </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cweb_setting/web_Invoice',array('class' => 'form-vertical', 'id' => 'form4','name' => 'form4'))?>
                        <div class="panel-body">

                         <input name ="form_type" type="hidden" value="truck">

                         

                       

                        

                         <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label">Remarks/Conditions<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" required rows="4" cols="50" name ="company_address" id="company_address" type="text" tabindex="2"></textarea>
                            </div>
                        </div>


                    


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit"  id="add-customer" class="btn btn-success btn-large" name="add-customer" value="<?php echo display('save_changes') ?>" tabindex="13"/>
                                 <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
                                 <?php echo form_close()?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </section>
</div>
<!-- Add new customer end -->



