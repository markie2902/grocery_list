<?php
   
    
  if (isset($_SESSION['username'])) {
      <span class="header_links">
      echo '<a href="../index.php"><button>Home</button></a>;
      echo '<a href="profile.php"><button>My Profile</button></a>;
      echo '<a href="about.php"><button>About</button></a>;
      echo '<a href="logout.php"><img size="200"> log out</a>;
      </span>
  }
   else {
    <span class="header_links">
      echo '<a href="../index.php"><button>Home</button></a>;
      echo '<a href="profile.php"><button>My Profile</button></a>;
      echo '<a href="about.php"><button>About</button></a>;
      echo '<a href="log_in.php"><button>Log In</button></a>;
  }
  <h1>The Project</h1>
?>

