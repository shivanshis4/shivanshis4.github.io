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
<?php	
include('essential.html');
?>
<div style="background-color:#33FF99; position:absolute; left:15%; top:30%; width:60%;"><font face="Courier New, Courier, monospace" size="5" color="#660533">
<?php
echo "<table name='sub_list' border='2' width='100%' style='border:dashed;'><th>Subjects</th><th>Available Questions</th>";

	 $mail=$_SESSION['mail'];
	 $name=$_SESSION['name'];
	 $connect=mysql_connect("localhost","root","");
	 mysql_select_db("qpm");
	 $chk="select subject from subjects where mail='$mail'";
	 $chk=mysql_query($chk);
	 echo "<b>";
	 while($row = mysql_fetch_array($chk))
	 {
	 	echo "<tr>";
	 	echo " <td> ".$row['subject']."</td> ";
		$r=$row['subject'];
		$sql="SELECT *  from $name where subject='$r'";
		$sql=mysql_query($sql);
		$n=0;
		while($field = mysql_fetch_array($sql))
	 		$n++;
		echo "<td>".$n."</td>";
		echo "</tr>";
	 }
	 echo "</table>";
?></font></div>
</body>
</html>
