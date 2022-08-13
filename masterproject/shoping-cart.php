<?php 

session_start(); 
include 'include/db.php';
$m =false;
$op = false ;
if(!isset($_SESSION['total'])){
	$_SESSION['total'] = 0;
} 
if (isset($_POST['update'])) {
	if (isset($_SESSION['Cart'])) {
		$i = 1;

		foreach ($_SESSION['Cart'] as $keys => $values) {
			$_SESSION["Cart"][$keys]['quantity'] = $_POST['quantity' . $i];
			$_SESSION["Cart"][$keys]['total'] = $values['pro_price'] * $_POST['quantity' . $i];
			$i++;
		}
	}
}







?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoping Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include 'include/style.php'; ?>

</head>
<body class="animsition">
	
	<!-- Header -->
	<?php include 'include/header.php' ?> 

	<!-- Cart -->
	<?php include 'include/smal_cart.php'; ?> 


	<!-- breadcrumb -->
	<div class="container" style="    margin-top: 70px;">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="post">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

									<?php  $total_cart ; 
	if(isset($_SESSION['Cart'])){
		$i=1;
		global $op ;
		foreach ($_SESSION['Cart'] as $value) {
			$op = true ;
			$_SESSION['total'] = $_SESSION['Total_cart'];
			?>
			<tr class="table_row">
			<td class="column-1">
				<a href="?actiond=true&pro_id=<?php echo $value['pro_id']; ?> ">
				<div class="how-itemcart1">
					<img src="admin/<?php echo $value['pro_img'];?>" alt="IMG">
				</div>
			</a>
			</td>
			<td class="column-2"><?php echo $value['pro_name'] ; ?></td>
			<td class="column-3">$ <?php echo $value['pro_price'];?></td>
			<td class="column-4">
				<div class="wrap-num-product flex-w m-l-auto m-r-0">
					<div class="minus btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
						<i class="fs-16 zmdi zmdi-minus"></i>
					</div>
					<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity<?php echo $i ?>" value="<?php echo $value['quantity']; ?>">

					<div class="plus btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
						<i class=" fs-16 zmdi zmdi-plus"></i>
					</div>

				</div>
			</td>
			<td class="column-5"> <?php echo $value['total'];?> JOD</td>
		</tr>

		<?php
				$i++;}
		
		}
	
	
	
	if(isset($_POST['coupon'])){
		$Code =$_POST['coupon'] ;
	$q="
	SELECT *  FROM coupon WHERE coupon_code = $Code
	";
	$data = $GLOBALS['db']->query($q);
		foreach($data as $value){
			if($value['coupon_code'] == $Code){
				$_SESSION['total'] = $_SESSION['total'] *  $value['discount'];
			}
				else{
					$m = true ;
				}
			
		}} ?> 					
			
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								
								<?php if($m){
	echo '
	<div class="alert alert-danger" role="alert">
	your copun dose not work or expire
   </div>	
	';
}?>
									<input type="submit" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" name="update" value="Update Cart">
								
							</div>

							
						</div>
					</div>
				</div>
<?php if($op){ ?>
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">

					<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>
<?php if(isset($_GET['E'])){
	echo '
	<div class="alert alert-danger" role="alert">
	please logged in to check out your order <br><br> <a class="btn btn-primary" href="login.php" >Log in</a>
   </div>	
	';
}?>
						<div class="flex-w flex-t bor12 p-b-13">
				
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									
						
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php echo $_SESSION['Total_cart']?> JOD
								</span>
							</div>
						</div>
						<a href="checkout.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</a>
					</div>
				</div>
			</div>
			<?php } ?> 
		</div>
	</form>
		
	
		

	<!-- Footer -->
	<?php include 'include/js.php'; ?>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

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
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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
	<script >
		$(document).ready(function() {
			$('.minus').click(function () {
				var $input = $(this).parent().find('input');
				var count = parseInt($input.val()) - 1;
				count = count < 1 ? 1 : count;
				$input.val(count);
				$input.change();
				return false;
			});
			$('.plus').click(function () {
				var $input = $(this).parent().find('input');
				$input.val(parseInt($input.val()) + 1);
				$input.change();
				return false;
			});
		});
	</script>

</body>
</html>