<?php
@session_start();
include("includes/dbcon.php");

function getIp(){
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
?>

<div>

<h2>Login Or Register </h2>
<form action="checkout.php" align="center" method="post">

<table width="600" bgcolor="#66CCCC" align="center" >
<tr>
<td> <b>Your Email:</b></td>
<td><input type="text" name="user_email" placeholder="Username" /> </td>
</tr>

<tr>
<td><b>Your Password:</b></td>

<td>
<input type="password" type="password" name="pass" placeholder="Password" />
</td>
</tr>

<tr align="center" ><td colspan="4"><a href="forgot_pass.php">Forgot Password?</a></td></tr>

<tr align="center">
<td colspan="4">
<input type="submit" name="login" value="Login" />
</td>
</tr> 
</div>

</table>
</form>

<h2 style="float:right; padding:10px;"><a href="register.php">New? Register Here</a></h2>

<?php 
if(isset($_POST['login'])){
 $email=$_POST['user_email'];	
 $pass=$_POST['pass'];
 $selcus="select * from customers where cust_email='$email' AND custpass='$pass' ";
 $runcus=mysqli_query($con,$selcus);
 $checkcustomer=mysqli_num_rows($runcus);
 $ip=getIp();
 $selcart="select * from cart where ipadd='$ip'";
$runselcart= mysqli_query($con,$selcart);
$checkcart=mysqli_num_rows($runselcart);
if($checkcustomer==0){
echo "<script>alert('Incorrect Email or Password! Try again!')</script>";
exit();
}
 if($checkcustomer==1 AND $checkcart==0){
	 $_SESSION['cust_email']=$email;
 echo "<script>window.open('./customers/myaccount.php','_self')</script>";
 }
 else if($checkcustomer >0 AND $checkcart >0){
	  $_SESSION['cust_email']=$email;
	  echo "<script>alert('login successfully, You can order now!')</script>";
	include("paymentopt.php");
}
}
?>