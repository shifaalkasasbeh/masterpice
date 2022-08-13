
<?php

include "security.php";

include "include/connect.php";
include "include/navbar.php";



    $id = $_POST['v_order'];
    $query = "SELECT * FROM `cart` WHERE `user_id`= $id";
    $statement = $conn->prepare($query);
    $statement->execute();
    $carts = $statement->fetchAll();



?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->



<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

   </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-9">
                        <div class="card-header py-3">
        <h5 class="mg-0 font-weight-bold text-primary">Orders List</h5>

    </div>
    <div class="card-body">
           <?php
if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
    echo "<div class='alert alert-primary' role='alert'>" . $_SESSION['success'] . "</div>";
    unset($_SESSION['success']);
}
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    echo "<div class='alert alert-warning' role='alert'>" . $_SESSION['status'] . "</div>";
    unset($_SESSION['status']);
}
?>
        <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>product No.</th>
                        <th>Quantity</th>
                        <th>total</th>
                        <th>delete</th>

                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carts as $i => $order): ?>


                                <tr>
                                    <th ><?php echo $i + 1; ?></th>
                                    <td><?php echo $order["product_id"] ?></td>
                                    <td><?php echo $order["product_quntity"] ?></td>
                                    <td><?php echo $order["total"] ?></td>
                                        <td>
                                      <form action="order_delete.php" method="post" enctype="multipart/form-data">
                                      <input type="hidden" name="id" value="<?php echo $order['cart_id'] ?>">
                                      <button type="submit" name="delete_order" class="btn btn-danger" >Delete</button>
                                       </td>
                                       </form>
                                </tr>
                    <?php endforeach;?>

                </tbody>
            </table>
        </div>
</div>

</div>

</div>

                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



<?php
include "include/scripts.php";
include "include/footer.php";

?>