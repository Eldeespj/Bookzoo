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
	$plc=$_POST["sel_place"];
	$pwd=$_POST["pwd"];
	$selUser="select * from tbl_user where user_email='$eml'";
	$selAdmin="select * from tbl_admin where admin_email='$eml'";
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
	
$image=$_FILES['file_image']['name'];
$path=$_FILES['file_image']['tmp_name'];
move_uploaded_file($path,"../Assets/Files/User/".$image);

$ins="insert into tbl_user(user_name,user_email,user_address,user_contact,user_image,place_id,user_password)
values('".$nme."','".$eml."','".$add."','".$cnt."','".$image."','".$plc."','".$pwd."')";
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
<center><h2><b> User Registration</b> </h2></center>
<form enctype="multipart/form-data" action="" method="post">
<div align="center">

  <table width="258" height="280" border="2">
    <tr>
      <td width="107">Name</td>
      <td><input type="text" name="name" id="name"  pattern="[A-Za-z. ]{3,}" autocomplete="off" required />
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
        <input type="email" name="email" id="email" />
      </td>
    </tr>
    <tr>
      <td><p>Address</p></td>
      <td><label for="c"></label>
        <textarea name="address" id="c" cols="45" rows="5" autocomplete="off" required ></textarea></td>
    </tr>
      <tr>
      <td>Contact</td>
      <td><label for="c2"></label>
        <input type="text" name="contact" id="c2" pattern="[6-9]{1}[0-9]{9}" 
                title="Phone number with 6-9 and remaing 9 digit with 0-9" autocomplete="off" required  /></td>
    </tr>
     <tr>
      <td>Photo</td>
      <td>
        <p>
          <input type="file" name="file_image" id="photo" required />
        
        </p></td>
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
      <td>Password</td>
      <td><input name="pwd" type="password" id="pwd" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required  />
      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_sve" id="btn_sve" value="Save" /> 
        <input type="submit" name="btn_can" id="btn_can" value="Cancel" />
      </div></td>
      </tr>
  </table>
</div>
<div align="center"></div>
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