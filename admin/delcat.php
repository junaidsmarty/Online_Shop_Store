
<?php
if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{
 

include("inc/db.php");
if(isset($_GET['delcat'])){
	$cid=$_GET['delcat'];
	$qdd="delete from categories where prodid='$cid'";
	$runqdd=mysqli_query($con,$qdd);
	if($runqdd){
		echo"<script>alert('One Category has been deleted')</script>";
		echo"<script>window.open('index.php?viewprod','_self')</script>";
		
		
		}
	
	
	
	
	}




?><?php }?>