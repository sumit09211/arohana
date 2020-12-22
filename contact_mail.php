<?php

// Contact subject
$subject ="Query from website";
// Details
$message="$detail";
// Mail of sender
$mail_from="$customer_mail";
// From
$header="From:contact@arohana.co.in \r\n";


// Enter your email address
$to ='contact@arohana.co.in';

$send_contact=mail($to,$subject,$message,$header,$mail_from);


// Check, if message sent to your email
// display message "We've recived your information"
if($send_contact){
echo "We've recived your contact information";
}
else {
echo "ERROR";
}
$mail->isSMTP();
$mail->Host = '209.99.16.226';
$mail->SMTPAuth = false;
$mail->SMTPAutoTLS = false; 
$mail->Port = 587; 
?>