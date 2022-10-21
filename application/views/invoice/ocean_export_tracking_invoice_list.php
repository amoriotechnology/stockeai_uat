<script src="<?php echo base_url()?>my-assets/js/admin_js/oceanImport.js" type="text/javascript"></script>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Ocean Export Invoice</h1>
            <small><?php echo display('manage_your_purchase') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Ocean Export</a></li>
                <li class="active">Ocean Export Invoice</li>
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
                        <div class="col-sm-3">
                       
                          <?php 
                    if($_SESSION['sales']['create']==1)
                    {

                        ?>
     
                    <a href="<?php echo base_url('Cinvoice/ocean_export_tracking') ?>" class="btn btn-info m-b-5 m-r-2">Create Ocean Import Invoice</a>
                <?php } ?>
                      
                        </div>
                        <div class="col-sm-7" style='<?php if($_SESSION['sales']['read']==1) {echo  "display:block"; } else{echo  "display:none";} ?>'
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
                   
                </div>
            </div>
            
           
            </div>




        <!-- Manage Purchase report -->
        <div class="row">
            <div class="col-sm-12" style='<?php if($_SESSION['sales']['read']==1) {echo  "display:block"; } else{echo  "display:none";} ?>'
>
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                          
                        </div>
                      
                    </div>
                  

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="oceanExport"> 
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl') ?></th>
                                        <th>Booking Number</th>
                                        <th>Container Number</th>
                                        <th>Seal Number</th>
                                        <th>Ocean Export Id</th>
                                        <th><?php echo display('supplier_name') ?></th>
                                        <th><?php echo display('purchase_date') ?></th>
                                        <th>Place Of Delivery</th>
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
    </section>
</div>
<!-- Manage Purchase End -->
<!-- <script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script> -->


<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">



<script type="text/javascript">



    $(document).ready(function() { 
     
          "use strict";
     var csrf_test_name = $('[name="csrf_test_name"]').val();
     var total_purchase_no = $("#total_purchase_no").val();
     var base_url = $("#base_url").val();
       var currency = $("#currency").val();
 var purchasedatatable = $('#oceanExport').DataTable({ 
             responsive: true,

             "aaSorting": [[4, "desc" ]],
             "columnDefs": [
                { "bSortable": false, "aTargets": [0,1,2,3,5,6] },

            ],
           'processing': true,
           'serverSide': true,

          
           'lengthMenu':[[10, 25, 50,100,250,500, total_purchase_no], [10, 25, 50,100,250,500, "All"]],

             dom:"'<'col-sm-4'l><'col-sm-4 text-center'><'col-sm-4'>Bfrtip", buttons:[ {
                extend: "copy",exportOptions: {
                       columns: [ 0,1,2,3,4,5 ] //Your Colume value those you want
                           }, className: "btn-sm prints"
            }
            , {
                extend: "csv", title: "PurchaseLIst",exportOptions: {
                       columns: [ 0,1,2,3,4,5] //Your Colume value those you want print
                           }, className: "btn-sm prints",charset: 'UTF-16LE'
            }
            , {
                extend: "excel",exportOptions: {
                       columns: [0,1,2,3,4,5 ] //Your Colume value those you want print
                           }, title: "PurchaseLIst", className: "btn-sm prints"
            }
            , {
                extend: "pdf",exportOptions: {
                       columns: [0,1,2,3,4,5] //Your Colume value those you want print
                           }, title: "PurchaseLIst", className: "btn-sm prints"
            }
            , {
                extend: "print",exportOptions: {
                       columns: [ 0,1,2,3,4,5] //Your Colume value those you want print
                           },title: "<center> PurchaseLIst</center>", className: "btn-sm prints"
            }
            ],

            
            'serverMethod': 'post',
            'ajax': {
               'url':base_url + 'Cinvoice/CheckOceanExportList',
                 "data": function ( data) {
         data.fromdate = $('#from_date').val();
         data.todate = $('#to_date').val();
         data.csrf_test_name = csrf_test_name;
        
}
            },
          'columns': [
             { data: 'sl' },
             { data: 'booking_no'},
             { data: 'container_no'},
             { data: 'seal_no'},
             {data : 'ocean_import_tracking_id'},
             { data: 'supplier_name'},
             { data: 'invoice_date'},
             { data: 'place_of_delivery'},
             { data: 'button'},
          ],

  "footerCallback": function(row, data, start, end, display) {
  var api = this.api();
   api.columns('.total_sale', {
    page: 'current'
  }).every(function() {
    var sum = this
      .data()
      .reduce(function(a, b) {
        var x = parseFloat(a) || 0;
        var y = parseFloat(b) || 0;
        return x + y;
      }, 0);
    $(this.footer()).html(currency+' '+sum.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}));
  });
}


    });


$('#btn-filter').click(function(){ 
purchasedatatable.ajax.reload();  
});

});


</script>