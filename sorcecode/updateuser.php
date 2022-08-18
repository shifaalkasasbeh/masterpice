<?php
session_start();
require "config.php";

if(isset($_GET['address'])){ 

   $address = $_GET['naddress'];
   $phone = $_GET['phone'];
   echo $phone .$address;


   if(isset($_SESSION['loggeduser'])){
       $user_id=$_SESSION['loggeduser'];
       $qu="UPDATE `user` 
       SET `address`='$address',`phone`='$phone' WHERE user_id= $user_id";
       $pdo->exec($qu);
       header('Location:profile.php');
       
   }
 }
if(isset($_GET['name'])){ 

   $name = $_GET['name'];
  
   echo $phone .$address;


   if(isset($_SESSION['loggeduser'])){
       $user_id=$_SESSION['loggeduser'];
       $qu="UPDATE `user` 
       SET `username`='$name' WHERE user_id= $user_id";
       $pdo->exec($qu);
       header('Location:profile.php');
       
   }
  }