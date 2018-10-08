<?php
session_start();
require("config.php");

//require_once('PHPMailer/PHPMailerAutoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

echo !extension_loaded('openssl')?"Not Available":"Available";

$mail = new PHPMailer();
$mail -> isSMTP();
$mail -> SMTPAuth = true;
$mail -> SMTPSecure = 'tls';
$mail -> Host = 'tls://smtp.gmail.com';
$mail -> Port = '587';
$mail -> isHTML();

$mail -> Username = 'ferreteriapratantofagasta@gmail.com';
$mail -> Password = 'ferreteria123';
$mail -> SetFrom('ferreteriapratantofagasta@gmail.com');
$mail -> AddAddress('jgonzalez.vargas@gmail.com');
$mail -> Subject = 'Informacion de compra';
$mail -> Body = "Se ha realizado una compra";



if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";
} else {
    echo 'Message sent!';
}

?>

<?php
require("footer.php");
?>