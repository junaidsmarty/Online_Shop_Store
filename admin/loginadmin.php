<?php
session_start();
include("inc/db.php");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="logincss.css"/>
</head>


<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Site<span>Random</span></div>
		</div>
		<br>
		<div class="login">
			<form method="post">	
                <input type="text" placeholder="username" name="user"><br>
				<input type="password" placeholder="password" name="password"><br>
				<input type="submit" name="login" value="Login">
             </form>   
		</div>
 <?php
  if(isset($_POST['login'])){
	  $admin_email=$_POST['user'];
	  $admin_pass=$_POST['password'];
	  $q="select * from admin_panel where admin_email='$admin_email' and admin_pass='$admin_pass' ";
	  $runq=mysqli_query($con,$q);
	  if($x=mysqli_num_rows($runq)==1){
		  $_SESSION['admin_email']=$admin_email;
		  echo "<script>window.open('index.php?log=You Succesfully Log In','_self')</script>";
		  
		  }
	  
	  else{
		  echo"<script>alert('Invalid Username or Password!')</script>";
		  }
		  
	  }
 
 
 ?>       