
<?php 
@session_start();
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
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
	<?php 
	if(!isset($_SESSION['Cart'])){
		$_SESSION['Cart'] =  array();
		}
	include 'include/style.php' ?> 
	</head>
<body class="animsition">
	
<!-- Header -->
<?php include 'include/header.php' ?> 

<!-- Cart -->
<?php include 'include/smal_cart.php'; ?> 
<?php include 'include/viewproduct.php'; ?> 
<?php include 'include/viewcategory.php'; ?> 
<?php include 'include/viewsubcategory.php'; ?> 
<?php include 'include/viwesubcategorypro.php'; ?> 

	
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52" style="    margin-top: 150px;">
			
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">

			<li class="p-b-10">
							<a href="?allproduct" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
								All Product
							</a>
						</li>
					<?php
					CategoryView();
					?>
					
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					

				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
								</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row isotope-grid">
				
				<?php
				if(isset($_GET['actionvs'])){
					ViewwSubCategory();
				}
				else{
					if(isset($_GET['activesvp'])){
						ViewSubProduct();
					}
					else{
				 ViewProduct();
					} 
				}
				 ?> 
			</div>
			</div>
			<!-- Load more -->
			<!-- <div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div> -->
		</div>
	</div>
		<br>
		<br>
		<br>

	<!-- Footer -->


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<?php 
	include 'include/detailproduct.php';
	include 'include/db.php';
?>
	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>

<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<?php include "include/footer.php";?>

</body>
</html>