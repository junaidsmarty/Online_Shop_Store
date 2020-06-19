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
}
.topnav1 {
  overflow: hidden;
  background-color: #000;
}

/* Style the topnav links */
.topnav1 a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav1 a:hover {
  background-color:#F00;
  color: black;
}
/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
}

/* Left and right column */
.column {
	width: 18%;
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
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
  align:center;
  margin-left:320px;
  margin-top:60px
}

td, th {
  border: 2px solid #dddddd;
  text-align: center;
  padding: 5px;
  
}

tr{
	background-color:#999;
	
	
	}
	.butn{
		text-align:left;
	}
		
		







</style>
</head>

<body>


      <div class="headerr">
        <a href="index.php"> <img src="images/logo.png" style="height:100px;width:500px;margin-left:450px;" /></a>
      </div>
<div class=topnav>
       <a href="home.html">This is Sodagar</a>
           <a href="index.php">Home</a>
          <a href="allproducts.php">All Products</a>
           <a href="myaccount.php">My Account</a>
            <a href="register.php">Sign Up</a>
           <a href="cart.php">Shopping Cart</a>
           <a href="ecommercecontactus.html">Contact Us</a>
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
      <b style='color:white;'>YourCart:<?php items();?> </b>&nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; <b style='color:white;'>total price:<?php price();?></b></p> </form></div>

      <div class="topnav1" >
<b style='color:#000;'> <a  href="index.php"> Back to Shoping</a></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp
<?php
	  if(!isset($_SESSION['cust_email']))
	  { echo"<a href='checkout.php' style='color:blue ;text-decoration:none;'>Login</a> ";}
      else
	  {echo "<a href='logout.php' style='color:blue ;text-decoration:none;'>Logout</a>";}
		?></div>
        
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
          


        
       
            
              
<div class="tab" style="margin-left:100px"><form action="cart.php" method="post" enctype="multipart/form-data">
  <table  >
      <tr align="center">
                <th height="29"><b>Remove</b></th>
                <th><b>Product</b></th>
                <th><b>Quantity</b></th>
                <th><b>total Price</b></th>
      </tr>
                <?php
				
	  $i_padd=getoIp();
	  $total=0;
	  $price="select * from cart where ipadd='$i_padd'";
	  $runprice=mysqli_query($con,$price);
	   while($record=mysqli_fetch_array($runprice)){
		   
		   $proidd=$record['proid'];
		   $prodprice="select * from products where prodtid=$proidd";
		   $runprodprice=mysqli_query($con,$prodprice);
		   while($catchprodprice=mysqli_fetch_array($runprodprice)){
			 
			 $pp=array($catchprodprice['prodprice']);
			 $prodtitle=$catchprodprice['producttitle'];
			  $prodimg=$catchprodprice['prodimg1'];
			  $op=$catchprodprice['prodprice'];
			 $values=array_sum($pp);
			 $total +=$values;
			   
			   
			   
			   
			   
			   
			   
			    
			   
			   
		   
	  
	  
	  
	  
	  
	  

				?>
                
                <tr align="center">
                <td><input type="checkbox" name="remove[]" value="<?php echo $proidd  ;?>"/></td>
                <td><?php echo $prodtitle ?><br> <img src="admin/productimagaes/<?php echo $prodimg ; ?>" height="100" width="100"/> </td>
                <td>
<select name="qty">
  <option value="1" selected>1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4" >4</option>
</select></td>
                <?php 
				if(isset($_POST['update'])){
				$qty=$_POST['qty'];
				$qtyupdate="update cart set qty='$qty' where ipadd='$i_padd'";
				$runqtyupdate=mysqli_query($con,$qtyupdate);
				$total=$total*$qty;
				
				}
				?>
                <td><?php echo "$". $op ; ?></td>
                </tr>
                <?php }}?>
                <tr>
                  <td class="butn" colspan="3" align="left"><b>
                  Total Price
                  </b>
                  </td>
                  <td><b>
                  <?php echo "$". $total ;?></b>
                  </td>
                
                <tr></tr>
                <tr  class="butn" >
                   <td class="butn" colspan="2"><input type="submit" name="update" value="Update Cart"/></td>
                   <td class="butn"><input type="submit" name="continue" value="Continue Shopping"/></td>
                   <td class="butn"><button> <a href="./checkout.php" style="text-decoration:none; color:#000">Checkout</a></button></td>
                
                </tr>
                
    </table> 
                </form>
                </div>
                
      
      
      

          
                
                
              
              
          
                <?php
				function removeupdate(){
					global $con;
                if(isset($_POST['update'])){
				foreach($_POST['remove'] as $remid){
				$querydel="delete from cart where proid='$remid'";
				$runquerydel=mysqli_query($con,$querydel);
				if($runquerydel){
					 echo "<script>window.open('cart.php','_self')</script>";
					
					}	
					
				}}
				if(isset($_POST['continue'])){
				 echo "<script>window.open('index.php','_self')</script>";}
				}
				echo @$remupd=removeupdate();
				
				
			
				?>
                
              
              
              
              
                
              
              
          
      
<div class="footer">
      
              
      
</div>










</body>
</html>
