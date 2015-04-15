<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body background="img/questions.jpg">
<center>
<form style=" position:absolute; left:25%; right:25%; top:45%;" name="change_pw" action="change_pw.php" method="post">
<tr><td>Enter new Password : </td><td><input type="password" name="pw1"  size="30"/></td></tr><br/><br/>
<tr><td> Retype the Password : </td><td><input type="password" name="pw2"  size="30"/></td></tr></table><br /><br />
<input type="submit" name="ok" value="Continue" ><br /></i>
</b></font><br/><br/><font color="#FF0000"><b>
<?php
if(isset($_REQUEST['ok']))
{
	$p1=$_REQUEST['pw1'];
    $p2=$_REQUEST['pw2'];	
	$mail=$_SESSION['name'];
	if(!(strlen($p1) && strlen($p2)))
  	{
     echo " Write new Password in both fields !!! ";
	 die();
  	}
	if(strlen($p1)<6)
  	{
     echo "Ur Password is too short.Please enter a password with atleast length six.";
	 die();
  	}
  	if($p1!=$p2)
  	{
     echo "Please enter same Passwords ! ";
	 die();
  	}
	$p1=strrev(trim(md5($p1)));
  	$connect=mysql_connect("localhost","root","");
  	mysql_select_db("qpm");
	if(! $connect )
	{
  		die('Could not connect: ' . mysql_error());
	 }
	$sql="UPDATE user SET password = '$p1' WHERE mail = '$mail'" ;
  	if(!mysql_query($sql,$connect))
  	{
     echo " Something Went Wrong :( ";
	 die();
  	}
	
	header('Location:pw_success.html');
	
}
?>

</font></b>
</form>
</body>
</html>
