<?php if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{
 

include("inc/db.php");
if(isset($_GET['delcust'])){
	$custid=$_GET['delcust'];
	$delc="delete from customers where custid='$custid'";
	$rundelc=mysqli_query($con,$delc);
	if($rundelc){
		echo"<script>alert('One Customer has been deleted')</script>";
		echo"<script>window.open('index.php?vcust','_self')</script>";
		
		
		}
	
	
	
	
	}




?>
<?php } ?>