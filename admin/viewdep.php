<?php 
if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

td, th {
  border: 2px solid #dddddd;
  text-align: center;
  padding: 5px;
  
}

tr{
	background-color:#999;
	
	
	}
	.insert{
		color:#000;
		cursor:pointer;
		}
	h2{
		text-align:center;}
		.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid black;
}


.button1:hover {
  background-color:red;
  color: white;
}
	
	
</style>

</head>

<body>

<table align="center" bgcolor="#999966" width="750">
 <tr>
 <td colspan="5"><h2>View ALL Brands</h2></td>
 
 
 </tr>
 <tr>
   <th>Department ID</th>
   <th>Department Name</th>
   <th> Department Category</th>
   <th>Edit</th>
   <th>Delete</th>


 </tr>
<?php

include("inc/db.php");
$getbrands="select * from department";
			 $runb=mysqli_query($con,$getbrands);
	while($fetchcat=mysqli_fetch_array($runb)){
	$depid=$fetchcat['depid'];
	$depname=$fetchcat['depname'];	
	
	$depcon=$fetchcat['catcontrolled'];		 
?>
 <tr align="center">
   <td><?php echo $depid ?></td>
   <td><?php echo $depname ?></td>
   
   <td><?php echo $depcon ?></td>
  
    <td><button class='button button1'><a href="index.php?deld=<?php echo $depid ?>" style="text-decoration:none; color:#333;">Delete Department</a></button> </td>
 
 
 
 </tr>
 <?php } ?>

</table>
</body>
</html>
<?php }?>