<?php

  function updateProfile($firstname, $lastname, $gender, $birthdate, $city, $state, $country, $zipcode, $session) {
    $dbc = mysqli_connect('127.0.0.1', 'markie2902', 'burlbus952', 'grocery_list') or die ('Error, could not connect to Database.');
    $message="";
  
    if (!empty('firstname') && !empty('lastname') && !empty('gender') && !empty('birthdate') && !empty('city') && !empty('state') && !empty('country') && !empty('zipcode')) {
      $user_firstname = mysqli_real_escape_string($dbc, trim($firstname));
      $user_lastname = mysqli_real_escape_string($dbc, trim($lastname));
      $user_gender = mysqli_real_escape_string($dbc, trim($gender));
      $user_birthdate = mysqli_real_escape_string($dbc, trim($birthdate));
      $user_city = mysqli_real_escape_string($dbc, trim($city));
      $user_state = mysqli_real_escape_string($dbc, trim($state));
      $user_country = mysqli_real_escape_string($dbc, trim($country));
      $user_zipcode = mysqli_real_escape_string($dbc, trim($zipcode));
      $error = false;
      
      $query = "UPDATE user SET first_name = '$user_firstname', last_name = '$user_lastname', gender = '$user_gender', birthdate = '$user_birthdate', city = '$user_city', state = '$user_state', country = '$user_country', zipcode = '$user_zipcode' WHERE username = '" . $session['username'] . "'";
    
      mysqli_query($dbc, $query);
        echo '<p>Your profile has been successfully updated.</p>';
  
  mysqli_close($dbc);

  } else {
    $query = "SELECT first_name, last_name, gender, birthdate, city, state, country, zipcode FROM user WHERE username = '" . $session['username'] . "'";
    $data = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($data);

    if ($row != NULL){
      $user_firstname = $row['first_name'];
      $user_lastname = $row['last_name'];
      $user_gender = $row['gender'];
      $user_birthdate = $row['birthdate'];
      $user_city = $row['city'];
      $user_state = $row['state'];
      $user_country = $row['country'];
      $user_zipcode = $row['zipcode'];
    } else {
      echo '<p>There was a problem accessing your profile.</p>';
    }

  mysqli_close($dbc);
  return $message;  
  } 
}

  function redirectUser(){
    $redirect = urlencode("http://" . $_SERVER["HTTP_HOST"] . "/../profile/index.php");

      header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . "/log_in.php?redirect=$redirect");
}
?>
