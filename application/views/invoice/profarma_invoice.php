    <!-- Product Purchase js -->
<?php    ?>

<script src="<?php echo base_url() ?>my-assets/js/admin_js/proforma.js" type="text/javascript"></script>

<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Proforma Invoice</h1>
            <small>Generate New Proforma Invoice 2</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Proforma</a></li>
                <li class="active">Proforma Invoice</li>
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
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
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

        <!-- Purchase report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Create New Proforma Invoice</h4>
                        </div>
                    </div>

                    <div class="panel-body">
                    <form action="" id='formper'>
                        

                        <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Exporter
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                               <textarea rows="4" cols="50" name="billing_address" class=" form-control" placeholder='Add Exporter Detail' id="billing_address"> </textarea>
                                    </div>
                                
                                </div> 
                            </div>

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="purchase_date" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('invoice_no') ?>
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" id="chalan_no" name="chalan_no" value="<?php if(!empty($voucher_no[0]['voucher'])){
                                $curYear = date('Y'); 
                                $month = date('m');
                               $vn = substr($voucher_no[0]['voucher'],9)+1;
                               echo $voucher_n = 'PI'. $curYear.$month.'-'.$vn;
                             }else{
                                    $curYear = date('Y'); 
                                $month = date('m');
                               echo $voucher_n = 'PI'. $curYear.$month.'-'.'1';
                             } ?>"  readonly/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Customer
                                    </label>
                                    <div class="col-sm-8">
                                        <select name="customer_id" id="customer_id" class="form-control">
                                            <?php foreach($customer as $customer){ ?>
                                                <option value="<?=$customer['customer_id']; ?>"><?=$customer['customer_name']; ?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="etd" class="col-sm-4 col-form-label">Pre Carriage By
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="pre_carriage" id="pre_carriage" placeholder="Pre Carriage By" id="etd" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="eta" class="col-sm-4 col-form-label">Place of Receipt
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="eta" name="receipt" placeholder="Place of Receipt" rows="1"></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>




                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="shipping_line" class="col-sm-4 col-form-label">Country of origin of goods
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="country_goods" placeholder="Country of origin of goods" id="shipping_line" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Country of final destination
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="container_no" name="country_destination" placeholder="Country of final destination" rows="1"></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>


                          <div class="row">


                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Port of loading
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="loading" placeholder="Port of loading" id="bl_number" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Port of discharge
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="discharge" placeholder="Port of discharge" id="bd_number" />
                                    </div>
                                </div>
                            </div>

                           
                        </div>



                        <div class="row">


                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Terms of payment and delivery
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="terms_payment" placeholder="Terms of payment and delivery" id="delivery" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Description of goods
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">

                                    <input type="text" name="" name="description_goods" class=" form-control" placeholder='Polished Granite slabs' id="goods"> 

                                    </div>
                                </div>
                            </div>

                           
                        </div>




<br>
                        <div class="table-responsive">
                            <form id="pdt">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                     <tr>
                                            <th class="text-center" width="20%">Product name<i class="text-danger">*</i></th> 
                                            <th class="text-center">In stock</th>
                                            <th class="text-center">Quantity / Sq ft.<i class="text-danger">*</i></th>
                                            <th class="text-center">Amount<i class="text-danger">*</i></th>

                                            <th class="text-center"><?php echo display('total') ?></th>
                                            <th class="text-center"><?php echo display('action') ?></th>
                                        </tr>
                                </thead>
                                <tbody id="addPurchaseItem">
                                    <tr>
                                        <td class="span3 supplier">
                                           <input type="text" name="product_name[]" required class="form-control product_name productSelection" onkeypress="invoice_productList(1)" placeholder="<?php echo display('product_name') ?>" id="product_name_1" tabindex="5" >

                                            <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id[]" id="SchoolHiddenId"/>

                                            <input type="hidden" class="sl" value="1">
                                        </td>

                                       <td class="wt">
                                                <input type="text" id="available_quantity[]" name="available_quantity[]" class="form-control text-right available_quantity_1" placeholder="0.00" readonly/>
                                            </td>
                                        
                                            <td class="text-right">
                                                <input type="text" name="product_quantity[]" id="cartoon_1" required="" min="0" class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="0.00" value=""  tabindex="6"/>
                                            </td>
                                            <td class="test">
                                                <input type="text" name="product_rate[]" required="" onkeyup="calculate_store(1);" onchange="calculate_store(1);" id="product_rate_1" class="form-control product_rate_1 text-right" placeholder="0.00" value="" min="0" tabindex="7"/>
                                            </td>
                                           

                                            <td class="text-right">
                                                <input class="form-control total_price text-right" type="text" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly" />
                                            </td>
                                            <td>

                                               

                                                <button  class="btn btn-danger text-right red" type="button" value="<?php echo display('delete')?>" onclick="deleteRow(this)" tabindex="8"><i class="fa fa-close"></i></button>
                                            </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        
                                        <td class="text-right" colspan="4"><b><?php echo display('total') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="Total" class="text-right form-control" name="total" value="0.00" readonly="readonly" />
                                        </td>
                                        <td> <button type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addInputField('addPurchaseItem');"  tabindex="9"><i class="fa fa-plus"></i></button>

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                    </tr>
           

                                       
                                        
                                    

                                  
                                     

                                   
                                </tfoot>
                            </table>
                                            </form>
                        </div>
<div class="form-group row">

                                    <label for="billing_address" class="col-sm-4 col-form-label">Account Details/Additional Information</label>

                                    <div class="col-sm-8">

                                        <textarea rows="4" cols="50" id="details" name="ac_details" class=" form-controlqq" placeholder='Account Details/Additional Information' id="" >dsdddddd</textarea>
                                                <br>
                                                
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="remark" class="col-sm-4 col-form-label">Remarks/Conditions</label>

                                    <div class="col-sm-8">

                                        <textarea rows="4" cols="50" id="remarks" name="remarks" class=" form-control" placeholder='Remarks/Conditions' id="" value="<?php echo $remarks; ?>"> </textarea>

                                    </div>

                                </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                
                               <table>
                                <tr>
                                    <td>
                                        <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
    
                                        <input type="button" id="add_purchase" class="btn btn-primary btn-large"  onclick="  $('#btn1_download').css('display','block');
       $('#btn1_email').css('display','block');"name="add-purchase" value="<?php echo display('Save') ?>" /></td>
                                    <td>&nbsp;</td>
                                    <td id="btn1_download">
                                        
                                        <a href="" id="down" class="btn btn-primary">
                                            Donwload 
                                        </a>

                                    </td>
                                    <td>&nbsp;</td>
                                    <td id="btn1_email">
                                        <a href="" id="send" class="btn btn-primary">
                                    Sendmail with attachment
                                        </a></td>
                                  
                                  
                                    
                                </tr>
                               </table>
                            </div>
                        </div>


                                
                                            </form>
                    </div>
                </div>

            </div>
        </div>
    </section>


<style>
 #btn1_download{
display:none;
 }
     #btn1_email{
        display:none;
     }
    </style>

    <script>
  
 $(function () {
  
       

          $.ajax({
            type: 'GET',
            url: '../assets/Fetch_Data_from_db.php',
            data: $('#form3').serialize(),
            success: function (response) {
                      var fields = response.split('/');

var invoice_template = fields[0];
var account = fields[1];
var remarks = fields[2];
$("textarea#details").val(account);
$("textarea#remarks").val(remarks);
        ////     alert(response);
            }
          });

        
        

      });

