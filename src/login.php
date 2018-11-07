<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/session.php'); 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/config.php'); 
  $company = (!empty($_POST['company'])) ? $_POST['company'] : false;
  $email = (!empty($_POST['email'])) ? $_POST['email'] : false;
  $password = (!empty($_POST['password'])) ? $_POST['password'] : false;
  if($company && $email && $password)
  {
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $company);
    if($connection)
    {
      echo "CONNECTED.<br><hr>";
    }else{
      echo "DID NOT CONNECT.<br><hr>";
    }
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    $query = "SELECT * FROM users WHERE email_addr='$email'";
    echo "Email: " . $email . "<br>Password: " . $password . "<br><hr>";
    $result = mysqli_query($connection, $query);
    if($result)
    {
      $row = mysqli_fetch_array($result);
      $permission = $row[6];
    }else{
      echo "No result.<br><br>";
    }
    $_SESSION['company'] = $company;
    $_SESSION['username'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['permission'] = $permission;
    $_SESSION['Authenticated'] = true;
    $_SESSION['Expires'] = time() + 86400; // 24 hours.

    echo "success";
    header("Location: dashboard.php");
  } else { echo "Failed.";}
?>