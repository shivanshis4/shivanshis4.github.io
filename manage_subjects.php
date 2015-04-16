<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><link rel="shortcut icon" href="img/question-button.gif"/>
<title>Question_paper_Manager</title>
</head>

<body><b>

<?php	
include('essential.html');
?>

<div style="position:absolute; left:9%; top:48%;" >
<a href="add_sub.php"><img style="border-radius: 150px;	-webkit-border-radius: 150px; -moz-border-radius: 150px;" src="img/question-mark.png" height="150px" width="150px" border="2" /></a><br/><br/> -----Add Subjects----- <br/>
</div>

<div style="  position:absolute; left:27%; top:25%;" >
 <a href="add.php"><img style="border-radius: 150px;	-webkit-border-radius: 150px; -moz-border-radius: 150px;"  src="img/10Questions.png"  height="150px" width="150px" border="2" /></a><br/><br/>-----Add Questions-----<br/>
</div>

<div style=" position:absolute; left:47%; top:48%;">
<a href="del_sub.php"><img style="border-radius: 150px;	-webkit-border-radius: 150px;	-moz-border-radius: 150px;" src="img/download.png" height="150px" width="150px" border="2" /></a><br/><br/>-----Delete Subject-----<br/></div>

<div style="position:absolute; left:67%; top:25%;">
<a href="addq.php"><img style="border-radius: 150px;	-webkit-border-radius: 150px;	-moz-border-radius: 150px; " src="img/Aroche-Delta-File-Help.ico" height="150px" width="150px" border="2" /></a><br/><br/>-----Edit/Delete Questions----- <br/>
</div>

<div> 
</div>
</b>
</body>
</html>
 