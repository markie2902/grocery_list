<?php

function usersLogin($username, $password, &$session) {
  $dbc = mysqli_connect('127.0.0.1', 'markie2902', 'burlbus952', grocery_list) or die ('Error, could not connect to Database.');

  $message = "";
  if(empty($username)) {
    $error_msg = 'Sorry, you must enter your username to log in.';
  } else if(empty($password)) {
    $error_msg = 'Sorry, you must enter your password to log in.';
  } else {
    $user_username = mysqli_real_escape_string($dbc, trim($username));
    $user_password = mysqli_real_escape_string($dbc, trim($password));

    $query = "SELECT * FROM create_account WHERE username = '$user_username' AND password = '$user_password' ";
    $data = mysqli_query($dbc, $query);

    if (mysqli_num_rows($data) == 1) {
      $row = mysqli_fetch_array($data);
      $session["username"] = $row['username'];
      //header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php');
      echo '<p>You are logged in as ' . $session['username'] . '.</p>';
    } else {
      $error_msg = 'Sorry, unable to find your username or password.';
    }
  }
  $message = '<p>' . $error_msg . '</p>';
  return $message;
}

  function usersCreateAccount($username, $password, $repeat_password, $email, &$session){
    $dbc = mysqli_connect('127.0.0.1', 'markie2902', 'burlbus952', grocery_list) or die ('Error, could not connect to Database.');

    $message = "";  
    $user_username = mysqli_real_escape_string($dbc,trim($username));
    $user_password = mysqli_real_escape_string($dbc, trim($password));
    $user_repeat_password = mysqli_real_escape_string($dbc, trim($repeat_password));
    $user_email = mysqli_real_escape_string($dbc, trim($email));

    if (!empty($user_username) && !empty($user_password) && !empty($user_repeat_password) && !empty($user_email)){
    if ($user_password != $user_repeat_password){
      $error_msg = 'passwords do not match, please try again.';
      $user_password = "";
      $user_repeat_password = "";
    } else {
      $query =  "SELECT * from create_account where username ='$user_username'";
      $data = mysqli_query($dbc, $query);
      if(mysqli_num_rows($data)==0){
        $query = "SELECT * from create_account where email = '$user_email'";
        $data2 = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data2)==0){
          $query = "INSERT INTO create_account (username, password, repeat_password, email) VALUES "."('$user_username', '$user_password', '$user_repeat_password', '$user_email')";
          mysqli_query($dbc, $query);
          echo 'You have successfully created an account, enjoy!';
          mysqli_close($dbc);
          $session['username'] = $user_username;

        } else {
            $error_msg = 'An account with this email already exists, please use a different email.';
            $user_email = "";
          }
      } else {
          $error_msg = 'An account already exists under this username, please use a different username.';
          $user_username = "";
      }
    }
  } else {
    $error_msg = '<p>Please enter all information</p>';
  }  
$message = '<p>' . $error_msg . '</p>';
  return $message;        
}

?>

