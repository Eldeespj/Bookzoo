<?php
	include("../Assets/Connection/Connection.php");
	ob_start();
	include('Head.php');
	
	 session_start();
	
	
	if(isset($_POST["btn_sub"]))
	  {
			
			 $upQry="update tbl_complaint set complaint_reply='".$_POST["text_no1"]."',complaint_status='1' where complaint_id='". $_SESSION["cid"]."'";
			 mysql_query($upQry);
			 
			 header("location:UserComplaintSolvedList.php");	
			 
	  }
	 
	 ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>UserComplaintReply</title>
	</head>
	
	<body>
	<a href="../Assets/HomePage.php">Home</a>
	<center><h2><b>UserComplaintReply</b></h2></center>

	<form id="form1" name="form1" method="post" action="">
	

	  <table width="200" border="1" align="center" align="center">
		<tr>
		  <td>Reply</td>
		  
		  <td><label for="text_no1"></label>
		  <textarea name="text_no1" id="text_no1"  pattern="[A-Za-z. ]{3,}" autocomplete="off" required ></textarea></td>
		</tr>
		<tr>
		  <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" />
		  <input type="reset" name="btn_re" id="btn_sub" value="cancel" /></td>
		</tr>
	  </table>
	  <p>&nbsp;</p>
	</form>
	
	  
	</body>
	<?php
          include('Foot.php');
          ob_flush();
          ?>
	</html