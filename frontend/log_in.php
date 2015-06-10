<?php

require_once ("../lib/user.php");
require_once ("../lib/utils.php");

session_start();

if (isset($_POST["submit"]) && $_POST["submit"] == "Log In") {
  $values = Utils::cleanArray($_POST, array("username", "password", "redirect"), "");
  $user = User::load($values["username"], $values["password"]);

  if($user == null) {
    $message = "you must enter a valid username and password";
  
  } else {
    $user->login($_SESSION);
    Utils::redirect($values["redirect"], "profile/index.php");
  }

} else if(isset($_POST["submit"]) && $_POST["submit"] == "Create") {
  $values = Utils::cleanArray($_POST, array("username", "password", "repeat_password", "email", "redirect"), "");
  $user = User::createNewAccount($values["username"], $values["password"], $values["repeat_password"], $values["email"]);

  if($user->createNewAccount($values["username"], $values["password"], $values["repeat_password"], $values["email"])) { 
    $user->login($_SESSION);
    Utils::redirect("", "profile/index.php");
  } else { 
    $message = "Page could not be found.";
    return $message;
  }
}
  //$url =  "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "profile/index.php";
//} else {
  $url =  "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "profile/index.php";


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
      
      <!-- this should be in a php if statement-->
      <input type="hidden" name="redirect" value="<?php echo "$url"; ?>"> 
   </form>
</p>

<?php
  require_once ("../lib/shared/footer.php");
?>  
