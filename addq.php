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

<center><font color="#000033"<div style=" border:inset; position:absolute; left:25%; top:30%; right:30%; bottom:25%; background-color:#0066CC"><br/>
<b><br/><h1><form name="sub" action="addq.php" method="post"><br/>
<b>Select subject : </b>
<?php

	$mail=$_SESSION['mail'];
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


<br/><br/><input type="submit" name="ok" value="Go" /><br />
<?php

	if(isset($_REQUEST['ok']))
	{
	    
	 	$_SESSION['subject']=$_REQUEST['sub'];
		
		header('Location:edit_del.php');
	}
?>

</form><a style="position:absolute; top:2%; left:65%;" href="manage_subjects.php"><small><< previous page</small></a><br /></h1></b></div></font></center>
</body>
</html>
