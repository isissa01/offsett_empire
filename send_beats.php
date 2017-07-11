<?php
session_start();
include 'includes/db.php';
require_once "vendor/phpmailer/phpmailer/PHPMailerAutoLoad.php";

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

foreach ($_SESSION['shopping_cart'] as $item){
  $id = (int) $item['id'];

  $query = "SELECT * FROM beats where id = {$id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if(!$result){
    die('error');
  }
  while($row = mysqli_fetch_assoc($result)){


      $mail->AddAttachment( $row['filename'] ,"{$row['name']}.mp3");

  }
  $mail->clearAttachments();
}

// $mail->AddAttachment('media/lovely_town.mp3', 'Lovely Town.mp3');
// $mail->AddAttachment('media/stream1.mp3', 'Stream.mp3');

if(!$mail->Send()){
   echo "Error Message Did not Send!! " . $mail->ErrorInfo;

}
else{
  echo "Success Message Sent Succesfully";
  $zone = new DateTimeZone('America/New_York');
  $date = date('Y-m-d H:i:s');
  echo $date;
  echo "<br> Yes";

}
?>
