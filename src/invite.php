<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/session.php'); 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/config.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/user-data.php'); 

  /* This sends out the email to invite the user to the company's task thing. */
  /* Perhaps Create an 'invite' list table.
    id, email, invite_code, company, admin_that_invited, code_used (true = unusable)

  */
  $email = (!empty($_POST['email'])) ? $_POST['email'] : false;
  $permission = (!empty($_POST['permission'])) ? $_POST['permission'] : false;
  /* below: Generate invite code based on date + email. */
  $invite_code = sha1( time() . $email) . md5( time() . $email);
  $company = (!empty($company_name)) ? $company_name : false;
  $admin_that_invited = (!empty($user_id)) ? $user_id : false;
  $code_used = false;

  if($email && $permission && $invite_code && $company && $admin_that_invited)
  {
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $company_name);
    if(mysqli_connect_error())
    {
      /* Can't connect to the server. */
      echo "Contact admin with the error code: ERROR_DB_8675309. ";
    }
    $command = "INSERT INTO invites(email, invite_code, company, invited_by, code_used)
                VALUES
                ( '$email', '$invite_code', '$company', '$admin_that_invited', '0')";
    if(!mysqli_query($connection, $command))
    {
      /* What the fuck? This implies we have an exact entry. */
      echo "please retry!";
    }

    /* Here is a 'registration link', give to who you want to invite. */
    // 7047fe5192ed3f3db9cf4c2c67dcbe8027c5929b8dc0da3b2ad714e1540b555b7fec065c
    header("Location: dashboard.php?status=invite_sent&code=".$invite_code);
  }else{
    echo "Something went wrong. Contact admin.<br/>";
    echo "Hopefully it's not another fire....";
  }


?>