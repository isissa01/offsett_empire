<?php include 'includes/db.php'; ?>
<?php include 'includes/functions.php';?>
 <?php 
  session_start();
  if(!isset($_SESSION['shopping_cart'])){
  $_SESSION['shopping_cart'] = [];
    
  }
  
  $title = '';
  $path = explode( '/',$_SERVER['REQUEST_URI']);
  $link= $path[count($path) -1];
  foreach(getNavbar() as $key => $value){
    
    if ($link === $value['link']){
      $title = $value['page'];
      
    }
  }
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" ng-app="ngProfile" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" ng-app="ngProfile" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" ng-app="ngProfile" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" ng-app="ngProfile" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OFFSETT EMPIRE | <?php echo $title;?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="main.css">
</head>
<body data-spy="scroll" data-target="#navbar-scroll">
  <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
<!--
     <div class="social-media">
       <div class="container">
                 <div class="social"><a class="fa fa-facebook" href=""></a></div>
                 <div class="social"><a class="fa fa-youtube-play" href=""></a></div>
                 <div class="social"><a class="fa fa-twitter" href=""></a></div>
                 <div class="social"><a class="fa fa-google-plus" href=""></a></div>
                 <div class="social"><a class="fa fa-instagram" href=""></a></div>
                 
        
      </div>
     </div>
      
-->
      
        
  <?php include 'includes/navbar.php'; ?>