<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/packing.js" type="text/javascript"></script>


<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Packing List</h1>
            <small>Generate New Packing List Invoice</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Packing List</a></li>
                <li class="active">Packing List Invoice</li>
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
                            <h4>Create New Packing List Invoice</h4>
                        </div>
                    </div>

                    <div class="panel-body">
                    <?php echo form_open_multipart('Cpurchase/insert_packing_list',array('class' => 'form-vertical', 'id' => 'insert_packing_list','name' => 'insert_packing_list'))?>
                        

                        <div class="row">

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label">Packing List No.
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="invoice_no" value="{invoice_no}" readonly />
                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Invoice Date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="invoice_date" value="{invoice_date}" id="date"  />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label">Gross Weight
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="gross_weight" value="{gross_weight}" placeholder="Gross Weight" id="invoice_no" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Container No
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="text" tabindex="3" class="form-control" name="container_no" value="{container_no}" placeholder="Container No" id="invoice_no" />
                                    </div>
                                </div> 
                            </div>
                        </div>

           <!--      <div>
                          <button type="button" class="btn btn-primary"  id="service_quotation_div">Create Crate</button>  
                        </div> -->

<!-- 
                        <button type="button" class="btn btn-info" name="add-invoice-item"  onClick="addCrate('quotation_service1')"  tabindex="9"/><i class="fa fa-plus"></i> Add another crate</button> -->

        <br>



            <div class="crate_wrap" style="
    border: 1px solid #ddd;
    padding: 6px;
    margin: 5px;
">



              <div class="table-responsive" id="quotation_service1">
                        <table class="table table-bordered table-hover" id="packingListTable">

                             <thead>
                                     <tr>
                                          
                                           <th class="text-center" width="15%">Product<i class="text-danger">*</i></th> 


                                           <th class="text-center" width="15%">Description<i class="text-danger">*</i></th>


                                           <th class="text-center" width="15%">Thickness<i class="text-danger">*</i></th>

                                          
                                         
                                        </tr>
                                </thead>

                                <tbody id="">

                                    <tr>
                                        
                                         {purchase_info}
                                        <td class="span3 supplier">
                                           <input type="text" name="product_name" required class="form-control product_name productSelection" onkeypress="product_pur_or_list_by_company(1);" placeholder="<?php echo display('product_name') ?>" id="product_name_1" tabindex="5" value="{product_name}" >

                                            <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id" id="SchoolHiddenId"/>

                                            <input type="hidden" class="sl" value="1">
 {/purchase_info}
                                        <!--     <a href="#" class="client-add-btn btn btn-info" aria-hidden="true" data-toggle="modal" data-target="#product_info"><i class="ti-plus m-r-2"></i></a> -->

                                        </td>


                                        <td class="span3 supplier">
                                           <input type="text" name="description" required class="form-control" value="{description}" placeholder="<?php echo display('description') ?>"  tabindex="5" >

                                        </td>


                                          <td class="span3 supplier">
                                           <input type="text" name="thickness" required class="form-control" value="{thickness}" placeholder="Thickness"  tabindex="5" >

                                        </td>

                                    </tr>

                                </tbody>

                            </table>
                        </div>





                        <div class="table-responsive" id="quotation_service1">
                        <table class="table table-bordered table-hover" id="packingListTable">


                                <thead>
                                     <tr>
                                          <th class="text-center" width="10%">Serial No<i class="text-danger">*</i></th> 
                                          
                                          
                                            <th class="text-center">SLAB NO</th>
                                            <th class="text-center">Net Measurement (Inches)<i class="text-danger">*</i></th>
                                         <!--    <th class="text-center" id="th_Measurements1" >Set Measurements<i class="text-danger">*</i></th> -->
                                            <th class="text-center"  style="width:200px;">Area (Sq. Ft)<i class="text-danger">*</i></th>
                                       
                                            <th class="text-center"><?php echo display('action') ?></th>
                                        </tr>
                                </thead>
                                <tbody id="addPurchaseItem">
                                        {purchase_info}
                                    <tr>
                                         <td class="wt">
                                                <input type="text" id="serial_number[]" name="serial_number[]" value="{sl}" class="form-control text-right" placeholder="" />
                                         </td>

                                       <td class="wt">
                                                <input type="text" name="slab_no[]" id="available_quantity_1" value="{slab_no}" class="form-control text-right stock_ctn_1" placeholder="0.00" />
                                       </td>
                                        
