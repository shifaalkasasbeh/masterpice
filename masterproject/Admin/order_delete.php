<?php
include_once 'include/connect.php';

if (isset($_POST['delete_order'])) {
    echo "helllo";
    $id = $_POST['id'] ?? null;
    echo "$id";
    if (!$id) {
        header('Location: order_view.php');
        exit;
    }

    $statement = $conn->prepare('DELETE FROM `cart` WHERE `cart`.`cart_id` = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    header("Location:index.php");
}
