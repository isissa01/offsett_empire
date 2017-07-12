<?php
session_start();
include 'includes/db.php';
require_once "vendor/phpmailer/phpmailer/PHPMailerAutoLoad.php";
if (!isset($_GET['transaction']) || empty($_GET['transaction'])){
  header("Location: index.php");
  die('no tansaction id');
}
$transaction = mysqli_real_escape_string($connection, $_GET['transaction']);

$query = "SELECT * FROM transaction WHERE paymentId  = '$transaction'";
$result = mysqli_query($connection, $query);
if(mysqli_num_rows($result) == 0){
  header("Location: index.php");
  die('no results');
  }
  $beats = [];
if(!isset($_SESSION['id'])){
  header("location: login.php");
  die();
}
  $current_buyer_id = $_SESSION['id'];
  while($row = mysqli_fetch_assoc($result)){
    
    $buyer_id = $row['buyer_id'];
    if ($buyer_id === $current_buyer_id){
      $beats[] = [ 
      'id'      => $row['beat_id'],
      'license' => $row["license"]
      ];
    }
    else {
      header("location: index.php");
      die("not right buyer");
    }
    
  }



$bodytext = "<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
  <div class='container'>
    <h1>Your Purchased Beats</h1>";
  foreach ($_SESSION['shopping_cart'] as $item){
    $bodytext .= "<div class='well'>";
    $bodytext .= "<p>{$item['name']}</p>";
    $bodytext .= "</div>";
  }
$bodytext .= "</div></body></html>";

$mail = new PHPMailer();
$mail->From      = 'beats@offsettempire.com';
$mail->FromName  = 'Beats Store';
$mail->addReplyTo('beats@offsettempire.com', 'Beat Store');
$mail->FromName  = 'Beats Store';
$mail->Subject   = 'Here Are Your Purchased Beats  From The Beat STORE';
$mail->msgHTML($bodytext);
$mail->AddAddress( 'isissa01@gmail.com' );

  
foreach($beats as $beat){
    $id = $beat['id'];
      $query = "SELECT * FROM beats where id = {$id} LIMIT 1";
      $result = mysqli_query($connection, $query);

    if(!$result){
      die('error');
    }
    while($row = mysqli_fetch_assoc($result)){
      
      $mail->AddAttachment( $row['filename'] ,"{$row['name']}.mp3");

    }
      
      
}

// $mail->AddAttachment('media/lovely_town.mp3', 'Lovely Town.mp3');
// $mail->AddAttachment('media/stream1.mp3', 'Stream.mp3');

if(!$mail->Send()){
   echo "Error Message Did not Send!! " . $mail->ErrorInfo;

}
else{
  echo "Success Message Sent Succesfully";
  $_SESSION["shopping_cart"] = [];
//  header("location: account.php?success");

}
?>
