<?php if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{
 

include("inc/db.php");
if(isset($_GET['delorders'])){
	$ccid=$_GET['delorders'];
	$qdd="delete from pendorders where orderod='$ccid'";
	$runqdd=mysqli_query($con,$qdd);
	if($runqdd){
		echo"<script>alert('One Order has been deleted')</script>";
		echo"<script>window.open('index.php?Vorders','_self')</script>";
		
		
		}
	
	
	
	
	}




?>
<?php } ?>