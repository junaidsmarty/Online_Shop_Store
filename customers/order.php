<?php

include("includes/dbcon.php");
include("functions/fun.php");


if(isset($_GET['cid'])){
	$custid=$_GET['cid'];
	$qu="select * from customers where custid='$custid'";
	$runqq=mysqli_query($con,$qu);
	$fec=mysqli_fetch_array($runqq);
	$cust_email=$fec['cust_email'];
	$cname=$fec['custname'];
}
	 $i_padd=getoIp();
	  $total=0;
	  $price="select * from cart where ipadd='$i_padd'";
	  $runprice=mysqli_query($con,$price);
	  $status='pending';
	  $invoiceno=mt_rand();
	  $countprod=mysqli_num_rows($runprice);
	  $i=0;
	   while($record=mysqli_fetch_array($runprice)){
		   
		   $proidd=$record['proid'];
		   $prodprice="select * from products where prodtid=$proidd";
		   $runprodprice=mysqli_query($con,$prodprice);
		   while($catchprodprice=mysqli_fetch_array($runprodprice)){
			 $pname=$catchprodprice['producttitle'];
			 $pp=array($catchprodprice['prodprice']);
			 $prodtitle=$catchprodprice['producttitle'];
			  $prodimg=$catchprodprice['prodimg1'];
			  $op=$catchprodprice['prodprice'];
			 $values=array_sum($pp);
			 $total +=$values;
			   $i++;
			   
		   }}
		   $getcart="select * from cart";
		   $rungetcart=mysqli_query($con,$getcart);
		   $getqty=mysqli_fetch_array($rungetcart);
		   $qqty=$getqty['qty'];
		   if($qqty==0){
			   $qqty=1;
			   $subtotal=$total;
			   
			   }
			   else{
				   $qqty=$qqty;
				   $subtotal=$total*$qqty;
				   
				   }
				   $custorders="insert into custorders(custid, remamount, invoiceno, totalproducts, orderdate, orderstatus) values ('$custid','$subtotal','$invoiceno','$countprod',NOW(),'$status')";
	$runco=mysqli_query($con,$custorders);
	
		echo" <script>alert('order succussfullly submitted,Thanks!')</script>";
		echo" <script>window.open('myaccount.php','_self')</script>";
				
		$insertpendingorder="insert into pendorders(custid, invoiceid, prodid, qty, prodstatus) values ('$custid','$invoiceno','$proidd','$qqty','$status')";
		$runipo=mysqli_query($con,$insertpendingorder);
		$emptycart="delete from cart where ipadd='$i_padd'";
		$runemptycart=mysqli_query($con,$emptycart);

       $from="admin@mysite.com";
		  $subject="Order Details";
		  $msg="
		  <html>
		    <h2> Hello <b>$cname</b> you have ordered following items on our site</h2>
			<table align='center' bgcolor='#CCCC99' border='2'>
			 <tr> 
			   <th> Your Order Detail</th>
			 </tr>
			 <tr>
			 <td>S.No</td>
			 <td>Product Name</td>
			 <td>Quantity</td>
			 <td>Total Price</td>
			 <td>Invoice No</td>
			 </tr>
			 <tr>
			   <td>$i</td>
			   <td>$pname</td>
			   <td>$qqty</td>
			   <td>$subtotal</td>
			   <td>$invoiceno</td>
			 </tr>
			</table>
			<h2>Login to your account to pay the amount</h2>
			<h3>To Login to Your Account<a href='#'>Click Here</a></h3>
			<h2>Thanks for trusting us with your orders!Come again Next time</h2>
		  </html>";
		  mail($cust_email,$subject,$msg,$from);
		  echo "alert('Email was sent to you Email')";
		  echo "<script>window.open('checkout.php','_self')</script>";
		  
		

 
?>
