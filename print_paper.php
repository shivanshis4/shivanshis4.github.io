<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><link rel="shortcut icon" href="img/question-button.gif"/>
<title>Question_paper_Manager</title>
</head>
<body background="img/question-mark (1).png" style="background-repeat:no-repeat; width:1350px;">

<a href="home.php"><img style="position:absolute; border: left:2%; top:2%;" src="img/111150-glowing-green-neon-icon-business-home3.png" height="100px" width="100px" 	/></a>
<a href="settings.php"><img style="position:absolute; left:2%; bottom:2%; background-color:#330033" src="img/26969685-settings-button-cogwheel-gear-mechanism-change-or-reset-sign-default-setting-icon--Stock-Photo.jpg" height="100px" width="100px" border="1"/></a> 
<a href="logout.php"><img style="position:absolute; left:84%; bottom:5%;" src="img/public-cart-button-03-hi.png" width="185px" height="75px" /></a>
<div style="color:#330033;position:absolute; top:40%; left:18%; height:100px; width:62%;"><center>
<h1> * * * Thank you for using Question Paper Manager * * * </h1><br/><b>
Question Paper is saved to Folder : papers<br>
Answer Sheet is saved to Folder : Answers
</b></center></div> <b>
<div>
<center>
<form method="post" action="print_paper.php">
<input type="submit" name="paper" value="View Question Paper" > <input type="submit" name="answers" value="View Answer Sheet" >

</form>
</center>


<?php
$p=$_SESSION['paper'];
$paper= fopen($p,"r");
$sheet=$_SESSION['sheet'];
$ans= fopen($sheet,"r");
if(isset($_REQUEST['paper']))
{
	echo '<br/><div style="background-color:#FFFFFF; width:60%; align:center; position:absolute; left:20%; border:outset;">'	;
	echo '<a href="print_paper.php" ><< GO BACK TO PREVIOUS PAGE</a>';
	echo fread($paper,filesize($p));
	echo'</div>';
	fclose($ans);	
}
if(isset($_REQUEST['answers']))
{
	echo '<br/><div style="background-color:#FFFFFF; width:60%; align:center; position:absolute; left:20%; border:outset;">'	;
	echo '<a href="print_paper.php"><< GO BACK TO PREVIOUS PAGE</a>';
	echo fread($ans,filesize($sheet));
	echo'</div>';
	fclose($ans);	
}

?>