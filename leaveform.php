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
<a class="h8" href="http://localhost/spage.php" style="color: #000033;font-family:Courier;display:inline; float:left;margin-left:30px">BACK</a>
<br />
<br />
<h2 align="center"><font face="Lucida Bright">Student Details</font></h2>
<div>
<fieldset style="height:430px">
<table width="400" border="0" align="center" cellpadding="3" cellspacing="1">
<tr>
<td><h2 align="center"><strong><font color="black" face="Copperplate Gothic Light" color="Black">Leave Application Form</font></strong></h2></td>
</tr>
</table>
<table width="400" border="0" align="center" cellpadding="3" cellspacing="8">
<tr>
<td><form name="form1" method="post" action="submitapp.php">
<table width="80%" border="0" cellspacing="5" cellpadding="3" style="color:#000000">
<tr>
<td width="16%">Roll No</td>
<td width="2%">:</td>
<td width="82%"><input name="rno" type="number" id="rno" size="50" style="background-color:#FEFCA4" required></td>
</tr>
<tr>
<td>Teacher ID</td>
<td>:</td>
<td><input name="tid" type="number" id="tid" size="50" style="background-color:#FEFCA4" required></td>
</tr>
<tr>
<td>From(yyyy-mm-dd)</td>
<td>:</td>
<td><input name="from" type="text" id="from" size="50" style="background-color:#FEFCA4" required></td>
</tr>
<tr>
<td>To(yyyy-mm-dd)</td>
<td>:</td>
<td><input name="to" type="text" id="to" size="50" style="background-color:#FEFCA4" required></td>
</tr>
<tr>
<td>Number of days</td>
<td>:</td>
<td><input name="days" type="number" id="days" size="50" style="background-color:#FEFCA4" required></td>
</tr>
<tr>
<td>Reason</td>
<td>:</td>
<td><input name="reason" type="text" id="reason" size="50" style="background-color:#FEFCA4" required></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="SUBMIT" style="background-color: #dd4b39;color:#ffffff"></td>
</tr>
</table>
</form>
</td>
</tr>
</table>
</fieldset>
<br>
</div>
<?php
session_start(); 
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) 
{

header ("Location: input.php");
}

?>
