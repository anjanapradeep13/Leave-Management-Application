<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style1.css">
<title>Student Portal</title>
</head>

<body>
<br>
<p align="center"><img src="Pict_logo.png"></p>
<h1 align="center"><font size="5" face="Copperplate Gothic Light" color="Black">Pune Institute </font><font size="5" color="Black" face="Lucida Calligraphy">of</font></h1>
<h1 align="center"><font size="6" face="Copperplate Gothic Light" color="Black">Computer Technology</font></h1>
<br />
<!--<a class="h8" href="http://localhost/logout.php" style="color: #000033;font-family:Courier;display:inline; float:right;margin-right:30px">SIGN OUT</a>-->
<a class="h8" href="http://localhost/spage.php" style="color: #000033;font-family:Courier;display:inline; float:left;margin-left:30px">BACK</a>
<br />
<br />

<?php
session_start(); 
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) 
{

header ("Location: source.html");
}

//if(isset($_POST['submit']))
//{
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="leavemgmt"; // Database name
$tbl_name="LeaveApplication"; // Table name

// Connect to server and select databse.
//mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$sql2="SET FOREIGN_KEY_CHECKS=0";
$sql3="SET FOREIGN_KEY_CHECKS=1";

$sql="INSERT INTO LeaveApplication VALUES
('$_POST[rno]','$_POST[tid]','$_POST[from]','$_POST[to]','$_POST[days]','$_POST[reason]')";
$sql1="INSERT INTO LeaveStatus VALUES
('$_POST[rno]','$_POST[tid]','Submitted')";

mysql_query($sql2);
$a=mysql_query($sql);
$b=mysql_query($sql1);

 if (!$a)
  {
  	echo '<div class="alert-box error">';
	echo '<span>';
	echo 'notice:';
	echo '</span>';
	echo 'Application Not Submitted.';
	echo '</div>';
	echo '<ul>';
	echo '<li style="margin-left:50px">';
   	echo mysql_error();
   	echo '</li>';
   	echo '</ul>';
  }
else
  {
    echo '<div class="alert-box success">';
	echo '<span>';
	echo 'success:';
	echo '</span>';
	echo 'Application Submitted.';
	echo '</div>';
  }

mysql_query($sql3);
//}
?>
<br />
<br />
<br />
</body>
</html>