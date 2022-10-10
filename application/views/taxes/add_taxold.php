<!-- Add new tax start -->

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo display('add_tax') ?></h1>

            <small><?php echo display('add_new_tax') ?></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('accounts') ?></a></li>

                <li class="active"><?php echo display('add_tax') ?></li>

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

                <div class="column">

 <?php if($this->permission1->method('manage_tax','read')->access()){ ?>

                  <a href="<?php echo base_url('Caccounts/tax_list')?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('manage_tax')?> </a>

              <?php }?>



                </div>

            </div>

        </div>



        <!-- new tax -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                        <div class="panel-title">

                            <h4><?php echo display('add_tax') ?> </h4>

                        </div>

                    </div>

                   <?php echo form_open_multipart('Caccounts/tax_entry',array('class' => 'form-vertical','id' => 'tax_entry' ))?>

                    <div class="panel-body">

                        <p>Create a name for your tax rate, and give us a few details about how you want to apply it.</p>

                    	<div class="form-group row">

                            <label for="enter_tax" class="col-sm-3 col-form-label"><?php echo display('enter_tax') ?> <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="enter_tax" id="enter_tax" required="" placeholder="<?php echo display('enter_tax') ?>" />

                            </div>

                            <div class="col-sm-2">

                                <i class="text-success">%</i>

                            </div>

                        </div>




                        <div class="form-group row">

                            <label for="enter_tax" class="col-sm-3 col-form-label">Description <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <textarea class="form-control" name="enter_tax" id="enter_tax" required=""> </textarea>

                            </div>

                         

                        </div>


                         <div class="form-group row">

                            <label for="enter_tax" class="col-sm-3 col-form-label">Tax Agency <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                 <select name="tax_agency" class="form-control">
                                    <option value="">GST</option>
                                    <option value="Afganistan" rel="">VAT</option>
                                    <option value="Albania" rel="" selected="">Service Tax</option>
                                    <option value="Algeria" rel="">Swachh Bharat Cess</option>
                                    <option value="American Samoa" rel="">Krishi Kalyan Cess</option>
                                    <option value="American Samoa" rel="">CST</option>
                                </select>

                            </div>

                         

                        </div>




                        <div class="form-group row">

                            

                            <div class="col-sm-6">

                               <div class="col-sm-1">
                                <input type="checkbox" name="is_show" id="sales_tax" class="form-control" value="1">
                            </div>

                            <label for="isshow" class="col-sm-1 col-form-label">Sales</label>

                            </div>

                        </div>




                        <div class="form-group row">

                        
                            <div class="col-sm-6">
                            <label for="isshow" class="col-sm-2 col-form-label">Sales Rate</label>
                               <div class="col-sm-4">
                                <input type="text" name="" id="" placeholder="%" class="form-control">
                            </div>
                            </div>

                        </div>

                         <div class="form-group row">

                        
                            <div class="col-sm-6">
                            <label for="isshow" class="col-sm-2 col-form-label">Account</label>
                               <div class="col-sm-4">
                                <select class="form-control">
                                    <option>Liability</option>
                                     <option>Expense</option>
                                </select>
                            </div>
                            </div>

                        </div>


                        <div class="form-group row">

                        
                            <div class="col-sm-6">
                            <label for="isshow" class="col-sm-2 col-form-label">Show Tax On Return Line</label>
                               <div class="col-sm-4">
                                <select class="form-control">
                                    <option>Output-Service Tax</option>
                                     <option>Output-Education Tax</option>
                                      <option>Output-Higher Education Tax</option>
                                </select>
                            </div>
                            </div>

                        </div>






                         <div class="form-group row">

                         <div class="col-sm-6">

                               <div class="col-sm-1">
                                <input type="checkbox" name="is_show" id="purchase_tax" class="form-control" value="1">
                            </div>

                            <label for="isshow" class="col-sm-1 col-form-label">Purchases</label>

                            </div>

                              </div>





                        <div class="form-group row">

                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>

                            <div class="col-sm-6">

                                <input type="submit" id="add-deposit" class="btn btn-success" name="add-deposit" value="<?php echo display('save') ?>" />

                            </div>

                        </div>

                    </div>

                    <?php echo form_close()?>

                </div>

            </div>

        </div>

    </section>

</div>

<!-- Add new tax end -->


<script type="text/javascript">
    $('#sales_tax').click(function() {
    $("#Age").toggle(this.checked);
});
</script>



