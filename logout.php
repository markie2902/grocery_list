<?php
  
  session_start();
  
  if (isset($_SESSION['username'])) {
    $_SESSION = array();
    session_destroy();
  }
  require ('shared/header.php');

  echo 'You are Logged out! Have a good day!!';

 
  require_once ('shared/footer.php');
?>


