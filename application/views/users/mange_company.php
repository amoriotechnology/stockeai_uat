<!-- Add User start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>manage Company</h1>
            <small>manage Company</small>
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
                  <a href="<?php echo base_url('User/index')?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>Add Company</a>
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
                            
                        </div>
                    </div>
                    
                    <div class="panel-body">
                   <table class="table table-striped">
                    
                       <tr>
                           <th>Sno</th>
                           <th>company_name</th>
                           <th>Email</th>
                           <th>Address</th>
                           <th>Mobile</th>
                           <th>Website</th>
                           <th>Status</th>
                           <th>Change</th>      
                          
                       </tr>
               

                   <?php 
                  for($i=0;$i<count($company_info);$i++)
                  {
                    $j=$i+1;
                     ?>
                   <tr>
                    <td><?php echo $j; ?></td>
                    <td><?php echo $company_info[$i]['company_name']; ?></td>
                    <td><?php echo $company_info[$i]['email']; ?></td>
                    <td><?php echo $company_info[$i]['address']; ?></td>
                    <td><?php echo $company_info[$i]['mobile']; ?></td>
                    <td><?php echo $company_info[$i]['website']; ?></td>
                    <td>
                        <th>Status</th>
                        <th>Activate
                            Deactivate
                        </th>
                    </td>
                    

                </tr>
                       <?php } ?>
                   </table>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Edit user end -->



