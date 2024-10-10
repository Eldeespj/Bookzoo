
<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST["submit"]))
{
	$nme=$_POST["txt_name"];

	$subcat=$_POST["subcat"];
	

$ins="insert into tbl_animal(animal_name,subcategory_id)
values('".$nme."','".$subcat."')";
mysql_query($ins);
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Animal</title>
</head>

<body>
  <center><h2><b>AnimalRegistration</b></h2></center>

<form method="post">

  <table width="405" height="228" border="1" align="center">
    <tr>
      <td>Animal name</td>
      <td><label for="d"></label>
      <input type="text" name="txt_name" id="d"  pattern=[AZaz. ]{3,} autocomplete="off" required  /></td>
    </tr>
    <tr>
      <td>Category</td>
      <td>
      
       <select name="sel_cat" id= "sel_dis" onChange="getsub(this.value)">
          <option value="">--Select--</option>
          <?php
		  		$SelQry1= " select * from tbl_category ";
				$data1 = mysql_query($SelQry1);
				while($row = mysql_fetch_array($data1))
				{
					?>
                    <option value="<?php echo $row["category_id"]?> "><?php echo $row["category_name"]?></option>
                    <?php
				}
		  ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>SubCategory</td>
      <td><label for="c"></label>
        <select name="subcat" id="c">
        <option value="">--select--</option>
      </select></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="submit" id="submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <br />
  <table width="200" border="1" align="center">
  <br />
    <tr>
      <td>slno</td>
      <td>Animal name</td>
      <td>Category Name</td>
      <td>SubCategory Name</td>
    </tr>
    <tr>
      <?php
	$i=0;
	 $selQry="select * from tbl_animal a inner join tbl_subcategory s on s.subcategory_id=a.subcategory_id inner join tbl_category c on c.category_id=s.category_id  ";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
	    ?>
        <tr>
        <td><?php echo $i?> </td>
		<td><?php echo $row["animal_name"] ?></td>
        <td><?php echo $row["category_name"] ?></td>
        <td><?php echo $row["subcategory_name"] ?></td>
       </tr>
        <?php
	}
	?>
    </tr>
  </table>
</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getsub(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/Ajaxsubcategory.php?did="+did,
		success: function(html){
			$("#c").html(html);
		}
	});
}
</script>
<?php
          include('Foot.php');
          ob_flush();
          ?>
</html>