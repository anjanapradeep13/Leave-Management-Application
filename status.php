<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style1.css">
</head>

<body>
<br>
<p align="center"><img src="Pict_logo.png"></p>
<h1 align="center"><font size="5" face="Copperplate Gothic Light" color="White">Pune Institute </font><font size="5" color="white" face="Lucida Calligraphy">of</font></h1>
<h1 align="center"><font size="6" face="Copperplate Gothic Light" color="White">Computer Technology</font></h1>
<br />
<a href="http://localhost/tpage.php" style="color: #000033;display:inline; float:left;">Back</a>
<a href="http://localhost/logout1.php" style="color: #000033;display:inline; float:right;">Logout</a>
<br />
<br />

<?php
session_start();
if (!(isset($_SESSION['login_tchr']) && $_SESSION['login_tchr'] != '')) 
{
header ("Location: input1.php");
}

$me=$_SESSION['my_username'];

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="leavemgmt"; // Database name

$conn=mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

if(isset($_POST['submit']))
 {
  
  if(!empty($_POST['check']))
  { 
      foreach($_POST['check'] as $rno)
    {
   $sql1="UPDATE LeaveStatus set Status='Granted' where TID='$me' and RollNo='$rno'";
   $result1=mysql_query($sql1,$conn);

   if(!$result1)
     {
  die('Could not update data');
     }
   }
  }

   $sql2="UPDATE LeaveStatus set Status='Rejected' where TID='$me' and Status='Submitted'";
   $result2=mysql_query($sql2,$conn); 

   $sql5="select * from LeaveApplication where TID='$me'";
   $sql6="select Status from LeaveStatus where TID='$me'";
   $result5=mysql_query($sql5);
   $result6=mysql_query($sql6); 

   while($array5 = mysql_fetch_row($result5))
    {  
      $array6 = mysql_fetch_row($result6);
      $sql6="INSERT INTO Log VALUES('$array5[0]','$array5[1]','$array5[2]','$array5[3]','$array5[4]','$array5[5]','$array6[0]')";
      $c=mysql_query($sql6);
    }



 $sql3="Delete from LeaveApplication where TID='$me'";
   $result3=mysql_query($sql3,$conn);

}

print "\n";
header ("Location: stud_app.php");
?>

<br />
<br />
<br />
</body>
</html>

