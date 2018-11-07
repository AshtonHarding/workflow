<?php
  /* Handles all the data for the user. */
  ini_set('display_errors', '1');

  /* TODO: Add this in. */
  // /mnt/4tb/Backups/Laptop_T420/OG/SAVING/code/social.tune/OLD\ SOURCES/CURRENT_Generation_02/includes/
  if(isset($_SESSION['Authenticated']) && $_SESSION['Authenticated']){
    if($_SESSION['Expires'] < time()){
      // Log out here.
      exit();
      header("Location: logout.php");
    }
    $_SESSION['Expires'] = time() + 86400; // if logged in, set to 24 hours.
  }

  require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/session.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/config.php'); 

  $company_name = $_SESSION['company'];
  $email = $_SESSION['username'];
  $connection = mysqli_connect($db_host, $db_user, $db_pass, $company_name);
  $data = mysqli_query($connection, "SELECT * FROM users WHERE email_addr='$email'");

  if($data)
  {
    $row = mysqli_fetch_array($data, MYSQLI_NUM);
    $user_id = $row[0];
    $user_first_name = $row[1];
    $user_last_name = $row[2];
    $user_email_addr = $row[3];
    //$user_password = $row[4];
    //$user_salt = $row[5];
    $user_permissions = $row[6];
  }else{
    echo "The data didn't go through. Contact an admin.";
  }

?>