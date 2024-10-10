
<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
$sel="select * from tbl_staff where staff_id='".$_SESSION['sid']."'";
$dataQry=mysql_query($sel);
$rowUser=mysql_fetch_array($dataQry);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StaffMyprofile</title>
</head>

<body>
<center><h2><b>MyProfile</b></h2></center>

<form enctype="multipart/form-data">

<table width="200" border="1" align="center">
  <tr>
    <td colspan="2"><p> <img src="../Assets/Files/Staff/Image/<?php echo $rowUser["staff_photo"]?>" width="200px" /></p>
    
     </td>
  
    </tr>
  <tr>
    <td>Name</td>
    <td><?php echo $rowUser["staff_name"]?> </td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $rowUser["staff_contact"]?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $rowUser["staff_email"]?></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><?php echo $rowUser["staff_address"]?></td>
  </tr>
</table>

</form>
</body>
<?php
          include('Foot.php');
          ob_flush();
          ?>
</html>