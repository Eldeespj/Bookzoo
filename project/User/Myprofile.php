<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
$selQry="select *from tbl_user where user_id='".$_SESSION['uid']."'";
$dataQry=mysql_query($selQry);
$rowUser=mysql_fetch_array($dataQry)
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserMyProfile</title>
</head>

<body>
<center><h2><b>Myprofile</b></h2></center>

<form enctype="multipart/form-data">

<table width="200" border="1" align="center">
  <tr>
    <td colspan="2"><p align="center">
      <label for="textarea"></label>
      <label for="k"></label>
      <img src="../Assets/Files/User/<?php echo $rowUser["user_image"]?>" width="200px" /></p></td>
    </tr>
  <tr>
    <td>Name</td>
    <td><?php echo $rowUser["user_name"]?> </td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $rowUser["user_contact"]?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $rowUser["user_email"]?></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><?php echo $rowUser["user_address"]?></td>
  </tr>
</table>

</form>
</body>
<?php
          include('Foot.php');
          ob_flush();
          ?>
</html>