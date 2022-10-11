<!-- Product Purchase js -->
<?php    ?>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<style>
    /*   Bootstrap Country Select CSS  */
 button[data-toggle="dropdown"].btn-default,
button[data-toggle="dropdown"]:hover {
background-color: white !important;
color: #2c3e50 !important;
border: 2px solid #dce4ec;
}
.bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
    width: 420px;
}
    </style>
<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Proforma Invoice</h1>
            <small>Generate New Proforma Invoice</small>
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
                            <div class="col-sm-6" style="display:none;">
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
                             } ?>"  />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Buyer / Customer
                                    </label>
                                    <div class="col-sm-8">
                                        <select name="customer_id" id="customer_id" class="form-control">
                                            <?php foreach($customer as $customer){ ?>
                                                <option value="<?=$customer['customer_id']; ?>"><?=$customer['customer_name']; ?></option>
                                           <?php } ?>
                                        </select>
                                   <!--     <input type="text" id="currency_type" value="<?php // echo   ?>"/>-->
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
                                    <select class="selectpicker countrypicker form-control" data-live-search="true" data-default="Select the Country"  name="country_goods" id="shipping_line"></select>
                                 
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Country of final destination
                                    </label>
                                    <div class="col-sm-8">
                                    <select class="selectpicker countrypicker form-control" data-live-search="true" data-default="Select the Country" id="container_no" name="country_destination" placeholder="Country of final destination"></select>
                                 
                                      
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
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td style="width:80%;border:none;text-align:right;font-weight:bold;">Tax : 
                                 </td>
                                <td>
<select name="tx" id="product_tax" class="form-control" onselect="gtotal();">
<option value="Select the Tax" selected>Select the Tax</option>

</select>
</td>
</tr>
</table>
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
                                        <select name="product_name[]" id="prodt_1" class="form-control product_name" onchange="available_quantity(1);">
                                        <option value="Select the Product" selected>Select the Product</option>
                                           
                                        </select>

                                   
                                            <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id[]" id="SchoolHiddenId"/>

                                            <input type="hidden" class="sl" value="1">
                                        </td>

                                       <td class="wt">
                                                <input type="text" id="available_quantity[]" name="available_quantity[]" class="form-control text-right available_quantity_1" placeholder="0.00" readonly/>
                                            </td>
                                        
                                            <td class="text-right">
                                                <input type="text" name="product_quantity[]" id="cartoon_1" required="" min="0" class="form-control text-right store_cal_1" onkeyup='total_amt(1);' onchange='total_amt(1);'  placeholder="0.00" value=""  tabindex="6"/>
                                            </td>
                                            <td class="test">
                                                <input type="text" name="product_rate[]" required=""   id="product_rate_1" class="form-control product_rate_1 text-right" placeholder="0.00" value="" min="0" tabindex="7"/>
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
                                       
                                    </tr>
           

                                    <tr> <td class="text-right" colspan="4"><b><?php echo "Grand Total" ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="gtotal" class="text-right form-control" name="gtotal" value="0.00" readonly="readonly" />
                                        </td>
                                        <td> <button type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addInputField('addPurchaseItem');addprod();"  tabindex="9"><i class="fa fa-plus"></i></button>

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

<input type="text" id="currency"/>
                                
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
       function currency(){

var data = {};
  data[csrfName] = csrfHash;
$.ajax({
    type:'POST',
    data: data, 
    dataType:"json",
    url:'<?php echo base_url();?>Cproduct/scrape',
    success: function(result, statut) {
        if(result.csrfName){
           csrfName = result.csrfName;
           csrfHash = result.csrfHash;
           console.log(result.product_name);
        }
        console.log(result);
       
        }

    });
}


        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
