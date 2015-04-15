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
<?php

    $connect=mysql_connect("localhost","root","");
    mysql_select_db("qpm");
	$i=$_SESSION['i'];
	$name=$_SESSION['name'];
	$sub=$_SESSION['subject'];
	$sql="SELECT * from $name WHERE subject='$sub' and id='$i'";
  $sql=mysql_query($sql);
  
	 while($row = mysql_fetch_array($sql))
	 {
	 	$q=$row['question'];
		$a=$row['opt_a']; 
		$b=$row['opt_b'];
		$c=$row['opt_c'];
		$d=$row['opt_d'];
		$ans=$row['answer'];
   	 }
?>
	<div style=" border:inset; position:absolute; left:20%; top:23%; right:30%; bottom:15%; background-color:#330066">
<form name="add_q" method="post" action="edit_q.php" ><b><font color="#0066FF"><i>
<br />
<table cellspacing="8px" align="center"><tr><td>
QuestionID : </td><td><textarea name="d" rows="1" disabled="disabled" cols="5"><?php echo $i; ?></textarea></td></tr>
<tr><td>Question :</td><td><textarea name="q" rows="4" cols="60" ><?php echo $q; ?></textarea></td></tr>
<tr><td>Option A :</td><td><textarea name="a" rows="2" cols="50"><?php echo $a; ?></textarea></td></tr>
<tr><td>Option B :</td><td><textarea name="b" rows="2" cols="50"><?php echo $b; ?></textarea></td></tr>
<tr><td>Option C :</td><td><textarea name="c" rows="2" cols="50"><?php echo $c; ?></textarea></td></tr>
<tr><td>Option D : </td><td><textarea name="d" rows="2" cols="50"><?php echo $d; ?></textarea></td></tr>
<tr><td>Answer :</td><td><select name="ans" >
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
</select>
</td>
<td><input type="submit" name="ok" value="~~~ Save ~~~" ></td></tr>
</table><br /></i></font></b>
<?php
if(isset($_REQUEST['ok']))
{
  $q=$_REQUEST['q'];
  $a=$_REQUEST['a'];
  $b=$_REQUEST['b'];
  $c=$_REQUEST['c'];
  $d=$_REQUEST['d'];
  $ans=$_REQUEST['ans'];
    
  if(!(strlen($q) && strlen($a) && strlen($b) && strlen($c) && strlen($d) && strlen($ans)))
  {
     echo "<center>It Is ComPulsory To fill All Fields!!!</center>";
	 die();
  }
   $connect=mysql_connect("localhost","root","");
	  mysql_select_db("qpm");
  $sql="UPDATE $name SET id='$i',question='$q',opt_a='$a',opt_b='$b',opt_c='$c',opt_d='$d',answer='$ans' WHERE id='$i'" ;
   echo "<font color='lightgreen'><b>";
   if(!(mysql_query($sql,$connect)))
  {
     echo "<center>Something Went Wrong !!</center>	";
	 die();
  }
  echo "<center>Editted Question is saved in Question bank.</center>";
  echo "</b></font>";
  header('Loaction:add_q.php');
  echo'<a style="position:absolute; color:lightgreen; top:2%; left:65%;" href="manage_subjects.php"><b><h3><< previous page</h3></b></a>';
}
?>
</form>
</div>

</body>
</html>
