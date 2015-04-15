<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body background="img/questions.jpg"><center>
<div>
<form style=" position:absolute; left:25%; right:25%; top:45%;" name="forgot" action="forgot.php" method="post"><br/>
<b>Enter Ur E-Mail Id : </b><input type="text" name="mail" size="30" />
<br/><br/><input type="submit" name="ok" value="send mail" />
</form>
</div>

<?php
if(isset($_REQUEST['ok']))
{
   $user=$_REQUEST['mail'];
   
require 'F:\wamp\www\PHPMailer_5.2.4\class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
// or try these settings (worked on XAMPP and WAMP):
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls';
 
$n=rand(1,999999);
$_SESSION['name']=$_REQUEST['mail'];
$_SESSION['code']=$n;
$mail->Username = "ur_mail_here";
$mail->Password = "ur_oassword_here";
 
$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
 
$mail->From = "ss4cca@gmail.com";
$mail->FromName = "Question Paper Manager";
 
$mail->addAddress($user,"User");
 
$mail->addCC($user,"User");
$mail->addBCC($user,"User");
 
$mail->Subject = "Regarding Password Change : Question Paper Manager Account";
$mail->Body = "Hi,<br /><br />You Requested to change the password of ur Question paper manager Account...<br/><br/>Enter $n to verify ur authorization.<br/><br/>Regards,<br/>Shivanshi Srivastava";
 
if(!$mail->Send())
    echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else
    header('Location:change.php');
}
?>
	</center>
</body>
</html>
