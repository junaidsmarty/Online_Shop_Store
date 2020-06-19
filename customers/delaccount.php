<form action="" method="post">
<table align="center" width="600">
 <tr align="center">
   <td colspan="2">
  <h2> Do You Really want to delete your account?</h2>
   </td>
   
 
 </tr>

 <tr align="center">
   <td>
    <input type="submit" name="yes" value="Yes I want to delete my account!"/>
   </td>
   <td>
    <input type="submit" name="no" value="No I do not want to delete my account!"/>
   </td> 

</table>
</form>
<?php 
 include("includes/dbcon.php");
  
  if(isset($_POST['yes'])){
  session_destroy();
  $ses=$_SESSION['cust_email'];
  $del="delete from customers where cust_email='$ses'";
  mysqli_query($con,$ses);
  echo"<script>alert('Your Account has been deleted,Good Bye!')</script>";
  echo"<script>window.open('../index.php','_self')</script>";
  }
  else if(isset($_POST['no'])){
	  
	  echo"<script>window.open('myaccount.php','_self')</script>";
	  }

?>