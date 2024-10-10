<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
session_start();
if(isset($_POST["d"]))
{

	$password=$_POST['d2'];
	$newpassword=$_POST['f'];
	$repassword=$_POST['h'];
	$sel="select *from tbl_staff where staff_id=".$_SESSION['sid'];
	$data=mysql_query($sel);
	$row=mysql_fetch_array($data);
	$currentpassword=$row['staff_password'];
		if($password==$currentpassword)
		{
			if($newpassword==$repassword)
			{
			  $upd="update tbl_staff set staff_password='".$newpassword."'where staff_id=".$_SESSION['sid'];
			  mysql_query($upd);
			  echo"password updated";
			 
		   }
		  else
		   {
			echo "password  mismatch";
		   }
		}
	else
	   {
		echo   " invalid current password";	
       }

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
  <center><h2>ChangePassword</b></h2></center>

<form method="post">

<table width="200" border="1" align="center">
  <tr>
    <td>Current Password</t>
    <td><label for="d"></label>
      <input type="text" name="d2" id="d"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required  /></td>
  </tr>
  <tr>
    <td>New Password</td>
    <td><label for="f"></label>
      <input type="text" name="f" id="f" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required  /></td>
  </tr>
  <tr>
    <td>Re-Password</td>
    <td><label for="h"></label>
      <input type="text" name="h" id="h"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required /></td>
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