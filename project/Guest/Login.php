
<?php

include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
session_start();
if(isset($_POST['btn_login']))
{
	 $email=$_POST["txt_email"];
	 $password=$_POST["txt_password"];
	
	$selUser="select user_id,user_name from  tbl_user where user_email='$email' and user_password='$password'";
	
    $selStaff="select staff_id,staff_name from tbl_staff where staff_email='$email' and staff_password='$password'";
	
	
	  $selAdmin="select admin_id,admin_name from tbl_admin where admin_email='$email' and admin_password='$password'";
	
	
  
	$dataUser=mysql_query($selUser);
	$dataStaff=mysql_query($selStaff);
	$dataAdmin=mysql_query($selAdmin);
	if($rowUser=mysql_fetch_array($dataUser))
	{
		$_SESSION['uid']=$rowUser["user_id"];
		$_SESSION['uname']=$rowUser["user_name"];
		header("location:../user/Homepage.php");
	}
	else if($row=mysql_fetch_array($dataStaff))
	{
	$_SESSION['sid']=$row["staff_id"];
		$_SESSION['sname']=$row["staff_name"];
		header("location:../staff/Homepage.php");	
	}
	else if($rowAdmin=mysql_fetch_array($dataAdmin))
	{
	$_SESSION['aid']=$rowAdmin["admin_id"];
		$_SESSION['aname']=$rowAdmin["admin_name"];
		header("location:../admin/Homepage.php");	
	}
	else
	{
		echo "invalid credentials";
	}
}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<title>Login</title>
</head>
<body>
<center><h2>LOGIN</h2></center>
<form method="post">
<table width="200" border="1" align="center">
  <tr>
    <td>Email</td>
    <td>
      <label for="v"></label>
      <input type="email" name="txt_email" id="v" />
    </td>
  </tr>
  <tr>
    <td>Password</td>
    <td>
      <label for="m"></label>
      <input type="password" name="txt_password" id="m"   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters autocomplete="off" required  />
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="btn_login" id="n" value="Login" />
      </div>
    </td>
  </tr>
</table>
</form>
</body>
<?php
          include('Foot.php');
          ob_flush();
          ?>
</html>