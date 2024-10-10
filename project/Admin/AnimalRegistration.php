<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST["btn_submit"]))
{
	$sub=$_POST["sel_sub"];
	$animal=$_POST["sel_ani"];
	$age=$_POST["animal_age"];
	$gender=$_POST["btn_gen"];
	$cell=$_POST["sel_cell"];
	$cat=$_POST["sel_cat"];

	$ins="insert into tbl_animalreg(subcategory_id,animal_id,animalreg_age,animalreg_gender,animalreg_join,cell_id,category_id)
	values('$sub','$animal','$age','$gender',curdate(),'$cell','$cat')";
	mysql_query($ins);
}

if($_GET["did"])
	{
	$did=$_GET["did"];
	$delqry="delete from tbl_animalreg where animalreg_id='$did'";
	mysql_query($delqry);
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<center><h2><b>AnimalAssignment</b></h2></center>

<form method="post">

  <table width="200" border="1" align="center">
  <tr>
    <td>category</td>
     <td><select name="sel_cat" id= "sel_cat" onchange="getsub(this.value)">
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
      
    </tr>
  </tr>
  <tr>
    <td>SubCategory</td>
    <td>
   
    <select name="sel_sub" id="sel_sub"  onchange="getanimal(this.value)">>
      <option>--select--</option>
        </select>
      
    </td>
  </tr>
  <tr>
    <td>Animal</td>
    <td>
     <select name="sel_ani" id= "sel_ani" >
            <option value="">--Select--</option>

      
     </select> 
   </td>
  </tr>
  <tr>
    <td>Age</td>
    <td>
      <label for="animal_age"></label>
      <input type="text" name="animal_age" id="animal_age"   pattern="[0-9]{1,}"autocomplete="off" required />
    </td>
  </tr>
  <tr>
    <td>Gender</td>
    <td>
      <input type="radio" name="btn_gen" id="m2" value="m"  pattern="[A-Za-z ]{4,}" autocomplete="off" required />
     M
      <label for="m2"></label>
      <input type="radio" name="btn_gen" id="j" value="F" />
    F
    </td>
  </tr>
<tr>
    <td>cell</td>
    <td><select name="sel_cell" id="sel_cell">
      <option value="">____select___</option>
      <?php
	  $selQry="select * from tbl_cell";
	  $data=mysql_query($selQry);
	  while($row=mysql_fetch_array($data))
	  {
	  ?>
      <option value="<?php echo $row["cell_id"]?>"><?php echo $row['cell_name']; ?></option>
      <?php
	  }
	  ?>
    </select>
     

    </td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="submit" value="Add" />
      </div></td>
    </tr>
   </table>
    <br />
  <table width="200" border="1" align="center">
    <tr>
      <td>slno</td>
      <td>Animal name</td>
      <td>Category Name</td>
      <td>SubCategory Name</td>
      <td>Cell Name</td>
      <td>Action</td>
      <td>Staff Asssignment</td>
    </tr>
    <tr>
      <?php
	$i=0;
	  $selQry="select * from tbl_animalreg a inner join tbl_subcategory s on s.subcategory_id=a.subcategory_id inner join tbl_cell cl on cl.cell_id=a.cell_id inner join tbl_animal al on al.animal_id=a.animal_id inner join tbl_category c on a.category_id=c.category_id";
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
        <td><?php echo $row["cell_name"] ?></td>
        <td><a href ="AnimalRegistration.php?did=<?php echo $row["animalreg_id"] ?>"> Delete</a>&nbsp;</td>
        <td><a href ="Assignduty.php?cid=<?php echo $row["animalreg_id"] ?>">Assign Staff</a></td>
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
			$("#sel_sub").html(html);
		}
	});
}
function getanimal(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/Ajaxanimal.php?did="+did,
		success: function(html){
			$("#sel_ani").html(html);
		}
	});
}

</script>
<?php
          include('Foot.php');
          ob_flush();
          ?>
</html>