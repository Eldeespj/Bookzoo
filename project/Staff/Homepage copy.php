<?php

session_start();
echo $_SESSION['sname']."is logged in";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StaffHomepage</title>
</head>

<body>
<br />
<table>
<tr><td><a href="MyProfile.php" >myprofile</a><br /></td></tr>
<tr><td><a href="Viewassignment.php" >viewassignment</a><br /></td></tr>
<tr><td><a href="ChangePassword.php" >changepassword</a><br /></td></tr>
<tr><td><a href="editprofile.php ">editprofile</a><br /></td></tr>
<tr><td><a href="UserBookingDetails.php" >UserBookingDetails</a><br /></td></tr>
<tr><td><a href="ViewComplaint.php" >Viewcomplaint</a><br /></td></tr>
<tr><td><a href="ArrivedUsers.php" >ArrivedUsers</a><br /></td></tr>


</table>
</body>
</html>