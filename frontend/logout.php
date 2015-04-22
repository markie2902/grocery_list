<?php

session_start();

  if (isset($_SESSION['username'])) {
    $_SESSION = array();
    session_destroy();
  }

require ('../lib/shared/header.php');

  echo 'You are Logged out! Have a good day!!';
?>
</br></br>
<?php
require_once ('../lib/shared/footer.php');
?>


