<?php 
include("includes/dbcon.php");
include("functions/fun.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
}

/* Create three unequal columns that floats next to each other */
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

/* Style the footer */
.footer {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center;
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
.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid black;
}


.button1:hover {
  background-color:#008CBA;
  color: white;
}

.zoom {
  padding: 50px;
  background-color: green;
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title>Untitled Document</title>
</head>

<body>
<div class="headerr">
<a href="index.php"> <img src="images/logo.png" style="height:100px;width:500px;margin-left:450px;" /></a>
  </div>
  
  <div class="topnav" >
  <center>
  <a href="home.html">This is Sodagar</a>
<a href="index.php" ><b>Home</b></a>&nbsp;&nbsp;&nbsp;
    
    
    <a href="allproducts.php"><b>All Products</b></a>&nbsp;&nbsp;&nbsp;
    
    
    <a href="customers/myaccount.php"><b>My Account</b></a>&nbsp;&nbsp;&nbsp;
    
    
    <a href="register.php"><b>Sign Up</b></a>&nbsp;&nbsp;&nbsp;
    
    
    <a href="cart.php"><b>Shopping Cart</b></a>&nbsp;&nbsp;&nbsp;
    
    
  <a href="ecommercecontactus.html">Contact Us</a>
  </center>
  </div>
  <div class="topnav">
<form method="get" action="results.php" enctype="multipart/form-data" >
  
     
      <input type="text" name="userquerry" placeholder="Search the Product" />
      <input type="submit" value="Search" name="search"/>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

           <?php
     if(!isset($_SESSION['cust_email'])){
		 echo " <b style='color:white;'>Welcome Guest</b>";
		 }
		 else{
			 echo "Welcome".$_SESSION['cust_email'] ;}    ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <b style='color:white;'>  YourCart:</b>&nbsp;&nbsp;<?php items();?>&nbsp;&nbsp;&nbsp;&nbsp; <b style='color:white;'>Total Price:</b></form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php price();?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="cart.php"> <b>Go To Cart</b></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php
	  if(!isset($_SESSION['cust_email']))
	  { echo"<a href='customers/custlogin.php' style='color:red ;text-decoration:none;'><b style='fontsize:15px;'>Login</b></a> ";}
      else
	  {echo "<a href='logout.php' style='color:red ;text-decoration:none;'><b>Logout</b></a>";}
		?>
    </p>

</div>
<div class="row">
<div class="column">
      <?php
	  echo"<h2 style='font-size:18px;margin-left:0px;align:left;position:relative;'><b>CATEGORIES</b></h2>";
			   
             $getcat="select * from categories";
			 $runcat=mysqli_query($con,$getcat);
			 while($rowcat=mysqli_fetch_array($runcat)){
				 $cat_id=$rowcat['prodid'];
				 $cat_title=$rowcat['prodtitle'];
				 echo" <a class='admin'  href='index.php?cat=$cat_id'>$cat_title</a>";
				 
				 
				 }
				 
			   ?>
    

    
                 
                   <?php
				 echo"<h2 style='font-size:18px;margin-left:0px;align:left;position:relative;'><b>BRANDS</b></h2>";
             getBrand();
        ?>
                 
                     
  
</div>

<div class="column.middle"style="width:75%;height:10%;float:right;margin-top:-1100px;margin-right:150px;"><?php
               $getproduct="select * from products";
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
				
				<div class='zoom' style='float:right;border:2px groove;
				border-radius:8px;width: 35%;
				margin-left:400px;
			margin-top:50px;
  padding: 10px;
  height: auto;
  margin:3px;background-color:white;
    border-style:solid;
  border-width:2px;' >
				
			<b>	$pro_title <b> 
			<img src='admin/productimagaes/$pro_img' width='210' height='210' style='position:relative;' />
				<br><br><br>
   
    
 
  
				&nbsp;&nbsp;<b>Price:PKR $pro_price</b><br><br>
				&nbsp;&nbsp;<a href='details.php?proid=$pro_id' style='color:black;'>Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;<a href='index.php?addcart=$pro_id'><button class='button button1' >Add To Cart</button></a>
				
			
			<br><br><br>
			</div>
				
				
				";
					
					
					
					
				}
				
			
			             ?>
</div>



  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  


</body>
</html>