function ajaxcall(){
      


}

</script>
</div>
<!-- Purchase Report End -->

<input type="text" id="hdn" name="hdn"/>

<div id="result" style="display:none;"></div>


<script>
var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';



    //create data object here so we can dynamically set new csrfName/Hash
    $('#add_purchase').click(function(id){
      
        
        var aval = $('#available_quantity').val();
        var formdata = $('#pdt').serialize();
    var data = {
      
        billing_address:$('#billing_address').val(),
        chalan_no:$('#chalan_no').val(),
        date:$('#date').val(),
        pre_carriage:$('#pre_carriage').val(),
        eta:$('#eta').val(),
        shipping_line:$('#shipping_line').val(),
        container_no:$('#container_no').val(),
        bl_number:$('#bl_number').val(),
        bd_number:$('#bd_number').val(),
        delivery:$('#delivery').val(),
        goods:$('#goods').val(),
        details:$('#details').val(),
        customer_id:$('#customer_id').val(),
      

    };

    data[csrfName] = csrfHash;
   
    $.ajax({
        type:'POST',
        data: data, 
        //dataType tells jQuery to expect JSON response
        dataType:"text",
        url:'<?php echo base_url();?>Cinvoice/performer_ins',
        success: function(result, statut) {
            if(result.csrfName){
               //assign the new csrfName/Hash
               csrfName = result.csrfName;
               csrfHash = result.csrfHash;
            }
           // var parsedData = JSON.parse(result);
          //  alert(result[0].p_quantity);
       //   $(".available_quantity_"+ id).val(result[0]['p_quantity']);
        //  $("#product_rate_"+ id).val(result[0]['price']);
          //  $('#available_quantity_'+ id).html(result[0].p_quantity);
            console.log(result);
        }
    });

});

   

      /*  $('#down').click(function(e){
    e.preventDefault();    
    var data=$('#hdn').val() ;
    

        $.ajax({url: "../assets/Invoice_PDF.php?"+data, success: function(result){
         //   window.location.href = '../assets/Invoice_PDF.php'; 
  }});



     });   

       $('#send').click(function(e){
    e.preventDefault();    

$.ajax({
            type: 'GET',
            url: '../assets/Download_Send_Mail.php',
       
            success: function (response) {
           
              //  console.log(response);
              window.location.href = '../assets/Download_Send_Mail.php'; 
    
            }
          });


     });  */ 
</script>

