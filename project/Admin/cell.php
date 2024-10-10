
<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_POST["submit"]))
{
	$cname=$_POST["txt_cell"];
	$ins="insert into tbl_cell(cell_name)
	values('$cname')";
	mysql_query($ins);
}
if($_GET["did"])
	{
	$did=$_GET["did"];
	$delqry="delete from tbl_cell where cell_id='$did'";
	mysql_query($delqry);
	header("location:cell.php");
	}	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cell</title>
</head>

<body>
<center><h2><b>cellRegistration</b></h2></center>

<form method="post">


  <table width="200" border="1" align="center">
    <tr>
      <td>Cell Name</td>
      <td><label for="k"></label>
      <input type="text" name="txt_cell" id="k" pattern="[A-Za-z -. ]{3,}" autocomplete="off" required  /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="submit" id="f" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
<br />
<table width="333" height="97" border="1" cellpadding="5" align="center">
  <tr>
    <td width="49" height="48">SI No</td>
    <td width="44">cell</td>
    <td width="61">Action</td>
  </tr>
  <?php
  $i=0;
  $selqry="select * from tbl_cell";
  $data=mysql_query($selqry);
  while($row=mysql_fetch_array($data))
  {
	  $i++;
	  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["cell_name"]?></td>
    <td><a href="cell.php?did=<?php echo $row["cell_id"]?>">Delete</td>
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