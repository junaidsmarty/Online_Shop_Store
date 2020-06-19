<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
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
.column.side {
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
</style>
</head>
<body>
<a href="sty/index.php"></a>

<div class="header">
  <h1>Header</h1>
  <p>Resize the browser window to see the responsive effect.</p>
</div>

<div class="topnav">
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
</div>

<div class="row">
  <div class="column side">
    <h1><b>Manage Your Content</b></h1>
   <li> <a href="index.php?inprod">Insert New Product</a></li>
   <li>  <a href="index.php?viewprod">View All Products</a></li>
    <li> <a href="index.php?incat">Insert New Category</a></li>
    <li> <a href="index.php?viewcat">View ALL Categories</a></li>
    <li> <a href="index.php?inbrand">Insert New Brand</a></li>
    <li> <a href="index.php?viewbrand">View All Brands</a></li>
    <li> <a href="index.php?vcust">View Customers</a></li>
   <li>  <a href="index.php?Vorders">View Orders</a></li>
   <li>  <a href="index.php?Vpay">View Payments</a> </li>   
    <li> <a href="logoutadmin.php">Admin Logout</a></li>
    
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
		include("sty/delbrand.php");
		
		
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
		

  
    
    ?>
  </div>
  
</div>

</body>
</html>
