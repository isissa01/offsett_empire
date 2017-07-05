<?php
include 'db.php';

function signup($username, $password, $email){
  global $connection;
  $errors =[];
  

  
  $query = "SELECT * FROM users WHERE email = '$email' OR username ='$username'";
  
  $result = mysqli_query($connection, $query);
  if (mysqli_num_rows($result) == 0){
    $signup_query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    $signup_result = mysqli_query($connection, $signup_query);
    if(!$signup_result){
      $errors[] = 'Failed To Sign You up try again Later!';
    }
    else {
      return 'done';
      
    }
  }
  
  
  while($row = mysqli_fetch_assoc($result)){
    if ($row['username'] == $username){
      $errors[] = 'Username is aleady Taken';
    }
    if($row['email'] == $email){
      $errors[] = 'Email is aleady Taken';
    }
  }
  return $errors;
}

function login($username, $password){
  global $connection;
  $query = "SELECT * FROM `users` WHERE username ='$username' LIMIT 1";
  $result = mysqli_query($connection, $query);
  if(mysqli_num_rows($result) == 0){
    $error = "<p class='alert alert-danger'>Username and Password Combination Not In System, Try Again! <span class='close'>X</span></p>";
    return $error;
  }
  while($row = mysqli_fetch_assoc($result)){
  
    $cred = array(
      'hashed_password' => $row['password'],
      'id'              => $row['id'],
      'isAdmin'         => $row['isAdmin'],
      'email'           => $row['email'],
    
    
    );
    
   if(password_verify($password, $cred['hashed_password'])){
      $_SESSION['logged_in'] = true;
      foreach($cred as $key => $value){
      $_SESSION[$key] = $value;
      
    }
     
     if(isset($_GET['checkout'])){
       header('Location: checkout.php');
     }
     else {
       header('Location: index.php');
     }
    

   }
   
  }

}

function getSongs(){
  global $connection;
  $query = 'SELECT * FROM beats';
  $result = mysqli_query($connection, $query);
  if(!$result){
    die();
  }
  $songs = [];
  while($row = mysqli_fetch_assoc($result)){
  
    $song = array(
      'id' => $row['id'],
      'song_title' => $row['name'],
      'filename' => $row['filename'],
      'song_bpm' => $row['bpm'],
      'song_tags' => $row['tags'],
      'cover' => $row['cover_image'],
    
    );
    $songs[] = $song;
    
  }
  
  echo json_encode($songs);
}

function getNavbar(){
  global $connection;
  $query = 'SELECT * FROM navbar';
  $result = mysqli_query($connection, $query);
  if(!$result){
    die();
  }
  $songs = [];
  while($row = mysqli_fetch_assoc($result)){
  
    $page = array(
      'page' => $row['page'],
      'link' => $row['link']
    );
    $pages[] = $page;
    
  }
  return $pages;
  
}

function sendMail($from, $name, $message){
  $from = 'From: '. $from . '\r\n';
  $subject = $name . ' Has A Question';
  $to = 'offsettempire0fficial@gmail.com';
  mail($to, $subject, $message, $from);
  
}

function addBeat($beat_array){
  
  $query = "INSERT INTO beats(name, filename, cover_image, bpm, tags) VALUES ('". $beat_array['name'] ."')";
}