
<?php
session_start();
if(!isset($_SESSION['Cart'])){
	$_SESSION['Cart'] =  array();
	}
$op =true;
    if(empty($_POST['email'])){
        $op =false;
    }

    if(empty($_POST['msg'])){
        $op =false;
    }
    if($op){
        $massage = $_POST['msg'];
        $email = $_POST['email'];
         include 'include/db.php';
         $q="
         INSERT INTO `contact`(`contact_id`, `contact_email`, `contact_des`, `contact_done`, `date`) 
         VALUES (NULL,'$email','$massage ','false',NOW())
         "; 
         $GLOBALS['db']->exec($q);
         
    }
    ?>
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



</div>
	</div>
	<!-- Footer -->
	
    <!-- Title page -->
    
   


    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116">
    <h2 class="ltext-105  txt-center mt-50">
            Contact Us
        </h2>
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form action="" method="post">
                        <h4 class="mtext-105  txt-center p-b-30">
                            Send Us A Message
                        </h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111  plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address">
                            
                        </div>

                        <div class="bor8 m-b-30">
                            <textarea class="stext-111  plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?"></textarea>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
                    </form>
                </div>

                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 ">
								Address
							</span>

                            <p class="stext-115 cl6 size-213 p-t-18">
                                Jordan-Irbid
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 ">
								Lets Talk
							</span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                +962-777-777-777
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full">
                        <span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 ">
								Our Gmail
							</span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                shop-local@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Footer -->
   


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
    </div>




<?php include 'include/footer.php';?>

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
        $(".js-select2").each(function() {
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
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
    <script src="js/map-custom.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>