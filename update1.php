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
<!--<a class="h8" href="http://localhost/logout1.php" style="color: #000033;font-family:Courier;display:inline; float:right;margin-right:30px">SIGN OUT</a>-->
<br />
<?php

session_start();
if (!(isset($_SESSION['login_tchr']) && $_SESSION['login_tchr'] != '')) 
{
header ("Location: input1.php");
}

$subject=$_SESSION['subj'];

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="leavemgmt"; // Database name

// Connect to server and select databse.
$conn=mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$t1=$_SESSION['my_username'];

if(isset($_POST['submit']))
{//to run PHP script on submit
$sql1="update Lectures set $subject=$subject+1  where Class=(select Class from ClassCoordinator where TID='$t1')";
$result1 = mysql_query( $sql1, $conn );
if(!empty($_POST['check_list']))
{
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $rn)
{
$sql2="update Attended set $subject=$subject+1 where RollNo=$rn";
$result2 = mysql_query( $sql2, $conn );
if(! $result2)
{
  die('Could not update data');
}
}//foreach
}
}

if($subject=="DBMS")
{
$sql="select StudentDetails.RollNo,StudentDetails.FirstName,StudentDetails.LastName,Attended.DBMS FROM StudentDetails INNER JOIN Attended ON StudentDetails.RollNo=Attended.RollNo where StudentDetails.Class=(select Class from ClassCoordinator where TID='$t1')";
$sql4="select DBMS FROM Lectures WHERE Class=(select Class from ClassCoordinator where TID='$t1')";

}
else if ($subject=="ESD")
{
$sql="select StudentDetails.RollNo,StudentDetails.FirstName,StudentDetails.LastName,Attended.ESD FROM StudentDetails INNER JOIN Attended ON StudentDetails.RollNo=Attended.RollNo where StudentDetails.Class=(select Class from ClassCoordinator where TID='$t1')";
$sql4="select ESD FROM Lectures WHERE Class=(select Class from ClassCoordinator where TID='$t1')";
}
else if ($subject=="OOPL")
{
$sql="select StudentDetails.RollNo,StudentDetails.FirstName,StudentDetails.LastName,Attended.OOPL FROM StudentDetails INNER JOIN Attended ON StudentDetails.RollNo=Attended.RollNo where StudentDetails.Class=(select Class from ClassCoordinator where TID='$t1')";
$sql4="select OOPL FROM Lectures WHERE Class=(select Class from ClassCoordinator where TID='$t1')";
}
$result=mysql_query($sql);
print "\n";
?>
<div class="alert-box success"><span>success: </span>Attendance Updated!</div>
<br>
<table align="center" border="5" style="width:800px">
   <tr>
      <th>Roll No.</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Attended</th>
      <th>Total</th>
    </tr>
<? 

while($array = mysql_fetch_row($result))
{
        print "<tr> <td>";
        echo $array[0]; 
        print "</td> <td>";
        echo $array[1]; 
        print "</td> <td>";
        echo $array[2]; 
        print "</td> <td>";
        echo $array[3];
print "</td> <td>";
$result4=mysql_query($sql4);
while($array2 = mysql_fetch_row($result4))
     {   echo $array2[0];
         print "</td> <td>";
     }
        print "</td> </tr>";
}
mysql_close($conn); 
?>
</table>
<br>
</body>
</html>
