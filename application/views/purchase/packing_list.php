
<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	        <i class="pe-7s-note2"></i>
	    </div>
	    <div class="header-title">
	        <h1>Packing List</h1>
	        <small><?php echo display('manage_your_purchase') ?></small>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#"><?php echo display('purchase') ?></a></li>
	            <li class="active"><?php echo display('manage_purchase') ?></li>
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
	            
			
		        <div class="panel panel-default">
		            <div class="panel-body"> 
		            	<div class="row">
		            	

		            	<div class="col-sm-2">
		            	 <?php 
                    if($_SESSION['purchase']['create']==1)
                    {

                        ?>

                    <a href="<?php echo base_url('Cpurchase/add_packing_list') ?>" class="btn btn-info m-b-5 m-r-2">Create Packing List</a>
                 
		            	</div>
		            <?php  } ?>
		             <?php 
                    if($_SESSION['purchase']['create']==1)
                    {

                        ?>
		            	<div class="col-sm-7">
>
		             
		             		<?php echo form_open('','class="form-inline"')?>

		            
		                    <div class="form-group">
		                        <label class="" for="from_date"><?php echo display('from') ?></label>
		                        <input type="text" name="from_date" class="form-control datepicker" id="from_date" value="" placeholder="<?php echo display('start_date') ?>" >
		                    </div> 

		                    <div class="form-group">
		                        <label class="" for="to_date"><?php echo display('to') ?></label>
		                        <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="">
		                    </div>  

		                    <button type="button" id="btn-filter" class="btn btn-success"><?php echo display('find') ?></button>
		                  
		             <?php echo form_close()?>
		            </div>
		          <?php } ?>
		      
		        </div>
		    </div>
		    
		   
		    </div>


 <?php 
                    if($_SESSION['purchase']['create']==1)
                    {

                        ?>

		<!-- Manage Purchase report -->
		<div class="row">
		    <div class="col-sm-12" <?php if($_SESSION['purchase']['read']==1) {echo  "display:block"; } else{echo  "display:none";} ?>
>
		        <div class="panel panel-bd lobidrag">
		            <div class="panel-heading" style="display: none;">
		                <div class="panel-title">
		                  
		                </div>
		              
		            </div>
		          
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="PackingOrderList"> 
								<thead>
									<tr>
										<th><?php echo display('sl') ?></th>
										<th>Invoice No</th>
										<th>Expense Packing ID</th>
										<th>Gross Weight</th>
										<th>Container No.</th>
										<th>Invoice Date</th>
										<th>Thickness</th>
										<th><?php echo display('action') ?></th>
									</tr>
								</thead>
								<tbody>


								

						
								</tbody>
								<tfoot>
                    <th colspan="5" class="text-right"><?php echo display('total') ?>:</th>
                
                  <th></th>  
                  <th></th> 
                 </tfoot>
		                    </table>
		                </div>
		               
		            </div>
		        
		        </div>
		    </div>
		      <input type="hidden" id="total_purchase_no" value="<?php echo $total_purhcase;?>" name="">
		      <input type="hidden" id="currency" value="{currency}" name="">
		</div>
	<?php } ?>
	</section>
</div>
<!-- Manage Purchase End -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>my-assets/js/admin_js/packing.js" type="text/javascript"></script>


<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">



<script type="text/javascript">
$(function() {
 
  $('table th').resizable({
    handles: 'e',
    stop: function(e, ui) {
      $(this).width(ui.size.width);
    }
  });

});

</script>