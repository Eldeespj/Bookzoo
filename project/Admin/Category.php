<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_POST["submit"]))
{
	$dbname=$_POST["g"];
	$ins="insert into tbl_category(category_name)
	values('$dbname')";
	mysql_query($ins);
}
if(isset($_GET['did'])){
	$delQry="delete from tbl_category where category_id=".$_GET['did'];
	mysql_query($delQry);
	header("location: category.php");
}
?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
</head>

<body>
<center><h2><b>Category</b></h2></center>
<form id="form1" name="form1" method="post" action="Category.php">


<table width="200" border="1" align="center">
  <tr>
    <td width="64">Category</td>
    <td width="120"><label for="g"></label>
      <input type="text" name="g" id="category"  pattern="[A-Za-z. ]{3,}" autocomplete="off" required /></td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="submit" id="submit" value="Submit" />
      </div>
    </td>
  </tr>
 
</table>
</form>
<p>&nbsp;</p>
<table width="200" border="1" align="center">
  <tr>
    <td height="32">sl no</td>
    <td>category</td>
    <td>Action</td>
  </tr>

    <?php
	$i=0;
	$selQry="select * from tbl_category";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
	    ?>
        <tr>
        <td><?php echo $i?> </td>
		<td><?php echo $row["category_name"] ?></td>
        <td><a href ="Category.php?did=<?php echo $row["category_id"] ?>"> Delete</a></td>
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