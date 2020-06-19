<?php 
session_start();
include("includes/dbcon.php");
include("functions/fun.php");



?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  background-color:#333;
  
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
}

/* Left and right column */
.column {
  width: 25%;
  height:auto;
}

/* Middle column */
.middle {
  width: 100%;
  color:white;
  text-align:center;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}

/* Style the footer */
.footer {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center;
}

	.column {
  width: 18%;
}

.admin {
  background-color:white;
  color:#000;
  font-size:20px;
  text-align:center;
  display: block;
  padding: 12px;
  text-decoration: none;
  
}

.admin:hover {
  background-color:#036;
}

.admin.active {
  background-color: #4CAF50;
  color: white;
}
.hhh{
	background-color:#000;}
</style>


<title>Untitled Document</title>
<link rel="stylesheet" href=""/>

</head>

<body>
<div class="header">
 <a href="index.php"> <img src="../images/logo.png" style="height:100px;width:500px;margin-left:50px;" /></a>
</div>

<div class="topnav">
<a href="../home.html">This is Sodagar</a>
   <a href="../index.php">Home</a>
            <a href="../allproducts.php">All Products</a>
            <a href="./myaccount.php">My Account</a>
            <a href="../cart.php">Shopping Cart</a>
          <a href="../ecommercecontactus.html">Contact Us</a>
           <?php 
		   if(isset($_SESSION['cust_email'])){           
           echo"<span style='display:none'>  <a href='../register.php'>Sign Up</a></span>";
		   }
			else{
			echo" <a href='../register.php'>Sign Up</a>";

			}
			
			
			?>
         
        
        
</div>
<div class="hhh">
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php /* yaha se wo welcome wali div bnegi */
    if(isset($_SESSION['cust_email'])){
		echo "<b style='color:white;'>WELCOME".$_SESSION['cust_email']."</b>";
		
		}
	
	?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <?php
	  if(!isset($_SESSION['cust_email']))
	  { echo"<a href='checkout.php' style='color:red ;text-decoration:none;'>Login</a> ";}
      else
	  {echo "<a href='logout.php' style='color:red ;text-decoration:none;'>Logout</a>";}
		
		/*yaha pr wo div khtm hugi*/?>
  </p>
  <p>&nbsp;</p>
</div>


   
    <div class="row">
    <div class="column ">
    <?php 
				 /*yaha ek navbar banegi jisme user ki image aegi or account wale links aenge*/
				 $usersession=$_SESSION['cust_email'];
				 $squerry="select * from customers where cust_email='$usersession'";
				 $runsquerry=mysqli_query($con,$squerry);
				 $fetchdata=mysqli_fetch_array($runsquerry);
				 $fetchimg=$fetchdata['custimage'];
				 echo "<img src='./custimg/$fetchimg' width='250' height='150'/></br><a class='admin' href='changepic.php'>Change Picture</a>";
				 
				 ?>
                <a class="admin" href="myaccount.php?myorders">My Orders</a>
                <a class="admin" href="myaccount.php?editaccount">Edit Account</a>
                <a class="admin" href="myaccount.php?changepass">Change Passwords</a>
                <a class="admin" href="myaccount.php?delacc">Delete Account</a>
                <a class="admin" href="logout.php">Logout</a>
          
       
       
    </div>
    <div class="middle">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <?php /* yaha se neeche tk ka php main div me aega jaha sb display huga */ 
	 acountinfo(); 
	 
	 
	 
	 ?>
      <?php 
	  if(isset($_GET['myorders'])){
         include("myorders.php");
      }
	  
	  if(isset($_GET['editaccount'])){
         include("editaccount.php");
      }
	  
	   if(isset($_GET['changepass'])){
         include("changepass.php");
      }
	  if(isset($_GET['delacc'])){
         include("delaccount.php");
      }
      ?>
    </div>
  </div>
</body>
</html>