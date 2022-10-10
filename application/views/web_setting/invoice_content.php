<!-- Add new customer start -->
<style type="text/css">
    .dot1 {
  height: 25px;
  width: 25px;
  background-color: #D7163A;
  border-radius: 50%;
  display: inline-block;
}
.dot2 {
  height: 25px;
  width: 25px;
  background-color: #720303;
  border-radius: 50%;
  display: inline-block;
}
.dot3 {
  height: 25px;
  width: 25px;
  background-color: #71D716;
  border-radius: 50%;
  display: inline-block;
}
.dot4 {
  height: 25px;
  width: 25px;
  background-color: #3616D7;
  border-radius: 50%;
  display: inline-block;
}
.dot5 {
  height: 25px;
  width: 25px;
  background-color: #D7B916;
  border-radius: 50%;
  display: inline-block;
}
.dot6 {
  height: 25px;
  width: 25px;
  background-color: #D79A16;
  border-radius: 50%;
  display: inline-block;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>invoice Content</h1>
            
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
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                      <div class="container">
                          <div class="row">
                              <div class="col-sm-4  "> <div class="panel panel-default">

<form action="updateinvoice2" method="post">
    <div class="panel-body"> 
       <div class="form-group">
           <label>Buisness Name</label>
           <input type="text" name="name" class="form-control" value="<?php if($cname!=''){echo $cname ; }?>">

       </div>
       <div class="form-group">
           <label>Buisness Phone</label>
           <input type="text" name="phone" class="form-control" value="<?php if($phone!=''){echo $phone ; }?>">
           
       </div>
       <div class="form-group">
           <label>Buisness Email</label>
           <input type="text" name="email" class="form-control" value="<?php if($email!=''){echo $email ; }?>">
           
       </div>
       <div class="form-group">
           <label>Buisness Address</label>
           <input type="text" name="address" class="form-control" value="<?php if($address!=''){
            echo $address;
             }?>">
           
       </div>
       <div class="form-group">
           <label>Buisness Register no</label>
           <input type="text" name="regno" class="form-control" value="<?php if($reg_number!=''){
            echo $reg_number;
             }?>">
           
       </div>
        <div class="form-group">
           <label>Website</label>
           <input type="text" name="website" class="form-control" value="<?php if($website!=''){
            echo $website;
             }?>">
           
       </div>
       <div class="form-group">
           
           <input type="submit"  class="btn btn-success" value="ADD" >
           
       </div>

    </div>
  </div>    </div>
                              <div class="col-sm-8"> <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-3"><?php 
            if($cname!=='')
            { 
            echo $cname; 
        }
        ?> <br>
                <p>
                  <?php if($address!=='')
            { 
            echo $address; 
        }; ?>   <br> 
                 
                  
                  REg no:<?php if($reg_number!=='')
            { 
            echo $reg_number; 
        }; ?><br>
                   phone:<?php if($phone!=='')
            {  echo $phone; } ?>   <br> 
                  <?php
                  if($website!=='')
            {
                   echo $website;
               }

                    ?><br>
                  <?php
if($email!=='')
            {
                   echo $email;
               }
                    ?><br>
                   <br>
                   <br>
                </p>
              </div>
            <div class="col-sm-6 text-center"><?php echo $header; ?></div>
            <div class="col-sm-3"><img src="<?php echo  'http://localhost//assets/'.$logo; ?>" style='width: 40%;'></div>
        </div>
        <div class="row">
            <table width="348" height="79" border="1">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;color:white;"><b>BILL TO</b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;color: white;">
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
  <tr style="background-color: #<?php echo $color; ?>;color: white;">
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

    
        </div>
    </div>
  </div></div>
                            </div>
                          </div>
                      </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>










    </section>
</div>
<!-- Add new customer end -->

<script type="text/javascript">
    ////////////Show & Hide///////////
    $('#colorcombo').hide();
    $('#templateformart').hide();
    $('#uploadlogo').hide();
    $('#template').click(function(){
        $("#templateformart").toggle();
    });
     $('#templatecolor').click(function(){
        $("#colorcombo").toggle();
    });
      $('#templatelogo').click(function(){
        $("#uploadlogo").toggle();

    });
      /////////////Ajax////////////

         $("#header").blur(function(){
    var value=$(this).val();
    var uid='<?php echo $_SESSION['user_id']; ?>';
    $.ajax({url: "http://localhost//assets/update_templates.php?value="+value+"&input=header&id="+uid, success: function(result){
     
   
    //alert(result);
   location.reload();
    

  }
});
});

///////////////Ajax Dot////////
function dot(value)
{
    var uid='<?php echo $_SESSION['user_id']; ?>';
  
     $.ajax({url: "http://localhost//assets/update_templates.php?value="+value+"&input=color&id="+uid, success: function(result){
        //  alert('Color '+result);  
        location.reload();
    
      
  }});
 }
    

</script>


