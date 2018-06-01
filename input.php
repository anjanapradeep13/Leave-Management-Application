<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Student Login</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<br>
<p align="center"><img src="Pict_logo.png"></p>
<h1 align="center"><font size="5" face="Copperplate Gothic Light" color="Black">Pune Institute </font><font size="5" color="Black" face="Lucida Calligraphy">of</font></h1>
<h1 align="center"><font size="6" face="Copperplate Gothic Light" color="Black">Computer Technology</font></h1>
<br />
<br />
<a class="h8" href="http://localhost/source.html" style="color: #000033;font-family:Courier;display:inline; float:left;margin-left:30px;font-size: 16px">BACK</a>

<div class="login">
<h1><strong><font face="Verdana, Geneva, sans-serif" color="black">Welcome,</strong> Please login.</font></h1>
<form name="form1" method="post" action="login_student.php">
<fieldset>
<p><input type="text" required value="Username" name="susername" id="susername" onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value='' "></p>
<p><input type="password" required value="Password" name="spassword" id="spassword" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "></p>
<p><a href="http://localhost/forgot1.html"><font color="black">Forgot Password?</font></a></p>
<p><input type="submit" value="Login"></p>
</fieldset>
</form>
</div>
</body>
</html>