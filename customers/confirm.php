<?php 
 session_start();
 include("includes/dbcon.php");
  if(isset($_GET['order_id'])){
	  $orderid=$_GET['order_id'];
	  
	  
	  }




?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
 <form action="confirm.php?update=<?php echo $orderid;?>" method="post">
   <table align="center" width="500" border="2" bgcolor="#CCCCCC">
     <tr align="center">
       <td  colspan="5"><h2>Please Confirm Your Payment</h2></td>
     </tr>
      <tr>
       <td align="right">Invoice Number</td>
      <td> <input type="text" name="invoiceno"/></td>
     </tr>
       <tr>
       <td align="right">Amount Sent</td>
      <td> <input type="text" name="amountsent"/></td>
     </tr>
      
      <tr>
       <td align="right">Select Payment Mode</td>
      <td><select name="paymentmode">
      <option>Select your Payment Mode</option>
      <option>Bank Transfer</option>
      <option>EasyPesa/UBLOMNI</option>
      <option>WESTERN UNION</option>
      <option>Paypal</option>
      
      
      </select></td></tr>
       <tr>
       <td align="right">Transaction/Reference ID</td>
      <td> <input type="text" name="tr"/></td>
     </tr>
      <tr>
       <td align="right">Easypesa/UBLOMNI Code</td>
      <td> <input type="text" name="code"/></td>
     </tr>
    
      <tr>
       <td align="right">Payment Date</td>
      <td> <input type="text" name="date"/></td>
     </tr>
    <tr align="center">
    <td colspan="5">
      <input type="submit" name="confirm" value="Confirm Payment"/>
    
    </td>
    
    </tr>
    
   
   
   
   </table>
 
 
 
 
 </form>


</body>
</html>
<?php
  if(isset($_POST['confirm'])){
	  $update=$_GET['update'];
	  $invoice=$_POST['invoiceno'];
	  $amount=$_POST['amountsent'];
	  $paymentmode=$_POST['paymentmode'];
	  $ref=$_POST['tr'];
	  $code=$_POST['code'];
	  $date=$_POST['date'];
	  $complete= 'Complete';	  
	  $sqll="INSERT INTO payments(invoiceno,amount,pmode,refno,code,pdate) VALUES ('$invoice','$amount','$paymentmode','$ref','$code','$date')";
	  $runsqql=mysqli_query($con,$sqll);
	   /*$updateo="UPDATE custorders SET orderstatus='$complete' WHERE orderid='$update'";*/
	   $updateo="UPDATE custorders SET orderstatus='$complete' WHERE orderid='$update'";
	      $runupdate=mysqli_query($con,$updateo);
	   
	   $updateos="UPDATE pendorders SET prodstatus='$complete' WHERE orderod='$update'";
	      $runupdatepend=mysqli_query($con,$updateos);
	  if($runupdate){
		  echo"<h2 style='text-align:center; color:black';>Payment Received,Your order will be completed in 24 hours,Thankyou!</h2>";
		  
		  }
		  
	  
	  }



?>