<?php 
if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
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
	
	
</style>


</style>
</head>

<body>
<table class="orders" align="center"  width="1000">
 <tr>
 <td colspan="8"><h2>View ALL Orders</h2></td>
 
 
 </tr>
 <tr>
   <th>Order.No</th>
   <th>Customer</th>
   <th>Invoice.No</th>
   <th>Product ID</th>
   <th>Quantity</th>
   <th>Status</th>
   <th>Delete</th>
   
   
   <?php

include("inc/db.php");
$getorders="select * from pendorders";
			 $runorders=mysqli_query($con,$getorders);
			 $i=0;
	while($fetchorders=mysqli_fetch_array($runorders)){
	$orderid=$fetchorders['orderod'];
	$custid=$fetchorders['custid'];
	$invoice=$fetchorders['invoiceid'];
	$prodid=$fetchorders['prodid'];
	$qty=$fetchorders['qty'];
	$status=$fetchorders['prodstatus'];
	
	$i++;		 
?>
 <tr align="center">
   <td><?php echo $i ?></td>
   <td><?php 
   $get="select * from customers where custid='$custid'";
			 $runcust=mysqli_query($con,$get);
			 
	$fetch=mysqli_fetch_array($runcust);
	
	$custemail=$fetch['cust_email'];
   echo $custemail;
   
   ?></td>
   <td><b><?php echo $invoice ?></b></td>
   <td><b><?php echo $prodid ?></b></td>
   <td><b><?php echo $qty ?></b></td>
   <td><b><?php echo $status ?></b></td>

    <td class="insert"colspan="2"><button> <a class="delete" href="delorders.php?delorders=<?php echo $orderid ?>" style="text-decoration:none; color:#333">Delete Orders</a></button></td>
  
 
 
 </tr>
 
 
 <?php } ?>
 </tr>
 </table>



 
</body>
</html>
<?php } ?>
