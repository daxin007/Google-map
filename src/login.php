<?php
header("Content-Type:text/html; charset=gb2312");
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: complete.html");
}
if(isset($_POST['btn-login']))
{
 $email = mysql_real_escape_string($_POST['email']);
 $upass = mysql_real_escape_string($_POST['pass']);
 $res=mysql_query("SELECT * FROM users WHERE email='$email'");
 $row=mysql_fetch_array($res);
 if($row['password']==md5($upass))
 {
  $_SESSION['user'] = $row['user_id'];
  header("Location: complete.html");
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }
 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=gb2312" />
<title>sign in</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body background="/image/all.jpg">
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="email" style="height:25px;width:200px;" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" style="height:25px;width:200px;" placeholder="Your Password" required /></td>
</tr>
<tr>
<td>&nbsp <button type="submit" name="btn-login" style="height:25px;width:150px;">Sign In</button></td>
</tr>
<tr>
<td>&nbsp <a href="register.php">Sign Up Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>