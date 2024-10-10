

<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
session_start();
if(isset($_POST["btn_submit"]))
{
	$title=$_POST["txt_title"];
	$details=$_POST["txt_details"];
	$ins="insert into tbl_complaint(complaint_title,complaint_detailss,user_id,complaint_date)
	values('$title','$details','".$_SESSION['uid']."',curdate())";
	mysql_query($ins);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserComplaint</title>
</head>

<body>
<center><h2><b>Complaint</b></h2></center>

<form method="post">


<table width="200" border="1" align="center">
  <tr>
    <td>Title</td>
    <td><label for="txt_title2"></label>
      <input type="text" name="txt_title" id="txt_title2"  pattern="[A-Za-z. ]{1,}" autocomplete="off" required /></td>
  </tr>
  <tr>
    <td>Details</td>
    <td><label for="txt_details"></label>
      <textarea name="txt_details" id="txt_details" cols="45" rows="5"  pattern="[A-Za-z. ]{3,}" autocomplete="off" required ></textarea></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" />
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