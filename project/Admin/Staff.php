<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST["btn_sve"]))
{
	$nme=$_POST["name"];
	$eml=$_POST["email"];
	$add=$_POST["address"];
	$cnt=$_POST["contact"];
	$pwd=$_POST["pwd"];
	$plc=$_POST["sel_place"];
	
$image=$_FILES['file_image']['name'];
$path=$_FILES['file_image']['tmp_name'];
move_uploaded_file($path,"../Assets/Files/Staff/Image/".$image);
$proof=$_FILES['file_proof']['name'];
$path1=$_FILES['file_proof']['tmp_name'];
move_uploaded_file($path1,"../Assets/Files/Staff/Proof/".$proof);
$selAdmin="select * from tbl_admin where admin_email='$eml'";
$selUser="select * from tbl_user where user_email='$eml'";
$selStaff="select * from tbl_staff where staff_email='$eml'";
	$resUser=mysql_query($selUser);
	$resAdmin=mysql_query($selAdmin);
	$resStaff=mysql_query($selStaff);
	if(mysql_fetch_array($resAdmin) || mysql_fetch_array($resUser) || mysql_fetch_array($resStaff))
	{
		?>
        <script>
		alert('Email Already Exist')
		</script>
        <?php
	}
	else
	{

$ins="insert into tbl_staff(staff_name,staff_email,staff_address,staff_contact,staff_photo,staff_proof,staff_password,place_id)
values('".$nme."','".$eml."','".$add."','".$cnt."','".$image."','".$proof."','".$pwd."','".$plc."')";
mysql_query($ins);

    }
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<center><h2><b>StaffRegistration</b></h2></center>

<form enctype="multipart/form-data" method="POST">

  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="r"></label>
      <input type="text" name="name" id="r" pattern="[A-Za-z. ]{3,}" autocomplete="off" required  /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="f"></label>
      <input type="email" name="email" id="f" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="v2"></label>
      <input type="file" name="file_proof" id="v2" required />        <label for="f"></label></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="n"></label>
      <input type="file" name="file_image" id="n" required/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="v"></label>
      <input type="text" name="contact" id="v"   pattern="[6-9]{1}[0-9]{9}" 
                title="Phone number with 6-9 and remaing 9 digit with 0-9" autocomplete="off" required /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="r2"></label>
        <label for="d"></label>
      <textarea name="address" id="d" cols="45" rows="5" autocomplete="off" required /></textarea></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="r3"></label>
      <input type="text" name="pwd" id="r3" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required /> </td>
    </tr>
    <tr>
    <td>District</td>
      <td>
        <select name="sel_dis" id= "sel_dis" onChange="getPlace(this.value)">
          <option value="">--Select--</option>
          <?php
		  		$SelQry1= " select * from tbl_district ";
				$data1 = mysql_query($SelQry1);
				while($row = mysql_fetch_array($data1))
				{
					?>
                    <option value="<?php echo $row["district_id"]?> "><?php echo $row["district_name"]?></option>
                    <?php
				}
		  ?>
        </select></td>
    </tr>
    <tr>
    <td>Place</td>
      <td>
        <select name="sel_place" id="sel_place">
      <option>--select--</option>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_sve" id="submit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
		success: function(html){
			$("#sel_place").html(html);
		}
	});
}
</script>
<?php
          include('Foot.php');
          ob_flush();
          ?>
</html>