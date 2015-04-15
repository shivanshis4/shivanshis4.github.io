<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php	
include('essential.html');
?>

<center><font color="#000033"><div style=" border:inset; position:absolute; left:25%; top:30%; right:30%; bottom:25%; background-color:#FF9966"><br/>
<b><br/><h1><form name="del_sub" action="del_sub.php" method="post"><br/>
<b>Select subject to be deleted : </b>
<?php

	$mail=$_SESSION['mail'];
	$name=$_SESSION['name'];
	$connect=mysql_connect("localhost","root","");
	 mysql_select_db("qpm");
	 $chk="select subject from subjects where mail='$mail'";
	 $chk=mysql_query($chk);
	 echo "<select name='sub'>";
	 while($row = mysql_fetch_array($chk))
	 {
	 	echo " <option> ".$row['subject']."</option> ";
	 }
	 echo "</select>";
?>


<br/><br/><input type="submit" name="ok" value="~~~Delete~~~" /><br />
<?php

	if(isset($_REQUEST['ok']))
	{
	 $sub=$_REQUEST['sub'];
	 $del1="DELETE FROM subjects where mail='$mail' and subject='$sub'";
	 $del2="DELETE FROM $name where subject='$sub'";
	 
	 if(!(mysql_query($del1,$connect) && mysql_query($del2,$connect)))
  	{
     echo "<h6> Something Went Wrong..</h6> ";
	 die();
  	}
		
	
	header('Location:del_sub.php');
	mysql_close();
	}
?>
</body>
</html>
