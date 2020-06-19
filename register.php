<?php 
session_start();
include("includes/dbcon.php");
include("functions/fun.php");



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  background-color:#333;
   background-image:url("admin/productimagaes/project4.jpg");
   background-repeat: no-repeat;
  background-size: cover;
  height: 100%;
  overflow: scroll;
   
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
  margin-top:-600px;
 
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/

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
}table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
  align:right;
}

td, th {
  border: 5px solid #dddddd;
  text-align: center;
  padding: 5px;
  
}

tr{
	background-color:#999;
	
	
	}

</style>
<title>Untitled Document</title>
</head>

<body>

      <div class="header">
        <a href="index.php"> <img src="images/logo.png" style="height:100px;width:500px"/></a>
         <img style="height:100px;width:400px" src="images/shopnow gif.gif" />
      
      </div>
      <div class="topnav">
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
                   <input type="text" name="userquerry" placeholder="Search the Product" />
                   <input type="submit" value="Search" name="search"/>
                   
               
               
               </form>
            
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
          
             
                <div class="column.middle" style="margin-left:400px">
                  <form action="register.php" method="post" enctype="multipart/form-data">
                  <table  >
                   <tr align="center"><td colspan="8"><h2>Create An Account </h2></td></tr> <br />
                   </tr>
                    <tr>
                      <td>Customer Name:</td>
                      <td><input type="text" name="cname" required/></td>
                    </tr>
                    <tr>
                      <td>Customer Email:</td>
                      <td><input type="text" name="cemail" required/></td>
                    </tr>
                    <tr>
                      <td>Customer Password:</td>
                      <td><input type="password" name="cpass" required/></td>
                    </tr>
                    <tr>
                      <td>Customer Country:</td>
                      <td>
                      <select name="ccountry" required>
                        <option>Select Country</option>
                        <option>Iran</option>
                        <option>Pakistan</option>
                        <option>UAE</option>
                        <option>India</option>
                        <option>Afghanistan</option>
                        <option>Bangladesh</option>
                        <option>Srilanka</option>
                        <option>Maldives</option>
                        <option>England</option>
                        <option>Australia</option>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Customer City:</td>
                      <td><input type="text" name="ccity" required/></td>
                    </tr>
                    <tr>
                      <td>Customer Contact Number:</td>
                      <td><input type="text" name="cnumber" required/></td>
                    </tr>
                    <tr>
                      <td>Customer Address:</td>
                      <td><input type="text" name="cadr" required/></td>
                    </tr>
                    <tr>
                      <td>Customer Image:</td>
                      <td><input type="file" name="cimg" required/></td>
                    </tr>
                    <tr align="center" >
                     <td > <input type="submit" value="Signup" name="register"/></td>
                    </tr>
                  </table>
                
                
                </form>
               
        </div>
              
              
        
      
      






</div>




</body>
</html>
<?php
if(isset($_POST['register'])){
	$cname=$_POST['cname'];
	$cemail=$_POST['cemail'];
	$cpass=$_POST['cpass'];
	$ccountry=$_POST['ccountry'];
	$ccity=$_POST['ccity'];
	$cnum=$_POST['cnumber'];
	$cadr=$_POST['cadr'];
	$cimg=$_FILES['cimg']['name'];
	$cimgtemp=$_FILES['cimg']['tempname'];
	$cip=getoIp();
	$cquerry="INSERT INTO customers(custname,cust_email,custpass,custcountry,custcity,custnum,custaddr,custimage,custip) VALUES ('$cname','$cemail','$cpass','$ccountry','$ccity','$cnum','$cadr','$cimg','$cip')";
	$runcus=mysqli_query($con,$cquerry);
	move_uploaded_file($cimgtemp,"customers/custimg/$cimg");
		$selcart="select * from cart where ipadd='$cip'";
$runselcart= mysqli_query($con,$selcart);
$checkcart=mysqli_num_rows($runselcart);
if($checkcart >0){
	$_SESSION['cust_email']=$cemail;
	echo "<script>alert('Account Registered')</script>";

	echo "<script>window.open('checkout.php','_self')</script>";
	
	}
	else{
		$_SESSION['cust_email']=$cemail;

		echo "<script>alert('Account Registered')</script>";
echo "<script>window.open('index.php','_self')</script>";
	}
	}
?>