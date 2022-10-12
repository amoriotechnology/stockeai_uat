<!-- Add new customer start -->
<style type="text/css">
   body
   {
    font-size: 10px !important;

   }
   .jumbotron p
   {
    margin-bottom: -42px;
    font-size: 14px;
    font-weight: 200;
   }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Email Template</h1>
            
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('ads') ?></a></li>
                <li class="active"><?php echo display('update_setting') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Alert Message -->      
      


        <!-- New customer -->
        
            
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                      <div class="container">
                          <div class="row">
                              <div class="col-sm-6">
                                <div class="panel panel-default">

                              <img  id='first' src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaAoHYY9UnsIu81lhddf1U0j3kCjJUrbN5X3TXQ_qtqasUNrOQqfjmOFqXTO9bBqLr6IA&usqp=CAU" style="width:25px;">  HOW YOUR SALE RECIPET APPEAR IN EMAIL
                              <br>
                             <p style="font-size: 10px;"> (this setting applies to all form style)</p>

                              <br>

                              <form  method="post">
                                  <div class="first">
                                     <input type="radio" name="radio"  value="full">Full Details<br>
                                     <input type="radio" name="radio" value="summary">Summarised Details <br>
                                     <input type="checkbox" name="pdf" id="pdf" >PDF Attached (Invoice copy has to attached ) <br>

                                  </div>
                                  <hr>
                                  <br>
                                  <img  id='secound' src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaAoHYY9UnsIu81lhddf1U0j3kCjJUrbN5X3TXQ_qtqasUNrOQqfjmOFqXTO9bBqLr6IA&usqp=CAU" style="width:25px;">  Standard Email
                                  <br>
                              <p style="font-size: 10px;">Edit email your customer get with evey sales reciept</p>
                              <div class="secound">
                                <label>Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Sale Reciept[Sales Reciept No.] from infinity Stone Erope Srl "> <br>
                                (this setting  applies to all sales reciepts)<br>
                                <input type="checkbox" name="greeting" id="greeting"> Use gretting 
                                <div class="greeting">
                                <select name='dear'  id="select1" style='width: 30%;'>
                                    <option>Dear</option>
                                    <option>Mr</option>
                                    <option>Mrs</option>
                                    <option>Miss</option>
                                    
                                </select>
                               
                                <select name='first' id="select2" style='width: 30%;'>
                                    <option>First Name</option>
                                    <option>Full Name</option>
                                    <option>Company Name</option>
                                    <option>Last Name</option>
                                </select>
                            </div>
                                <br>
                                <br>
                                <label>Message to customer</label>
                                <br>
                                <textarea style="width: 100%;" id="message"  name="message">
                         
                                </textarea>
                                <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
                                <input type="submit" name="save" value="Save" id="save" class="btn btn-success">  
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                              </form>

  </div>    </div></div>
                              <div class="col-sm-6"><div class="panel panel-default">
                                <p><?php echo $subject; ?></p>
                                <p>Your email</p>
                                <hr>
                                <br>
                                <?php  $greeting=explode('_',$greeting);
                                echo $greeting[0];
                                if(strtolower($greeting[1])=='first'){
                                    echo '[customer first Name]';
                                }
                                else
                                {
                                    echo $greeting[1];
                                }


                                ?>
                                <br>
                                <br>
                                <p><?php echo $message; ?></p>
                                <br>
                                <br>
                                <div class="jumbotron">
                                    ----------------------Recipet Summary-----------
                                        <br>
                                        Sales#:12345,<br>
                                        sales Date:06/02/2018</br>
                                    Total:665.00
                                </br>
                                </br>
                                </br>
                                </br>
                                </br>

                                    <p margin-bottom: -43px; font-size:16px !important;">the complete version has been provided an attachments to this mail</p>



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

    $('.greeting').hide();

    $('.first').hide();
    $('.secound').hide();
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
    var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';



    //create data object here so we can dynamically set new csrfName/Hash
    $('#save').click(function(){
      
    var data = {
      
        subject:$('#subject').val(),
        select1:$('#select1').val(),
        select2:$('#select2').val(),
        message:$('#message').val(),
        pdf:$('#pdf').val()
   };

    data[csrfName] = csrfHash;
   
    $.ajax({
        type:'POST',
        data: data, 
        dataType:"text",
        url:'<?php echo base_url();?>Cweb_setting/insert_email',
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

         $("#header").blur(function(){
    var value=$(this).val();
    var uid='<?php echo $_SESSION['user_id']; ?>';
    $.ajax({url: "http://localhost//assets/update_templates.php?value="+value+"&input=header&id="+uid, success: function(result){
     
   
    //alert(result);
   location.reload();
    

  }
});
});
         $('#greeting').click(function(){
            $('.greeting').toggle();
         });
         $('#first').click(function(){
            $('.first').toggle();
         });
         $('#secound').click(function(){
            $('.secound').toggle();
         });

///////////////Ajax Dot////////
/*function dot(value)
{
    var uid='<?php echo $_SESSION['user_id']; ?>';
  
     $.ajax({url: "http://localhost//assets/update_templates.php?value="+value+"&input=color&id="+uid, success: function(result){
        //  alert('Color '+result);  
        location.reload();
    
      
  }});
 }
  
 */

</script>


