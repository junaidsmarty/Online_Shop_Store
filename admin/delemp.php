
<?php
if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{
 

include("inc/db.php");
if(isset($_GET['dele'])){
	$cid=$_GET['dele'];
	$qdd="delete from employee where empid='$cid'";
	$runqdd=mysqli_query($con,$qdd);
	if($runqdd){
		echo"<script>alert('One employee has been deleted')</script>";
		echo"<script>window.open('index.php?ve','_self')</script>";
		
		
		}
	
	
	
	
	}




?><?php }?>