<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>The Project</title>
  <link rel="stylesheet" type="text/css" href="project.css" />

<?php
  if (isset($_SESSION['username'])) {
    //<p class="header_links">
      echo '<a href="index.php"><button>Home</button></a> ';
      echo '<a href="contact.php"><button>Contact</button></a> ';
      echo '<a href="about.php"><button>About</button></a> ';
      echo '<a href="logout.php"><button>Log out</button></a> ';
   //</p>
  }
   else {
    //<p class="header_links">;
      echo '<a href="index.php"><button>Home</button></a> ';
      echo '<a href="contact.php"><button>Contact</button></a> ';
      echo '<a href="about.php"><button>About</button></a> ';
      echo '<a href="log_in.php"><button>Log In</button></a> ';
    //</p>
  }
  echo '<h1>The Project</h1> ';

echo '<hr>';
?>

