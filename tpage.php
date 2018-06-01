<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="style1.css">
<title>Teacher Portal</title>
</head>

<body>
<br>
<p align="center"><img src="Pict_logo.png"></p>
<h1 align="center"><font size="5" face="Copperplate Gothic Light" color="black">Pune Institute </font><font size="5" color="black" face="Lucida Calligraphy">of</font></h1>
<h1 align="center"><font size="6" face="Copperplate Gothic Light" color="black">Computer Technology</font></h1>
<br />
<a class="h8" href="http://localhost/logout1.php" style="color: #000033;font-family:Courier;display:inline; float:right;margin-right:30px">SIGN OUT</a>
<br />
<br />
<h2 align="center"><font face="Lucida Bright">Teacher Details</font></h2>
<?php
session_start();
if (!(isset($_SESSION['login_tchr']) && $_SESSION['login_tchr'] != '')) 
{
header ("Location: source.html");
}


$host="localhost"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="leavemgmt"; // Database name

// Connect to server and select databse.
$conn=mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$t=$_SESSION['my_username'];
$sql4="SELECT Class from ClassCoordinator WHERE TID='$t'";
$result4=mysql_query($sql4);
$r1= mysql_fetch_row($result4);

echo '
<table style="width:300px;margin-left:50px">
    <td>TID :</td>
    <td>', $t, '</td>
  </tr>
  <tr>
    <td>Class :</td>
    <td>', $r1[0], '</td>
  </tr>
</table>';
?>
<br>
<ul>
<li style="margin-left:50px"><a class="h3" href="http://localhost/stud_att.php" style="color: #000000">Student Attendance</a></li>
<li style="margin-left:50px"><a class="h3" href="http://localhost/stud_app.php" style="color: #000000">Student Leave Application</a></li>
<br />
<br />
</ul>
</body>
</html>
