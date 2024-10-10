<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset( $_POST['submit']))
{
$date=$_POST['n'];
$staff=$_POST['sel_staff'];
$cell=$_POST['txt_cell'];
 $sel="insert into tbl_assignduty (assign_date,cell_id,staff_id) values ('$date','$cell','$staff')";
if(mysql_query($sel))
{
$update="update tbl_assignduty set assignduty_status=1 where staff_id=".$_POST['sel_staff'];	
mysql_query($update);
}
}	
if($_GET["cid"])
{
	$del="delete from tbl_assignduty where assign_id=".$_GET['cid']."";
	mysql_query($del);

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AssignDuty</title>
</head>

<body>	
<center><h2><b>AssignDuty</b></h2></center>	
      <form method="post">
     

        <table width="300" border="1" cellpadding="10" align="center">
          <tr>
            <td>Date</td>
            <td><label for="n"></label>
            <input type="date" name="n" id="n" /></td>
          </tr>
          <tr>
           <tr>
            <td>cell Name</td>
            
              
                <?php
	  $selQry="select * from tbl_animalreg a inner join tbl_cell c on a.cell_id=c.cell_id where animalreg_id=".$_GET['cid'];
	  $data=mysql_query($selQry);
	  $row=mysql_fetch_array($data)
	 
	  ?>
             <td>
             <input type="hidden" value="<?php echo $row["cell_id"]; ?>" readonly="readonly" name="txt_cell" /> 
             <?php echo $row["cell_name"]; ?>
            </td>
          </tr>
            <td>staff Name</td>
            <td>
              <select name="sel_staff" id="sel_staff">
                <option value="">--select--</option>
                <?php
	  $selQry="select * from tbl_staff";
	  $data=mysql_query($selQry);
	  while($row=mysql_fetch_array($data))
	  {
	  ?>
                <option value="<?php echo $row["staff_id"]?>"><?php echo $row['staff_name']; ?></option>
                <?php
	  }
	  ?>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
              <input type="submit" name="submit" id="submit" value="Submit" />
            </div></td>
          </tr>
        </table>
      </form>
      <br />
    <table width="400" cellpadding="10" border="1" align="center">
    <tr>
      <td>Slno</td>
      <td>Date</td>
      <td>CellName</td>
      <td>Staff Name</td>
      <td>Action</td>

    </tr>
    <tr>
         <?php
	$i=0;
	 $selQry="select * from tbl_assignduty  a inner join tbl_staff s on a.staff_id=s.staff_id inner join tbl_cell c on a.cell_id=c.cell_id ";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
	    ?>
        <tr>
        <td><?php echo $i?> </td>
		<td><?php echo $row["assign_date"] ?></td>
        <td><?php echo $row["cell_name"] ?></td>
        <td><?php echo $row["staff_name"] ?></td>
                <td><a href ="Assignduty.php?cid=<?php echo $row["assign_id"] ?>"> RemoveStaff</a></td>
  
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