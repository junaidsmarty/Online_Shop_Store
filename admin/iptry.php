<?php 
$con=mysqli_connect("localhost","root","","shop");
?>
<form action="" method="post" enctype="multipart/form-data">
<table width="700" align="center" border="5" >
<tr align="center"><td colspan="2"><h1>Insert New Product</h1></td></tr>
<tr>
<td style="padding:8px;"><b>Product Titles</b></td>
<td><input type="text" name="pt" size="40"/></td></tr>
<tr>
<td><b>Product Category</b></td>
<td><select name="pc">
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
<select name="pb">
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
<td><input type="file" name="pimg1"/></td></tr>


<tr>
<td><b>Product Prices</b></td>
<td><input type="text" name="pp" size="40"/></td></tr>
<tr>
 <td><b>Product Description</b></td>
<td><textarea name="pd" cols="100"rows="5"></textarea></td></tr>
<tr>
  <td><b>Product Keyword</b></td>
<td><input type="text" name="pk" size="40"/></td></tr>
<tr align="center"><td class="insert"colspan="2"><input type="submit" name="sub" value="Insert" style="width:100px; height:30px" /></td></tr>

</table>
</form>

<?php 
  if(isset($_POST['sub'])){
  
  $prodtitle=$_POST['pt'];
  $prodcat=$_POST['pc'];
  $prodbrand=$_POST['pb'];
  $prodprice=$_POST['pp'];
  $prodesc=$_POST['pd'];
  $status="on";
  $prodkey=$_POST['pk'];
  
  $prodimg1=$_FILES['pimg1']['name'];
  
	 
	 $tempimg1=$_FILES['pimg1']['tmp_name'];
   
	if($prodtitle=='' OR $prodcat =='' OR $prodbrand =='' OR $prodprice=='' OR $prodesc=='' OR  $prodkey=='' OR $prodimg1==''){
		echo"<script>alert('Please enter all the fields')</script>";
		
		
		}
	else{
	
	
	move_uploaded_file($tempimg1,"productimagaes/$prodimg1");
  
	
		
		
	$insertquerry="INSERT INTO `products`(`catid`, `brandid`, `date`, `producttitle`, `prodimg1`, `prodprice`, `proddescription`, `productkey`, `prodstatus`) VALUES ('$prodcat','$prodbrand',NOW(),'$prodtitle','$prodimg1','$prodprice','$prodesc','$prodkey','$status')";
		$runinsert= mysqli_query($con,$insertquerry);
		
	if($runinsert)
	{echo"<script>alert('successfully inserted')</script>";
	echo"<script>window.open('index.php?inprod','_self')</script>";
	
	}
      else{echo"<script>alert('not inserted')</script>";}
	}
  
  
  
  }




?>
