<?php 
echo base_url() ;


?>

<!-- Add new customer start -->
<style type="text/css">
.panel-body{
  padding:25px;
}
    .dot1 {
  height: 25px;
  width: 25px;
  background-color: #D7163A;

  display: inline-block;
}
.colorpad:hover;
{

 color: #f4511e;
}
.dot2 {
  height: 25px;
  width: 25px;
  background-color: #720303;

  display: inline-block;
}
.dot3 {
  height: 25px;
  width: 25px;
  background-color: #71D716;

  display: inline-block;
}
.dot4 {
  height: 25px;
  width: 25px;
  background-color: #3616D7;

  display: inline-block;
}
.dot5 {
  height: 25px;
  width: 25px;
  background-color: #D7B916;

  display: inline-block;
}
.dot6 {
  height: 25px;
  width: 25px;
  background-color: #D79A16;

  display: inline-block;
}
#templates>img:hover
{

background-color: orange;
border: 1px solid orange;
}
#templates>img
{
    width: 50%;
}
#templatetext
{
    margin-left:20px;
     font-size: 10px;
    font-style: italic;
    font-family: ui-monospace;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>invoice design</h1>
            
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('ads') ?></a></li>
                <li class="active"><?php echo display('update_setting') ?></li>
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



        <!-- New customer -->
       
            <?php
            //////////////Design one///////////// 
            if($template==1)
            {
            ?>

        <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
        
              <div class="col-sm-3" id='company_info'>
                  
                  Company name:<?php echo $cname; ?><br>
                  Address:<?php echo $address; ?><br>
                  Email:<?php echo $email; ?><br>
                  Contact:<?php echo $phone; ?><br>
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 40%;'></div>
        </div>
        <div class="row">
            <br>
            <br>
            <table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO </b> </td>
  </tr>
  <tr>
    <td>{bill_to}</td>
  </tr>
</table>
<br>
<br>
<table width="100%"  border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table class="proposedWork" width="100%" style="margin-top:20px">
                        <thead>
                        <tr style="background-color: #<?php echo $color; ?>;color: white;">
                           <th>DATE</th>
                           <th>QNTY</th>
                           <th>DESCRIPTION</th>
                           <th>RATE</th>
                           <th>PRO *</th>
                           <th class="amountColumn">Amount</th>
                           <tr>
                        </thead>
                        <tbody>

                                <?php
                                    if ($purchase_all_data) {
                                ?>
                                    {purchase_all_data}
                           <tr>
                              <td contenteditable="true">{trucking_date}</td>
                              <td class="unit" contenteditable="true">{qty}</td>
                              <td contenteditable="true" class="description">{description}</td>
                              <td contenteditable="true" class="description">{rate}</td>
                              <td  class="description">{pro_no_reference}</td>
                              <td class="amount" contenteditable="true">475.00</td>

                           </tr>
                            {/purchase_all_data}
                           <?php
                            }
                                ?>
                        </tbody>
              <tfoot>
                          
                           <tr>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                   <td style="border:none"></td>
                  
                              <td style="border:none;text-align:right">TOTAL:</td>
                              <td class="total amount" contenteditable="true"> {grand_total}</td>
                              <td class="docEdit"></td>
                           </tr>
                        </tfoot>
                     </table>

   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
Preview
</button>
        </div>
    </div>
  </div></div>

            <?php 

            }
    elseif($template==2)
    {
            ?>
          <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-2"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 40%;'>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
           <div class="col-sm-4" id='company_info'>
                  
                  Company name:<?php echo $cname; ?><br>
                  Address:<?php echo $address; ?><br>
                  Email:<?php echo $email; ?><br>
                  Contact:<?php echo $phone; ?><br>
              </div>
        </div>

        <div class="row">
            <div class="col-sm-6"><table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO </b> </td>
  </tr>
  <tr>
  <td>{bill_to}</td>
  </tr>
</table>
<br>
<br>


</div>
            <div class="col-sm-6"></div>
            
<br>
<table width="100%"  border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<table class="proposedWork" width="100%" style="margin-top:20px">
                        <thead>
                        <tr style="background-color: #<?php echo $color; ?>;color: white;">
                           <th>DATE</th>
                           <th>QNTY</th>
                           <th>DESCRIPTION</th>
                           <th>RATE</th>
                           <th>PRO *</th>
                           <th class="amountColumn">Amount</th>
                           <tr>
                        </thead>
                        <tbody>

                                <?php
                                    if ($purchase_all_data) {
                                ?>
                                    {purchase_all_data}
                           <tr>
                              <td contenteditable="true">{trucking_date}</td>
                              <td class="unit" contenteditable="true">{qty}</td>
                              <td contenteditable="true" class="description">{description}</td>
                              <td contenteditable="true" class="description">{rate}</td>
                              <td  class="description">{pro_no_reference}</td>
                              <td class="amount" contenteditable="true">475.00</td>

                           </tr>
                            {/purchase_all_data}
                           <?php
                            }
                                ?>
                        </tbody>
              <tfoot>
                          
                           <tr>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                   <td style="border:none"></td>
                  
                              <td style="border:none;text-align:right">TOTAL:</td>
                              <td class="total amount" contenteditable="true"> {grand_total}</td>
                              <td class="docEdit"></td>
                           </tr>
                        </tfoot>
                     </table>

   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
Preview
</button>
        </div>
    </div>
  </div></div>

            <?php 
                   }
    elseif($template==3)
    {
        ?>
    <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-2"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 40%;height:40%;'>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
           <div class="col-sm-4" id='company_info'>
                  
           
              </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-8"><table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO </b> </td>
  </tr>
  <tr>
  <td>{bill_to}</td>
  </tr>
</table>
<br>
<br>


</div>
            <div class="col-sm-4 " id="">Company namea:<?php echo $cname; ?><br>
                  Address:<?php echo $address; ?><br>
                  Email:<?php echo $email; ?><br>
                  Contact:<?php echo $phone; ?><br>
              </div></div>
            
<br>
<table width="100%"  border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<table class="proposedWork" width="100%" style="margin-top:20px">
                        <thead>
                        <tr style="background-color: #<?php echo $color; ?>;color: white;">
                           <th>DATE</th>
                           <th>QNTY</th>
                           <th>DESCRIPTION</th>
                           <th>RATE</th>
                           <th>PRO *</th>
                           <th class="amountColumn">Amount</th>
                           <tr>
                        </thead>
                        <tbody>

                                <?php
                                    if ($purchase_all_data) {
                                ?>
                                    {purchase_all_data}
                           <tr>
                              <td contenteditable="true">{trucking_date}</td>
                              <td class="unit" contenteditable="true">{qty}</td>
                              <td contenteditable="true" class="description">{description}</td>
                              <td contenteditable="true" class="description">{rate}</td>
                              <td  class="description">{pro_no_reference}</td>
                              <td class="amount" contenteditable="true">475.00</td>

                           </tr>
                            {/purchase_all_data}
                           <?php
                            }
                                ?>
                        </tbody>
              <tfoot>
                          
                           <tr>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                   <td style="border:none"></td>
                  
                              <td style="border:none;text-align:right">TOTAL:</td>
                              <td class="total amount" contenteditable="true"> {grand_total}</td>
                              <td class="docEdit"></td>
                           </tr>
                        </tfoot>
                     </table>


   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
Preview
</button>
        </div>
    </div>
  </div></div>
        <?php
               }
    elseif($template==4)
    {
    ?>
 <div class="col-sm-8" > 
    <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-3"><br>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 40%;height:40%;'></div>
        </div>
        <div class="row">
            <table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO</b> </td>
  </tr>
  <tr>
  <td>{bill_to}</td>
  </tr>
</table>
<br>
<br>
<table width="100%"  border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table class="proposedWork" width="100%" style="margin-top:20px">
                        <thead>
                        <tr style="background-color: #<?php echo $color; ?>;color: white;">
                           <th>DATE</th>
                           <th>QNTY</th>
                           <th>DESCRIPTION</th>
                           <th>RATE</th>
                           <th>PRO *</th>
                           <th class="amountColumn">Amount</th>
                           <tr>
                        </thead>
                        <tbody>

                                <?php
                                    if ($purchase_all_data) {
                                ?>
                                    {purchase_all_data}
                           <tr>
                              <td contenteditable="true">{trucking_date}</td>
                              <td class="unit" contenteditable="true">{qty}</td>
                              <td contenteditable="true" class="description">{description}</td>
                              <td contenteditable="true" class="description">{rate}</td>
                              <td  class="description">{pro_no_reference}</td>
                              <td class="amount" contenteditable="true">475.00</td>

                           </tr>
                            {/purchase_all_data}
                           <?php
                            }
                                ?>
                        </tbody>
              <tfoot>
                          
                           <tr>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                              <td style="border:none"></td>
                   <td style="border:none"></td>
                  
                              <td style="border:none;text-align:right">TOTAL:</td>
                              <td class="total amount" contenteditable="true"> {grand_total}</td>
                              <td class="docEdit"></td>
                           </tr>
                        </tfoot>
                     </table>

   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
Preview
</button>
        </div>
    </div>
  </div></div>
    <?php 
           }
    else
    {
    ?>
    <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-3"><br>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 40%;height:40%;'></div>
        </div>
        <div class="row">
            <table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO</b> </td>
  </tr>
  <tr>
  <td>{bill_to}</td>
  </tr>
</table>
<br>
<br>
<table width="100%"  border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
Preview
</button>
        </div>
    </div>
  </div></div>
    <?php 

}
?>
</div>
