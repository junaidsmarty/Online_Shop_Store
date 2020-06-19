<html>
<head>
 <style>
 

 tr td {
	 height:50px;}
 </style>
 
 </head>
 <body>
 <?php
include("includes/dbcon.php");
      if(isset($_SESSION['cust_email'])){
 $se=$_SESSION['cust_email'];
	$getc="select * from customers where cust_email='$se'";
	$rungetc=mysqli_query($con,$getc);
	$fetchgetc=mysqli_fetch_array($rungetc);
	$custid=$fetchgetc['custid'];
	  


?>
 <br><br><h2 align="center">All Orders Details</h2>
<table align="center" width="1000" border="8px solid brown;" style="padding:5px;">
 <tr >
  <th  >order no</th>
  <th>Due amount</th>
  <th>invoice number</th>
  <th>total products</th>
  <th>Order date</th>
  <th>Paid/Unpaid</th>
  <th>Status</th>
 </tr>

<?php
  $getorders="select * from custorders where custid='$custid'";
  $runit=mysqli_query($con,$getorders);
   $i=0;
    while($x=mysqli_fetch_array($runit)){
		$orderid=$x['orderid'];
		$amount=$x['remamount'];
		$invoice=$x['invoiceno'];
		$totalproducts=$x['totalproducts'];
		$date=$x['orderdate'];
		$Status=$x['orderstatus'];
		$i++;
		if($Status=='pending'){
			$Status='unpaid';
			}
			else{
				
				$Status='paid';
				}
		echo"<tr align='center'>
		<td>$i</td>
		<td>$amount</td>
		<td>$invoice</td>
		<td>$totalproducts</td>
		<td>$date</td>
		<td>$Status</td>
		<td><a href='confirm.php?order_id=$orderid'>confirm if paid</a></td>
		
		
		
		
		</tr> ";
	
		
		
		
		
		}



?>
<?php } ?>




</table></body></html>