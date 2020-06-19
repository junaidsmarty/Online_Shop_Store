<form action="" method="post">
<table width="500" align="center">
<tr align="center">
  <td colspan="4"><h1>Change your Password:</h1></td>
</tr>
 <tr>
 <td align="right">Enter Current password</td>
 <td><input type="password" name="cpas" placeholder="Enter Current Password"/></td>
 </tr>
<tr>
 <td align="right">Enter New password</td>
 <td><input type="password" name="npas" placeholder="Enter Current Password"/></td>
 </tr>
 <td align="right">Enter the New password again</td>
 <td><input type="password" name="anpas" placeholder="Enter Current Password"/></td>
 </tr> 
 <tr align="center">
  <td colspan="4"><input type="submit" name="change" value="Change Password"/></td>
 </tr>
</table>
</form>
<?php 
include("includes/dbcon.php");
$custemail=$_SESSION['cust_email'];
if(isset($_POST['change'])){
	$op=$_POST['cpas'];
	$np=$_POST['npas'];
	$anp=$_POST['anpas'];
	$sc="select * from customers where custpass='$op'";
	$rsc=mysqli_query($con,$sc);
	if(mysqli_num_rows($rsc)==0){
		echo"<script>alert('The password you entered is not valid,Try Again!')</script>";
		exit();
		}
		if($np!=$anp){
		echo"<script>alert('The passwords did not match,Enter Again!')</script>";
		exit();
		}
	   else{
		   $up="update customers set custpass='$np' where cust_email='$custemail'";
		   $rup=mysqli_query($con,$up);
		   echo"<script>alert('Your Password has been Changed!')</script>";
		     echo"<script>window.open('myaccount.php','_self')</script>";
		   
		   }
	}




?>