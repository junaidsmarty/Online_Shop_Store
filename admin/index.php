<?php
session_start();
if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{
 


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
  background-color:#000;
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
  color:black;
}

/* Style the topnav links */
.topnav a {
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: red;
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

	.column {
  width: 25%;
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


<title>Untitled Document</title>
<link rel="stylesheet" href=""/>
</head>

<body>


    
    
    
   
   <a href="index.php"></a>

<div class="header">
  <a href="index.php"> <img src="../images/logo.png" style="height:100px;width:500px;margin-left:50px;" /></a>
</div>

<div class="topnav">
  <a  href="logoutadmin.php" style="color:white;">Admin Logout</a>
</div>
   

    <div class="row">
    <div class="column ">
    <h2 style="color:#FFF; text-align:center">Manage Your Content</h2>
    <a class ="admin"href="index.php?inprod">Insert New Product</a>
    <a  class ="admin" href="index.php?viewprod">View All Products</a>
    <a  class ="admin" href="index.php?incat">Insert New Category</a>
    <a class ="admin"  href="index.php?viewcat">View ALL Categories</a>
    <a class ="admin" href="index.php?inbrand">Insert New Brand</a>
    <a class ="admin" href="index.php?viewbrand">View All Brands</a>
    <a  class ="admin" href="index.php?vcust">View Customers</a>
    <a class ="admin" href="index.php?Vorders">View Orders</a>
   <a class ="admin" href="index.php?Vpay">View Payments</a>
   <a class ="admin" href="index.php?id">Insert Department</a>
    <a class ="admin" href="index.php?ie">Insert Employee</a>
   <a class ="admin" href="index.php?ve">View Employee</a>
   <a class ="admin" href="index.php?vd">View Department</a>
   
   
       
    </div>
    <div class="column middle">
     <?php
	

    if(isset($_GET['inprod'])){
		include("insertprod.php");
		
		
		}
		if(isset($_GET['viewprod'])){
		include("viewprod.php");
		
		
		}
		if(isset($_GET['deletepro'])){
		include("delpro.php");
		
		
		}
		if(isset($_GET['incat'])){
		include("insertcategory.php");
		
		
		}
		
		if(isset($_GET['viewcat'])){
		include("viewcat.php");
		
		
		}
		if(isset($_GET['editcat'])){
		include("editcat.php");
		
		
		}
		if(isset($_GET['delcat'])){
		include("delcat.php");
		
		
		}
		if(isset($_GET['inbrand'])){
		include("insertbrand.php");
		
		
		}
		if(isset($_GET['viewbrand'])){
		include("viewbrand.php");
		
		
		}
		if(isset($_GET['delb'])){
		include("delbrand.php");
		
		
		}
		if(isset($_GET['deld'])){
		include("deldep.php");
		
		
		}
		if(isset($_GET['dele'])){
		include("delemp.php");
		
		
		}
		if(isset($_GET['vcust'])){
		include("viewcust.php");
		
		
		}
			if(isset($_GET['delcust'])){
		include("delcust.php");
		
		
		}
		if(isset($_GET['Vorders'])){
		include("vieworders.php");
		
		
		}
		if(isset($_GET['delorders'])){
		include("delorders.php");
		
		
		}
		if(isset($_GET['Vpay'])){
		include("viewpay.php");
		
		
		}
		if(isset($_GET['id'])){
		include("insertdep.php");
		
		
		}
		if(isset($_GET['ie'])){
		include("insertemployee.php");
		
		
		}
		if(isset($_GET['ve'])){
		include("viewemployee.php");
		
		
		}

  if(isset($_GET['vd'])){
		include("viewdep.php");
		
		
		}
    
    ?>
    </div>
  </div>
</body>
</html>
<?php  } ?>