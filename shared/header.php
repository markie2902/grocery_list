<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>The Project</title>
  <link rel="stylesheet" type="text/css" href="project.css" />

<?php
  if (isset($_SESSION['username'])) {
?>
     <p class="header_links">
      <a href="index.php"><button>Home</button></a>
      <a href="viewprofile.php"><button>My Profile</button></a>
      <a href="about.php"><button>About</button></a>
      <a href="logout.php"><button>Log out</button></a>
      </br>
    </p>
<?php
  }
  else {
?>
    <p class="header_links">    
      <a href="index.php"><button>Home</button></a>
      <a href="viewprofile.php"><button>My Profile</button></a>
      <a href="about.php"><button>About</button></a>
      <a href="log_in.php"><button>Log In</button></a>
    </p>
<?php  
  }
  echo '<h1>Kitchie the kitchen assistant</h1> ';

//echo '<hr>';
?>
<div class ="hr">
<hr>
</div>



