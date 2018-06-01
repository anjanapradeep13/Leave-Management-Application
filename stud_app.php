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

$me=$_SESSION['my_username'];
$t=$_SESSION['my_username'];

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$tbl_name="LeaveApplication";
//$sql="select * from $tbl_name where TID='$myusername'";


$sql="select * from LeaveApplication where TID='$me'";
$result=mysql_query($sql);//to display INFO OF those who have applied

$sql1="select DBMS,ESD,OOPL from Attended where RollNo IN(select RollNo from LeaveApplication where TID='$me')";
$result1=mysql_query($sql1);//selects total lec of each subject that each of the applied students have attended

print "\n";
?>

<table align="center" border="5" style="color: #000000;width:800px">
   <tr>
      <th>Roll No.</th>
      <th>TID</th>
      <th>From</th>
      <th>Till</th>
      <th>Days</th>
      <th>Reason</th>
      <th>Attendance</th>
<th>Grant</th>      
    </tr>

<form name="form1" action="status.php" method="post">
<?
$count=1; 
$sql2="select DBMS+ESD+OOPL as Total_Lec from Lectures where Class=(select Class from ClassCoordinator where TID='$t')";
$result2=mysql_query($sql2);
$array2 = mysql_fetch_row($result2);//total lecs

while($array = mysql_fetch_row($result))//FETCH each row 1 at a time from resultset which is stored in $result variable
{

//prints only those who have applied to the teacher

         $array1 = mysql_fetch_row($result1);
         print "<tr> <td>";
        echo $array[0]; //prints the roll no. of those who have applied 
        print "</td> <td>";
        echo $array[1]; 
        print "</td> <td>";
        echo $array[2]; 
        print "</td> <td>";
        echo $array[3];
        print "</td> <td>";
        echo $array[4];
        print "</td> <td>";
        echo $array[5]; 
        print "</td> <td>";
        $s=$array1[0]+$array1[1]+$array1[2];
        $s=(round(($s/$array2[0]*100),2));
        echo $s;
        print "</td> <td>";
        echo '<input type="checkbox" name="check[]" value="'.$array[0].'">';//on clicking submit,it will go to status.php which updates status table
        $count+=1;//this gives auto incremented value for each checkbox which is printed per row
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

