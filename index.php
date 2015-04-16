<?php

session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><link rel="shortcut icon" href="img/question-button.gif"/>
<title>Question_paper_Manager</title>
</head>

<body style="background-attachment:fixed; background-image:url(img/title.png); background-repeat:no-repeat;">
<div style="width:100%; height:25%; top:0px; left:0px; right:0px; bottom:0px; position:absolute; background-repeat:no-repeat;"/>
<div style="position:absolute; 	top:150px; bottom:50px; width:50%; height:80%; background-color:#FF9999">
<center><br /><b>Are you a new user???<br /><br/>Click on the image to Sign Up:</b></center>
<a href="sign_up.php">
<img border="2" src="img/depositphotos_20441135-3D-man-with-Question-Mark.png" align="middle" alt="New_user_image" height="150" width="150" style="border:inset; position:absolute; top:90px; left:260px;" name="new"></a><br/><br/>
<a href="about.html"><img src="img/can-stock-photo_csp6514589.jpg" height="75" width="210" style="position:absolute; top:300px; left:230px;"></a>
</div>
<div style="position:absolute; top:150px; bottom:50px; right:0px; width:50%; height:80%;  background-color:#3399CC ">
<center><br/><b>Existing User</b></center>
<img src="img/3d-business-man-green-question-mark-17814384.png" border="2" align="middle" alt="New_user_image" height="180" width="165" style=" border:inset; position:absolute; top:50px; left:260px;" name="new"></a><br/><br/>
<center>
<form name="signin" method="post" action="index.php">
<br /><br /><br /><br /><br /><br /><br/>
<table><tr><td>Enter Ur E-mail id : </td><td> <input type="text" name="t1"  size="30"/></td><br /></tr><br /><br />
<tr><td>Enter Ur Password :</td><td><input type="password" name="t2" size="30"/></td></tr></table><br /><?php
if(isset($_REQUEST['ok']))
{
$id=$_REQUEST['t1'];
$pw=$_REQUEST['t2'];
$n=0;
   if(!(strlen($id) && strlen($pw)))
   { 
      echo "<font color='red'> Please Fill All Fields!!!</font>";
	  $n=1;
   }
   
   $pw=strrev(trim(md5($pw)));
   
   $connect=mysql_connect("localhost","root","");
   mysql_select_db("qpm");
   $sql="SELECT * FROM user WHERE mail='$id' AND password = '$pw' ";
   $cn=mysql_query($sql,$connect);
   if($field = mysql_fetch_array($cn))
   {
    $name=$field['user'];
    $_SESSION['name']=$name;
	$_SESSION['mail']=$id;
	

	header('Location:home.php');	
	die();
   }
   if($n==0)
   echo "<font color='red'> Invalid E-mail id or Password!!!</font>";
   mysql_close();
}

?><br />
<input type="submit" name="ok" value="Log In" ><br /><br/>

<a href="forgot.php">forgot Password?</a>
</form>
</center>
</div>


</div>


</body>
</html>
