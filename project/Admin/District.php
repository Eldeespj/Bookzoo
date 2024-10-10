<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
$dname="";
if(isset($_POST["btn"]))
{
	$dname=$_POST["dname"];
	$ins="insert into tbl_district(district_name)values('$dname')";
	mysql_query($ins);
	header("location:District.php");
	}	
  if($_GET["did"])
	{
	$did=$_GET["did"];
	$delqry="delete from tbl_district where district_id='$did'";
	mysql_query($delqry);
	header("location:District.php");
	}	
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>
<body>
<center><h2><b>District</b></h2></center>

<a href="HomePage.php">Home</a>

<form id="form1" name="form1" method="post" action="District.php">

<table width="385" border="1" cellpadding="5" align="center">
  <tr>
    <td width="156">DISTRICT NAME</td>
    <td width="197"><label for="dname"></label>
      <input type="text" name="dname" id="dname"  pattern="[A-Za-z. ]{3,}" autocomplete="off" required  /></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn" id="btn" value="ADD" /> 
      <input type="submit" name="btn2" id="btn2" value="Cancel" />
    </div></td>
  </tr>
</table>
</form>
<table width="333" height="97" border="1" cellpadding="5" align="center">
  <tr>
    <td width="49" height="48">SI No</td>
    <td width="44">District</td>
    <td width="61">Action</td>
  </tr>
  <?php
  $i=0;
  $selqry="select * from tbl_district";
  $data=mysql_query($selqry);
  while($row=mysql_fetch_array($data))
  {
	  $i++;
	  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["district_name"]?></td>
    <td><a href="District.php?did=<?php echo $row["district_id"]?>">Delete</td>
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