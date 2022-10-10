<!-- Add User start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Add Admin</h1>
            <small>Add New Admin User</small>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="pe-7s-home"></i> <?php echo display('home') ?>dsds</a></li>
                <li><a href="#"><?php echo display('web_settings') ?></a></li>
                <li class="active">Add Admin</li>
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
                <?php if($this->permission1->method('manage_user','read')->access()){?>
                  <a href="<?php echo base_url('User/manage_user')?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>Manage Admin</a>
                <?php }?>
            </div>
        </div>


        <div class='row'> 
                    
        </div>
        <!-- New user -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
              
                    <hr>

                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Admin Info</h4>
                        </div>
                    </div>
                    
                    <div class="panel-body">
                    <form action='../User/company_insert' method='post' enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">CompanyName<i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="company_name" id="company_name" placeholder="Enter your Companyname" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">CompanyEmail<i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="email" id="email" placeholder="Enter your Companyemail" />
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mobile<i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="mobile" id="mobile" placeholder="Enter your mobile" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address<i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="address" id="address" placeholder="Enter your address" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Website<i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="website" id="website" placeholder="Enter your website" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Logo<i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="file" tabindex="1" class="form-control" name="logo" id="logo" />
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username<i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="username" id="username" placeholder="Enter your username" />
                            </div>
                        </div>



                         <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label"><?php echo display('password') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="password" tabindex="4" ramji="" class="form-control" id="password" name="password" placeholder="<?php echo display('password') ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-3 col-form-label">Email<i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="email" tabindex="1" class="form-control" name="user_email" id="user_email" placeholder="Enter your useremail" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_type" class="col-sm-3 col-form-label"><?php echo display('user_type') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select class="form-control" name="user_type" id="user_type" tabindex="6" ramji="">
								    <option value="0"><?php echo display('select_one') ?></option>
								    <option value="1"><?php echo display('admin') ?></option>
								    <option value="2"><?php echo display('user') ?></option>
								  </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
                                <input type="submit" id="add-customer" class="btn btn-primary btn-large" name="add-user" value="<?php echo display('save') ?>" tabindex="6"/>
              
								
                            </div>
                        </div>
                        </form>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Edit user end -->



