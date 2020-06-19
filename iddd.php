<?php 
include("includes/dbcon.php");
include("functions/fun.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles/style.css" media="all"/>
<title>Untitled Document</title>
</head>

<body>
<div class="mainn">

      <div class="headerr">
        <a href="index.php"> <img src="images/logo.png" style="height:100px;width:500px"/></a>
         <img style="height:100px;width:400px" src="images/shopnow gif.gif" />
      
      </div>
      <div id="navbar">
        <ul id="menu">
           <li> <a href="index.php">Home</a></li>
           <li> <a href="allproducts.php">All Products</a></li>
           <li> <a href="myaccount.php">My Account</a></li>
            <li> <a href="register.php">Sign Up</a></li>
           <li><a href="cart.php">Shopping Cart</a></li>
           <li><a href="contact.php">Contact Us</a></li>
        
        </ul>
            <div id="form">
               <form method="get" action="results.php" enctype="multipart/form-data">
                   <input type="text" name="userquerry" placeholder="Search the Product" />
                   <input type="submit" value="Search" name="search"/>
               
               
               </form>
            
            </div>  
      
      </div>
      <div class="contentw">
          <div id="leftdiv">
             <div id="smolleftdiv">Categories</div>
                 <ul id="cats" >
                 <?php getCat(); ?>
          
        </ul>
           <div id="smolleftdiv">Brands</div>
           <ul id="cats" >
           <?php
             getBrand();
        ?>
          
          </ul>
          </div>
          <div id="rightdiv">
              <div style=" width:780px;
			height:35px;
			background:#000;
			color:#FFF;
			padding:10px;
            margin-top:0px;
		    text-align:center;"><b style="color:yellow">welcome Guest   YourCart:</b></div>
                <div id="phcontent"">
                <?php
				if(isset($_GET['proid'])){
				 $prodid=$_GET['proid'];
                $getproduct="select * from products where prodtid='$prodid'";
				$runproduct=mysqli_query($con,$getproduct);
				 while($productrow=mysqli_fetch_array($runproduct)){
				$pro_id=$productrow['prodtid'];
				$pro_title=$productrow['producttitle'];
				$pro_cat=$productrow['catid'];
				$pro_brand=$productrow['brandid'];
				$pro_desc=$productrow['proddescription'];
				$pro_price=$productrow['prodprice'];
				$pro_img1=$productrow['prodimg1'];
				$pro_img2=$productrow['prodimg2'];
				$pro_img3=$productrow['prodimg3'];
				
				
				echo"
				<div id='singleproduct'>
				<h3>
				
				$pro_title</h3>
				<img src='admin/productimagaes/$pro_img1' width='180' height='180' style='border:2px solid'/>
				<img src='admin/productimagaes/$pro_img2' width='250' height='250' style='border:2px solid'/>
				<img src='admin/productimagaes/$pro_img3' width='250' height='250' style='border:2px solid'/><br>
				<p><b>Price:PKR $pro_price</b><p>
				
				<a href='index.php' style='float:left;'>GO BACK</a>
				<a href='index.php?addcart=$pro_id'><button style='float:right'>Add To Cart</button></a>
				
				</div>
				
				
				";
					
					
				 }
					
					
				}
				              ?>
                </div>
              
              
          </div>
      
      <div class="footer">
        <?php
     if(!isset($_SESSION['cust_email'])){
		 echo "Welcome Guest";
		 }
		 else{
			 echo "Welcome".$_SESSION['cust_email'] ;}    ?> &nbsp;&nbsp;
       
       
       
       YourCart:<?php items();?> total price:<?php price();?> -- <a href="cart.php"> Go To Cart</a> &nbsp;&nbsp; 
	  <?php
	  if(!isset($_SESSION['cust_email']))
	  { echo"<a href='checkout.php' style='color:red ;text-decoration:none;'>Login</a> ";}
      else
	  {echo "<a href='logout.php' style='color:red ;text-decoration:none;'>Logout</a>";}
		?>  
     
      </div>






</div>




</body>
</html>