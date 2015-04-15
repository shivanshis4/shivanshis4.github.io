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
<center>

<div style="background:url(img/anu.jpg); position:absolute; left:10%; top:25%; width:70%; height:60%; border:dotted;">
<form name="paper" method="post" action="paper.php" ><b><i>

<table cellspacing="8px" align="center"><tr><td>Enter Institution Name : </td><td> <input type="text" name="clg"  size="70"/></td></tr>
<tr><td>Enter Course/Class :</td><td><input type="text" name="course"  size="30"/><font color="#006600">e.g. B.Tech. ( IV Year )</font></td></tr>
<tr><td>Enter Duration of Examination :</td><td><input type="text" name="time" size="20"><font color="#006600">e.g. 90 Minutes or 2 hours</font></td>
<tr><td>Select Ur Department :</td><td><select name="dept">
<option>Computer Science & Engineering</option>
<option>Mechanical Engineering</option>
<option>Electronics and communication</option>
<option>Polytechnic</option>
<option>Others</option></select>
</td></tr>
<tr><td>Select subject : </td><td><br />
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
</td></tr>

<tr><td>Enter Paper Name : </td><td> <input type="text" name="paper"  size="30"/><font color="#006600">It'll be used as FileName. Use underscore( _ ) instead of spaces.</font></td></tr>
<tr><td>Enter the No. of Questions :</td><td><input type="text" name="count"  size="4"/></td></tr>

<tr><td></td>
<br/>
<td align="right">
<input type="submit" name="ok" value="Go To Select Questions" style="background-color:#99FF99;" ></td>
<div style="position:absolute; left:20%; top:85%; width:60%; color:#CC0000; font-size:4">
<?php

if(isset($_REQUEST['ok']))
{
  $clg=$_REQUEST['clg'];
  $course=$_REQUEST['course'];
  $time=$_REQUEST['time'];
  $dept=$_REQUEST['dept'];
  $sub=$_REQUEST['sub'];
  $paper=$_REQUEST['paper'];
  $count=$_REQUEST['count'];
  
  if(!(strlen($clg) && strlen($course) && strlen($time) && strlen($dept) && strlen($sub) && strlen($paper) && strlen($count)))
  {
     echo " It Is ComPulsory To fill All Fields!!! ";
	 die();
  }
  if(!preg_match("/^[a-zA-Z0-9_]*$/",$paper))
  {
 	  echo " Please Enter A Valid Name Containing characters,digits and underscores only!!!";
	  die();  
  }
  
	 $mail=$_SESSION['mail'];
	 $name=$_SESSION['name'];
	 $connect=mysql_connect("localhost","root","");
	 mysql_select_db("qpm");
	
	 $sql="SELECT *  from $name where subject='$sub'";
	 $sql=mysql_query($sql);
	 $n=0;
	 while($field = mysql_fetch_array($sql))
	 		$n++;
	 if ($n<$count)
	 {
	 	echo "You don't have $count Questions in $sub";
		die();
	 }	
	 if (!file_exists("papers/"))
	 {
	 	if (!mkdir("papers/", 0777, true)) 
 		   die('Failed to create folder : papers');
	 }
	 if (!file_exists("answers/"))
	 {
	 	if (!mkdir("answers/", 0777, true)) 
 		   die('Failed to create folder : answers');
	 }
	 
	 $sheet="answers/answer_".$paper.".doc";
	 $p="papers/".$paper.".doc";
	 
	 if(file_exists($p) || file_exists($sheet))
	 	die("File Already Exists! Please choose a different paper name !!");
	 if(!($myfile = fopen($p, "x")))
	 {
	 	die("Something went wrong!!");
	}
	 fclose($myfile);
	  if(!($myfile = fopen($sheet, "x")))
	 {
	 	die("Something went wrong!!");
	}
	 fclose($myfile);
	$_SESSION['paper']=$p;
	$_SESSION['sheet']=$sheet;
	 $_SESSION['clg']=$clg;
  $_SESSION['course']=$course;
  $_SESSION['time']=$time;
  $_SESSION['dept']=$dept;
  $_SESSION['sub']=$sub;
  $_SESSION['count']=$count;
	 header('Location:make_paper.php');
}
?></div></tr><br />
</tr></table></i></b></form><br/><br/>
</div></center>
</body>
</html>
