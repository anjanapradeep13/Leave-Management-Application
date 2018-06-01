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
<a class="h8" href="http://localhost/stud_att.php" style="color: #000033;font-family:Courier;display:inline; float:left;margin-left:30px">BACK</a>
<a class="h8" href="http://localhost/logout1.php" style="color: #000033;font-family:Courier;display:inline; float:right;margin-right:30px">SIGN OUT</a>
<br />
<h2 align="center"><font face="Lucida Bright">Database Management Systems</font></h2>

<?php
session_start();
if (!(isset($_SESSION['login_tchr']) && $_SESSION['login_tchr'] != '')) 
{
header ("Location: input1.php");
}

$_SESSION['subj']="DBMS";

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="leavemgmt"; // Database name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$t=$_SESSION['my_username'];
$sql1="select StudentDetails.RollNo,StudentDetails.FirstName,StudentDetails.LastName,Attended.DBMS FROM StudentDetails INNER JOIN Attended ON StudentDetails.RollNo=Attended.RollNo WHERE StudentDetails.Class=(select Class from ClassCoordinator where TID='$t')";
$result1=mysql_query($sql1);
$sql2="select DBMS FROM Lectures WHERE Class=(select Class from ClassCoordinator where TID='$t')";
print "\n";
?>

<table align="center" border="5" style="width:800px">
   <tr>
      <th>Roll No.</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Attended</th>
      <th>Total</th>
      <th>Average(%)</th>
      <th>Update</th>
    </tr>

<form name="form1" action="update1.php" method="post">
<?
//$sql5="select WHERE Class=(select Class from ClassCoordinator where TID='$t')"; 
if($t==101)
$count=3201;
else if($t==102)
$count=3101;
else if($t==103)
$count=3301;
else
$count=3401;


while($array1 = mysql_fetch_row($result1))
{
    print "<tr> <td>";
    echo $array1[0]; 
    print "</td> <td>";
    echo $array1[1]; 
    print "</td> <td>";
    echo $array1[2]; 
    print "</td> <td>";
    echo $array1[3];
    print "</td> <td>";
    $result2=mysql_query($sql2);
	$array2 = mysql_fetch_row($result2); 
       echo $array2[0];
       print "</td> <td>";
       echo (round((($array1[3]/$array2[0])*100),2));    
    print "</td> <td>";
    echo '<input type="checkbox" name="check_list[]" value="'.$count.'">';
    $count+=1;
    print "</td> </tr>";
} 
?>
</table>
<br />
<p align="center">
<input type="submit" name="submit" value="SUBMIT" style="background-color: #dd4b39;color: #FFFFFF" /></p>
</form> 
</body>
</html>
