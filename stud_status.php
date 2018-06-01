<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style1.css">
<title>Student Portal</title>
</head>

<body>
<br>
<p align="center"><img src="Pict_logo.png"></p>
<h1 align="center"><font size="5" face="Copperplate Gothic Light" color="black">Pune Institute </font><font size="5" color="black" face="Lucida Calligraphy">of</font></h1>
<h1 align="center"><font size="6" face="Copperplate Gothic Light" color="black">Computer Technology</font></h1>
<br />
<a class="h8" href="http://localhost/logout.php" style="color: #000033;font-family:Courier;display:inline; float:right;margin-right:30px">SIGN OUT</a>
<a class="h8" href="http://localhost/spage.php" style="color: #000033;font-family:Courier;display:inline; float:left;margin-left:30px">BACK</a>
<br />
<br />

<?php
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) 
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

$y=$_SESSION["rno"];
$sql7="select Frm,Till,Days,Status from Log where RollNo=$y ORDER BY Frm DESC";
$result7=mysql_query($sql7);
?>
<h2 align="center"><font face="Lucida Bright">Leave Status</font></h2>

<br>
<table align="center" border="5" style="width:800px">
   <tr>
      <th>From</th>
      <th>To</th>
      <th>No. of Days</th>
      <th>Status</th>
    </tr>

<?
while($array7 = mysql_fetch_row($result7))
{
    print "<tr> <td>";
    echo $array7[0]; 
    print "</td> <td>";
    echo $array7[1]; 
    print "</td> <td>";
    echo $array7[2]; 
    print "</td> <td>";
    echo $array7[3];
    print "</td> </tr>";
} 
?>
</table>
</body>
</html>

