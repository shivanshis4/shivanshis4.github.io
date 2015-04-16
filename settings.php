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

<form style=" position:absolute; left:5%; right:10%; top:10%;" name="setting" action="settings.php" method="post"><br/>
<b>Select What do You Want : </b>
<select name="set">
<option>Change My Name</option>
<option>Change My Mail Address</option>
<option>Change My Password</option>
</select>
<br/><br /><input type="submit" name="ok" value="Continue" />
</form>
<div  style="position:absolute; left:75%; top:6%;"><center><a href="profile.php"><img border="2" src="img/new_user.png" width="110px" height=125px" /></a><br /><b>View Profile<br/></b></a></center></div>

<a href="home.php"><img src="img/111150-glowing-green-neon-icon-business-home3.png" width="150px" height="150px"   style="position:absolute; left:85%; top:5%;" />
	<a href="logout.php"><img style="position:absolute; left:84%; top:85%;" src="img/public-cart-button-03-hi.png" width="185px" height="75px" /></a>
<?php
if(isset($_REQUEST['ok']))
{
  $connect=mysql_connect("localhost","root","");
  mysql_select_db("qpm");
  $val=$_REQUEST['set'];
 
  if($val=="Change My Name")
  	header('Location:change_name.php');
  else
	if($val=="Change My Mail Address")
	header('Location:change_mail.php');
  else
	if($val=="Change My Password")
	header('Location:change_pw2.php');
	
}
?>
</body>
</html>
