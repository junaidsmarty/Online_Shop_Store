<?php 
@session_start();
include("includes/dbcon.php");
if(isset($_GET['editaccount'])){
	$emailcust=$_SESSION['cust_email'];
	$getc="select * from customers where cust_email='$emailcust'";
	$rungetc=mysqli_query($con,$getc);
	$row=mysqli_fetch_array($rungetc);
	$id=$row['custid'];
	$custname=$row['custname'];
	$custemail=$row['cust_email'];
	$custname=$row['custname'];
	$custpass=$row['custpass'];
	$custcountry=$row['custcountry'];
	$custcity=$row['custcity'];
	$custnum=$row['custnum'];
	$custaddr=$row['custaddr'];
	$custimage=$row['custimage'];
	
	
	
	
	}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data">
   <table align="center" width="600" border="8px solid white;">
      <tr>
        <td colspan="8" align="center"><h2>Edit Your Account</h2></td>
      </tr>    
      <tr>
        <td align="left">Customer Name</td>
        <td><input type="text" name="cname" value="<?php echo $custname;?>"/></td>
      </tr>
      <tr>
        <td align="left">Customer Email</td>
        <td><input type="text" name="cemail" value="<?php echo $custemail;?>"/></td>
      </tr>
      <tr>
        <td align="left">Customer Password</td>
        <td><input type="text" name="cpass" value="<?php echo $custpass;?>"/></td>
      </tr>
      <tr>
        <td align="left">Customer Country</td>
        <td>
          <select name="ccountry">
           <option value="<?php echo $custcountry; ?>"><?php echo $custcountry; ?></option>
           <option>Pakistan</option>
           <option>India</option>
           <option>Afghanistan</option>
           <option>Srilanka</option>
           <option>Bangladesh</option>
           <option>Maldives</option>
           <option>Bhutan</option>
          </select>
        </td>
       </tr> 
      <tr>
        <td align="left">Customer City</td>
        <td><input type="text" name="ccity" value="<?php echo $custcity;?>"/></td>
      </tr>
      <tr>
        <td align="left">Customer Contact</td>
        <td><input type="text" name="cnum" value="<?php echo $custnum;?>"/></td>
      </tr>
      <tr>
        <td align="left">Customer Address</td>
        <td><input type="text" name="cadd" value="<?php echo $custaddr;?>"/></td>
      </tr>
      <tr>
        <td align="left">Customer image</td>
        <td><input type="file" name="cimg" value="<?php echo $custimage;?>" size="60"/></td>
      </tr>
       <tr>
        <td colspan="8" align="center"><input type="submit" name="cupdate" value="Update Now"/></td>
      </tr>
   
   </table>






</form>
</body>
</html>
<?php
if(isset($_POST['cupdate'])){
	$updid=$id;
	$cname=$_POST['cname'];
	$cemail=$_POST['cemail'];
	$cpass=$_POST['cpass'];
	$ccountry=$_POST['ccountry'];
	$ccity=$_POST['ccity'];
	$cnum=$_POST['cnum'];
	$cadd=$_POST['cadd'];
	$cimg=$_FILE['cimg']['name'];
	$cimgtemp=$_FILE['cimg']['tmp_name'];
	move_uploaded_file($cimgtemp,"customers/custimg/$cimg");
	$as="UPDATE customers SET custname='$cname',cust_email='$cemail',custpass='$cpass',custcountry='$ccountry',custcity='$ccity',custnum='$cnum',custaddr='$cadd',custimage='$cimg' WHERE custid='$updid'";
	$runas=mysqli_query($con,$as);
	
	if($runas){
		echo"<script>alert('Your account has been updated')</script>";
        
		echo"<script>window.open('myaccount.php','_self')</script>";
		
		}
	}
?>