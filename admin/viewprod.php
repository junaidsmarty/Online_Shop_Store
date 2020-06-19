<?php
if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{
 



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

td, th {
  border: 2px solid #dddddd;
  text-align: center;
  padding: 5px;
  
}

tr{
	background-color:#999;
	
	
	}
	.insert{
		color:#000;
		cursor:pointer;
		}
	h2{
		text-align:center;}
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
  background-color:red;
  color: white;
}
	
	
</style>

</style>
</head>

<body>
<?php 
 if(isset($_GET['viewprod'])){ ?>
<table width="740" align="center" >
 <tr align="center"><td colspan="8"><h2>View All Products</h2></td></tr> <br />
   <tr><th>Product ID</th> 
    <th>Title</th> 
     <th>Image</th> 
      <th>Price</th> 
       <th>Total Sold</th> 
        <th>Status</th> 
         
          <th>Delete</th> </tr>
  <?php 
  include("inc/db.php");
  $q="select * from products";
  $runq=mysqli_query($con,$q);
  $i=0;
  while($row=mysqli_fetch_array($runq)){
	  $prodid=$row['prodtid'];
	    $prodtitle=$row['producttitle'];
	  $prodimg=$row['prodimg1'];
	    $prodprice=$row['prodprice'];	
		$status=$row['prodstatus'];
		$i++;
	  
	  
	  
	  
 
  ?>  
  <tr align="center">
   <td><b><?php echo $i; ?></b></td>
   <td><b><?php echo $prodtitle; ?></b></td>
   <td><img src="productimagaes/<?php echo $prodimg; ?>" width="60" height="60"/></td>
   <td><b><?php echo $prodprice; ?></b></td>
   <td>
   <?php
   $sold="select * from pendorders where prodid='$prodid'";
   $runits=mysqli_query($con,$sold);
   $count=mysqli_num_rows($runits);
   echo $count;
   ?>
   </td>
   <td> 
  <b> <?php echo $status; ?></b>
   </td>
   <td><button class="button button1"><a href="index.php?deletepro=<?php echo $prodid; ?>" style="text-decoration:none; color:#333;"><b>Delete</b></a></button></td>
   
  </tr>
      <?php }?>  

</table>
<?php } 

?>


</body>
</html>
<?php } ?>