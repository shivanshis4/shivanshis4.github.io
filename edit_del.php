<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><link rel="shortcut icon" href="img/question-button.gif"/>
<title>Question_paper_Manager</title>


</head>

<body bgcolor="#0033CC">
<a href="home.php"><img style="position:absolute; border: left:2%; top:2%;" src="img/111150-glowing-green-neon-icon-business-home3.png" height="100px" width="100px" 	/></a>
<a href="settings.php"><img style="position:absolute; left:75%; top:1%; background-color:#330033" src="img/26969685-settings-button-cogwheel-gear-mechanism-change-or-reset-sign-default-setting-icon--Stock-Photo.jpg" height="100px" width="100px" border="1"/></a> 
<a href="logout.php"><img style="position:absolute; left:84%; top:5%;" src="img/public-cart-button-03-hi.png" width="185px" height="75px" /></a>
<div style="background-image:url(img/437563.png); position:absolute; top:1%; left:10%; height:100px; width:62%; border:double;"><center> <b>
<form name="edit_del" action="edit_del.php" method="post"><pre>
<h2><font color="#00FF00">  Enter the ID of the Question :   </font><input type="text" name="i" size="4" style="color:#0000FF;background-color:#75BAFF" />     <input type="submit" name="edit" value="--- EdIt ---" OnClick="edit()" />     <input type="submit" name="del" value="--- DeLeTe ---" onclick="del()" /></h2></pre>
<?php
if(isset($_REQUEST['edit']))
{
	$_SESSION['i']=$i=$_REQUEST['i'];
	$connect=mysql_connect("localhost","root","");
    mysql_select_db("qpm");
	$name=$_SESSION['name'];
	$sub=$_SESSION['subject'];
	$sql="SELECT * from $name WHERE id='$i'";
	$n=0;
	if(!(mysql_query($sql,$connect)))
  	{
     echo "<h6><font color='#330033'>Something Went Wrong. </font></h6> ";
	 die();
  	}
	$sql=mysql_query($sql);
	  while($row = mysql_fetch_array($sql))
	 	$n=1;
	
	
	if($n==1)
		header('Location:edit_q.php');
	else
	echo "<font color='#330033'>Question ID Does not Exist !!</font>";
	
	
}

if(isset($_REQUEST['del']))
{
	$_SESSION['i']=$i=$_REQUEST['i'];
	$connect=mysql_connect("localhost","root","");
    mysql_select_db("qpm");
    $name=$_SESSION['name'];
	$sub=$_SESSION['subject'];
	$n=0;
	$sql="SELECT * from $name WHERE id='$i'";
	$sql=mysql_query($sql);
	  while($row = mysql_fetch_array($sql))
	 	$n=1;
	$sql="DELETE from $name WHERE id='$i'";
	if(!(mysql_query($sql,$connect)))
  	{
     echo "<h6><font color='#330033'>Something Went Wrong. </font></h6> ";
	 die();
  	}
	if($n==1)
		echo "<font color='#330033'>Question deleted Successfully !!</font>";
	else
	echo "<font color='#330033'>Question ID Does not Exist !!</font>";
	
}

?></form></b></center>
</div>
<?php

  $connect=mysql_connect("localhost","root","");
  mysql_select_db("qpm");
  $name=$_SESSION['name'];
  $sub=$_SESSION['subject'];
  $connect=mysql_connect("localhost","root","");
  mysql_select_db("qpm");
  $sql="SELECT * from $name WHERE subject='$sub'";
  $sql=mysql_query($sql);
  echo"<br/><br/><br/><br/><br/><br/>";
	 while($row = mysql_fetch_array($sql))
	 {
	 	$id=$row['id'];
	 	$q=$row['question'];
		$a=$row['opt_a']; 
		$b=$row['opt_b'];
		$c=$row['opt_c'];
		$d=$row['opt_d'];
		$ans=$row['answer'];
		
		echo '<div style=" background:url(img/af.gif); border:inset; left:15%; right:25%;">';
		echo '<form name="add_q" method="post" action="add_q.php" ><b><font color="#990000"><i>
<br />
<table cellspacing="8px" align="center">
<tr><td>QuestionID : </td><td><textarea  style="background-color:#75BAFF" name="d" rows="1" disabled="disabled" cols="5">'.$id.'</textarea></td></tr>
<tr><td>Question :</td><td><textarea  style="background-color:#75BAFF" name="q'.$id.'" rows="4" disabled="disabled" cols="60" default= >'.$q.'</textarea></td></tr>
<tr><td>Option A :</td><td><textarea style="background-color:#75BAFF" name="a'.$id.'" rows="2" disabled="disabled" cols="50">'.$a.'</textarea></td></tr>
<tr><td>Option B :</td><td><textarea  style="background-color:#75BAFF" name="b'.$id.'" rows="2" disabled="disabled" cols="50">'.$b.'</textarea></td></tr>
<tr><td>Option C :</td><td><textarea  style="background-color:#75BAFF" name="c'.$id.'" rows="2" disabled="disabled" cols="50">'.$c.'</textarea></td></tr>
<tr><td>Option D : </td><td><textarea  style="background-color:#75BAFF" name="d'.$id.'" rows="2" disabled="disabled" cols="50">'.$d.'</textarea></td></tr>
<tr><td>Answer</td><td>'.$ans.'
</td>
</tr>
</table><br /></form>';
		echo '</div><br/><br/>';
}
mysql_close();
?>
</body>
</html>
