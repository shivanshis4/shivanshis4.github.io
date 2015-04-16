<?php

session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><link rel="shortcut icon" href="img/question-button.gif"/>
<title>Question_paper_Manager</title>
</head>

<body>
<div style="background:url(img/question1.png); background-repeat:no-repeat; position:absolute; left:0px; bottom:-15px; top:0px; width:100%; height:100%;"/>
<div  style="position:absolute; left:75%; top:6%;"><center><a href="profile.php"><img border="2" src="img/new_user.png" width="110px" height=125px" /></a><br /><b>View Profile<br/></b></a></center></div>

<a href="home.php"><img src="img/111150-glowing-green-neon-icon-business-home3.png" width="150px" height="150px"   style="position:absolute; left:85%; top:5%;" />
	<a href="logout.php"><img style="position:absolute; left:84%; top:85%;" src="img/public-cart-button-03-hi.png" width="185px" height="75px" /></a>

<center>
<form style="position:absolute; top:10%; left:4%">

<?php
$mail=$_SESSION['mail'];
echo "<font color='blue'><b>Your Current mail Adreess is : $mail</b></font><br/><br/>";
?>

<tr><td>Enter old Password : </td><td><input type="password" name="pw1"  size="30"/></td></tr><br/><br/>
<tr><td>Enter new Password : </td><td><input type="password" name="pw2"  size="30"/></td></tr><br/><br/>
<tr><td> Retype the Password : </td><td><input type="password" name="pw3"  size="30"/></td></tr></table><br /><br />
<input type="submit" name="ok" value="Continue" ><br /></i>
</b></font><br/><br/><font color="#FF0000"><b>
<?php
if(isset($_REQUEST['ok']))
{
	$connect=mysql_connect("localhost","root","");
  	mysql_select_db("qpm");
	$pw="";
	$sql="SELECT password from user where mail='$mail'";
  	if(!mysql_query($sql,$connect))
  	{
     echo " Something Went Wrong :( ";
	 die();
  	}
	
	
	if(! $connect )
	{
  		die('Could not connect: ' . mysql_error());
	 }
	 $sql=mysql_query($sql);
	 while($row = mysql_fetch_array($sql))
	 {
	 	$pw=$row['password'];

	 }
	 
	$p1=$_REQUEST['pw1'];
	$p1=strrev(trim(md5($p1)));
    $p2=$_REQUEST['pw2'];	
	$p3=$_REQUEST['pw3'];
	
	echo "<font color='green'><b>";
	if($pw!=$p1)
		echo "This is not your old password -_- ";
	else
	if(!(strlen($p2) && strlen($p3)))
  	{
     echo " Write new Password in both fields !!! ";
	 die();
  	}
	else
	if(strlen($p1)<6)
  	{
     echo "Ur Password is too short.Please enter a password with atleast length six.";
	 die();
  	}
	else
  	if($p2!=$p3)
  	{
     echo "Please enter same Passwords ! ";
	 die();
  	}
  else
  {
	$p2=strrev(trim(md5($p2)));
	$sql="UPDATE user SET password = '$p2' WHERE mail = '$mail'" ;
  	if(!mysql_query($sql,$connect))
  	{
     echo " Something Went Wrong :( ";
	 die();
  	}
	echo "</font></b>";
    echo "<font color='green'><b><br/>Your Password is Successfully Changed.</b></font><a href='settings.php'>Go Back to setting Page</a>";
  }

}
?>

</form>
</center>

</body>
</html>
