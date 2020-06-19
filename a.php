Kit Kat is a chocolate-covered wafer bar confection created by Rowntree's of York, United Kingdom, and is now produced globally by Nestlé
<?php 
include("inc/db.php");
/*if(!isset($_SESSION['admin_email']))
echo "<script>window.open('loginadmin.php','_self')</script>";
 
 else{
 ?>

?>*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	.insert{
		color:#000;
		cursor:pointer;
		}
	
	
	
</style>
<title>Untitled Document</title>
</head>

<body bgcolor="#003333">

<form action="" method="post" enctype="multipart/form-data">
<table width="700" align="center" border="5" >
<tr align="center"><td colspan="2"><h1>Insert New Product</h1></td></tr>
<tr>
<td style="padding:8px;"><b>Product Titles</b></td>
<td><input type="text" name="prodtitles" size="40"/></td></tr>
<tr>
<td><b>Product Category</b></td>
<td><select name="prodcats">
<option>Select a Category</option>
 <?php
             $getcat="select * from categories";
			 $runcat=mysqli_query($con,$getcat);
			 while($rowcat=mysqli_fetch_array($runcat)){
				 $cat_id=$rowcat['prodid'];
				 $cat_title=$rowcat['prodtitle'];
				 echo"<option value='$cat_id'>$cat_title</option>";
				 
				 
				 }
        ?>

</select></td></tr>
<tr>
<td><b>Product Brands</b></td>
<td>
<select name="prodbrands">
<option>Select a Brand</option>
  <?php
             $getbrand="select * from brands";
			 $runcat=mysqli_query($con,$getbrand);
			 while($rowbrand=mysqli_fetch_array($runcat)){
				 $brand_id=$rowbrand['brandid'];
				 $brand_title=$rowbrand['brandtitle'];
				 echo"<option value='$brand_id'>$brand_title</option>";
				 
				 
				 }
        ?>
          

</select>


</td></tr>
<tr>
 <td><b>Product Image 1</b></td>
<td><input type="file" name="prodimg1"/></td></tr>
<tr>
  <td><b>Product Image 2 </b></td>
<td><input type="file" name="prodimg2"/></td></tr>
<tr>
  <td><b>Product Image 3</b></td>
<td><input type="file" name="prodimg3"/></td></tr>
<tr>
<td><b>Product Prices</b></td>
<td><input type="text" name="prodprices" size="40"/></td></tr>
<tr>
 <td><b>Product Description</b></td>
<td><textarea name="prodesc" cols="100"rows="5"></textarea></td></tr>
<tr>
  <td><b>Product Keyword</b></td>
<td><input type="text" name="prodkey" size="40"/></td></tr>
<tr align="center"><td class="insert"colspan="2"><input type="submit" name="submit" value="Insert" style="width:100px; height:30px" /></td></tr>

</table>
</form>
</body>
</html>
<?php 
  if(isset($_POST['submit'])){
  
  $prodtitle=$_POST['prodtitles'];
  $prodcat=$_POST['prodcats'];
  $prodbrand=$_POST['prodbrands'];
  $prodprice=$_POST['prodprices'];
  $prodesc=$_POST['prodesc'];
  $status='on';
  $prodkey=$_POST['prodkey'];
  
  $prodimg1=$_FILES['prodimg1']['name'];
  $prodimg2=$_FILES['prodimg2']['name'];
  $prodimg3=$_FILES['prodimg3']['name'];
	 
	 $tempimg1=$_FILES['prodimg1']['tmp_name'];
   $tempimg2=$_FILES['prodimg2']['tmp_name'];
    $tempimg3=$_FILES['prodimg3']['tmp_name'];
	
	if($prodtitle=='' OR $prodcat =='' OR $prodbrand =='' OR $prodprice=='' OR $prodesc=='' OR  $prodkey=='' OR $prodimg1==''){
		echo"<script>alert('Please enter all the fields')</script>";
		
		
		}
	else{
	
	
	move_uploaded_file($tempimg1,"productimagaes/$prodimg1");
    move_uploaded_file($tempimg2,"productimagaes/$prodimg2");
	move_uploaded_file($tempimg3,"productimagaes/$prodimg3");
	
		
		
	$insertquerry="INSERT INTO products(catid,brandid,date,producttitle,prodimg1,prodprice,proddescription,prodstatus) VALUES ('$prodcat','$prodbrand',NOW(),'$prodtitle','$prodimg1','$prodprice','$prodesc','$status')";
		$runinsert= mysqli_query($con,$insertquerry);
		
	if($runinsert)
	{echo"<script>alert('successfully inserted')</script>";
	/*echo"<script>window.open('index.php?inprod','_self')</script>";*/
	
	}
      else{echo"<script>alert('not inserted')</script>";}
	}
  
  
  
  }




?>
