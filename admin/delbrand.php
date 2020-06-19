<?php
include("inc/db.php");
if(isset($_GET['delb'])){
	$bid=$_GET['delb'];
	$qdd="delete from brands where brandid='$bid'";
	$runqdd=mysqli_query($con,$qdd);
	if($runqdd){
		echo"<script>alert('One brand has been deleted')</script>";
		echo"<script>window.open('index.php?viewbrand','_self')</script>";
		
		
		}
	
	
	
	
	}




?>