<?php 
include 'includes/db.php';
session_start();
require "app/start.php";


use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;


if (!isset($_GET['success'])){
  die();
}

if($_GET['success'] === "false" || $_GET['success'] === ""){
  header("Location: cart.php?failed");
  die();
}
if(!isset($_GET['paymentId'], $_GET['PayerID'])){
  die();
}

$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];


$payment = Payment::get($paymentId, $paypal);

$execute = new PaymentExecution();
$execute->setPayerId($payerId);


try{
  $result = $payment->execute($execute, $paypal);
}catch(Exception $e){
  die($e);
}


foreach($_SESSION['shopping_cart'] as $song){
  
  $beat_id  = $song['id'];
  $beat_name  = $song['name'];
  $license  = $song['license'];
  $price  = $song['price'];
  
  $query = "INSERT INTO transaction (beat_id, beat_name, license, payerId, paymentId, price) ";
  $query .= "VALUES ('{$beat_id}', '{$beat_name}', '{$license}', '{$payerId}', '{$paymentId}', '{$price}')";
  
  $result = mysqli_query($connection, $query);
  if(!$result){
    die(mysqli_error($connection));
  }
  

  
}

$_SESSION["shopping_cart"] = [];

header('Location: cart.php?success=true');