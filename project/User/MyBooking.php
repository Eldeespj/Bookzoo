<?php
	include("../Assets/Connection/Connection.php");
	ob_start();
	include('Head.php');
	session_start();
if($_GET["bkid"])
	{
	$up="update tbl_booking set booking_status=3 where booking_id=".$_GET["bkid"];
	if(mysql_query($up))
	{
		?>
		<script>
        alert("Booking Cancelled...")
		window.location="Homepage.php"
        </script>
		<?php
	}
	}	
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyBooking</title>
</head>
<body>
<center><h2><b>MyBooking</b></h2></center>

<table width="600" border="1" align="center">
  <tr>
    <td>slno</td>
    <td>Date</td>
    <td>CurrentDate</td>
    <td>Adult count</td>
    <td>Chidren count</td>
    <td>user name</td>
    <td>status</td>
  </tr>
  <tr>
  
   <?php
  $i=0;
  $selqry="select * from tbl_booking b inner join tbl_user u on b.user_id=u.user_id where b.user_id=".$_SESSION['uid'];
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
        if($row["booking_status"] == 0)
		{
			?>
			<td style="color:red">Not Payed</td>
			<?php
		}
		else if($row["booking_status"] == 1)
		{
			?>
			<td style="color:green">Payed <a href="MyBooking.php?bkid=<?php echo $row["booking_id"]?>">cancel
            </td></td>
			<?php
		}
		else if($row["booking_status"] == 2)
		{
			?>
			<td style="color:green">Arrived <br>
			<a href="Complaint.php" > COMPLAINTS</a>     
			  <a href="Feedback.php" > FEEDBACK</a>       

		</td>
			<?php
		}
		else if($row["booking_status"] == 3)
		{
			?>
			<td>Booking Cancelled Fund will return in 7 Working Days</td>
			<?php
		}
		else
		{
			?>
			<td>Pending</td>
			<?php
		}
		?>
      
  </tr>
  
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