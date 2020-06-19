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
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
  margin-top:100px;
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

</head>

<body>
<table align="center" bgcolor="#999966" width="750">
 <tr>
 <td colspan="8"><h2>View ALL Orders</h2></td>
 
 
 </tr>
 <tr>
   <th>Payment.No</th>
   <th>Invoice.No</th>
   <th>Amount Paid</th>
   <th>Payment Method</th>
   <th>	Reference No</th>
   <th>Code</th>
   <th>Payment Date</th>
   
   <?php

include("inc/db.php");
$getpayments="select * from payments";
			 $runpay=mysqli_query($con,$getpayments);
			 $i=0;
	while($fetchpay=mysqli_fetch_array($runpay)){
	$payment_id=$fetchpay['payment_id'];
	$invoiceno=$fetchpay['invoiceno'];
	$amount=$fetchpay['amount'];
	$pmode=$fetchpay['pmode'];
	$refno=$fetchpay['refno'];
	$code=$fetchpay['code'];
	$pdate=$fetchpay['pdate'];
	
	$i++;		 
?>
 <tr align="center">
   <td><?php echo $i ?></td>
   
   <td><?php echo $invoiceno ?></td>
   <td><?php echo $amount ?></td>
   <td><?php echo $pmode ?></td>
   <td><?php echo $refno ?></td>
   <td><?php echo $code ?></td>
   <td><?php echo $pdate ?></td>

     
  
 
 
 </tr>
 <?php } ?>



 
</body>
</html>
<?php }?>