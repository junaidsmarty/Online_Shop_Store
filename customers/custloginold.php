<?php 
@session_start();
include("includes/dbcon.php")

?>

<div>
   <form action="../checkout.php" method="post">
   
  <table align="center" bgcolor="#999999">
  <tr align="center"><td><h1>Login or Register</h1></td></tr>
      <tr>
      <td><b>Name:</b></td><td><input type="text" name="user_email" placeholder="Enter Your Email Here"/><br /></td>
      </tr>
      <tr>
      <td><b>Password:</b></td><td><input type="password" name="passwordd"/><br/></td>
      </tr>
      <tr align="center">
        <td colspan="4"> <a href="checkout.php?forgotpass">Forgot Password?</a></td>
      </tr>
      <tr align="center">
      <td colspan="4"><input type="submit" name="login" value="login"/></td>
      
      </tr>
   </table>
   
   </form>
<?php 
if(isset($_GET['forgotpass'])){
  echo"
  <div align='center'> 
   <form method='post'>
    <b><h1>Enter Your Email below we will send your Password to your Email</h1></b><br>
	<input type='text' name='custemail' placeholder='Enter Your Email'/><br>
	<input type='submit' name='forgot' value='Send Password'/><br>
	</form>
  </div>
  
  ";
  
  if(isset($_POST['forgot'])){
	 $email= $_POST['custemail'];
	 $q="select * from customers where cust_email='$email'";
	 $rinq=mysqli_query($con,$q);
	 $f=mysqli_fetch_array($rinq);
	 $name=$f['custname'];
	 $pass=$f['custpass'];
	 $count=mysqli_num_rows($rinq);
	 if($count==0){
		 echo "<b><h2>Sorry this email doesnt exist!Make sure you have entered the right email</h2></br>";
		 exit();
		 }
	  else{
		  $from="admin@mysite.com";
		  $subject="Your Password";
		  $msg="<html>
		   Dear $name,
		   Your Password is $pass! 
		 <h1>  Thanks for trusting us!</h1>
		  
		  
		  
		  </html>";
		  mail($email,$subject,$msg,$from);
		  echo "alert('Email was sent to you Email')";
		  echo "<script>window.open('checkout.php','_self')</script>";
		  
		  
		  }
	  }	
	

}
?>
<h2 style="color:#FFF; float:right; padding:10px"><a href="register.php">Register Yourself</a></h2>


</div>
<?php 
if(isset($_POST['login'])){
 $email=$_POST['user_email'];	
 $pass=$_POST['passwordd'];
 $selcus="select * from customers where cust_email='$email' AND custpass='$pass' ";
 $runcus=mysqli_query($con,$selcus);
 $checkcustomer=mysqli_num_rows($runcus);
 $ip=getoIp();
 $selcart="select * from cart where ipadd='$ip'";
$runselcart= mysqli_query($con,$selcart);
$checkcart=mysqli_num_rows($runselcart);
if($checkcustomer==0){
echo "<script>alert('Incorrect Email or Password! Try again!')</script>";
}
 if($checkcustomer==1 AND $checkcart==0){
	 $_SESSION['cust_email']=$email;
 echo "<script>window.open('customers/myaccount.php','_self')</script>";
 }
 else if($checkcustomer >0 AND $checkcart >0){
	  $_SESSION['cust_email']=$email;
	  echo "<script>alert('login successfully')</script>";
	 include("paymentopt.php");
}
}
?>

