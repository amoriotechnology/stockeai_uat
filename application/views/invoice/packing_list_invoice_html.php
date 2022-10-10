<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>


   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

   
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Packing List Invoice Detail</h1>
            <small>Packing List Invoice Detail</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active">Packing List Invoice Detail</li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
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
   <div class=""  id="packing">
            <div class="row">
               <div class="document active">
                  <div class="spreadSheetGroup">
          
          <div class="col-md-12 logo">
            <img src="<?php echo base_url() ?>my-assets/image/logo-2.jpg" class="img-responsive"/>
          </div>
          
                     <hr style="visibility:hidden"/>
           
           
           
           <table class="table table-bordered" >
              <tr>
              <td colspan="4">INFINITY STONES EUROPE SRL</td>
            </tr>
            <tr>
              <td colspan="4">PIAZZA DEL MERCATO 18, PRASCATI, ROME 00044, ITALY</td>
            </tr>
            
            <tr>
              <td colspan="4">TELEPHONE: +39 069 4890, Hand phone: +31 611 2131</td>
            </tr>
            <tr>
              <td colspan="4">Email : info@infinitystoneseu.com</td>
            </tr>
            
           
           </table>
          
            <table class="table table-bordered">
            
            <tbody>
            <tr>
              <td colspan="4">PACKING LIST   </td>
            </tr>
            <tr>
            
              <td colspan="2">Invoice no. </td>
              <td>ISE0098 </td>
             
            </tr>
            <tr>
            
              <td colspan="2">invoice Date. </td>
              <td>11/30/2021 </td>
             
            </tr>
            <tr>
            
              <td colspan="2">Gross wight </td>
              <td>27084 Kgs</td>
             
            </tr>
            <tr>
            
              <td colspan="2">container No.</td>
              <td>CMAU1477625</td>
             
            </tr>
          
            
            </tbody>
          </table>
           
           <table class="table table-bordered">
            <tbody>
            <tr>
            <td class="col-md-2">SL.</td>
            <td class="col-md-2">SLAB</td>
              <td class="col-md-6">NET MEASUREMENT </td>
              <td class="col-md-2">AREA</td>
             
            </tr>
            <tr>
            <td class="col-md-2">NO. </td>
            <td class="col-md-2">NO.</td>
              <td class="col-md-6">[INCHES]</td>
              <td class="col-md-2">(SQ. FT.)</td>
             
            </tr>
            
            </tbody>
          </table>
           
           
            <table class="table table-bordered" >
              <tr>
              <th colspan="8">CRATE No.1 </th >
            </tr>
            
            
            <tr>
            <th scope="row">ITEM: </th>
            <th colspan="8">Granite Slabe - AZUL PLATINO - 3 Cms</th>
            
            </tr>
            
            
            <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
            
             <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
            
             <tr>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            </tr>
             <tr>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            
            </tr>
             <tr>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            
            </tr>
             <tr>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            </tr>
            
            <!-- 2 -->
            <tr>
              <th colspan="8">CRATE No.1 </th>
            </tr>
            
            
            <tr>
            <th scope="row">ITEM: </th>
            <th colspan="8">Granite Slabe - AZUL PLATINO - 3 Cms</th>
            
            </tr>
            
            
            <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
            
             <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
            
             <tr>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            </tr>
             <tr>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            
            </tr>
             <tr>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            
            </tr>
             <tr>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            </tr>
            
            <!-- 3 -->
            
            <tr>
              <th colspan="8">CRATE No.1 </th>
            </tr>
            
            
            <tr>
            <th scope="row">ITEM: </th>
            <th colspan="8">Granite Slabe - AZUL PLATINO - 3 Cms</th>
            
            </tr>
            
            
            <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
            
             <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
            
             <tr>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            </tr>
             <tr>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            
            </tr>
             <tr>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            
            </tr>
             <tr>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            </tr>
          
            <!-- 4 -->
            <tr>
              <td colspan="8">CRATE No.1 </td>
            </tr>
            
            
            <tr>
            <th scope="row">ITEM: </th>
            <th colspan="8">Granite Slabe - AZUL PLATINO - 3 Cms</th>
            
            </tr>
            
            
            <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
            
             <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
            
             <tr>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            </tr>
             <tr>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            
            </tr>
             <tr>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            
            </tr>
             <tr>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            </tr>
           
            <!-- 5 -->
            <tr>
              <th colspan="8">CRATE No.1 </th>
            </tr>
            
            
            <tr>
            <th scope="row">ITEM: </th>
            <th colspan="8">Granite Slabe - AZUL PLATINO - 3 Cms</th>
          
            </tr>
            
            
            <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
            
             <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
            
             <tr>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            </tr>
             <tr>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            
            </tr>
             <tr>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            
            </tr>
             <tr>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            </tr>
            
            <!-- 6 -->
          <tr>
              <th colspan="8">CRATE No.1 </th>
            </tr>
            
            
            <tr>
            <th scope="row">ITEM: </th>
            <th colspan="8">Granite Slabe - AZUL PLATINO - 3 Cms</th>
            
            </tr>
            
            
            <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
            
             <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
            
             <tr>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            </tr>
             <tr>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            
            </tr>
             <tr>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            
            </tr>
             <tr>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            </tr>
            <!-- 7 -->
            <tr>
              <th colspan="8">CRATE No.1 </th>
            </tr>
            
            
            <tr>
            <th scope="row">ITEM: </th>
            <th colspan="8">Granite Slabe - AZUL PLATINO - 3 Cms</th>
            
            </tr>
            
            
            <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
            
             <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
            
             <tr>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            <td>118.50</td>
            </tr>
             <tr>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            <td>X</td>
            
            </tr>
             <tr>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            <td>75.6</td>
            
            </tr>
             <tr>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            <td>62.000</td>
            </tr>
            
            
            
            
            
           </table>
           
            <table class="table table-bordered" >
              
            
            
            
            
            
            
           </table>
           
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
    
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

 