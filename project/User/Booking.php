
<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
session_start();
if(isset($_POST["btn_submit"]))
{
	$date=$_POST["txt_date"];
	$adultno=$_POST["txt_adultno"];
	$childrenno=$_POST["txt_childno"];
	$payment=$adultno*100;

	$ins="insert into tbl_booking(booking_date,booking_adult,booking_children,booking_payment,booking_currentdate,user_id)values('$date','$adultno','$childrenno','$payment',curdate(),'".$_SESSION['uid']."')";
	echo $ins;
	mysql_query($ins);
	$selQryBooking="select max(booking_id) as id from tbl_booking where user_id=".$_SESSION['uid'];
	$booking=mysql_query($selQryBooking);
	$bookingData=mysql_fetch_array($booking);
	header("location: Payment.php?bid=".$bookingData['id']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking</title>
</head>

<body>
<center><h2><b>Booking</b></h2></center>

<form method="post">

 <table width="200" border="1" align="center">
  <tr>
    <td>Date</td>
    <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" required/></td>
  </tr>
  <tr>
    <td>number of Adults</td>
    <td><label for="txt_adultno"></label>
      <input type="number" name="txt_adultno" id="txt_adultno" onchange="getTotal(this.value)" required /></td>
  </tr>
  <tr>
    <td>Number of children</td>
    <td><label for="txt_childno"></label>
      <input type="text" name="txt_childno" id="txt_childno"required /></td>
  </tr>
  <tr>
    <td>Total</td>
    <td id='total'></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="booking" />
    </div></td>
    </tr>
  <tr>
    <td colspan="2">Adult per Head:Rs.100</td>
    </tr>
</table>

</form>
</body>
<script>
function getTotal(price){
	var total=price * 100;
	document.getElementById('total').innerHTML=total
}
</script>
<?php
          include('Foot.php');
          ob_flush();
          ?>
</html>