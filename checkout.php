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
  background-color: #000;
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
}/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
}

/* Left and right column */
.column {
	width: 20%;
	height: auto;
	background-color: #FFF;
}

/* Middle column */
.column.middle {
  width: 75%;
   padding: 50px;
  background-color: green;
  transition: transform .2s;
  width: 200px;
  height: 200px;
  margin: 0 auto;
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
.column a {
  background-color:white;
  color:#000;
  font-size:20px;
  text-align:center;
  display: block;
  padding: 12px;
  text-decoration: none;
  
}

.column a:hover {
  background-color:#036;
}

.column a.active {
  background-color: #4CAF50;
  color: white;
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

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid black;
}


.button2:hover {
  background-color:#008CBA;
  color: white;
}




.zoom {
  padding: 50px;
  transition: transform .2s;
  width: 200px;
  height: 200px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.2); /* IE 9 */
  -webkit-transform: scale(1.2); /* Safari 3-8 */
  transform: scale(1.2); 
}









</style>
</head>

<body>
<div class="mainn">

      <div class="headerr">
        <a href="index.php"> <img src="images/logo.png" style="height:100px;width:500px;margin-left:450px;" /></a>
         
      </div>
      <div class="topnav">        <center>
      <a href="home.html">This is Sodagar</a>
            <a href="index.php">Home</a>
            <a href="allproducts.php">All Products</a>
            <a href="customers/myaccount.php">My Account</a>
             <a href="register.php">Sign Up</a>
           <a href="cart.php">Shopping Cart</a>
           <a href="ecommercecontactus.html">Contact Us</a>
        
        </center>
  </div>
  <div class="topnav">
    
    <form method="get" action="results.php" enctype="multipart/form-data">
                   <p>
                   <input type="text" name="userquerry" placeholder="Search the Product" />
                   <input type="submit" value="Search" name="search"/>
                   
      &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; 
               <?php
     if(!isset($_SESSION['cust_email'])){
		 echo "<b style='color:white;'>Welcome Guest </b>";
		 }
		 else{
			 echo "<b style='color:white;'>Welcome".$_SESSION['cust_email'] ."</b>" ;}    ?> &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
      <b style='color:white;'>YourCart:<?php items();?> </b>&nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; <b style='color:white;'>total price:<?php price();?></b> </p></form></div>&nbsp;&nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;&nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  
            <div class="topnav">  <b style='color:white;'>    <a href="cart.php">Go To Cart</a></center> </b>&nbsp;&nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
	  <?php
	  if(!isset($_SESSION['cust_email']))
	  { echo"<a href='customers/custlogin.php' style='color:red ;text-decoration:none;display:inline;'>Login</a> ";}
      else
	  {echo "<a href='logout.php' style='color:red ;text-decoration:none;display:inline;color:red;'>Logout</a>";}
		?>
  </div>  
      



<div class="column">
  

      <?php
	  echo"<h2 style='font-size:18px;margin-left:0px;align:left;position:relative;'><b>CATEGORIES</b></h2>";
			   getCat();
			   ?>
    </p>
 

    
                 <?php
				 echo"<h2 style='font-size:18px;margin-left:0px;align:left;position:relative;'><b>BRANDS</b></h2>";
             getBrand();
        ?>
                     
 
</div>
<?php cart();?>
          
     
<div class="column.middle"style="width:75%;height:10%;float:leftt;margin-top:-3px;margin-left:60px; "> 

   <?php
				if(!isset($_SESSION['cust_email'])){
					include("customers/custlogin_1.php");
					
				}
				else{include("customers/paymentopt.php");}
				
				
                            ?>
</div>
<div class="footer">
      
      
      
      
</div>




</body>
</html>