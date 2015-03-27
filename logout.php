<?php
  require ('shared/header.php');

  session_start();
  
  if (isset($_SESSION['username'])) {
    $_SESSION = array();
    session_destroy();
  }

  echo 'You are Logged out! Have a good day!!';

 
  require_once ('shared/footer.php');
?>


