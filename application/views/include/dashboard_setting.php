
<!-- Admin Home Start -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>

        </div>
        <div class="header-title">
            <h1><?php echo display('dashboard').' Setting'; ?></h1>
            <small><?php echo display('home') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li class="active"><?php echo display('dashboard').' Setting'; ?></li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
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
        <!-- First Counter -->
        <div class="row">
 <!-- This today transaction progress -->
                <div class="col-sm-12 col-md-12">
                    <div class="panel panel-bd">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4 class="charttitle"><?php echo display('dashboard').' Setting'; ?></h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php echo form_open_multipart('Admin_dashboard/dashboardsetting',array('class' => 'form-vertical', 'id' => 'update_page','name' => 'update_page'))?>
                            <div class="table-responsive ">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('sl') ?></th>
                                            <th><?php echo 'Wedge Title' ?></th>
                                            <th><?php echo 'Status' ?></th>
                                            <th><?php echo display('action') ?> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $ttl_amount = $ttl_paid = $ttl_due = $ttl_discout = $ttl_receipt = 0;
                                        $todays = date('Y-m-d');
                                        if ($page_setting) {
                                            $sl = 0;
                     foreach ($page_setting as $single) {
                     
                                //print_r($single);
                                                $sl++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td>
                                                        <?php $st=str_replace('_', ' ', $single['slug']); echo strtoupper($st); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $single['status']; ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <!-- <select class="form-control"  name="page_status" tabindex="3">
                                                        <option datatitle="<?php echo $single['slug']; ?>" value="elable">Active</option>
                                                        <option datatitle="<?php echo $single['slug']; ?>" value="disable">Dactive</option>
                                            
                                                        </select> -->
                                                        <input class="form-control" type="checkbox" <?php if($single['status']=='enable'){ echo 'checked'; } ?> name="page_status[<?php echo $single['slug']; ?>]" >
                                                    </td>                      
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <th class="text-center" colspan="5"><?php echo display('not_found'); ?></th>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        
                                        <tr>
                                           <td><?php echo display('sl') ?></td>
                                            <td><?php echo 'Wedge Title' ?></td>
                                            <td><?php echo 'Status' ?></td>
                                            <td><input type="submit" class="btn btn-primary" name="save" value="Save Action"></td>
                                           
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                             <?php echo form_close()?>
                        </div>

                        
                    </div>
                
                </div>
        </div>
        <hr>
        
<!--<input type="hidden" value='<?php// @$seperatedData = explode(',', $chart_data); echo html_escape(($seperatedData[0] + 10));?>' name="" id="bestsalemax">  -->   
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<!-- Admin Home end -->

<!-- ChartJs JavaScript -->

<script src="<?php echo base_url() ?>assets/js/Chart.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/canvasjs.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/dashboard.js" type="text/javascript"></script>




