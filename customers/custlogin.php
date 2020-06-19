<?php 
@session_start();
$con=mysqli_connect("localhost","root","","shop");
include("functions/fun.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="Login_v3/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="Login_v3/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Login_v3/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="Login_v3/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="Login_v3/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="Login_v3/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="Login_v3/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="Login_v3/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="Login_v3/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="Login_v3/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_v3/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('Login_v3/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="user_email" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="Login_v3/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="Login_v3/vendor/animsition/js/animsition.min.js"></script>
	<script src="Login_v3/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_v3/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="Login_v3/vendor/select2/select2.min.js"></script>
	<script src="Login_v3/vendor/daterangepicker/moment.min.js"></script>
	<script src="Login_v3/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="Login_v3/vendor/countdowntime/countdowntime.js"></script>
	<script src="Login_v3/js/main.js"></script>

</body>
</html>
<?php 
if(isset($_POST['login'])){
 $email=$_POST['user_email'];	
 $pass=$_POST['pass'];
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
 echo "<script>window.open('myaccount.php','_self')</script>";
 }
 else if($checkcustomer >0 AND $checkcart >0){
	  $_SESSION['cust_email']=$email;
	  echo "<script>alert('login successfully')</script>";
	echo "<script>window.open('../index.php','_self')</script>";
}
}
?>

