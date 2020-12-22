<?php
  $to = "contact@arohana.co.in";
  $subject = "mail from website";
  $message = "This is simple website mail.";
  $header = "From:contact@arohana.co.in \r\n";
  $retval = mail ($to,$subject,$message,$header);
  if( $retval == true )
  {
  echo "Message sent successfully...";
  }
  else
  {
  echo "Message could not be sent...";
  }

$mail->isSMTP();
$mail->Host = '209.99.16.226';
$mail->SMTPAuth = false;
$mail->SMTPAutoTLS = false; 
$mail->Port = 587; 

?>


