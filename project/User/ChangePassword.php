
<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST['d']))
{
	$password=$_POST['d2'];
	$newpassword=$_POST['f'];
	$repassword=$_POST['h'];
	
	$selQry= "select * from tbl_user where user_id = ".$_SESSION['uid'];
	$data=mysql_query($selQry);
	$result = mysql_fetch_array($data);
	$currentPassword = $result['user_password'];
	
	if($password==$currentPassword)
	{
		if($newpassword==$repassword)
		{
			 $update = "update tbl_user set user_password='".$newpassword."' where user_id=".$_SESSION['uid'];	
	         mysql_query($update);
			 echo "password updated";
		}
		else
		{
			echo "not match";
		}
	}
	else
	{
		echo "invalid current password";
	}
    
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserChangePassword</title>
</head>

<body>
<center><h2><b>changePassword</b></h2></center>

<form method="post">

<table  border="1" align="center">
  <tr>
    <td>Current Password</td>
    <td><label for="d"></label>
      <input type="text" name="d2" id="d" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"  autocomplete="off" required  /></td>
  </tr>
  <tr>
    <td>New Password</td>
    <td><label for="f"></label>
      <input type="text" name="f" id="f"   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required /></td>
  </tr>
  <tr>
    <td>Re-Password</td>
    <td><label for="h"></label>
      <input type="text" name="h" id="h"  autocomplete="off" required /></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="d" id="d" value="update" />
    </div></td>
    </tr>
</table>

</form>
</body>
<?php
          include('Foot.php');
          ob_flush();
          ?>
</html>