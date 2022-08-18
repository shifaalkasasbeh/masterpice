<?php
include 'db.php';
function ViewPro()
{
    $q = "
	SELECT * FROM product LIMIT 8
	";
    $data = $GLOBALS['db']->query($q);
    foreach ($data as $value) {

        echo '
<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->

					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="admin/' . $value['product_img'] . '" alt="IMG-PRODUCT">

							<a href="?actionv=true&pro_id=' . $value['product_id'] . '" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="?actionv=true&pro_id=' . $value['product_id'] . '" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 ">
									' . $value['product_name'] . '
								</a>

								<span class="stext-105 cl3">
									' . $value['product_price'] . "  JOD".'
								</span>
							</div>

					
						</div>
					</div>
				</div>

';
    }
}
