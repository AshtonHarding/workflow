<?php
  // Site Email Address
  $noReplyEmail = 'noreply@example.com';
  $siteEmail = 'admin@example.com';
  $siteEmailLink = "<a href=\"mailto://$siteEmail\">Contact Us</a>";
  $siteName = 'https://192.168.1.106';

  // Pepper `date +%s | sha256sum | base64 | head -c 32 ; echo`
  $pepper = 'Yjc2NGVjYzVlYTYyMDdhMzQxOTBkNTQ0';

  // DB name and details.
  $db_host = 'localhost';
  $db_user = 'ashton';
  $db_pass = 'dragon';
  $db_name = 'test_company'; // Each company gets it's own db.
?>