<?php

// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$mail->isSMTP();                      // Set mailer to use SMTP 
$mail->Host = 'marssa-rim.com';       // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;               // Enable SMTP authentication 
$mail->Username = 'contact@marssa-rim.com';   // SMTP username 
$mail->Password = '0000slb4life1991';   // SMTP password 
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;                    // TCP port to connect to 

// Sender info 
$mail->setFrom('contact@marssa-rim.com', 'Mamadou Website');
$mail->addReplyTo('contact@marssa-rim.com', 'Mamadou Website');

// Add a recipient 
$mail->addAddress('baamamad@gmail.com');

//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 

// Set email format to HTML 
$mail->isHTML(true);

// Mail subject 
$mail->Subject = 'Email from Mamadou Website';

// Mail body content 
$bodyContent  = '<h1>Nom :</h1> <p>' . $_POST['nom'] . '</p> ';
$bodyContent .= '<h1>Prenom :</h1> <p>' . $_POST['prenom'] . '</p> ';
$bodyContent .= '<h1>Objet :</h1> <p>' . $_POST['objet'] . '</p> ';
$bodyContent .= '<h1>Email :</h1> <p>' . $_POST['email'] . '</p> ';
$bodyContent .= '<h1>Message :</h1> <p>' . $_POST['message'] . '</p> ';
$mail->Body    = $bodyContent;

// Send email 
if (!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
} else {
?>

    <script language="javascript" type="text/javascript">
        alert('Succesfilly sent');
        window.location.href = 'portfolio.html';
    </script>
<?php
}



?>