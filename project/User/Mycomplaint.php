<?php
	include("../Assets/Connection/Connection.php");
  ob_start();
  include('Head.php');
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
</title>
</head>
<body>
<center><h2><b>MyComplaint</b></h2></center>

<table width="600" border="1" align="center">
  <tr>
    <td>slno</td>
    <td>UserName</td>
    <td>ComplaintTitle</td>
    <td>ComplaintDetails</td>
    <td>complaint
    Reply</td>
    <td>Complaint Date</td>
  </tr>
   <?php
  $i=0;
  $selqry="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id where c.user_id=".$_SESSION['uid'];
  $data=mysql_query($selqry);
  while($row=mysql_fetch_array($data))
  {
	  $i++;
	  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["user_name"]?></td>
    <td><?php echo $row["complaint_title"]?></td>
    <td><?php echo $row["complaint_detailss"]?></td>
    <?php
    if($row["complaint_reply"] =="")
    {
		?>
		<td style="color:red">N/A</td>
		<?php
    }
    else
    {
    	?>
		<td><?php echo $row["complaint_reply"]?></td>
		<?php
    }
	
	?>
    <td><?php echo $row["complaint_date"]?></td>
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