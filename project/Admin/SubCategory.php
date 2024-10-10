<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST["submit"]))
{
	$subcat=$_POST["d2"];
	$cat=$_POST["sel_district"];
	$ins="insert into tbl_subcategory(subcategory_name,category_id)
	values('$subcat','$cat')";
	mysql_query($ins);
}

if(isset($_GET['did'])){
	$delQry="delete from tbl_subcategory where subcategory_id=".$_GET['did'];
	mysql_query($delQry);
	header("location: subcategory.php");
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SubCategory</title>
</head>

<body>
<center><h2><b>Subcategory</b></h2></center>

<form method="post">


<table width="200" border="1" align="center">
  <tr>
    <td>Category</td>
    <td>
      <label for="d"></label>
    
      <select name="sel_district" id="sel_district">
      <option value="">____select___</option>
      <?php
	  $selQry="select * from tbl_category";
	  $data=mysql_query($selQry);
	  while($row=mysql_fetch_array($data))
	  {
	  ?>
      <option value="<?php echo $row["category_id"]?>"><?php echo $row['category_name']; ?></option>
	  <?php
	  }
	  ?>
        </select>
   </td>
  </tr>
  <tr>
    <td>SubCategory</td>
    <td>
      <label for="d2"></label>
      <input type="text" name="d2" id="d2" pattern="[A-Za-z. ]{3,}" autocomplete="off" required  />
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
</form>
<br>
<table width="200" border="1" align="center">
  <tr>
    <td>slno</td>
    <td>category</td>
    <td>subcategory</td>
    <td>action</td>

</tr>
<tr>
  <?php
	$i=0;
	$selqry="select *from tbl_subcategory s inner join tbl_category c on s.category_id=c.category_id";
		$data=mysql_query($selqry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
	    ?>
        <tr>
        <td><?php echo $i?> </td>
		<td><?php echo $row["category_name"] ?></td>
        <td><?php echo $row["subcategory_name"] ?></td>
        <td><a href ="SubCategory.php?did=<?php echo $row["subcategory_id"] ?>"> Delete</a></td>
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