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
<br />
<a class="h8" href="http://localhost/tpage.php" style="color: #000033;font-family:Courier;display:inline; float:left;margin-left:30px">BACK</a>
<a class="h8" href="http://localhost/logout1.php" style="color: #000033;font-family:Courier;display:inline; float:right;margin-right:30px">SIGN OUT</a>
<br />
<br />


<?php
session_start();
if (!(isset($_SESSION['login_tchr']) && $_SESSION['login_tchr'] != '')) 
{
header ("Location: input1.php");
}

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="leavemgmt"; // Database name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$t=$_SESSION['my_username'];

$sql="select StudentDetails.RollNo,StudentDetails.FirstName,StudentDetails.LastName,Attended.DBMS,Attended.ESD,Attended.OOPL FROM StudentDetails INNER JOIN Attended ON StudentDetails.RollNo=Attended.RollNo WHERE StudentDetails.Class=(select Class from ClassCoordinator where TID='$t')";
//$sql="select StudentDetails.RollNo,StudentDetails.FirstName,StudentDetails.LastName,Attended.DBMS,Attended.ESD,Attended.OOPL FROM StudentDetails INNER JOIN Attended ON StudentDetails.RollNo=Attended.RollNo";
$result=mysql_query($sql);
print "\n";
?>

<table align="center" border="5" style="width:800px">
   <tr>
      <th>Roll No.</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Attendance %</th>
    </tr>
<? 
$sql2="select DBMS,ESD,OOPL from Lectures WHERE Class=(select Class from ClassCoordinator where TID='$t')";
$result2=mysql_query($sql2);
$array2 = mysql_fetch_row($result2);
$tot_lec=($array2[0]+$array2[1]+$array2[2]);
while($array = mysql_fetch_row($result))
{
    //echo "{$row['RollNo']} {$row['FirstName']} {$row['LastName']} {$row['DBMS']} {$row['ESD']} {$row['OOPL']} <br>";

         print "<tr> <td>";
        echo $array[0]; 
        print "</td> <td>";
        echo $array[1]; 
        print "</td> <td>";
        echo $array[2]; 
        print "</td> <td>";
        $s=((($array[3]+$array[4]+$array[5])/$tot_lec)*100);
        echo (round($s,2));
        print "</td> </tr>";
} 
?>
</table>
<br />
<br />
<h2 style="margin-left:150px"><font face="Lucida Bright">Update Attendance</font></h2>
<ul>
<li style="margin-left:200px"><a class="h3" href="http://localhost/dbms.php" style="color: #000033">DBMS</a></li>
<li style="margin-left:200px"><a class="h3" href="http://localhost/esd.php" style="color: #000033">ESD</a></li>
<li style="margin-left:200px"><a class="h3" href="http://localhost/oopl.php" style="color: #000033">OOPL</a></li>
</ul>
</body>
</html>
