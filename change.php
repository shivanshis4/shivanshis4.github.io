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
<form style=" position:absolute; left:25%; right:25%; top:45%;" name="forgot" method="post"><br/>
<b>Enter the 6 Digit Number U recieved(if mail is valid) : </b><input type="text" name="check" size="6" />
<br/><br/><input type="submit" name="ok" value="Change password" />
</form>
<?php
if(isset($_REQUEST['ok']))
{
$n=$_SESSION['code'];
if($n==$_REQUEST['check'])
	header('Location:change_pw.php');
else
	echo "<b><br/><br/><font color='darkgreen'>InCorrect Code...Please Try Again!!!</font></b>";
}
?>

</div>
</body>
</html>
