<?php
  /* Disable transparent session id support. (Can't share session via URL now) */
  ini_set('session.use_trans_sid', 0);
  /* Begin the session */
  session_start();
  /* This prevents session jacking */
  session_regenerate_id(true);
?>