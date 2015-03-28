<?php

require_once ('lib/user_utils.php');

session_start();

if (isset($_POST['submit']) && $_POST['submit'] == 'Log In') {
  
  usersLogin();
  
} else if(isset($_POST['submit']) && $_POST['submit'] == 'Create') {
  
  usersCreateAccount();
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
