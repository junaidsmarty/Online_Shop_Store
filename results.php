<?php 
include("includes/dbcon.php");
include("functions/fun.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles/style.css33" media="all"/>
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









</style>

</head>

<body>
<div class="mainn">

      <div class="headerr">
        <a href="index.php"> <img src="images/logo.png" style="height:100px;width:500px"/></a>
         <img style="height:100px;width:400px" src="images/shopnow gif.gif" />
      
      </div>
      <div class="topnav">
        
          <a href="index.php">Home</a>
           <a href="allproducts.php">All Products</a>
            <a href="myaccount.php">My Account</a>
            <a href="register.php">Sign Up</a>
           <a href="cart.php">Shopping Cart</a>
                      <a href="contact.php">Contact Us</a>
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
	  { echo"<a href='checkout.php' style='color:red ;text-decoration:none;display:inline;'>Login</a> ";}
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
         
         
                <div class="column.middle">
                <?php
				if(isset($_GET['search'])){
					$userquery=$_GET['userquerry'];
                $getproduct="select * from products where productkey like '%$userquery%'";
				$runproduct=mysqli_query($con,$getproduct);
				 while($productrow=mysqli_fetch_array($runproduct)){
				$pro_id=$productrow['prodtid'];
				$pro_title=$productrow['producttitle'];
				$pro_cat=$productrow['catid'];
				$pro_brand=$productrow['brandid'];
				$pro_desc=$productrow['proddescription'];
				$pro_price=$productrow['prodprice'];
				$pro_img=$productrow['prodimg1'];
				
				
				echo"
				<div style='float:right;border:2px groove;
				border-radius:8px;width: 25%;
  padding: 10px;
  height:350px;
  margin:3px;
  background-color:white;
  border-style:solid;
  border-width:2px;
  ' >

				<b style='font-size:18px'>$pro_title </b>
				<img src='admin/productimagaes/$pro_img' width='180' height='180' />
				<br><br><br>

				<p><b style='font-size:19px'>Price:PKR $pro_price</b><p><br>
				<a href='details.php?proid=$pro_id' style='float:left;color:red; text-decoration:none; font-size:17px'>Details</a>
				<a href='index.php?addcart=$pro_id'><button style='float:right'>Add To Cart</button></a>
				
				
			<br><br>
			</div>

				
				
				";
					
					
					
					
					
				}
				}
				
				              ?>
                </div>
              
              
          </div>
      
  










</body>
</html>