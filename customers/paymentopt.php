
<?php
@session_start
//include("includes/dbcon.php");
//include("functions/fun.php");


?>

<div class="all">
 
<h1 align="center"  style="color:white;">Payment options for you</h1>
<?php 
//$iipadd=getoIp();
$custmail=$_SESSION['cust_email'];
$qu="select * from customers where cust_email='$custmail'";
$runqu=mysqli_query($con,$qu);
$cust=mysqli_fetch_array($runqu);
$custid=$cust['custid'];


?>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div style="text-align:center;">
<b style="text-align:right; font-size:36px; color: white;">Pay with &nbsp;&nbsp;&nbsp;&nbsp; <a href="www.paypal.com"> <img  class="zoom" src="./admin/productimagaes/paypal.jpg" height="200" width="200"/> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="https://www.easypaisa.com.pk/
"> <img class="zoom" src="./admin/productimagaes/easypesa.jpg" height="200" width="200"/> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="
https://www.ubldirect.com/Corporate/BankingServices/Omni/home.aspx
"> <img class="zoom" src="./admin/productimagaes/ublomni.jpg" height="200" width="200" style/> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="
https://www.jazzcash.com.pk/mobile-account/"> <img class="zoom" src="./admin/productimagaes/jazcash.jpg" height="200" width="200"/> </a>
&nbsp;&nbsp;<br /><br /><h1 style="font-size:24px; color:#FFF;"><center>OR</center></h1> &nbsp;&nbsp; <a href="./customers/order.php?cid=<?php echo $custid; ?>"><h1 style="text-decoration:none; color:#933; font-size:42px"><center>Pay Offline</center></h1></a></b><br><br >
<marquee bgcolor="white" style="text-align:right;"><b style="font-size:50px; ">If you select to Pay Offline then kindly check your Email or Account.Thankyou!</b></marquee>
</div>


</div>
