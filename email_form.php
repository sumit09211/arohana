<?php
switch (@$_GET['do'])
 {

 case "send":

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $femail = $_POST['femail'];
      $fphone1 = $_POST['fphone1'];
      $fsendmail = $_POST['fsendmail'];
      $secretinfo = $_POST['info'];

    if (!preg_match("/\S+/",$fname))
    {
      unset($_GET['do']);
      $message = "First Name required. Please try again.";
      break;
    }
    if (!preg_match("/\S+/",$lname))
    {
      unset($_GET['do']);
      $message = "Last Name required. Please try again.";
      break;
    }
    if (!preg_match("/^\S+@[A-Za-z0-9_.-]+\.[A-Za-z]{2,6}$/",$femail))
    {
      unset($_GET['do']);
      $message = "Primary Email Address is incorrect. Please try again.";
      break;
    }
    
    if (!preg_match("/^[0-9 #\-\*\.\(\)]+$/",$fphone1))
    {
      unset($_GET['do']);
      $message = "Phone Number 1 required. No letters, please.";
      break;
    }
 
    if ($secretinfo == "")
    {
       $myemail = "contact@arohana.co.in";
       $emess = "First Name: ".$fname."\n";
       $emess.= "Last Name: ".$lname."\n";
       $emess.= "Email 1: ".$femail."\n";
       $emess.= "Phone number 1: ".$fphone1."\n";
       $emess.= "Comments: ".$fsendmail;
       $ehead = "From:contact@arohana.co.in \r\n";
       $subj = "An Email from ".$fname." ".$lname."!";
       $mailsend=mail($myemail,$subj,$emess,$ehead);
       $message = "Email was sent.";
    }


 
      unset($_GET['do']);
      //  header("Location: index.html");
     break;

     $mail->isSMTP();
     $mail->Host = '209.99.16.226';
     $mail->SMTPAuth = false;
     $mail->SMTPAutoTLS = false; 
     $mail->Port = 587; 
 
 default: break;
 }
?>


<html>
<body>
<form action="email_form.php?do=send" method="POST">
<p>* Required fields</p>
<?php
   if ($message) echo '<p style="color:red;">'.$message.'</p>';
?>
   <table border="0" width="500">
     <tr><td align="right">* First Name: </td>
         <td><input type="text" name="fname" size="30" value="<?php echo @$fname ?>"></td></tr>
     <tr><td align="right">* Last Name: </td>
         <td><input type="text" name="lname" size="30" value="<?php echo @$lname ?>"></td></tr>
   </table>
<p>
   <table border="0" width="500">
     <tr><td align="right">* Primary Email: </td>
         <td><input type="text" name="femail" size="30" value="<?php echo @$femail ?>"></td></tr>
     
   </table>
<p>
   <table border="0" width="600">
     <tr><td align="right">* Phone Number 1: </td>
      <td><input type="text" name="fphone1" size="20" value="<?php echo @$fphone1 ?>"></td></tr>
   </table>
<p>
   <table border="0" width="500"><tr><td>
     Comments:<br />
     <TEXTAREA name="fsendmail" ROWS="6" COLS="60"><?php if($fsendmail) echo $fsendmail; ?></TEXTAREA>
     </td></tr>
     <tr><td align="right"><input type="submit" value="Send Now">
     </td></tr>
   </table>
   </form>
</body>
</html> 