<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StaffEditProfile</title>
</head>

<body>
<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST["submit"]))
{
	$name=$_POST["k"];
	$contact=$_POST["j"];
	$address=$_POST["n"];
	$sel="update tbl_staff set staff_name='$name' ,staff_contact='$contact',staff_address='$address' where staff_id = ".$_SESSION['sid'];
	if(mysql_query($sel))
  {
    ?>
    <script>
      alert("Updated");
      window.location="MyProfile.php";
    </script>
    <?php
  }

}
$sel="select * from tbl_staff where staff_id='".$_SESSION['sid']."'";
$dataQry=mysql_query($sel);
$rowUser=mysql_fetch_array($dataQry);
?>
<center><h2><b>EditProfile</b></h2></center>

<form method="Post">
  <table  border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="k"></label>
      <input type="text" name="k" id="k"  value="<?php echo $rowUser["staff_name"]?>"  pattern="[A-Za-z. ]{3,}" autocomplete="off" required /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="j"></label>
      <input type="text" name="j" id="j"value="<?php echo $rowUser["staff_contact"]?>" pattern="[6-9]{1}[0-9]{9}" 
                title="Phone number with 6-9 and remaing 9 digit with 0-9" autocomplete="off" required  /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="n"></label>
      <input type="text" name="n" id="n" value=<?php echo $rowUser["staff_address"]?>   autocomplete="off" required /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="submit" id="submit" value="update" />
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
