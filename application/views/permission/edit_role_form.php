<!-- Add new role start -->

<style type="text/css">
    .alert-success
    {
        background-color: #dff0d8;
        color: #000;
        display: none;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo $title ?></h1>
            <small><?php echo $title ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('permission') ?></a></li>
                <li class="active"><?php echo $title ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Alert Message -->
       
         <div class="alert alert-success" >
  <strong>Success!</strong>Roles Updated Successfully
</div>



        <!-- New customer -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo $title ?></h4>
                        </div>
                    </div>
                     <form action="<?php echo base_url('Permission/update_roles'); ?>"  method="post">
                        <input type="hidden" name="rid" value="<?php echo $role[0]['role_id']; ?>">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                    <div class="panel-body">
                         <div class="form-group row">
                            <label for="type" class="col-sm-3 col-form-label"><?php echo display('role_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" tabindex="2" class="form-control" name="rolename" id="type" value="<?php echo $name[0]['type']; ?>" required />
                            </div>
                        </div>
                        <table class="table table-striped">
             <?php

            $m=1;
            $i=0;
            foreach($accounts as $key=>$value) {
           
                ?>
                
                    
                    <tr>                     <td><?php echo display($value['name']);?></td>
                        <td><input type="checkbox" name="create[<?php  echo $value['id']; ?>]" <?php if($role[$i]['create']==1){ echo 'checked';} ?>>Create</td> 
                       <td><input type="checkbox" name="read[<?php  echo $value['id']; ?>]"  <?php if($role[$i]['read']==1){ echo 'checked';} ?> >Read </td>
                      
                      <td><input type="checkbox" name="update[<?php  echo $value['id']; ?>]" <?php if($role[$i]['update']==1){ echo 'checked';} ?> >Update</td> 
                      <td><input type="checkbox" name="delete[<?php  echo $value['id']; ?>]"  <?php if($role[$i]['delete']==1){ echo 'checked';} ?>>Delete</td> 
                   </tr>
                        
                   
              
                    
                    <?php $sl = 0 ?>
                
           
                <?php $m++;  $i++;} ?>
                </table>
                <div class="form-group text-right">
                <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id'];?>">  
                <button type="submit" class="btn btn-warning w-md m-b-5"><?php echo display('update') ?></button>
            </div>
    </form>
                    </div>
                   
                </div>
            </div>
        </div>

    </section>
</div>
<!-- Add new role end -->

<script type="text/javascript">

    
</script>
