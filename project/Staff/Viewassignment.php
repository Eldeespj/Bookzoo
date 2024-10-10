<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ViewAssignment</title>
</head>

<body>
<center><h2><b>ViewAssignment</b></h2></center>

<form>

  <table width="200" border="1" align="center">
    <tr>
      <td>Slno</td>
      <td>Date</td>
      <td>CellName</td>
      <td>Staff Name</td>
    
    </tr>
    <tr>
         <?php
	$i=0;
	 $selQry="select * from tbl_assignduty  a inner join tbl_staff s on a.staff_id=s.staff_id inner join tbl_cell c on a.cell_id=c.cell_id where  s.staff_id='".$_SESSION['sid']."'";
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
        <?php
	}
	?>
    </tr>
  </table>
</form>
</body>
<?php
          include('Foot.php');
          ob_flush();
          ?>
</html>
