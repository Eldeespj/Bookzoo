<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
  	 session_start();
 if($_GET["did"])
   {
	   $did=$_GET[did];
	   $_SESSION["cid"]=$did;
	  
	   header("location:UserComplaintReply.php");
   }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserComplaint</title>
</head>

<body>
<center><h2><b>UserComplaint</b></h2></center>

<form id="form1" name="form1" method="post" action="UserComplaint.php">


  <table width="200" border="1" align="center">
    <tr>
      <td>Sl NO</td>
      <td>Title</td>
      <td>Detials</td>
      <td>UserName</td>
      <td>Contact</td>
      <td>Email</td>
      <td>Action</td>
    </tr>
<?php
$s=0;
$selQry="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id where c.complaint_status='0'";
$data=mysql_query($selQry);
while($row=mysql_fetch_array($data))
  {
	$s++;
?>
    <tr>
      <td><?php echo $s?></td>
      <td><?php echo $row["complaint_title"] ?></td>
      <td><?php  echo $row["complaint_detailss"] ?></td>
       <td><?php  echo $row["user_name"] ?></td>
        <td><?php  echo $row["user_contact"] ?></td>
           <td><?php  echo $row["user_email"] ?></td>
       <td><a href="UserComplaint.php?did=<?php echo $row["complaint_id"]?>">Reply</a></td>
    </tr>
    <?php
  }
  ?>
	
  </table>
</form>
</body>
<?php
          include('Foot.php');
          ob_flush();
          ?>
</html>
