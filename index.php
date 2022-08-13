<?php
session_start();
include 'include/db.php';


if(!isset($_SESSION['Cart'])){
$_SESSION['Cart'] =  array();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'include/style.php' ?> 

</head>
<body class="animsition">

	<!-- Header -->
	<?php include 'include/header.php' ?> 

	<!-- Cart -->
	<?php include 'include/smal_cart.php'; ?> 

		

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				
				<div class="item-slick1" style="background-image: url(images/img-9.webp)">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
								
Local products made by skilled hands
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									****************
								</h2>
							</div> -->
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="item-slick1" style="background-image: url(images/img-56.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
								*****************

								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>


				
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50" style="text-align=center;     padding-bottom: 0px;">
		<div class="container">	<h1 style="    width: 100%;
    text-align: center;
    margin-bottom: 50px;
    margin-top: 50px;
    font-weight: 700;"> Categories </h1>
			<div class="row">
			
			<?php

function ViewwSubCategory(){
	$q = "
	SELECT * FROM `category`
	"; 
	$data = $GLOBALS['db']->query($q);
	foreach ($data as $value) {
	
echo ' 
<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="admin/'.$value['category_img'].'" alt="IMG-BANNER">

						<a href="product.php?actionvs=true&cat_id='.$value['category_id'].'" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									'.$value['category_name'].'
								</span>

								<span class="block1-info stext-102 trans-04">
									'.$value['category_des'].'
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								
                            <div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
                            
                                </div>
						</a>
					</div>
				</div>

';			
    }
}
ViewwSubCategory();
?>
	</div>
	</div>



    <!-- Content page -->
  
	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50" style="text-align=center;     padding-bottom: 0px;">
		<div class="container">	<h1 style="    width: 100%;
    text-align: center;
    margin-bottom: 50px;
    margin-top: 50px;
    font-weight: 700;">Featured Products </h1>
			<div class="row">
			
			<?php
include 'include/viewpro.php';

ViewPro();	
    

?>
<?php 
	include 'include/detailproduct.php';
	include 'include/db.php';

				if(isset($_GET['actiona'])){
					include 'include/db.php';
					$pro_id = $_GET['pro_id'];
					$q = "
					SELECT * FROM `product` WHERE product_id = $pro_id
					";
					$result = $GLOBALS['db']->query($q); 
					$row=$result->fetch(PDO::FETCH_ASSOC);
					
					
					if(isset($_GET['pro_id'])){
						
   
      
							$pro_id = $row['product_id'];
							$quantity = 1 ; 
							$op = true ; 
							$pro_name = $row['product_name'];
							$total = $row['product_price'];
							$pro_img = $row['product_img'];
							$pro_price = $row['product_price'];
					
							$product = array
							( 
							"cart_id" => "$pro_id" ,
							"total" => "$total",
							"quantity"=>"$quantity" ,
							"pro_id" => "$pro_id",
							"pro_name" => "$pro_name",
							"pro_price" => "$pro_price",
							"pro_img" => "$pro_img"
							); 
							
							foreach($_SESSION['Cart'] as $key => $value ){
								if($value["pro_id"] == $pro_id ) {
									$_SESSION['Cart'][$key]['quantity'] =$value["quantity"]+= 1;
									$_SESSION['Cart'][$key]['total'] = $value['pro_price'] *=   $value["quantity"];
									$op =false ; 
								}
							 }
							
							
						   if($op){
							array_push($_SESSION['Cart'] , $product);
						   }
						}
					}
				
	?>

</div>
	</div>
	<!-- Footer -->
	<?php include 'include/footer.php';?>

	<!-- Back to top -->

<?php include 'include/js.php'; ?>

</body>
</html>