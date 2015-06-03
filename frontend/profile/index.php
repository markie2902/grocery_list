<?php
  
  session_start();


  require_once("../../lib/user_profile.php");

  if (isset($_SESSION["username"])) {
    echo "<p>Hello, ". $_SESSION["username"] ." ! You can start by editing your profile.</p>";
  
    $dbc = mysqli_connect('127.0.0.1', 'markie2902', 'burlbus952', 'grocery_list');

    if (!isset($_POST["username"])) {
      $query = "SELECT username, first_name, last_name, gender, birthdate, city, state, country, zipcode FROM create_account WHERE username = '" . $_SESSION['username'] . "'"; 
    } else {
      $query = "SELECT username, first_name, last_name, gender, birthdate, city, state, country, zipcode FROM create_account WHERE username = '" . $_GET['username'] . "'";
    }
  } 
  else {
    echo redirectUser();
  }
  
  

  require_once("../../lib/shared/header.php");
  
  $dbc = mysqli_connect('127.0.0.1', 'markie2902', 'burlbus952', 'grocery_list') or die ('Error, could not connect to Database.');
  $query = "SELECT username, first_name, last_name, gender, birthdate, city, state, country, zipcode FROM create_account WHERE username = '" . $_SESSION['id'] . "'";
  $data = mysqli_query($dbc, $query);

    if (mysqli_num_rows($data) == 1) {
    //The user row was found so display the user data
      $row = mysqli_fetch_assoc($data);
      echo "<table>";
      if (!empty($row["first_name"])) {
        echo '<tr><td class="label">First name:</td><td>' . $row["first_name"] . '</td></tr>';  
      } 
      if (!empty($row["last_name"])) {
        echo '<tr><td class="label">Last name:</td><td>' . $row["last_name"] . '</td></tr>';
      }
      if (!empty($row["gender"])) {
        echo '<tr><td class="label">Gender:</td><td>' . $row["gender"] . '</td></tr>';
      }
      if (!empty($row["birthdate"])) {
        echo '<tr><td class="label">Birthdate:</td><td>' . $row["birthdate"] . '</td></tr>';
      }
      if (!empty($row["city"])) {
        echo '<tr><td class="label">City:</td><td>' . $row["city"] . '</td></tr>';
      }
      if (!empty($row["state"])) {
        echo '<tr><td class="label">State:</td><td>' . $row["state"] . '</td></tr>';
      }
      if (!empty($row["country"])) {
        echo '<tr><td class="label">Country:</td><td>' . $row["country"] . '</td></tr>';
      }
      if (!empty($row["zipcode"])) {
        echo '<tr><td class="label">Zipcode:</td><td>' . $row["zipcode"] . '</td></tr>';
      }
    } else {
      echo '<p class="error">There was a problem accessing your profile.</p>';
    }
 echo '<p> Please <a href="edit.php">click this</a> to edit your profile.</p>';

  mysqli_close($dbc);
?>
