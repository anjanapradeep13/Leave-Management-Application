<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Teacher Login</title>
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
<h1><strong><font face="Verdana, Geneva, sans-serif"color="black">Welcome,</strong> Please login.</font></h1>
<form name="form1" method="post" action="login_teacher.php">
<fieldset>
<p><input type="text" required value="Username" name="tusername" id="tusername" onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value='' "></p>
<p><input type="password" required value="Password" name="tpassword" id="tpassword" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "></p>
<p><a href="http://localhost/forgot1.html"><font color="black">Forgot Password?</font></a></p>
<p><input type="submit" value="Login"></p>
</fieldset>
</form>
</div>
<?php

ob_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="leavemgmt"; // Database name
$tbl_name="TeacherLogin"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword
$tusername=$_POST['tusername'];
$tpassword=$_POST['tpassword'];

$sql="SELECT * FROM $tbl_name WHERE TID='$tusername' and Password='$tpassword'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1)
{
echo "Success";
session_start();
$_SESSION['login_tchr'] = "1";
$_SESSION['my_username']="$tusername";
header('Location:tpage.php');
}
else 
{
?>
<script>
alert("Incorrect Username or Password");
window.location='input1.php';
</script>
<!--header("location:input.php");
exit;-->
<?
}
?>
</body>
</html>

