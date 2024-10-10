
<option value="">___select ___</option>
<?php
include("../Connection/Connection.php");
$cat=$_GET["did"];
$sel="select * from tbl_category where category_id='$cat'";
$data=mysql_query($sel);
while($row=mysql_fetch_array($data))
{
	?>
	<option value="<?php echo $row['category_id'] ?>">
	<?php echo $row['category_name']?></option>
	<?php
}
?>