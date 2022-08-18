<?php

require "config.php";

session_start();
if(!isset($_SESSION['loggeduser'])){
    header('location:login.php');
}
if(isset($_GET['logout'])){
  session_unset();
  header('location:login.php');
}
$user_id=$_SESSION['loggeduser'];
$viewuser="SELECT * FROM user WHERE user_id ='$user_id' ";
$result=$pdo->query($viewuser);
if(!$result){
    echo"Error ";
}


$row=$result->fetch(PDO::FETCH_ASSOC);




?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/login.css" >
    <?php include 'include/style.php' ?> 
    <style>
      body{margin-top:20px;}
/*-------- 27. My account style ---------*/
.myaccount-tab-menu {
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column;
}

.myaccount-tab-menu a {
  border: 1px solid #ccc;
  border-bottom: none;
  font-weight: 600;
  font-size: 13px;
  display: block;
  padding: 10px 15px;
  text-transform: uppercase;
  color:#666666;
}

.myaccount-tab-menu a:last-child {
  border-bottom: 1px solid #ccc;
}

.myaccount-tab-menu a:hover, .myaccount-tab-menu a.active {
    background-color: #45a7b4;
    border-color: #45a7b4;
    color: #ffffff;
}

.myaccount-tab-menu a i.fa {
  font-size: 14px;
  text-align: center;
  width: 25px;
}

@media only screen and (max-width: 767px) {
  #myaccountContent {
    margin-top: 30px;
  }
}

.myaccount-content {
  border: 1px solid #eeeeee;
  padding: 30px;
}

@media only screen and (max-width: 767px) {
  .myaccount-content {
    padding: 20px 15px;
  }
}

.myaccount-content form {
  margin-top: -20px;
}

.myaccount-content h3 {
  font-size: 20px;
  border-bottom: 1px dashed #ccc;
  padding-bottom: 10px;
  margin-bottom: 25px;
  font-weight: 600;
}

.myaccount-content .welcome a:hover {
  color: #ff6e21;
}

.myaccount-content .welcome strong {
  font-weight: 600;
    color: #2e9aa8;
}

.myaccount-content fieldset {
  margin-top: 20px;
}

.myaccount-content fieldset legend {
  font-size: 16px;
  margin-bottom: 20px;
  font-weight: 600;
  padding-bottom: 10px;
  border-bottom: 1px solid #ccc;
}

.myaccount-content .account-details-form {
  margin-top: 50px;
}

.myaccount-content .account-details-form .single-input-item {
  margin-bottom: 20px;
}

.myaccount-content .account-details-form .single-input-item label {
  font-size: 14px;
  text-transform: capitalize;
  display: block;
  margin: 0 0 5px;
}

.myaccount-content .account-details-form .single-input-item input {
  border: 1px solid #e8e8e8;
  height: 50px;
  background-color: transparent;
  padding: 2px 20px;
  color: #1f2226;
  font-size: 13px;
}

.myaccount-content .account-details-form .single-input-item input:focus {
  border: 1px solid #343538;
}

.myaccount-content .account-details-form .single-input-item button {
  border: none;
  background-color: #266b74;
  text-transform: uppercase;
  font-weight: 600;
  padding: 9px 25px;
  color: #fff;
  font-size: 13px;
}

.myaccount-content .account-details-form .single-input-item button:hover {
  background-color: #1f2226;
}

.myaccount-table {
  white-space: nowrap;
  font-size: 14px;
}

.myaccount-table table th,
.myaccount-table .table th {
  padding: 10px;
  font-weight: 600;
  background-color: #f8f8f8;
  border-color: #ccc;
  border-bottom: 0;
  color: #1f2226;
}

.myaccount-table table td,
.myaccount-table .table td {
  padding: 10px;
  vertical-align: middle;
  border-color: #ccc;
}

.saved-message {
  background-color: #fff;
  border-top: 3px solid #ff6e21;
  font-size: 14px;
  padding: 20px 0;
  color: #333;
}
.containerx{
  margin-top : 190px ;
}
    </style>
</head>
  <body>
<!-- Header -->
<?php include 'include/header.php' ?> 

