<style>
font-color:blue;
color:red;
</style>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('vendor/phpmailer/src/Exception.php');
require_once('vendor/phpmailer/src/PHPMailer.php');
require_once('vendor/phpmailer/src/SMTP.php');

 

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);
if(isset($_POST['fileDataURI'])){
$pdfdoc  = $_POST['fileDataURI'];
$b64file        = trim( str_replace( 'data:application/pdf;base64,', '', $pdfdoc ) );
    $b64file        = str_replace( ' ', '+', $b64file );
    $decoded_pdf    = base64_decode( $b64file );
echo $decoded_pdf;
//file_put_contents( $attachment, $decoded_pdf );
   $mail = new PHPMailer;
    //Enable SMTP debugging. 
    $mail->SMTPDebug = 0;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name                          
    $mail->Host = 'smtp.gmail.com';
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password     
    $mail->Username = 'suryavenkatesh3093@gmail.com';
    $mail->Password = 'hdafyzlzbjqppnlq';
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "ssl";
    //Set TCP port to connect to 
    $mail->Port = 465;
    $mail->From = 'suryavenkatesh3093@gmail.com';  
    $mail->FromName = 'AmorioTech';
    $mail->addAddress('Suryakala@amoriotech.com');
    $mail->isHTML(true);
     $mail->Subject = 'Invoice';
    $mail->Body = '<div style="font-size:16px;font-weight:bold;">Hllo
	<span style="color:red"> </span>
	<span style="color:blue"> </span>
	<br/><br/>Greeting from Amorio Technologies !!!<br/><br/> <span style="color:red">Here is your invoice</span></div>';
  $mail->addStringAttachment($decoded_pdf, "Invoice.pdf");
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else {
           echo 'Approved and Mail Sent Successfully';

	}
}
?>
