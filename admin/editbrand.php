
<?php
if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{
 

 include("inc/db.php"); 
 
 if(isset($_GET['editb'])){
	 $bid=$_GET['editb'];

	$editbrand="select * from brands where brandid='$bid'";
	$runbrand=mysqli_query($con,$editbrand);
	$rowbrandedit=mysqli_fetch_array($runbrand);
	$brandtit=$rowbrandedit['brandtitle'];
	$brandid=$rowbrandedit['brandid'];
	
}
	



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
 

<form action="" method="post" >
 <table align="center" border="2px solid"> 
<tr align="center">
  <th colspan="3"><h2><b>Edit Brand</b></h2></th>
  
</tr> 
<tr>
 <td><input type="text" name="newbrand" value="<?php echo $brandtit ?>"/></td>
 <td><input type="submit"  name="submiteditbrand"value="Edit Brand"/></td>
 
</tr>

 
 </table>

</form>


</body>
</html>
<?php
 if(isset($_POST['submiteditbrand'])){
	 $brandname=$_POST['newbrand'];
	 $updb="update brands set brandtitle='$brandname' where brandid='$brandid'";
	 $runupd=mysqli_query($con,$updb);
	 if($runupd){
		echo " <script> alert('One Brand Has Been updated ')</script>";
				echo "<script> window.open('index.php?viewbrand','_self')</script>";
		
		}
	 
	 }



?><?php } ?>