<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST["submit"]))
{
	$subcat=$_POST["d2"];
	$cat=$_POST["sel_district"];
	$ins="insert into tbl_place(place_name,district_id)
	values('$subcat','$cat')";
	mysql_query($ins);
}

if($_GET["did"])
	{
	$did=$_GET["did"];
	$delqry="delete from tbl_place where place_id='$did'";
	mysql_query($delqry);
	}	
  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>

<body>
<center><h2><b>place</b></h2></center>

<form method="post">


<table width="200" border="1" align="center">
  <tr>
    <td>District</td>
    <td>
      <label for="d"></label>
    
      <select name="sel_district" id="sel_district">
      <option value="">--select--</option>
      <?php
	  $selQry="select * from tbl_district";
	  $data=mysql_query($selQry);
	  while($row=mysql_fetch_array($data))
	  {
	  ?>
      <option value="<?php echo $row["district_id"]?>"><?php echo $row['district_name']; ?></option>
	  <?php
	  }
	  ?>
        </select>
   </td>
  </tr>
  <tr>
    <td>Place</td>
    <td>
      <label for="d2"></label>
      <input type="text" name="d2" id="d2"  pattern="[A-Za-z. ]{3,}" autocomplete="off" required />
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="submit" id="submit" value="Submit" />
      </div>
   </td>
  </tr>
</table>
<br>
</form>
<table width="200" border="1" align="center">
  <tr>
    <td>slno</td>
    <td>district</td>
    <td>place</td>
    <td>action</td>

</tr>
<tr>
  <?php
	$i=0;
	$selqry="select *from tbl_place s inner join tbl_district c on s.district_id=c.district_id";
		$data=mysql_query($selqry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
	    ?>
        <tr>
        <td><?php echo $i?> </td>
		<td><?php echo $row["district_name"] ?></td>
        <td><?php echo $row["place_name"] ?></td>
        <td><a href ="Place.php?did=<?php echo $row["place_id"] ?>"> Delete</a></td>
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