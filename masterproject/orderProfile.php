<?php
session_start();
include 'include/detailproduct.php';
include 'include/db.php';
include 'include/header.php';
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
    <?php include 'include/style.php'?>
</head>
  <body>
<!-- Header -->


<h1 style="margin-top:20%;"> Your Order : </h1>
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
$user_id = $_SESSION['loggeduser'];

$q1 = "
  SELECT * FROM `orders` ;
  ";
$statement = $db->prepare($q1);
$statement->execute();
$data = $statement->fetchAll();

foreach ($data as $i => $v) {

    if ($v['user_id'] == $user_id) {
        ?>
<tbody>
    <tr>
      <th scope="row"><?php echo $v['order_id']; ?></th>
      <td><?php echo $v[1]; ?></td>
      <td><?php echo $v[2]; ?></td>
      <td><?php echo '
      <a class="btn btn-primary" href="orderdetail.php?order_id=' . $v[0] . '">Show detaile </a>

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
<?php

include 'include/js.php';
include 'include/footer.php';
?>