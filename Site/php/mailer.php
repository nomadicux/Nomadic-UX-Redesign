<?php

$name = $_POST['userName'];
$email = $_POST['userEmail'];
$message = $_POST['userMessage'];

//$myEmail = 'jhiles@nomadicux.com';

require '../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

//$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'jhiles@nomadicux.com';                 // SMTP username
$mail->Password = '!B3lind41993';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'jhiles@nomadicux.com';
$mail->addAddress('jhiles@nomadicux.com');     // Add a recipient

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Customer Enquiry From: ' . $name;
$mail->Body    = $message . '</br>' . 'From: ' . $email;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  header('Location: ../pages/thankyou.html');
  exit;
}
?>
