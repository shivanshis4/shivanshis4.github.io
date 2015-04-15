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
<center><font color="#00FF66"><div style=" border:inset; position:absolute; left:25%; top:30%; right:30%; bottom:25%; background-color:#990000"><br/>
<b><br/><h1><form name="sub" action="add_sub.php" method="post"><br/>
<b>Enter new subject : </b><input type="text" name="sub" size="30" />
<br/><br/><input type="submit" name="ok" value="Add Subject" /><br />

<?php
if(isset($_REQUEST['ok']))
{
	$sub=$_REQUEST['sub'];
	$mail=$_SESSION['mail'];
	 if(!(strlen($sub)))
  	{
     echo " <h6>Cannot Leave Subject with no name!!! </h6>";
	 die();
  	}
	
	if(!preg_match("/^[a-zA-Z0-9 ]*$/",$sub))
  	{
 	  echo "<h6> Please Enter Subject name Containing text and digits only!!!</h6>";
	  die();
	}
	$connect=mysql_connect("localhost","root","");
	 mysql_select_db("qpm");
	 $chk="select * from subjects where mail='$mail' and subject='$sub'";
	 $chk=mysql_query($chk);
	  while($row = mysql_fetch_array($chk))
	 {
	 	echo "<h6>Subject Already Exists!!!</h6>";
		die();
	 }
	 
	 $sql="insert into subjects value('$mail','$sub')";
 
  	if(!(mysql_query($sql,$connect)))
  	{
     echo "<h6> Something Went Wrong..</h6> ";
	 die();
  	}
	
	
	echo "<h6> Subject Added Successfully!!!</h6>";
}?><br/>

</form><a style="position:absolute; top:2%; left:65%;" href="manage_subjects.php"><small><< previous page</small></a><br />
<br /></h1></b>


</div></center>
</body>
</html>
<?php
mysql_close();
?>