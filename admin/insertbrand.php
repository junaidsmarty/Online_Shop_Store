<?php if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 2px solid #dddddd;
  text-align: left;
  padding: 5px;
}

tr{
	background-color:#999;
	
	
	}
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

<body>
 

<form action="" method="post" >
 <table align="center" border="2px solid"> 
<tr align="center">
  <th colspan="3"><h2><b>Insert New Brand</b></h2></th>
  
</tr> 
<tr>
 <td><input type="text" name="newbrand"/></td>
 <td><input class="button button1" type="submit"  name="submitbrand"value="Insert Brands"/></td>
 
</tr>

 
 </table>

</form>


<?php
 include("inc/db.php"); 
if(isset($_POST['submitbrand'])){
	$ibrand=$_POST['newbrand'];
	$qid="INSERT INTO brands(brandtitle) VALUES ('$ibrand')";
	$runqic=mysqli_query($con,$qid);
	if($runqic){
		echo " <script> alert('A New Brand Has Been Added to the List ')</script>";
				echo "<script> window.open('index.php?viewbrand','_self')</script>";
		
		}
	
	
	}



?>
</body>
</html>
<?php } ?>