<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>checkout2.php</title>
</head>
<style>
#a1{background-color:#C96;width:100%;height:40px;
font-size:22px;
}
#a1 a{text-decoration:none;color:#FFF; }
#a1 a:hover{
	background-color:#F06;
	}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="styles/style2.css" media="all"/>
<title>Untitled Document</title>
</head>

<body>
<div class="headerr">
<div align="center"><a href="index.php"> <img src="images/logo.png" style="height:100px;width:500px"/></a>
    <img style="height:100px;width:400px" src="images/shopnow gif.gif" />
          
  </div>
  </div>
  <div id="a1" >
  <center>
<a href="index.php" ><b>Home</b></a>&nbsp;&nbsp;&nbsp;
    
    
    <a href="allproducts.php"><b>All Products</b></a>&nbsp;&nbsp;&nbsp;
    
    
    <a href="myaccount.php"><b>My Account</b></a>&nbsp;&nbsp;&nbsp;
    
    
    <a href="register.php"><b>Sign Up</b></a>&nbsp;&nbsp;&nbsp;
    
    
    <a href="cart.php"><b>Shopping Cart</b></a>&nbsp;&nbsp;&nbsp;
    
    
  <a href="contact.php"><b>Contact Us</b></a>
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
	  { echo"<a href='checkout.php' style='color:red ;text-decoration:none;display:inline;'>Login</a> ";}
      else
	  {echo "<a href='logout.php' style='color:red ;text-decoration:none;display:inline;color:red;'>Logout</a>";}
		?>
  </div>
  
  <div align="left"></div>
</div>

  <div class="coloumn.side"style="background-color:#393;width:16%;height:auto;">
  <ul id=""  >

      <?php
	  echo"<h2 style='font-size:18px;margin-left:0px;align:left;position:relative;'><b>CATEGORIES</b></h2>";
			   getCat();
			   ?>
    </p>
  </ul>
<ul id="" >
    
                 <?php
				 echo"<h2 style='font-size:18px;margin-left:0px;align:left;position:relative;'><b>BRANDS</b></h2>";
             getBrand();
        ?>
                     
    </ul>
</div>
<?php cart();?>
          
              <div style=" width:780px;
			height:35px;
			background:#000;
			color:#FFF;
			padding:10px;
            margin-top:0px;
		    text-align:center;"><b style="color:yellow">welcome Guest   </b></div>
                <div id="phcontent"">
                
                <?php
				if(!isset($_SESSION['cust_email'])){
					include("customers/custlogin.php");
					
				}
				else{
					include("paymentopt.php");
					}
				
                            ?>
                </div>

</body>
</html>