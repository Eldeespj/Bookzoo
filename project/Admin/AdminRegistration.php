
<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_POST["submit"]))
{
	$aname=$_POST["d"];
	$acontact=$_POST["s"];
	$aemail=$_POST["b"];
	$apassword=$_POST["d2"];
	$selAdmin="select * from tbl_admin where admin_email='$aemail'";
	$selStaff="select * from tbl_staff where staff_email='$aemail'";
  $selUser="select * from tbl_user where User_email='$aemail'";

	$resUser=mysql_query($selUser);
	$resAdmin=mysql_query($selAdmin);
	$resStaff=mysql_query($selStaff);
	if(mysql_fetch_array($resAdmin) || mysql_fetch_array($resUser) || mysql_fetch_array($resStaff))
	{
		?>
        <script>
alert("Already Exist");
		</script>
        <?php
	}
	else
	{
	$ins="insert into tbl_admin(admin_name,admin_contact,admin_email,admin_password)
	values('$aname','$acontact','$aemail','$apassword')";
	mysql_query($ins);
    }
}
if(isset($_GET['did'])){
	$delQry="delete from tbl_admin where admin_id=".$_GET['did'];
	mysql_query($delQry);
	header("location: adminregistration.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zoo::AdminRegistration</title>
</head>

<body>


<center><h2><b>AdminRegistration</b></h2></center>
<form method="post">
<table width="344" border="1"align="center">
  <tr>
    <td width="77">Name</td>
    <td width="251">
      <label for="d"></label>
      <input type="text" name="d" id="d"  pattern="[A-Za-z. ]{3 ,}" autocomplete="off" required />
    </td>
  </tr>
  <tr>
    <td>Contact</td>
    <td>
      <label for="s"></label>
      <input type="text" name="s" id="s"  pattern="[6-9]{1}[0-9]{9}" 
                title="Phone number with 6-9 and remaing 9 digit with 0-9" autocomplete="off" required/>
   </td>
  </tr>
  <tr>
    <td>Email</td>
    <td>
      <label for="b"></label>
      <input type="email" name="b" id="b" />
    </td>
  </tr>
  <tr>
    <td>Password</td>
    <td>
      <label for="d2"></label>
      <input type="password" name="d2" id="d2"   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required/>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="submit" id="submit" value="Submit" />
        <input type="submit" name="cancel" id="cancel" value="cancel" />
      </div>
    </td>
  </tr>
</table>
</form>
<br />
<table width="200" border="1"align="center">
  <tr>
    <td>Slno</td>
    <td>Name</td>
    <td>contact</td>
    <td>Email</td>
    <td>Password</td>
    <td>Action</td>
  </tr>
  <tr>
   <?php
   $i=0;
   $selQry="select * From tbl_admin";
   $data=mysql_query($selQry);
   while($row=mysql_fetch_array($data))
   {
	   $i++;
	   ?>
       <tr>
       <td><?Php echo $i?></td>
       <td><?php echo $row["admin_name"]?></td>
       <td><?php echo $row["admin_contact"]?></td>
       <td><?php echo $row["admin_email"]?></td>
       <td><?php echo $row["admin_password"]?></td>
        <td><a href ="AdminRegistration.php?did=<?php echo $row["admin_id"] ?>"> Delete</a></td>
       </tr>
  <?php
   }
   ?>
</table>
</body>
<?php
          include('Foot.php');
          ob_flush();
          ?>
</html>
