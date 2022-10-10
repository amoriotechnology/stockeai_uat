 
<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Expense</h1>

            <small>Add Expense Item</small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('hrm') ?></a></li>

                <li class="active">Add Expense Item</li>

            </ol>

        </div>

    </section>



 <section class="content emply_form">

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


        <!-- New Employee Type -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                        <div class="panel-title">

                            <h4>Expense Item</h4>

                        </div>

                    </div>

                  

                    <div class="panel-body">



                         <?php echo form_open_multipart('Chrm/create_employee','id="validate"') ?>

                    <div class="form-group row">

                        <label for="first_name" class="col-sm-2 col-form-div">Expenses Name <i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                            <input name="first_name" class="form-control" type="text" placeholder="Expenses Name" required id="first_name">

                        </div>

                         <label for="last_name" class="col-sm-2 col-form-div">Date<i class="text-danger">*</i></label>

                        <div class="col-sm-4">
                    <input class="datepicker form-control" type="text" size="50" name="invoice_date" id="date" required value="" tabindex="4" />
                        </div>

                    </div>

                    <div class="form-group row">

                        <label for="designation" class="col-sm-2 col-form-div">Amount <i class="text-danger">*</i></label>

                        <div class="col-sm-4">
                <input name="amount" class="form-control" type="text" placeholder="$" required id="amount">
                  
                        </div>

                         <label for="phone" class="col-sm-2 col-form-div">Total Amount<i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                            <input name="total_amount" class="form-control" type="text" placeholder="total_amount" id="phone" required>

                        </div>

                    </div>

                    <div class="form-group row">

                         <label for="last_name" class="col-sm-2 col-form-div">Expected Payment Date<i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                           <input class="datepicker form-control" type="text" size="50" name="invoice_date" id="date" required value="" tabindex="4" />
                        </div>


                       
                    <label for="address_line_1" class="col-sm-2 col-form-div">Description</label>

                        <div class="col-sm-4">

                           <textarea name="address_line_1" class="form-control" placeholder="<?php echo display('address_line_1') ?>" id="address_line_1"></textarea> 

                        </div>
                         

                    </div>


                    <div class="form-group row">

                         <label for="picture" class="col-sm-2 col-form-div">Attachments</label>

                        <div class="col-sm-4">

                            <input type="file" name="w4from" class="form-control"  placeholder="<?php echo display('picture') ?>" id="w4from">

                        </div>
                      

                      

                         

                    </div>

                    



                    <div class="form-group text-right">

                        <button type="submit" class="btn btn-success w-md m-b-5">Send</button>

                    </div>

                <?php echo form_close() ?>

                    </div>

                

                </div>

            </div>

        </div>

    </section>

</div>