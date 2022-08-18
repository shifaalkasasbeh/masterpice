
<?php

include "security.php";

include "include/connect.php";
include "include/navbar.php";

$query = "SELECT *, user.username FROM `orders` INNER JOIN user on orders.user_id = user.user_id;";
$satement = $conn->prepare($query);
$satement->execute();
$orders = $satement->fetchAll();

$query = "SELECT * FROM `contact` ";
$satement2 = $conn->prepare($query);
$satement2->execute();
$contacts = $satement2->fetchAll();


?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- Content Row -->
              
                <!-- Content Row -->


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
                        <th>Name</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Order No.</th>
                        <th>More details</th>                        
                        <th>Delete</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $i => $order): ?>
                            
                                <tr>
                                    <th ><?php echo $i + 1; ?></th>
                                    <td><?php echo $order["username"] ?></td>
                                    <td><?php echo $order["invoice"] ?></td>
                                    <td><?php echo $order["order_date"] ?></td>
                                    <td><?php echo  $order["order_id"]  ?></td>

                                    <td>

                                        <form action="order_view.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="v_order" value="<?php echo $order['user_id']; ?>">
                                            <button type="submit" class="btn btn-primary" name="view">View</button>
                                        </form>
                                        </td>
                                        <td>
                                        <form action="order_delete1.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="d_order" value="<?php echo $order['order_id']; ?>">
                                            <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                        </form>
                                    </td>
                                    
                                </tr>
                    <?php endforeach;?>

                </tbody>
            </table>
        </div>
<br>
<br>
<br>
         <div class="table-responsive">
                     <h5 class="mg-0 font-weight-bold text-primary">Emails</h5>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>E-mail Address</th>
                        <th>Email Content</th>
                                             
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $i => $contact): ?>


                                <tr>
                                    <th ><?php echo $i + 1; ?></th>
                                    <td><?php echo $contact["contact_email"] ?></td>
                                    <td><?php echo $contact["contact_des"] ?></td>
                                    
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