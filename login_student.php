<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Student Login</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<br>
<p align="center"><img src="Pict_logo.png"></p>
<h1 align="center"><font size="5" face="Copperplate Gothic Light" color="Black">Pune Institute </font><font size="5" color="Black" face="Lucida Calligraphy">of</font></h1>
<h1 align="center"><font size="6" face="Copperplate Gothic Light" color="Black">Computer Technology</font></h1>
<br />
<br />
<a class="h8" href="http://localhost/source.html" style="color: #000033;font-family:Courier;display:inline; float:left;margin-left:30px;font-size: 16px">BACK</a>

<div class="login">
<h1><strong><font face="Verdana, Geneva, sans-serif" color="black">Welcome,</strong> Please login.</font></h1>
<form name="form1" method="post" action="login_student.php">
<fieldset>
<p><input type="text" required value="Username" name="susername" id="susername" onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value='' "></p>
<p><input type="password" required value="Password" name="spassword" id="spassword" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "></p>
<p><a href="http://localhost/forgot1.html"><font color="black">Forgot Password?</font></a></p>
<p><input type="submit" value="Login"></p>
</fieldset>
</form>
</div>
<?php

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="leavemgmt"; // Database name
$tbl_name="StudentLogin"; // Table name
$tbl_name2="StudentDetails";

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword

$susername=$_POST['susername'];
$spassword=$_POST['spassword'];
$_SESSION['rollno']=$susername;

$sql="SELECT * FROM $tbl_name WHERE RollNo='$susername' and Password='$spassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
session_start();
$_SESSION['error'] = "1";
$_SESSION['login'] = "1";
//session_register("susername");
//session_register("spassword");

$sql2="SELECT * FROM $tbl_name2 WHERE RollNo='$susername'";
$result2=mysql_query($sql2);
print "\n";
while($row = mysql_fetch_array($result2, MYSQL_ASSOC))
{

$_SESSION['rno'] = $row['RollNo'];
$_SESSION['firstname'] = $row['FirstName'];
$_SESSION['lastname'] = $row['LastName'];
$_SESSION['cl'] = $row['Class'];
//$x=$row['Class'];
$_SESSION['dob'] = $row['DateOfBirth'];

       header ('Location: spage.php');

} 
}
else 
{
?>
<script>
alert("Incorrect Username or Password.");
window.location='input.php';
</script>
<!--header("location:input.php");
exit;-->
<?
}
?>
</body>
</html>

