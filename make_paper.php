<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><link rel="shortcut icon" href="img/question-button.gif"/>
<title>Question_paper_Manager</title>
</head>

<body bgcolor="#FF6633">
<a href="home.php"><img style="position:absolute; border: left:2%; top:2%;" src="img/111150-glowing-green-neon-icon-business-home3.png" height="100px" width="100px" 	/></a>
<a href="settings.php"><img style="position:absolute; left:75%; top:1%; background-color:#330033" src="img/26969685-settings-button-cogwheel-gear-mechanism-change-or-reset-sign-default-setting-icon--Stock-Photo.jpg" height="100px" width="100px" border="1"/></a> 
<a href="logout.php"><img style="position:absolute; left:84%; top:5%;" src="img/public-cart-button-03-hi.png" width="185px" height="75px" /></a>
<div style=" background-color:#000099; color:#FFFFFF; position:absolute; top:1%; left:10%; height:100px; width:62%; border:double;"><h1><center> * * * Generate Question Paper * * * </center></h1></div><br /><br /> <b>
<div>
<?php
  $p=$_SESSION['paper'];
  $sheet=$_SESSION['sheet'];
  $clg=$_SESSION['clg'];
  $course=$_SESSION['course'];
  $time=$_SESSION['time'];
  $dept=$_SESSION['dept'];
  $sub=$_SESSION['sub'];
  $count=$_SESSION['count'];
  $connect=mysql_connect("localhost","root","");
  mysql_select_db("qpm");
  $name=$_SESSION['name'];
  $connect=mysql_connect("localhost","root","");
  mysql_select_db("qpm");
  $sql="SELECT * from $name WHERE subject='$sub'";
  $sql=mysql_query($sql);
  echo"<br/><br/><br/><br/><br/><br/>";
  echo '<form name="paper" method="post" action="make_paper.php" >';
  while($row = mysql_fetch_array($sql))
  {
	 	$id=$row['id'];
	 	$q=$row['question'];
		$a=$row['opt_a']; 
		$b=$row['opt_b'];
		$c=$row['opt_c'];
		$d=$row['opt_d'];
		$ans=$row['answer'];
		
		
		echo '<div style=" background:url(img/black.jpg); border:inset; width:60%; ">';
		echo '<b><font color="#990000"><i>
<br />
<table cellspacing="8px" align="center">
<tr><td>QuestionID : </td><td><textarea  style="background-color:#CCCCCC" name="d" rows="1" disabled="disabled" cols="5">'.$id.'</textarea></td></tr>
<tr><td>Question :</td><td><textarea  style="background-color:#CCCCCC" name="q'.$id.'" rows="4" disabled="disabled" cols="60" default= >'.$q.'</textarea></td></tr>
<tr><td>Option A :</td><td><textarea style="background-color:#CCCCCC" name="a'.$id.'" rows="2" disabled="disabled" cols="50">'.$a.'</textarea></td></tr>
<tr><td>Option B :</td><td><textarea  style="background-color:#CCCCCC" name="b'.$id.'" rows="2" disabled="disabled" cols="50">'.$b.'</textarea></td></tr>
<tr><td>Option C :</td><td><textarea  style="background-color:#CCCCCC" name="c'.$id.'" rows="2" disabled="disabled" cols="50">'.$c.'</textarea></td></tr>
<tr><td>Option D : </td><td><textarea  style="background-color:#CCCCCC" name="d'.$id.'" rows="2" disabled="disabled" cols="50">'.$d.'</textarea></td></tr>
<tr><td>Answer</td><td>'.$ans.'
</td>
</tr>
</table><br /></div><br/><br/>';
}

