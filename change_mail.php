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

<b>Enter new name : </b><br /><br/>
<input type="text" size="50" name="mail">
<br/><br /><input type="submit" name="ok" value="Continue" /><br/><br/><br/>

<?php
if(isset($_REQUEST['ok']))
{
	$new_mail=$_REQUEST['mail'];
	if(!strlen($new_mail))
		echo "<font color='red'><b>Don't Leave the field Blank !!</b></font><br/><br/>";
	
	if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail))  
	{
 	  echo "<font color='red'><b><br/> Please Enter A Valid Mail Address!!! Spaces are not allowed.</b></font>";
	  die();  
    }
  
	 $connect=mysql_connect("localhost","root","");
	  mysql_select_db("qpm");
    $sql="UPDATE user SET mail = '$new_mail' WHERE mail = '$mail'" ;
	if(!(mysql_query($sql,$connect)))
  {
     echo " The UserName or Mail Address already in use ";
	 die();
  }
  $chk="select subject from subjects where mail='$mail'";
  $chk=mysql_query($chk);
  while($row = mysql_fetch_array($chk))
	 {
	$update="UPDATE subjects SET mail = '$new_mail' WHERE mail = '$mail'" ;
		$update=mysql_query($update);
	 }
  
  $_SESSION['mail']=$new_mail;
  echo "<font color='green'><b><br/>Your Mail Address is Successfully Changed.</b></font><a href='settings.php'>Go Back to setting Page</a>";
  

}
?>

</form>
</center>

</body>
</html>
