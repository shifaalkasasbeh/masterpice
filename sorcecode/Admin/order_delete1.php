<?php
include_once 'include/connect.php';

if (isset($_POST['d_order'])) {
   $id = $_POST['d_order'] ?? null;

echo "$id";
if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $conn->prepare('DELETE FROM `orders` WHERE `orders`.`order_id` = :id');
$statement->bindValue(':id', $id);
$statement->execute();
header("Location:index.php");

}
