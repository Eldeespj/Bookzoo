<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php')
?>
	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserbookingDetails</title>
</head>
<body>
<center><h2><b>ArrivedUsers</b></h2></center>

<table width="200" border="1" align="center">
  <tr>
    <td>slno</td>
    <td>Date</td>
    <td>CurrentDate</td>
    <td>Adult count</td>
    <td>Chidren count</td>
        <td>User name</td>
     
  </tr>
  <tr>
   <?php
  $i=0;
  $selqry="select * from tbl_booking b inner join tbl_user u on b.user_id=u.user_id where b.booking_status=2";
  
  $data=mysql_query($selqry);
  while($row=mysql_fetch_array($data))
  {
	  $i++;
	  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["booking_date"]?></td>
    <td><?php echo $row["booking_currentdate"]?></td>
    <td><?php echo $row["booking_adult"]?></td>
    <td><?php echo $row["booking_children"]?></td>
       <td><?php echo $row["user_name"]?></td>
      <?php
  }
  ?>
 </tr>
</table>
</body>
<?php
          include('Foot.php');
          ob_flush();
          ?>
</html>