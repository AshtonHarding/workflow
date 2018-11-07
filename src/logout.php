<?php
  //Logout.php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/session.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/config.php'); 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/user-data.php'); 

  $connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
  $query = "SELECT * FROM users WHERE email='$user_email'";
  $result = mysqli_query($connection, $query);
  if($result){
    if(mysqli_query($connection, $isOnline)){
      echo 'User is online.';
      mysqli_close($connection);
    }else{
      echo 'Something went wrong...';
      mysqli_close($connection);
    }
  }



  session_destroy();
  header("Location: index.php?p=4");
?>