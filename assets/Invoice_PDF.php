
<?php 
include 'config.php';

session_start();
$session=$_SESSION['Purchase'];
//echo $session;
$split=explode("-",$session);
$purchase_detail_id=$split[0];
$purchase_id=$split[1];
//$result = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM sales_invoice_settings ORDER BY 'Time' ASC LIMIT 1"));

  // return $row['Time'];

$sql = "SELECT p.purchase_id, 
                   p.chalan_no,
                   p.purchase_date, 
                   p.total,
                   p.description_goods,
                   p.customer_id,
                   c.purchase_id
            FROM profarma_invoice p
            JOIN profarma_invoice_details c on p.purchase_id = c.purchase_id
WHERE c.purchase_detail_id='$purchase_detail_id' and c.purchase_id='$purchase_id'";
  
  
  $result = mysqli_query($con,$sql);
  while ($row = mysqli_fetch_array($result)) {
//echo  $row["purchase_id"]. "/";
//echo  $row["chalan_no"]. "/";
//echo  $row["purchase_date"];

?>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


           
        <div class="" id="PROFORMA" >
          <table>
<tr><td><?php echo  $row["purchase_id"];   ?>;</td></tr>
<tr><td><?php echo  $row["chalan_no"];   ?>;</td></tr>
<tr><td><?php echo  $row["purchase_date"];   ?>;</td></tr>


          </table>
            </div>
            <?php
    }
   
?>

<div id="myModal" class="modal fade" role="dialog" style='background-color: cornsilk;'>
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Invoice</h4>
      </div>
      <div class="modal-body">
        <p>Successfully Downloaded</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" 
        onclick='window.location = "http://localhost/stockeai/Cinvoice/profarma_invoice";'>Close</button>
      </div>
    </div>

  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"/>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:300,400,400i,500,700');

/* font-family: 'Roboto', sans-serif; font-family: 'Roboto Slab', serif; */

body {
  background: #fff;
  color: #414141;
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
  overflow-x: hidden;
  -webkit-text-stroke: rgba(255, 255, 255, 0.01) 0.1px;
  -webkit-font-smoothing: antialiased !important;
}

a {
  text-decoration: none;
  -ms-transition: all 0.3s ease-in;
  -webkit-transition: all 0.3s ease-in;
  transition: all 0.3s ease-in;
}

a:hover,
a:focus,
a:active {
  outline: medium none;
  text-decoration: none;
}

*:focus {
  outline: none;
}

img {
  max-width: 100%, height: auto;
}

strong,
b {
  font-weight: 700;
}

i,
em {
  font-style: italic;
}

.clear {
  border: 0;
  clear: both;
  height: 0;
}

h1,
h2,
h3,
h4,
h5,
h6,
p {
  font-weight: normal;
  margin: 0;
}

input,
textarea {
  -webkit-appearance: none;
  border-radius: 0;
}

h1,
h2,
h3,
h4,
.my-jumbotron.jumbotron h1 {
  font-family: 'Roboto Slab', serif;
}

.btn.btn-success {
  position: absolute;
  height: 50px;
  width: 200px;
  line-height: 2.2;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  margin: auto;
  font-size: 18px;
  text-transform: uppercase;
}

.popup {
  width: 100%;
  height: 100%;
  display: none;
  position: fixed;
  top: 0px;
  left: 0px;
  background: rgba(0, 0, 0, 0.75);
}

.popup {
  text-align: center;
}

.popup:before {
  content: '';
  display: inline-block;
  height: 100%;
  margin-right: -4px;
  vertical-align: middle;
}

.popup-inner {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
  position: relative;
  max-width: 700px;
  width: 90%;
  padding: 40px;
  box-shadow: 0px 2px 6px rgba(0, 0, 0, 1);
  border-radius: 3px;
  background: #fff;
  text-align: center;
}

.popup-inner h1 {
  font-family: 'Roboto Slab', serif;
  font-weight: 700;
}

.popup-inner p {
  font-size: 24px;
  font-weight: 400;
}

.popup-close {
  width: 34px;
  height: 34px;
  padding-top: 4px;
  display: inline-block;
  position: absolute;
  top: 20px;
  right: 20px;
  -webkit-transform: translate(50%, -50%);
  transform: translate(50%, -50%);
  border-radius: 100%;
  background: transparent;
  border: solid 4px #808080;
}

.popup-close:after,
.popup-close:before {
  content: "";
  position: absolute;
  top: 11px;
  left: 5px;
  height: 4px;
  width: 16px;
  border-radius: 30px;
  background: #808080;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}

.popup-close:after {
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
}

.popup-close:hover {
  -webkit-transform: translate(50%, -50%) rotate(180deg);
  transform: translate(50%, -50%) rotate(180deg);
  background: #f00;
  text-decoration: none;
  border-color: #f00;
}

.popup-close:hover:after,
.popup-close:hover:before {
  background: #fff;
}
    </style>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
   
            <script type="text/javascript">

 $(document).ready(function () {
 
var pdf = new jsPDF('p','pt','a4');
   const invoice = document.getElementById("PROFORMA");
            console.log(invoice);
            console.log(window);
            var pageWidth = 8.5;
            var margin=0.5;
            var opt = {
  lineHeight : 1.2,
  margin : 0.2,
  maxLineWidth : pageWidth - margin *1,
                filename: 'invoice'+'.pdf',
                allowTaint: true,
               
                html2canvas: { scale: 3 },
                jsPDF: { unit: 'in', format: 'a4', orientation: 'Portrait' }
            };
             html2pdf().from(invoice).set(opt).toPdf().get('pdf').then(function (pdf) {
 var totalPages = pdf.internal.getNumberOfPages();
for (var i = 1; i <= totalPages; i++) {
   pdf.setPage(i);
   pdf.setFontSize(10);
   pdf.setTextColor(150);
   
 }
 }).save();
   $('[pd-popup-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('pd-popup-open');
        $('[pd-popup="' + targeted_popup_class + '"]').fadeIn(100);
 
        e.preventDefault();
    });
 
    //----- CLOSE
    $('[pd-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('pd-popup-close');
        $('[pd-popup="' + targeted_popup_class + '"]').fadeOut(200);
 
        e.preventDefault();
    });
    window.setTimeout(function(){
      alert("Successfully Downloaded");
        // Move to a new location or you can do something else
       window.location = "../Cinvoice/profarma_invoice";

    }, 1000);
  
  });
</script>