<?php

require_once ("../lib/user.php");
require_once ("../lib/utils.php");

session_start();

if (isset($_POST["submit"]) && $_POST["submit"] == "Log In") {
  $username = (isset($_POST["username"])) ? $_POST["username"] : "";
  $password = (isset($_POST["password"])) ? $_POST["password"] : "";
  $redirect = urldecode(isset($_GET["redirect"]));
  
  //$params = User::accountSetup("$_POST", "username", "password", "$_GET", "redirect");

  $user = User::load($username, $password);

  if($user == null) {
    $message = "you must enter a valid username and password";
  } else {
    $user->logIn($_SESSION);
      
    if(isset($_GET["redirect"])){
      $url = urldecode($_GET["redirect"]);       
    } else {
      $url =  "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/profile/index.php";
      $user_redirect = urlencode("http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/profile/index.php"); 
      header("Location: $url?redirect=$user_redirect"); 
    }
  }
} else if(isset($_POST["submit"]) && $_POST["submit"] == "Create") {
  $values = Utils::cleanArray($_POST, array("username", "password", "repeat_password", "email"), "");
  $results = User::createNewAccount($values["username"], $values["password"], $values["repeat_password"], $values["email"]);

  $message = $results["message"];
}

  require_once ("../lib/shared/header.php");
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
      Repeat Password:<br>
      <input type="password" name="repeat_password" value="">
      <br>
      Email:<br>
      <input type="text" name="email" value="">
      <br>
      <br>
      <input type="submit" name="submit" value="Create">
    </form>
</div>

<p>
  <h2>Log In User</h2>
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
  require_once ("../lib/shared/footer.php");
?>
