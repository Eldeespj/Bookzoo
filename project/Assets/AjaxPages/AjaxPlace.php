<option value="">___select ___</option>
<?php
include("../Connection/Connection.php");
$district=$_GET["did"];
$sel="select * from tbl_place where district_id='$district'";
$data=mysql_query($sel);
while($row=mysql_fetch_array($data))
{
	?>
	<option value="<?php echo $row['place_id'] ?>">
	<?php echo $row['place_name']?></option>
	<?php
}
?>