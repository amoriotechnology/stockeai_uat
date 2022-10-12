 <!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Admin Login Area</title>
       


        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="https://softest8.bdtask.com/saleserp_sas_v-2/my-assets/image/logo/0bb2ee8377d8672d55b553ef11f07d69.png" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url('assets/dist/img/ico/apple-touch-icon-57-precomposed.png') ?>">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url('assets/dist/img/ico/apple-touch-icon-72-precomposed.png') ?>">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url('assets/dist/img/ico/apple-touch-icon-114-precomposed.png') ?>">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url('assets/dist/img/ico/apple-touch-icon-144-precomposed.png') ?>">
        <!-- Start Global Mandatory Style-->
        href="<?php echo base_url('assets/js/    .css') ?>"
       <!-- jquery ui css -->
        <link  href="<?php echo base_url('assets/css/jquery-ui.min.css/jquery-ui.min.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap --> 
        <link  href="<?php echo base_url('assets/css/jquery-ui.min.css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
                <!-- Font Awesome 4.7.0 -->
        <link  href="<?php echo base_url('assets/css/jquery-ui.min.css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css"/>
  
        <!-- sliderAccess css -->
        <link  href="<?php echo base_url('assets/css/jquery-ui.min.css/jquery-ui-timepicker-addon.min.css') ?>" rel="stylesheet" type="text/css"/> 
        <link  href="<?php echo base_url('assets/css/jquery-ui.min.css/wickedpicker.min.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- slider  -->
        <link  href="<?php echo base_url('assets/css/jquery-ui.min.css/select2.min.css') ?>" rel="stylesheet" type="text/css"/> 
        <!-- DataTables CSS -->
       
        <link href="<?php echo base_url('assets/datatables/dataTables.min.css') ?>" rel="stylesheet" type="text/css"/> 
          <!-- pe-icon-7-stroke -->
        <link  href="<?php echo base_url('assets/css/jquery-ui.min.css/pe-icon-7-stroke.css') ?>" rel="stylesheet" type="text/css"/> 
        <!-- themify icon css -->
        <link  href="<?php echo base_url('assets/css/jquery-ui.min.css/themify-icons.css') ?>" rel="stylesheet" type="text/css"/> 
        <!-- Pace css -->
        <link href="<?php echo base_url('assets/plugins/toastr/toastr.css') ?>" rel=stylesheet type="text/css"/>
   
        <link  href="<?php echo base_url('assets/css/jquery-ui.min.css/bootstrap-toggle.min.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- Theme style -->
        <link  href="<?php echo base_url('assets/css/jquery-ui.min.css/custom.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link  href="<?php echo base_url('assets/css/jquery-ui.min.css/style.css') ?>" rel="stylesheet" type="text/css"/>
        
        <link   href="<?php echo base_url('assets/js/sweetalert/sweetalert.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- summernote css -->
        
                <!-- jQuery -->
              
       <script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js?v=3.4.1') ?>" type="text/javascript"></script>
       <script src="<?php echo base_url('assets/js/wickedpicker.min.js') ?>" ></script>
        <script src="<?php echo base_url('assets/js/jquery.validate.min.js') ?>" type="text/javascript"></script>
    </head>
    <body class="hold-transition sidebar-mini">
                <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <div class="se-pre-con"></div>

        <!-- Site wrapper -->
        <div class="wrapper">
<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- Admin login area start-->
<div class="container-center">
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
    $CI = & get_instance();
    $CI->load->model('Web_settings');
    $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
    ?>
    <div class="panel panel-bd">
        <div class="panel-heading">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe-7s-unlock"></i>
                </div>
                <div class="header-title">
                    <h3>otp verification</h3>
                    <small><strong><?php echo  'please enter otp information'; ?></strong></small>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <?php echo form_open('Admin_dashboard/do_login', array('id' => 'login',)) ?>
            <div class="form-group">
                <input type="hidden" placeholder="<?php echo display('email') ?>" title="<?php echo display('email') ?>" required="" value="" name="username" id="usernamee" class="form-control">
            </div>
            <div class="form-group">
                <input type="text"   required  name="otp" placeholder="Enter otp " class="form-control">
                
            </div>

            <?php if ($setting_detail[0]['captcha'] == 0 && $setting_detail[0]['site_key'] != null && $setting_detail[0]['secret_key'] != null) { ?>
                <div class="g-recaptcha" data-sitekey="<?php
                if (isset($setting_detail[0]['site_key'])) {
                    echo $setting_detail[0]['site_key'];
                }
                ?>">
                </div>
            <?php } ?>

            <div>
                <!-- <button class="btn btn-success"><?php// echo display('Verify otp') ?></button> -->
                <button class="btn btn-success">Verify otp</button>
            </div>
            <?php echo form_close() ?>
        </div>
    
    </div>
    <input type="hidden" id="base_url" value="<?php echo base_url()?>" name="">
</div>


<!-- Modal -->
<!-- <div class="modal fade" id="passwordrecoverymodal" tabindex="-1" role="dialog" aria-labelledby="recoverylabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="recoverylabel"><?php echo display('password_recovery')?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div id="outputPreview" class="alert hide modal-title" role="alert" >
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
      </div>
      <div class="modal-body">
           <?php echo form_open('', array('id' => 'passrecoveryform',)) ?>
                      <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label"><?php echo display('email')?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="rec_email" id="email" type="text" placeholder="<?php echo display('email') ?>"  required="">
                            </div>
                        </div>
                        
                        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" id="submit" class="btn btn-success" value="Send">
      </div>
       <?php echo form_close() ?>
    </div>
  </div>
</div> -->
 </div>
        <!-- ./wrapper -->

        <!-- Start Core Plugins-->
        <!-- jquery-ui --> 
        
          <!-- jquery-ui js -->
       
        <script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script> 
        <!-- bootstrap js -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>  
        <!-- pace js -->
        <script src="<?php echo base_url('assets/js/pace.min.js') ?>" type="text/javascript"></script>  
        <!-- SlimScroll -->
        <script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js') ?>" type="text/javascript"></script>  
        <!-- bootstrap timepicker -->
     
        <script src="<?php echo base_url('assets/js/jquery-ui-timepicker-addon.min.js') ?>" type="text/javascript"></script> 
        <!-- select2 js -->
        <script src="<?php echo base_url('assets/js/select2.min.js') ?>" type="text/javascript"></script>
    
        <?php echo base_url('assets/js/jstree.min.js') ?>     

        <!-- ChartJs JavaScript -->
        <script src="<?php echo base_url('assets/js/Chart.min.js?v=2.5') ?>" type="text/javascript"></script>

        <!-- DataTables JavaScript -->
        <script src="<?php echo base_url('assets/datatables/dataTables.min.js') ?>"></script>
        <!-- Table Head Fixer -->
        <script src="<?php echo base_url('assets/js/tableHeadFixer.js') ?>" type="text/javascript"></script> 
        <!-- Admin Script -->
        <script src="<?php echo base_url('assets/js/frame.js') ?>" type="text/javascript"></script> 
        <script src="<?php echo base_url('assets/js/bootstrap-toggle.min.js') ?>" type="text/javascript"></script> 
        <script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/sweetalert/sweetalert.min.js') ?>" type="text/javascript"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url('assets/js/custom.js') ?>" type="text/javascript"></script>
        <!-- summernote js -->

 <script src="<?php echo base_url('assets/js/jstree.min.js') ?>" ></script>

      
    </body>
</html>

