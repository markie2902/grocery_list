<?php

session_start();

require_once ('lib/user_utils.php');

if (isset($_POST['submit']) && $_POST['submit'] == 'Log In') {
  $username = (isset($_POST['username'])) ? $_POST['username'] : "";
  $password = (isset($_POST['password'])) ? $_POST['password'] : "";
  $message = usersLogin($username, $password, $_SESSION);

} else if(isset($_POST['submit']) && $_POST['submit'] == 'Create') {
  $username = (isset($_POST['username'])) ? $_POST['username'] : "";
  $password = (isset($_POST['password'])) ? $_POST['password'] : "";
  $repeat_password= (isset($_POST['repeat_password'])) ? $_POST['repeat_password'] : "";
  $email = (isset($_POST['email'])) ? $_POST['email'] : "";
  $message = usersCreateAccount($username, $password, $repeat_password, $email, $_SESSION); 
  echo $message;
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
