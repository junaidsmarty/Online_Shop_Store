<?php

include("inc/db.php");
if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{

 
?>

<form method="post">
<table align="center" border="2px solid brown">
<tr>
<th colspan="2"><b style="color:white">Insert Department</b></th>
</tr>
<tr>
<td><b style="color:white">Department Name</b></td>
<td><input type="text" name="dep"/></td>
</tr>
<tr>
<td><b style="color:white">Category Controlled</b></td>
<td>
<select name='catid'>
<?php
$q="select * from categories";
$ru=mysqli_query($con,$q);
while($fet=mysqli_fetch_array($ru)){
$prodid=$fet['prodid'];
$prodtitle=$fet['prodtitle'];
echo"

<option value='$prodid'>$prodtitle</option>


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
	$dep=$_POST['dep'];
	$cat=$_POST['catid'];
	$s="INSERT INTO `department`(depname,catcontrolled) VALUES ('$dep','$cat')";
	$runs=mysqli_query($con,$s);
	if($runs){
		echo"<script>
		alert('Inserted')
		</script>";
		
		
		}
	
	
	}

?>
<?php }?>