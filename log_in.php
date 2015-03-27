<?php

session_start();

$error_msg = "";

$dbc = mysqli_connect('127.0.0.1', 'markie2902', 'burlbus952', grocery_list) or die ('Error, could not connect to Database.');

if (isset($_POST['submit']) && $_POST['submit'] == 'Log In') {
  if( !isset($_POST['username']) || empty($_POST['username']) ) {
    $error_msg = 'Sorry, you must enter your username and password to log in.';
  
  } else if( !isset($_POST['password']) || empty($_POST['password']) ) {
    $error_msg = 'Sorry, you must enter your username and password to log in.';
  
  } else {
    $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

    $query = "SELECT * FROM create_account WHERE username = '$user_username' AND password = '$user_password' ";
    $data = mysqli_query($dbc, $query);
    
    if (mysqli_num_rows($data) == 1) {
      $row = mysqli_fetch_array($data);
      $_SESSION['username'] = $row['username'];
      //header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php');
      echo '<p>You are logged in as ' . $_SESSION['username'] . '.</p>';
    
    } else {
      $error_msg = 'Sorry, unable to find your username or password.';
    }
  }
    echo '<p>' . $error_msg . '</p>';  
}
  else if(isset($_POST['submit']) && $_POST['submit'] == 'Create') {
  
    $username = mysqli_real_escape_string($dbc,trim($_POST['username']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
    $repeat_password = mysqli_real_escape_string($dbc, trim($_POST['repeat_password']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));

    if (!empty($username) && !empty($password) && !empty($repeat_password) && !empty($email)){
    if ($password != $repeat_password){ 
      $error_msg = 'passwords do not match, please try again.';
      $password = "";
      $repeat_password = "";
      } else {
        $query =  "SELECT * from create_account where username ='$username'";
        $data = mysqli_query($dbc, $query);
        if(mysqli_num_rows($data)==0){
          $query = "SELECT * from create_account where email = '$email'";
          $data2 = mysqli_query($dbc, $query);
        
          if (mysqli_num_rows($data2)==0){
            $query = "INSERT INTO create_account (username, password, repeat_password, email) VALUES "."('$username', '$password', '$repeat_password', '$email')";
            mysqli_query($dbc, $query);
            echo 'You have successfully created an account, enjoy!';
            mysqli_close($dbc);
            $_SESSION['username'] = $username;

        } else {
            $error_msg = 'An account with this email already exists, please use a different email.';
            $email = "";
          }
        } else {
          $error_msg = 'An account already exists under this username, please use a different username.';
          $username = "";
        } 
      } 
    } else {
          $error_msg = '<p>Please enter all information</p>';
    }
     echo '<p>' . $error_msg . '</p>';
  }


?>
<?php
  require_once ('shared/header.php');
?>   
<div id="forms">
	<h2>Create Account</h2>
        <form method = "post" action="log_in.php">
        Username:<br>
        <input type="text" name="username" value="">
        <br>
        Password:<br>
        <input type="password" name="password" value="">
        <br>
        Repeat Password<br>
        <input type="password" name="repeat_password" value="">
        <br>
        Email:<br>
        <input type="text" name="email" value="">
        <br>
        <br>
        <input type="submit" name="submit" value="Create">
        </form>
  </div>

<p>     <h2>Log In User</h2>
        <form method = "post" action = "log_in.php">
        Username:<br>
        <input type="text" name="username" value=""><br>
        Password:<br>
        <input type="password" name="password" value=""><br><br>
	<input type="Submit" name="submit" value="Log In"<br><br><br>
	<a href="retrieve_file.php">Forgot username or password?</a>
        </form>
</p>

<?php
  require_once ('shared/footer.php');
