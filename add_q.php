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
<div style=" border:inset; position:absolute; left:20%; top:23%; right:30%; bottom:15%; background-color:#990000">
<form name="add_q" method="post" action="add_q.php" ><b><font color="#0066FF"><i>
<br />
<table cellspacing="8px" align="center">
<tr><td>Question :</td><td><textarea name="q" rows="4" cols="60" ></textarea></td></tr>
<tr><td>Option A :</td><td><textarea name="a" rows="2" cols="50"></textarea></td></tr>
<tr><td>Option B :</td><td><textarea name="b" rows="2" cols="50"></textarea></td></tr>
<tr><td>Option C :</td><td><textarea name="c" rows="2" cols="50"></textarea></td></tr>
<tr><td>Option D : </td><td><textarea name="d" rows="2" cols="50"></textarea></td></tr>
<tr><td>Answer :</td><td><select name="ans" >
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
</select>
</td>
<td><input type="submit" name="ok" value="~~~Add~~~" ></td></tr>
</table><br />


<?php
if(isset($_REQUEST['ok']))
{
  $q=$_REQUEST['q'];
  $a=$_REQUEST['a'];
  $b=$_REQUEST['b'];
  $c=$_REQUEST['c'];
  $d=$_REQUEST['d'];
  $ans=$_REQUEST['ans'];
  $sub=$_SESSION['subject'];
  $name=$_SESSION['name'];
  
   if(!(strlen($q) && strlen($a) && strlen($b) && strlen($c) && strlen($d) && strlen($ans)))
  {
     echo "<center>It Is ComPulsory To fill All Fields!!!</center>";
	 die();
  }
   $connect=mysql_connect("localhost","root","");
	  mysql_select_db("qpm");
  $sql="insert into $name value('','$sub','$q','$a','$b','$c','$d','$ans')";
   if(!(mysql_query($sql,$connect)))
  {
     echo "<center>Duplicates Are Not Allowed !!</center>	";
	 die();
  }
  echo "<center>Your question is saved in Question bank.</center>";
  header('Loaction:add_q.php');
}
?></i></font></b></form>
</div>
</body>
</html>
