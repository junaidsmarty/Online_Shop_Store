
<?php
 
 if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{
 
include("inc/db.php"); 
 if(isset($_GET['editcat'])){
	 $gid=$_GET['editcat'];

	$editcat="select * from categories where prodid='$gid'";
	$runcat=mysqli_query($con,$editcat);
	$eowcatedit=mysqli_fetch_array($runcat);
	$cattit=$eowcatedit['prodtitle'];
	$catid=$eowcatedit['prodid'];
	
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
  <th colspan="3"><h2><b>Edit Category</b></h2></th>
  
</tr> 
<tr>
 <td><input type="text" name="newcategory" value="<?php echo $cattit ?>"/></td>
 <td><input type="submit"  name="editcate"value="Edit Category"/></td>
 
</tr>

 
 </table>

</form>


</body>
</html>
<?php
 if(isset($_POST['editcate'])){
	 $catname=$_POST['newcategory'];
	 $upd="update categories set prodtitle='$catname' where prodid='$catid'";
	 $runupd=mysqli_query($con,$upd);
	 if($runupd){
		echo " <script> alert('A Category Has Been updated ')</script>";
				echo "<script> window.open('index.php?viewcat','_self')</script>";
		
		}
	 
	 }



?>
<?php }?>