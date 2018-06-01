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
<a class="h8" href="http://localhost/logout.php" style="color: #000033;font-family:Courier;display:inline; float:right;margin-right:30px">SIGN OUT</a>
<br />
<br />
<h2 align="center"><font face="Lucida Bright">Student Details</font></h2>

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
$x=$_SESSION["cl"];
$sql4="SELECT TID from ClassCoordinator WHERE Class='$x'";
$result4=mysql_query($sql4);
$r1= mysql_fetch_row($result4);

echo '
<table style="width:300px;margin-left:50px">
  <tr>
    <td>Roll No. :</td>
    <td>', $_SESSION["rno"], '</td>
  </tr>
  <tr>
    <td>Name :</td>
    <td>', $_SESSION["firstname"],' ', $_SESSION["lastname"] , '</td>
  </tr>
  <tr>
    <td>Date of Birth :</td>
    <td>', $_SESSION["dob"], '</td>
  </tr>
  <tr>
    <td>Class :</td>
    <td>', $_SESSION["cl"], '</td>
  </tr>
  <tr>
    <td>TID :</td>
    <td>', $r1[0], '</td>
  </tr>
</table>';
?>

<?php
$sql="select DBMS,ESD,OOPL from Lectures where Class='$x'";
$result=mysql_query($sql);
print "\n";
echo $rn;
?>
<h2 align="center"><font face="Lucida Bright">Attendance Details</font></h2>
<table align="center" border="5" style="width:800px">
   <tr>
      <th>Subject</th>
      <th>Attended</th>
      <th>Total</th>
      <th>Attendance %</th>
    </tr>

<? 
$a=0;
$c=0;
$subject=array('DBMS','ESD','OOPL');
$i=0;
$array = mysql_fetch_row($result);
while($i<3)
{
         print "<tr> <td>";
        echo $subject[$i]; 
        print "</td> <td>";
$sql1="select $subject[$i] from Attended where RollNo='$y'";
$result1=mysql_query($sql1);
$array1 = mysql_fetch_row($result1);
        echo $array1[0]; 
        print "</td> <td>";
        echo $array[$i]; 
        print "</td> <td>";
        
        $a+=$array1[0];
        $c+=$array[$i];
        $s=(($array1[0]/$array[$i])*100);
        echo (round($s,2));
$i++;
        print "</td> </tr>";
}

?>
</table>
<br />
<h4 align="center">
<?php
$oa=(round((($a/$c)*100),2));
if (($oa > 70) && ($oa < 80))
{
echo '<div class="alert-box warning">';
echo 'Overall Attendance: ';
echo (round((($a/$c)*100),2));
echo "%";
echo '</div>';
}
else if ($oa > 80)
{
echo '<div class="alert-box success">';
echo 'Overall Attendance: ';
echo (round((($a/$c)*100),2));
echo "%";
echo '</div>';
}
else if($oa < 70)
{
echo '<div class="alert-box error">';
echo 'Overall Attendance: ';
echo (round((($a/$c)*100),2));
echo "%";
echo '</div>';
}
?>
</h4>
<br />
<h2 align="center"><font face="Lucida Bright">Leave Formalities</font></h2>
<ul>
<li style="margin-left:50px"><a class="h3" href="http://localhost/leaveform.php" style="color: #000000">Leave Application Form</a></li>
<li style="margin-left:50px"><a class="h3" href="http://localhost/stud_status.php" style="color: #000000">Leave Status</a></li>
</ul>
<h2 align="center"><font face="Lucida Bright">Leave Application Status</font></h2>
<p align="center">
<?php
$sql3="select Status from LeaveStatus where RollNo=$y";
$result3=mysql_query($sql3);
$c=mysql_num_rows($result3);
$array3= mysql_fetch_row($result3);
if($c==0)
{
echo '<div class="alert-box notice">';
echo '<span>';
echo 'notice:';
echo '</span>';
echo 'No Application Submitted.';
echo '</div>';
}
else if($array3[0]=="Submitted"&& $c!=0)
{
echo '<div class="alert-box success">';
echo '<span>';
echo 'success:';
echo '</span>';
echo 'Application Submitted.';
echo '</div>';
}

else
{
echo '<div class="alert-box notice">';
echo '<span>';
echo 'notice:';
echo '</span>';
echo 'Application ';
echo $array3[0];
 $sql4="Delete from LeaveStatus where RollNo='$y'";
   $result4=mysql_query($sql4,$conn);
echo '</div>';
}
?>
</p>
<br>
</body>
</html>

