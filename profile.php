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
	$mail=$_SESSION['mail'];
	$name=$_SESSION['name'];
	
	$connect=mysql_connect("localhost","root","");
  	mysql_select_db("qpm");
	$dept="";
	$sql="SELECT * from user where mail='$mail'";
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
	 	$dept=$row['dept'];
		$mail=$row['mail'];
		$name=$row['user'];
	 }
	 
	include('essential.html');

	 echo "<div style=' border:groove; position:absolute; left:25%; top:35%; right:30%; bottom:25%; background-color:#006600'><center><br/><br/><font color='lightblue'><b><br/><br/>User Name : $name</b></font><br/><br/>";
	 echo "<font color='lightblue'><b>e-mail ID : $mail</b></font><br/><br/>";
	 echo "<font color='lightblue'><b>Department : $dept</b></font><br/><br/></center>";
     echo "<br/><br/></div>";
	 
?>

</body>
</html>
