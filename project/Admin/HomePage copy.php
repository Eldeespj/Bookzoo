<?php
session_start();
echo $_SESSION['aname']."is logged in";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AdminHomepage</title>
</head>

<body>
<table>
<tr><td><a href="UserFeedback.php" >UserFeedback</a><br /></td></tr>
<tr><td><a href="Animal.php" >AnimalRegistration</a><br /></td></tr>
<tr><td><a href="Assignduty.php ">AssignDutytostaff</a><br /></td></tr>
<tr><td><a href="category.php" >CatageoryDetails</a><br /></td></tr>
<tr><td><a href="ChangePassword.php" >Changepassword</a><br /></td></tr>
<tr><td><a href="Cell.php ">CellRegistration</a><br /></td></tr>
<tr><td><a href="District.php ">District</a><br /></td></tr>
<tr><td><a href="Place.php ">Place</a><br /></td></tr>
<tr><td><a href="SubCategory.php ">subCategory</a><br /></td></tr>
<tr><td><a href="UserComplaint.php ">UserComplaint</a><br /></td></tr>
<tr><td><a href="UserComplaintReply.php ">UserComplaintReply</a><br /></td></tr>
<tr><td><a href="UserComplaintSolvedList.php ">UserComplaintSolvedList</a><br /></td></tr>
<tr><td><a href="AdminRegistration.php ">AdminRegistration</a><br /></td></tr>
<tr><td><a href="UserBookingDetails.php ">UserBookingDetails</a><br /></td></tr>
<tr><td><a href="AnimalRegistration.php ">AnimalAssignment</a><br /></td></tr>

</table>
</body>
</html>