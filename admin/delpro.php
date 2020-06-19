<?php
if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{
 

include("inc/db.php");
if(isset($_GET['deletepro'])){
	$pid=$_GET['deletepro'];
	$qd="delete from products where prodtid='$pid'";
	$runqd=mysqli_query($con,$qd);
	if($runqd){
		echo"<script>alert('One item has been deleted')</script>";
		echo"<script>window.open('index.php?viewprod','_self')</script>";
		
		
		}
	
	
	
	
	}




?>
<?php } ?>