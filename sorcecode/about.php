
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
      <section class="bg0 p-t-50 p-b-50">
        <div class="container">
            <div class="row p-b-148">
                <div class="col-md-7 col-lg-8">
                    <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                        <br>
                        <br>
                        <br>
                        <h3 class="ltext-105  p-b-16">
                           About Us
                        </h3>
                        <br>
                        <br>

                        <p class="stext-113 cl6 p-b-26">
                        Everyone struggles to get local food products without artificial additives that may be harmful to the body and we were among the people with this problem, so we thought about this project and came to the conclusion that we created a website to offer these products all year round. You like it and keep using it for long periods of time  </p>

                        <p class="stext-113 cl6 p-b-26">

                        </p>
                        <br>

                        <p class="stext-113 cl6 p-b-26">
                            Any questions? Let us know in store at irbid or call us on +962-777-777-777
                        </p>
                    </div>
                </div>
  
                <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                      <br>
                        <br>
                        <br>
                    <div class="how-bor1 ">
                        <div class="hov-img0">
                            <img src="images/img-16.jpg" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>


</div>
	</div>
	



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