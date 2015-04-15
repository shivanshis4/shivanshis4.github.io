
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="img/Zerode-Plump-Document-help (1).ico"/>
<title>SiGn Up</title>
</head>

<body  background="img/question_mark.png" style="background-repeat:no-repeat;">
<center>
<font color="#663300" face="Courier New, Courier, monospace"><h1><br/><b><big><u>Registration Page</u></big></b></h1></font>
<form name="signup" method="post" action="sign_up.php" ><b><font color="#990066"><i>
<br />
<table cellspacing="8px" align="center"><tr><td>Enter Ur Name : </td><td> <input type="text" name="name"  size="30"/><font color="#006600">Please use Capitalization instead of space e.g. ExampleUser</font></td><br /></tr><br /><br />
<tr><td>Enter Ur E-mail Id :</td><td><input type="text" name="id"  size="30"/></td></tr>
<tr><td>Enter Ur Date of Birth :</td><td><select name="date">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option></select> -
<select name="m">
<option>January</option>
<option>February</option>
<option>March</option>
<option>April</option>
<option>May</option>
<option>June</option>
<option>July</option>
<option>Aug</option>
<option>September</option>
<option>October</option>
<option>November</option>
<option>December</option></select>-
<input type="text" name="year"  size="4"/>
</td></tr>
<tr><td>Select Ur Department :</td><td><select name="dept">
<option>Computer Science & Engineering</option>
<option>Mechanical Engineering</option>
<option>Electronics and communication</option>
<option>Polytechnic</option>
<option>Others</option></select>
</td></tr>
<tr><td>Enter Ur Password :</td><td><input type="password" name="pw1"  size="30"/><font color="#006600"> Use a strong password with mininmum length 6</font></td></tr>
<tr><td>Retype Ur Password :</td><td><input type="password" name="pw2"   size="30"/></td></tr></table><br /><br />
<input type="submit" name="ok" value="SignUp" ><br /></i>
</b></font></form><br/><br/><font color="#FF0000">

<?php

if(isset($_REQUEST['ok']))
{
  $name=$_REQUEST['name'];
  $id=$_REQUEST['id'];
  $a=$_REQUEST['date'];
  $b=$_REQUEST['m'];
  $c=$_REQUEST['year'];
  $dept=$_REQUEST['dept'];
  $p1=$_REQUEST['pw1'];
  $p2=$_REQUEST['pw2'];	
  $date=$c."-".$b."-".$a;
  if(!(strlen($name) && strlen($id) && strlen($c) && strlen($dept) && strlen($p1) && strlen($p2)))
  {
     echo " It Is ComPulsory To fill All Fields!!! ";
	 die();
  }
 
   if(!preg_match("/^[a-zA-Z0-9]*$/",$name))
  {
 	  echo " Please Enter A Valid Name Containing characters and digits only!!!";
	  die();  
  }
  
   if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$id))
  {
      
	  echo " Please Enter A Valid E-mail address!!!";
	  die();  
  }
  
   /* if(!preg_match("/^[0-9]{10}/",$ph))
  {
      echo " Please Enter A ten Digit Contact Number!!!";
	  die();  
  }*/
  if(strlen($p1)<6)
  {
     echo "Ur Password is too short.Please enter a password with atleast length six.";
	 die();
  }
  if($p1!=$p2)
  {
     echo "Please enter same Passwords ! ";
	 die();
  }
   if(!preg_match("/^[a-zA-Z0-9+&@#\/%?=~_|!:,.;]*$/",$p1))
  {
      echo " Please Enter valid Password!!!";
	  die();  
  }
  
  
  $p1=strrev(trim(md5($p1)));
	  $connect=mysql_connect("localhost","root","");
	  mysql_select_db("qpm");
  $sql="insert into user value('$name','$id','$date','$dept','$p1')";
 
  if(!(mysql_query($sql,$connect)))
  {
     echo " The UserName or Mail Address already in use ";
	 die();
  }
       
  $acc=" CREATE TABLE $name
  (
	id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	subject VARCHAR( 30 ) NOT NULL ,
	question VARCHAR( 300 ) NOT NULL ,
	opt_a VARCHAR( 300 ) NOT NULL ,
	opt_b VARCHAR( 300 ) NOT NULL ,
	opt_c VARCHAR( 300 ) NOT NULL ,
	opt_d VARCHAR( 300 ) NOT NULL ,
	answer TEXT NOT NULL ,
	UNIQUE(id)
)";
  if(!(mysql_query($acc,$connect)))
  {
     echo " Table not created either due to error or it already exists !!! ";
	 die();
  }	
  $_SESSION['name']=$name;
  header('Location:new_user.html');
   $_SESSION['name']=$name;
	$_SESSION['mail']=$mail;
	mysql_close();
 /* echo "welcome $name <br><br>ur mail address is $id <br> contact : $ph <br> .thankyou.....<br>Date:$date<br><br>";
  $sql="SELECT * FROM  users ";
   $cn=mysql_query($sql,$connect);
   echo "<table border='2'><tr><th>UserName</th><th>e-mail id</th><th>Date of Birth</th><th>Phone no.</th><th>Password</th></tr>";
   while($field = mysql_fetch_array($cn))
   {
    echo "<tr><td>".$field['user']."</td><td>".$field['mail']."</td><td>".$field['date']."</td><td>".$field['contact']."</td><td>".$field['password']."</td></tr>";
	
   }
   echo "</table>";
  mysql_close(); */
}
   
?></center></font>
</body>
</html>
