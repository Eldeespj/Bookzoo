<?php
session_start();
echo $_SESSION['uname']."is logged in";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserHomepage</title>
</head>
<body>
<br />
<table>
<tr><td><a href=Myprofile.php >myprofile</a><br /></td></tr>
<tr><td><a href=Feedback.php >feedback</a><br /></td></tr>
<tr><td><a href=EditProfile.php >editprofile</a><br /></td></tr>
<tr><td><a href=ChangePassword.php >changepassword</a><br /></td></tr>
<tr><td><a href=Complaint.php >complaint</a><br /></td></tr>
<tr><td><a href=Booking.php >booking</a><br /></td></tr>
<tr><td><a href=Mycomplaint.php >Reply</a><br /></td></tr>
<tr><td><a href=MyBooking.php >MyBooking</a><br /></td></tr>
<tr><td><a href=ViewComplaintReply.php >ViewComplaintReply</a><br /></td></tr>

</table>
 
</body>
</html>