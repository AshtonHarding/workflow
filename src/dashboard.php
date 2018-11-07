<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/session.php'); 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/config.php'); 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/user-data.php'); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dashboard</title>
  </head>
  <body>
    <h4>Welcome to the dashboard, <?php echo $user_first_name . ' ' . $user_last_name; ?></h4>
    <p>
      <?php
        if($_SESSION['permission'] == 3)
        {
          echo "You're an admin.";
        }else if($_SESSION['permission'] == 2)
        {
          echo "You're a manager.";
        }else if($_SESSION['permission'] == 1)
        {
          echo "You're a worker.";
        }else{
          echo "Your account hasn't been approved yet. Contact your boss.";
        }
      ?>
    </p>
    <!-- I KNOW &nbsp; is cheap, but it's just temporary.
      TODO: REMOVE AFTER ADDING CSS. -->
    <?php
      /* Admin / Manager only */
      if($_SESSION['permission'] == 3 || $_SESSION['permission'] == 2)
      {
        echo "<b>Manage Users</b><br />";
        echo "Add user:";
        echo "<form method=\"POST\" action=\"invite.php\">";
        echo "<input type=\"email\" name=\"email\" id=\"email\" placeholder=\"email\">&nbsp;";
        echo "<select name=\"permission\"><option value=\"\">Permissions</option>";
        if($_SESSION['permission'] == 3)
        {
          echo "<option value=\"3\">Admin</option>";
          echo "<option value=\"2\">Manager</option>";
        }
          echo "<option value=\"1\">Employee</option></select>&nbsp;";
        echo "<button type=\"submit\">Invite</button>";
        echo "</form>";
      }

      $status = (!empty($_GET['status'])) ? $_GET['status'] : false;
      $code = (!empty($_GET['code'])) ? $_GET['code'] : false;
      switch($status)
      {
        case "invite_sent":
          echo "Invite created.<br />Emailed Link:<br /><a href=\"register.php?invite_code=".$code."\">".$siteName."/register.php?invite_code=".$code. "</a>";
        default:
          echo "";
      }
/*
3
  <select name="formGender">
4
    <option value="">Select...</option>
5
    <option value="M">Male</option>
6
    <option value="F">Female</option>
7
  </select>
*/


    ?>
  </body>
</html>
