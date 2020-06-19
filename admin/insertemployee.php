<?php

include("inc/db.php");
if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
else{

 
?>

<form method="post">
<table align="center" border="2px solid brown">
<tr>
<th colspan="2"><b style="color:white">Insert Employee</b></th>
</tr>
<tr>
<td><b style="color:white">Employee Name</b></td>
<td><input type="text" name="emp"/></td>
</tr>
<tr>
<td><b style="color:white">Employee Email</b></td>
<td><input type="text" name="empmail"/></td>
</tr>
<tr>
<td><b style="color:white">Employee Salary</b></td>
<td><input type="text" name="empsal"/></td>
</tr>
<tr>
<td><b style="color:white">Employee Contact</b></td>
<td><input type="text" name="empcon"/></td>
</tr>



<tr>
<td><b style="color:white">Employee Department</b></td>
<td>
<select name='empid'>
<?php
$q="select * from department";
$ru=mysqli_query($con,$q);
while($fet=mysqli_fetch_array($ru)){
$depid=$fet['depid'];
$depname=$fet['depname'];
echo"

<option value='$depid'>$depname</option>


";
}

?>
</select>
</td>

<tr>
<td colspan="2"><input type="submit" name="insert"/></td>

</tr>
</table>
</form>
<?php
if(isset($_POST['insert'])){
	$emp=$_POST['emp'];
	$empmail=$_POST['empmail'];
	$empsal=$_POST['empsal'];
	$empcon=$_POST['empcon'];
	$empid=$_POST['empid'];
	$s="INSERT INTO `employee`(`empname`, `empemail`, `salary`, `empcon`, `depid`) VALUES ('$emp','$empmail','$empsal','$empcon','$empid')";
	$runs=mysqli_query($con,$s);
	if($runs){
		echo"<script>
		alert('Inserted')
		</script>";
		
		
		}
	
	
	}

?>
<?php } ?>