$(document).ready(function(){
    addprod();
    addtax();
    currency();
    $('#product_tax').on('change', function (e) {
    var total=$('#Total').val();
var tax=$('#product_tax').val();
//console.log(total + "///"+tax);
var field = tax.split('-');

var percent = field[1];
percent=percent.replace("%","");
//alert(percent);
    var grand=parseInt(total) * parseInt(percent);
    var final=grand + parseInt(total);
    final = isNaN(final) ? 0 : final;
    $('#gtotal').val(final);
    console.log("Gtotal  : "+final);

});
});
function addtax(){

var data = {};
  data[csrfName] = csrfHash;
$.ajax({
    type:'POST',
    data: data, 
    dataType:"json",
    url:'<?php echo base_url();?>Cproduct/get_all_tax',
    success: function(result, statut) {
        if(result.csrfName){
           csrfName = result.csrfName;
           csrfHash = result.csrfHash;
           console.log(result.product_name);
        }
        console.log(result);
        var len = result.length;
        for( var i = 0; i<len; i++){
                var tax_id = result[i]['tax_id'];
                var tax= result[i]['tax'];
                var value=tax_id+"-"+tax;
                $("#product_tax").append("<option value='"+value+"'>"+value+"</option>");

            }
        }

    });
}
function addprod(){

    var data = {
    };
      
    data[csrfName] = csrfHash;

    $.ajax({
        type:'POST',
        data: data, 
        dataType:"json",
        url:'<?php echo base_url();?>Cproduct/get_all_product1',
        success: function(result, statut) {
            if(result.csrfName){
               csrfName = result.csrfName;
               csrfHash = result.csrfHash;
               console.log(result.product_name);
            }
            var len = result.length;
            for( var i = 0; i<len; i++){
                    var product_name = result[i]['product_name'];
                    var product_model = result[i]['product_model'];
                    
                 var value=product_name+"-"+product_model;
                    $(".product_name").append("<option value='"+value+"'>"+value+"</option>");

                }
            }
 
        });
    }



  /*
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
*/
</script>
</div>
<!-- Purchase Report End -->

<input type="text" id="hdn" name="hdn"/>

<div id="result" style="display:none;"></div>


<script>
var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