echo '<center><div style=" background:url(img/6f8c9e58446e1635b6cd0766ca2634149.jpg); color:lightgreen; border:inset; width:35%; position:absolute; left:63%; top:25%; "><table  cellspacing="8px" ><br/>';
for($x=1;$x<=$count;$x++)
{
	echo '<tr><td>Question '.$x.' :</td><td> <input type="text" style="background-color:#000066; color:#FFFFFF"  name="q'.$x.'"  size="3"/></td></tr>';
}

	echo '</table><br/><input type="submit" name="ok" value="Create Paper"/><br/><br/>';
	
	if(isset($_REQUEST['ok']))
	{
		
		for($x=1;$x<=$count;$x++)
		{	
			$ss="q".$x;
			$w=$_REQUEST['q'.$x];
	  		if(!strlen($w))
			{
				echo "Can't Leave any field Blank .";
				die();
			}
			$n=0;
			$chk="SELECT * from $name WHERE id='$w'";
			$chk=mysql_query($chk);
			while($row = mysql_fetch_array($chk))
				$n=1;
			if($n==0)
			{
				//$test="hello<br/>ss";
				echo "Question ID :".$_REQUEST['q'.$x] ." is not in Question Bank !! ";
				//echo $test;
				die();
			}	
				
		}	

		for($x=1;$x<=$count;$x++)
		{
			$_SESSION['q'.$x]=$_REQUEST['q'.$x];
			$i=$_REQUEST['q'.$x];
			$sql="SELECT * from $name WHERE subject='$sub' and id='$i'";
  			$sql=mysql_query($sql);
  
	 		while($row = mysql_fetch_array($sql))
	 		{	
	 			${'q'.$x}=$row['question'];
				${'a'.$x}=$row['opt_a']; 
				${'b'.$x}=$row['opt_b'];
				${'c'.$x}=$row['opt_c'];
				${'d'.$x}=$row['opt_d'];
				${'ans'.$x}=$row['answer'];
        	}
		}
		
		$paper = fopen($p, "w");
		
		$one="<br/>
		<pre><center>$clg<br/>***       ".$dept."        ***<br/><table width='100%'><tr><td align='left'>Subject Name : ".$sub."</td><td align='right'>".$course."</td><br/><br/></tr><tr><td align='left'>Duration :".$time."</td><td align='right'>No. of Questions :".$count."</td><br/><br/></tr></table></center>

_____________________________________________________________________________

Instructions :- 

      (1)  All Questions are Compulsory
      (2)  Please Read the question carefully before answering them
      (3)  All Questions Carry 1 Mark Each  
      (4)  Every Correct Answer will be awarded +1 Marks  
      (5)  Every wrong Anser will deduct -0.25 marks
      (6)  No extra time will be given at any cost


_____________________________________________________________________________";
fwrite($paper, $one);

for($x=1;$x<=$count;$x++)
{
$two="	
(".$x.") ".${'q'.$x}."
	(A) ".${'a'.$x}."	
	(B) ".${'b'.$x}."
	(C) ".${'c'.$x}."	
	(D) ".${'d'.$x};
	fwrite($paper, $two);
	
}
$three= "

 * * * * * * * * * *        END OF PAPER           * * * * * * * * * 

						  BEST OF LUCK :) :)		
</pre>		
		";
	fwrite($paper, $three);
    fclose($paper);

	
	
	$ans= fopen($sheet,"w");
		$one="
		<pre><center>$clg<br/>***       ".$dept."        ***<br/><br/><table width='100%'><tr><td align='left'>Subject Name : ".$sub."</td><td align='right'>".$course."</td></tr><tr></table></center>
_____________________________________________________________________________
                ***       A N S W E R   S H E E T        ***            
_____________________________________________________________________________
";	
	fwrite($ans, $one);


for($x=1;$x<=$count;$x++)
{
$two="	
	(".$x.") .  ".${'ans'.$x}."<br/>";
	fwrite($ans, $two);
	

}
$three= "

 * * * * * * * * * *        THE END           * * * * * * * * * 

</pre>		
		";
fwrite($ans,$three);


	  fclose($ans);	
	
		echo '</div></center>';
		echo '</form>';

mysql_close();

	header("Location:print_paper.php");
}	
?>
</div>
</b></center>

</body>
</html>