<!--                                             <td class="text-right">
                                                <input type="text" name="product_quantity[]" id="cartoon_1" required="" min="0" class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="11" value=""  tabindex="6"/>
                                            </td> -->
                                           <!--  <td>




                                        <select name="measurments" id="Measurments" class="form-control " required="" tabindex="1">
                                            <option value="cm">Cms</option>
                                            <option value="in">Inches</option>
                                            <option value="Cm-in">Cms to inches</option>
                                        </select>
                                            </td> -->
                                          <!--   <td class="text-right" id="th_Measurements">
                                                <input type="text" id="height" name="height[]"class="form-control text-right store_cal_1"placeholder="Height"/>
                                                <input type="text" id="width" name="width[]"class="form-control text-right store_cal_1"placeholder="Width"/>
                                                <input type="text" id="thickness" name="thickness[]"class="form-control text-right store_cal_1"placeholder="Thickness"/>
                                            </td> -->


                                           

                                            <td class="text-right" style="display: flex;">
                                                <input type="text" name="width[]" value="{width}" id="cartoon_1"  class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="Width" value=""  tabindex="6" style="width: 50%;"/>

                                                 <input type="text" name="height[]" id="product_rate_1" value="{height}"  class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="Height" value=""  tabindex="6" style="width: 50%;"/>


                                            </td>


                                            
                                           

                                            <td class="text-right">
                                                <input class="form-control total_price text-right" type="text" value="{area}" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly" />
                                            </td>
                                            
                                            <td>
                                                <button  class="btn btn-danger text-right red" type="button" value="<?php echo display('delete')?>" onclick="deleteRow(this)" tabindex="8"><i class="fa fa-close"></i></button>
                                            </td>
                                    </tr>
                                      {/purchase_info}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        
                                        <td class="text-right" colspan="3"><b><?php echo display('total') ?>:</b></td>

                                        <td class="text-right">
                                            <input type="text" id="Total" class="text-right form-control" name="total" value="0.00" readonly="readonly" />
                                        </td>
                                        <td> <button type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addpackingList('addPurchaseItem')"  tabindex="9"/><i class="fa fa-plus"></i></button>
                                             <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                    </tr>
                                       

                                       <!--  <tr>
                                        
                                        <td class="text-right" colspan="7"><b><?php echo display('grand_total') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="0.00" readonly="readonly" />
                                        </td>
                                        <td> </td>
                                    </tr> -->
                                       <!--   <tr>
                                        
                                        <td class="text-right" colspan="7"><b><?php echo display('paid_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="paidAmount" class="text-right form-control" onKeyup="invoice_paidamount()" name="paid_amount" value="" />
                                        </td>
                                        <td> </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td colspan="2" class="text-right">
                                             <input type="button" id="full_paid_tab" class="btn btn-warning" value="<?php echo display('full_paid') ?>" tabindex="16" onClick="full_paid()"/>
                                        </td>
                                        <td class="text-right" colspan="5"><b><?php echo display('due_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="dueAmmount" class="text-right form-control" name="due_amount" value="0.00" readonly="readonly" />
                                        </td>
                                        <td></td>
                                    </tr> -->


                                  
                                     

                                   
                                </tfoot>
                            </table>
                        </div>

                    </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="add_purchase" class="btn btn-primary btn-large" name="add-packing-list" value="<?php echo display('submit') ?>" />
                                <input type="submit" value="<?php echo display('submit_and_add_another') ?>" name="add-packing-list-another" class="btn btn-large btn-success" id="add-packing-list-another" >
                            </div>
                        </div>


                           <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Remarks
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="4" cols="50" id="adress" name="remarks" placeholder="Remarks" rows="1"></textarea>
                                    </div>
                                </div> 
                            </div>


                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Attachements
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="file" name="attachments" class="form-control">
                                    </div>
                                </div> 
                            </div>
                        </div>


                    <?php echo form_close()?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<!-- Purchase Report End -->






<script type="text/javascript">

let count12 = 0;
let s1=0;
function addCrate(divName){

    //alert('ok');


        if (count == limits)  {

            alert("You have reached the limit of adding " + count + " inputs");

        }

        else{

            var newdiv = document.createElement('div');

            var tabin="product_name_"+count;

            tabindex = count * 4 ,

            newdiv = document.createElement("div");

            tab1 = tabindex + 1;

            tab2 = tabindex + 2;

            tab3 = tabindex + 3;

            tab4 = tabindex + 4;

            tab5 = tabindex + 5;

            tab6 = tab5 + 1;

            tab7 = tab6 +1;

            
           newdiv.innerHTML ='<table class="table table-bordered table-hover" id="purchaseTable"><thead><tr><th class="text-center" width="20%">SL NO.<i class="text-danger">*</i></th>  <th class="text-center" width="20%">Product<i class="text-danger">*</i></th> <th class="text-center">SLAB NO</th><th class="text-center">NET Measurements<i class="text-danger">*</i></th><th class="text-center" id="th_Measurements1'+count12+'">Set Measurements<i class="text-danger">*</i></th><th class="text-center">Area<i class="text-danger">*</i></th><th class="text-center">Total<i class="text-danger">*</i></th><th class="text-center"></th><th class="text-center"></th></tr></thead><tbody id="addPurchaseItem"><tr><td class="span3 supplier"><input type="text" name="product_name" required class="form-control product_name productSelection" onkeypress="product_pur_or_list(1);" placeholder="" id="product_name_1" tabindex="5" ><input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id[]" id="SchoolHiddenId"/><input type="hidden" class="sl" value="1"></td><td class="wt"> <input type="text" name="product_name" required class="form-control product_name productSelection" onkeypress="product_pur_or_list(1);" placeholder="<?php echo display('product_name') ?>" id="product_name_1" tabindex="5" ></td><td class="text-right"><input type="text" name="product_quantity[]" id="cartoon_1" required="" min="0" class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="0.00" value=""  tabindex="6"/></td><td><select name="measurments" id="Measurments'+count12+'" class="form-control " required="" tabindex="1"><option value=" ">Cms</option><option value=" ">Inches</option><option value=" ">Cms to inches</option></select></td><td class="text-right" id="th_Measurements'+count12+'"><input type="text" id="height'+count12+'" name="height[]"class="form-control text-right store_cal_1"placeholder="Height"/><input type="text" id="weight'+count12+'" name="weight[]"class="form-control text-right store_cal_1"placeholder="Weight"/><input type="text" id="thikness'+count12+'" name="thikness[]"class="form-control text-right store_cal_1"placeholder="Thikness"/></td><td class="text-right"><input type="text" id="area'+count12+'" required="" min="0" class="form-control text-right" placeholder="0.00" value=""  tabindex="6"/></td><td class="text-right"><input type="text" name="" id="" required="" min="0" class="form-control text-right" placeholder="0.00" value=""  tabindex="6"/></td><td class="text-right"><input type="text" name="product_quantity[]" id="cartoon_1" required="" min="0" class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="0.00" value=""  tabindex="6"/></td><td class="test"><input type="text" name="product_rate[]" required="" onkeyup="calculate_store(1);" onchange="calculate_store(1);" id="product_rate_1" class="form-control product_rate_1 text-right" placeholder="0.00" value="" min="0" tabindex="7"/></td><td class="text-right"><input class="form-control total_price text-right" type="text" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly" /></td><td><button  class="btn btn-danger text-right red" type="button" value="" onclick="deleteRow(this)" tabindex="8"><i class="fa fa-close"></i></button></td></tr></tbody><tfoot><tr><td class="text-right" colspan="5"><b>Total Over:</b></td><td class="text-right"><input type="text" id="dueAmmount" class="text-right form-control" name="due_amount" value="0.00" readonly="readonly" /></td><td></td></tr></tfoot></table>';

            document.getElementById(divName).appendChild(newdiv);

    $('#Measurments'+s1).change(function(){

    let measure1 = $("#Measurments"+s1).val();
    let height1 , weight1 , thickness1;
    $("#thickness"+s1).keyup(function(){
        height1 = $("#height"+s1).val();
        console.log(height1);
        weight1 = $("#weight"+s1).val();
          console.log(weight1);
        thickness1 = $("#thickness"+s1).val();
          console.log(thickness1);
        let calcu1 = height1*weight1*thickness1;
        calcu1 = calcu1+measure1;
        $("#area"+s1).val(calcu1);
    });   
  }); 

            //document.getElementById(tabin).focus();

            // document.getElementById("add_invoice_item").setAttribute("tabindex", tab5);

            // document.getElementById("add_purchase").setAttribute("tabindex", tab6);

            // document.getElementById("add_purchase_another").setAttribute("tabindex", tab7);

           

            count++;
            count12++;
            s1++;



            $("select.form-control:not(.dont-select-me)").select2({

                placeholder: "Select option",

                allowClear: true

            });

        }

    }


   

    // $(function() {
    // $('#btnAddtoList').click(function(){
      //  var newDiv = $('<table class="table table-bordered table-hover" id="purchaseTable"><thead><tr><th class="text-center" width="20%">SL NO.<i class="text-danger">*</i></th> <th class="text-center">SLAB NO</th><th class="text-center">NET Measurements<i class="text-danger">*</i></th><th class="text-center">Cms<i class="text-danger">*</i></th><th class="text-center">Inches<i class="text-danger">*</i></th><th class="text-center">Area<i class="text-danger">*</i></th><th class="text-center"></th><th class="text-center"></th></tr></thead><tbody id="addPurchaseItem"><tr><td class="span3 supplier"><input type="text" name="product_name" required class="form-control product_name productSelection" onkeypress="product_pur_or_list(1);" placeholder="" id="product_name_1" tabindex="5" ><input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id[]" id="SchoolHiddenId"/><input type="hidden" class="sl" value="1"></td><td class="wt"><input type="text" id="available_quantity_1" class="form-control text-right stock_ctn_1" placeholder="0.00" /></td><td class="text-right"><input type="text" name="product_quantity[]" id="cartoon_1" required="" min="0" class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="0.00" value=""  tabindex="6"/></td><td class="text-right"><input type="text" name="" id="" required="" min="0" class="form-control text-right" placeholder="0.00" value=""  tabindex="6"/></td><td class="text-right"><input type="text" name="" id="" required="" min="0" class="form-control text-right" placeholder="0.00" value=""  tabindex="6"/></td><td class="text-right"><input type="text" name="product_quantity[]" id="cartoon_1" required="" min="0" class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="0.00" value=""  tabindex="6"/></td><td class="test"><input type="text" name="product_rate[]" required="" onkeyup="calculate_store(1);" onchange="calculate_store(1);" id="product_rate_1" class="form-control product_rate_1 text-right" placeholder="0.00" value="" min="0" tabindex="7"/></td><td class="text-right"><input class="form-control total_price text-right" type="text" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly" /></td><td><button  class="btn btn-danger text-right red" type="button" value="" onclick="deleteRow(this)" tabindex="8"><i class="fa fa-close"></i></button></td></tr></tbody><tfoot><tr><td class="text-right" colspan="7"><b>:</b></td><td class="text-right"><input type="text" id="Total" class="text-right form-control" name="total" value="0.00" readonly="readonly" /></td><td> <button type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addPurchaseOrderField1('addPurchaseItem')"  tabindex="9"/><i class="fa fa-plus"></i></button><input type="hidden" name="baseUrl" class="baseUrl" value=""/></td></tr><tr><td class="text-right" colspan="7"><b>:</b></td><td class="text-right"><input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="0.00" readonly="readonly" /></td><td> </td></tr><tr><td class="text-right" colspan="7"><b>:</b></td><td class="text-right"><input type="text" id="paidAmount" class="text-right form-control" onKeyup="invoice_paidamount()" name="paid_amount" value="" /></td><td> </td></tr><tr><td colspan="2" class="text-right"><input type="button" id="full_paid_tab" class="btn btn-warning" value="" tabindex="16" onClick="full_paid()"/></td><td class="text-right" colspan="5"><b>:</b></td><td class="text-right"><input type="text" id="dueAmmount" class="text-right form-control" name="due_amount" value="0.00" readonly="readonly" /></td><td></td></tr></tfoot></table>');
      //newDiv.style.background = "#000";
//        $('#quotation_service').append(newDiv);
//     });
// });


  $("#service_quotation_div").click(function () {

         $("#quotation_service").toggle(1500,"easeOutQuint",function(){

          });

  }); 


$(document).ready(function(){
    $("#th_Measurements").hide();
    $("#th_Measurements1").hide();
    $("#Measurments").change(function(){
    $("#th_Measurements").show();
    $("#th_Measurements1").show();
    let measure = $('#Measurments').val();
    let height , weight , thickness;
    $("#thickness").keyup(function(){
        height = $("#height").val();
        console.log(height);
        width = $("#width").val();
        console.log(width);
        thickness = $("#thickness").val();
        console.log(thickness);
        let calcu = height*width*thickness;
        calcu = calcu+measure;
        $("#area").val(calcu);
    });

          
  });

  
});
    


</script>