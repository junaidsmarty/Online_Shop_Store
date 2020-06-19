
<?php
if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{
 

include("inc/db.php");
if(isset($_GET['deld'])){
	$cid=$_GET['deld'];
	$qdd="delete from department where depid='$cid'";
	$runqdd=mysqli_query($con,$qdd);
	if($runqdd){
		echo"<script>alert('One department has been deleted')</script>";
		echo"<script>window.open('index.php?vd','_self')</script>";
		
		
		}
	
	
	
	
	}




?><?php }?>