<!-- Cart -->
<?php include 'include/smal_cart.php'; ?> 


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <div class="containerx">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <a href="#dashboad" class="<?php if(!isset($_GET['address'])){ echo 'active'; }?>" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                            Dashboard</a>
                                        <a href="#orders" data-toggle="tab" class=""><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                                                                <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Payment
                                            Method</a>
                                        <a href="#address-edit" data-toggle="tab" class="<?php if(isset($_GET['address'])){ echo 'active'; }?>"><i class="fa fa-map-marker"></i> address</a>
                                        <a href="#account-info" data-toggle="tab" class=""><i class="fa fa-user"></i> Account Details</a>
                                        
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->
                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade <?php if(!isset($_GET['address'])){ echo 'active show'; }?>" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content ">
                                                <h3>Dashboard</h3>
                                                <div class="welcome">
                                                    <p>Hello, <strong><?php echo $row['username']; ?></strong> (If Not <strong><?php echo $row['username']; ?> !</strong><a href="profile.php?logout=true" class="logout"> Logout</a>)</p>
                                                </div>

                                                <p class="mb-0">From your account dashboard. you can easily check &amp; view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Orders</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                <table class="table">                  
  
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Total of the oeder </th>
      <th scope="col">Date of order</th>
      <th scope="col">Order detaile</th>
    </tr>
  </thead>
  <?php 
   
  $q1 = "
  SELECT * FROM `orders` 
  ";
  $data = $pdo->query($q1);
  
  foreach($data as $v){
      if($v['user_id'] == $user_id ){
?>
<tbody>
    <tr>
      <th scope="row"><?php echo $v['order_id']; ?></th>
      <td><?php echo $v['invoice']; ?></td>
      <td><?php echo $v['order_date']; ?></td>
      <td><?php echo '
      <a class="btn btn-primary" href="orderdetail.php?order_id='.$v['order_id'].'">Show detaile </a>
      
      '; 
      ?>
      </td>
    </tr>
  </tbody>
<?php
      } 
  }
  ?>
  

</table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                                    <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Payment Method</h3>
                                                <p class="saved-message">You Can't Saved Your Payment Method yet. we just provid cash on delivery </p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade <?php if(isset($_GET['address'])){ echo 'active show'; }?> " id="address-edit" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Billing Address</h3>
                                                <?php if(isset($_GET['address'])){ 
                                                  echo '
                                                  <div class="single-input-item">
                                                  <label for="display-name" class="required">Display Name</label>
                                                  <form action="updateuser.php" method="get">
                                                  <input type="text" id="display-name" value="'.$row['address'].' " name="naddress">
                                                  <input type="text" id="display-name" value="'.$row['phone'].' " name="phone">
                                                  
                                                  <input type="submit" id="display-name" value="Change Address" name="address">
                                                  </form>
                                                  </div>
                                                  ';
                                                 }
                                                 else{
                                                 ?>
                                                <address>
                                                    <p><strong><?php echo $row['username']; ?></strong></p>
                                                    <p><?php echo $row['address']; ?></p>
                                                        <p>Mobile: <?php echo $row['phone']; ?> </p>
                                                </address>
                                                <a href="?address=true" class="check-btn sqr-btn "><i class="fa fa-edit"></i> Edit Address</a>
                                                <?php } ?>
                                              </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Account Details</h3>
                                                <div class="account-details-form">
                                                    <form action="updateuser.php" method="get">
                                                        <div class="row">
                                                       
                                                       
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="display-name" class="required">Display Name</label>
                                                            <input type="text" id="display-name" name="name" value="<?php echo $row['username']; ?>">
                                                        </div>
                                                 
                                                        <fieldset>
                                                            <legend>Password change</legend>
                                                            <div class="single-input-item">
                                                                <label for="current-pwd" class="required">Current Password</label>
                                                                <input type="password" id="current-pwd">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="new-pwd" class="required">New Password</label>
                                                                        <input type="password" id="new-pwd">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="confirm-pwd" class="required">Confirm Password</label>
                                                                        <input type="password" id="confirm-pwd">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                
                                                        </fieldset>
                                                        <div class="single-input-item">
                                                            <button class="check-btn sqr-btn ">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> <!-- Single Tab Content End -->
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>                  




                 
<?php include 'include/js.php' ?> 
  </body>
</html>

