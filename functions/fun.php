<head>
<style>


.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid black;
}


.button1:hover {
  background-color:#008CBA;
  color: white;
}


</style>


</head>

<?php
$db=mysqli_connect("localhost","root","","shop");


function getoIp(){
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

function cart(){
	
	if(isset($_GET['addcart'])){
		global $db;
		$i_padd=getoIp();
		$p_id=$_GET['addcart'];
		$checkpro="select * from cart where proid='$p_id' and ipadd='$i_padd'";
		$runcheck=mysqli_query($db,$checkpro);
		$num = mysqli_num_rows($runcheck);
		if(!isset($_SESSION['cust_email'])){
			if($num>0){
			echo "";			
			}
		else{
			$q = "insert into `cart` (`proid`,`ipadd`) values ('$p_id','$i_padd')";
			//$q="insert into cart (proid,ipadd) values ('$p_id','$i_padd')";
			$pq=mysqli_query($db,$q);
			echo"Horaha";
			echo "<script>window.open('index.php','_self') </script>";
		}
		}
		else{
		$e=$_SESSION['cust_email'];
		     $b="select * from customers where cust_email='$e'";
			 $r=mysqli_query($db,$b);
			 $fd=mysqli_fetch_array($r);
			 $fdid=$fd['custid'];
		
			$q = "insert into `cart` (`proid`,`ipadd`,custid) values ($p_id,'$i_padd','$fdid')";
			//$q="insert into cart (proid,ipadd) values ('$p_id','$i_padd')";
			$pq=mysqli_query($db,$q);
			echo "<script>window.open('index.php','_self') </script>";
			 
		}
		
	}
	
}
  function items(){
      if(isset($_GET['addcart'])){
		global $db;
		$i_padd=getoIp();
		$itemsget="select * from cart where ipadd='$i_padd'";
		$runitemget=mysqli_query($db,$itemsget);
		$count=mysqli_num_rows($runitemget);
	   }
	   else{
    global $db;
		$i_padd=getoIp();
		$itemsget="select * from cart where ipadd='$i_padd'";
		$runitemget=mysqli_query($db,$itemsget);
		$count=mysqli_num_rows($runitemget);

	   }
	   echo $count ;
  }
  
  function price(){
	  global $db;
	  $i_padd=getoIp();
	  $total=0;
	  $price="select * from cart where ipadd='$i_padd'";
	  $runprice=mysqli_query($db,$price);
	   while($record=mysqli_fetch_array($runprice)){
		   
		   $proidd=$record['proid'];
		   $prodprice="select * from products where prodtid=$proidd";
		   $runprodprice=mysqli_query($db,$prodprice);
		   while($catchprodprice=mysqli_fetch_array($runprodprice)){
			 
			 $pp=array($catchprodprice['prodprice']);
			 $values=array_sum($pp);
			 $total +=$values;
			   
			   
			   
			   
			   
			   
			   
			    
			   
			   
		   }
		   
		   
		   }
	  echo "$". $total ;
	  
	  
	  
	  
	  }
 function getCat(){
 global $db;
 
             $getcat="select * from categories";
			 $runcat=mysqli_query($db,$getcat);
			 while($rowcat=mysqli_fetch_array($runcat)){
				 $cat_id=$rowcat['prodid'];
				 $cat_title=$rowcat['prodtitle'];
				 echo" <a class='admin'  href='index.php?cat=$cat_id'>$cat_title</a>";
				 
				 
				 }
       }
	   
	    function getBrand(){
			global $db;
			$getbrand="select * from brands";
			 $runcat=mysqli_query($db,$getbrand);
			 while($rowbrand=mysqli_fetch_array($runcat)){
				 $brand_id=$rowbrand['brandid'];
				 $brand_title=$rowbrand['brandtitle'];
				 echo" <a class='admin'  href='index.php?brand=$brand_id'>$brand_title</a>";
				 
			 }
				 }
				 
		function Displayinfo(){
			global $db;
			
			
			if(!isset($_GET['cat'])){
				
				if(!isset($_GET['brand'])){
			$getproduct="select * from products order by rand() LIMIT 0,6";
				$runproduct=mysqli_query($db,$getproduct);
				 while($productrow=mysqli_fetch_array($runproduct)){
				$pro_id=$productrow['prodtid'];
				$pro_title=$productrow['producttitle'];
				$pro_cat=$productrow['catid'];
				$pro_brand=$productrow['brandid'];
				$pro_desc=$productrow['proddescription'];
				$pro_price=$productrow['prodprice'];
				$pro_img=$productrow['prodimg1'];
				
				
				echo"
				<div id='singleproduct'>
				<h3>
				
				$pro_title</h3>
				<img src='admin/productimagaes/$pro_img' width='180' height='180' style='border:2px solid'/>
				<p><b>Price:PKR $pro_price</b><p>
				<a href='details.php?proid=$pro_id' style='float:left;'>Details</a>
				<a href='index.php?addcart=$pro_id'><button style='float:right' class='button button1'>Add To Cart</button></a>
				
				</div>
				
				
				";
					
					
					
					
					
				}
				}
			}
			}
			
			
			function DisplayCatinfo(){
			global $db;
			
			
			if(isset($_GET['cat'])){
				
				$cat_id=$_GET['cat'];
			$getcatproduct="select * from products where catid=$cat_id";
				$runcatproduct=mysqli_query($db,$getcatproduct);
				 while($catproductrow=mysqli_fetch_array($runcatproduct)){
				$pro_id=$catproductrow['prodtid'];
				$pro_title=$catproductrow['producttitle'];
				$pro_cat=$catproductrow['catid'];
				$pro_brand=$catproductrow['brandid'];
				$pro_desc=$catproductrow['proddescription'];
				$pro_price=$catproductrow['prodprice'];
				$pro_img=$catproductrow['prodimg1'];
				
				
				echo"
				<div style='width:30%;'>
				<h3>
				
				$pro_title</h3>
				<img src='admin/productimagaes/$pro_img' width='180' height='180' style='border:2px solid'/>
				<p><b>Price:PKR $pro_price</b><p>
				<a href='details.php?proid=$pro_id' style='float:left;'>Details</a>
				<a href='index.php?addcart=$pro_id'><button style='float:right' class='button button1'>Add To Cart</button></a>
				
				</div>
				
				
				";
					
					
					
					
					
				}
				}
			}
			function DisplayBrandinfo(){
			global $db;
			
			
			if(isset($_GET['brand'])){
				
				$brand_id=$_GET['brand'];
			$getbrandproduct="select * from products where brandid=$brand_id";
				$runbrandproduct=mysqli_query($db,$getbrandproduct);
				 while($brandproductrow=mysqli_fetch_array($runbrandproduct)){
				$pro_id=$brandproductrow['prodtid'];
				$pro_title=$brandproductrow['producttitle'];
				$pro_cat=$brandproductrow['catid'];
				$pro_brand=$brandproductrow['brandid'];
				$pro_desc=$brandproductrow['proddescription'];
				$pro_price=$brandproductrow['prodprice'];
				$pro_img=$brandproductrow['prodimg1'];
				
				
				echo"
				<div style='width:30%'>
				<h3>
				
				$pro_title</h3>
				<img src='admin/productimagaes/$pro_img' width='180' height='180' style='border:2px solid'/>
				<p><b>Price:PKR $pro_price</b><p>
				<a href='details.php?proid=$pro_id' style='float:left;'>Details</a>
				<a href='index.php?addcart=$pro_id'><button style='float:right' class='button button1'>Add To Cart</button></a>
				
				
				</div>
				
				";
					
					
					
					
					
				}
				}
			}
		
		
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>