function available_quantity (id) {
    //create data object here so we can dynamically set new csrfName/Hash
    $('.product_name').on('change', function (e) {
        var name = 'available_quantity_'+ id;
   
   var amount = 'product_rate_'+ id;
   var pdt=$('#prodt_'+id).val();
   const myArray = pdt.split("-");
   var product_nam=myArray[0];
   var product_model=myArray[1];
  // alert(pdt);
    var data = {
       amount:'product_rate_'+ id,
       name:'available_quantity_'+ id,
       product_nam:product_nam,
       product_model:product_model
    };
    data[csrfName] = csrfHash;

    $.ajax({
        type:'POST',
        data: data, 
        //dataType tells jQuery to expect JSON response
        dataType:"json",
        url:'<?php echo base_url();?>Cinvoice/availability',
        success: function(result, statut) {
            if(result.csrfName){
               //assign the new csrfName/Hash
               csrfName = result.csrfName;
               csrfHash = result.csrfHash;
            }
           // var parsedData = JSON.parse(result);
          //  alert(result[0].p_quantity);
          $(".available_quantity_"+ id).val(result[0]['p_quantity']);
          $("#product_rate_"+ id).val(result[0]['price']);
          //  $('#available_quantity_'+ id).html(result[0].p_quantity);
            console.log(result);
        }
    });
});
}

    //create data object here so we can dynamically set new csrfName/Hash
    $('#add_purchase').click(function(id){
      
        
        var aval = $('#available_quantity').val();
        var formdata = $('#pdt').serialize();
    var data = {
        formdata:$('#pdt').serialize();
     
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
        customer_id:$('#customer_id').val()
      

    };
    data[formdata] = $('#pdt').serialize();
    data[csrfName] = csrfHash;
   
    $.ajax({
        type:'POST',
        data: data, 
        //dataType tells jQuery to expect JSON response
        dataType:"json",
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
function addInputField(t) {
    //debugger;
    var row = $("#normalinvoice tbody tr").length;
    var count = row + 1;
      var  tab1 = 0;
      var  tab2 = 0;
      var  tab3 = 0;
      var  tab4 = 0;
      var  tab5 = 0;
      var  tab6 = 0;
      var  tab7 = 0;
      var  tab8 = 0;
      var  tab9 = 0;
      var  tab10 = 0;
      var  tab11 = 0;
      var  tab12 = 0;
    var limits = 500;
     var taxnumber = $("#txfieldnum").val();
    var tbfild ='';
    for(var i=0;i<taxnumber;i++){
        var taxincrefield = '<input id="total_tax'+i+'_'+count+'" class="total_tax'+i+'_'+count+'" type="hidden"><input id="all_tax'+i+'_'+count+'" class="total_tax'+i+'" type="hidden" name="tax[]">';
         tbfild +=taxincrefield;
    }
    if (count == limits)
        alert("You have reached the limit of adding " + count + " inputs");
    else {
        var a = "product_name_" + count,
                tabindex = count * 6,
                e = document.createElement("tr");
        tab1 = tabindex + 1;
        tab2 = tabindex + 2;
        tab3 = tabindex + 3;
        tab4 = tabindex + 4;
        tab5 = tabindex + 5;
        tab6 = tabindex + 6;
        tab7 = tabindex + 7;
        tab8 = tabindex + 8;
        tab9 = tabindex + 9;
        tab10 = tabindex + 10;
        tab11 = tabindex + 11;
        tab12 = tabindex + 12;
        e.innerHTML = "<td><select name='product_name[]' id='prodt_" + count + "' class='form-control product_name' onchange='available_quantity("+ count +");'>"+
        "<option value='Select the Product' selected>Select the Product</option></select>"+
        "<input type='hidden' class='common_product autocomplete_hidden_value  product_id_" + count + "' name='product_id[]' id='SchoolHiddenId /></td><td><input type='text' name='desc[]'' class='form-control text-right ' tabindex='" + tab2 + "'/></td><td><input type='text' name='available_quantity[]' id='available_quantity[]' class='form-control text-right common_avail_qnt available_quantity_" + count + "' value='0' readonly='readonly' /></td><td> <input type='text' name='product_quantity[]' id='cartoon_" + count + "'  required='required' onkeyup='total_amt(" + count + ");'  onchange='total_amt(" + count + ");' id='total_qntt_" + count + "' class='common_qnt total_qntt_" + count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/></td><td><input type='text' name='product_rate[]' id='product_rate_" + count + "' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='price_item_" + count + "' class='common_rate price_item" + count + " form-control text-right' required placeholder='0.00' min='0' tabindex='" + tab4 + "'/></td><td class='text-right'><input class='common_total_price total_price form-control text-right' type='text' name='total_price[]' id='total_price_" + count + "' value='0.00' readonly='readonly'/></td><td>"+tbfild+"<input type='hidden' id='all_discount_" + count + "' class='total_discount dppr' name='discount_amount[]'/><button tabindex='" + tab5 + "' style='text-align: right;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-close'></i></button></td>",
                document.getElementById(t).appendChild(e),
             
                count++
    }
}
function sumArray(array) {
  
  let sum = 0;

  for (let i = 0; i < array.length; i += 1) {
    sum += array[i];
  }
  
  return sum;
}




var arr=[];

function total_amt(id){
    var sum=0.0;
   
var total='total_price_'+id;
var quantity='cartoon_'+id;
var amount = 'product_rate_'+ id;
var grand=$('#grand').val();
var quan=$('#'+quantity).val();
var amt=$('#'+amount).val();
var result=parseInt(quan) * parseInt(amt);
result = isNaN(result) ? 0 : result;
arr.push(result);
$('#'+total).val(result);



sumArray(arr)
console.log(sumArray(arr));
$("#Total").val(sumArray(arr));
gtotal();
}
function gtotal(){
                  
                  var total=$('#Total').val();
                  var tax= $('#product_tax').val();
                  //console.log(total + "///"+tax);
                  var field = tax.split('-');
                  
                  var percent = field[1];
                  percent=percent.replace("%","");
                  //alert(percent);
                      var grand=parseInt(total) * parseInt(percent);
                      var final=grand + parseInt(total);
                      final = isNaN(final) ? 0 : final;
                      $('#gtotal').val(final);
                     console.log("Gtotal  : "+final);
                  
                  
                  
                  
                  }
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

