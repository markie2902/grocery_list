<?php
  session_start();
  require_once('lib/user_profile.php');

  if (isset($_SESSION['username'])) {
    echo '<p>Hello, '. $_SESSION['username'] .' ! Where do you want to start?</p>';
    if(isset($_POST['submit']) && $_POST['submit'] == 'Update'){
      $firstname = (isset($_POST['firstname'])) ? $_POST['firstname'] : "";
      $lastname = (isset($_POST['lastname'])) ? $_POST['lastname'] : "";
      $gender = (isset($_POST['gender'])) ? $_POST['gender'] : "";
      $birthdate = (isset($_POST['birthdate'])) ? $_POST['birthdate'] : "";
      $city = (isset($_POST['city'])) ? $_POST['city'] : "";
      $state = (isset($_POST['state'])) ? $_POST['state'] : "";
      $country = (isset($_POST['country'])) ? $_POST['country'] : "";
      $zipcode = (isset($_POST['zipcode'])) ? $_POST['zipcode'] : "";
      echo updateProfile($firstname, $lastname, $gender, $birthdate, $city, $state, $country, $zipcode, $_SESSION);
    }
  } else {
     header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/log_in.php');
    }
  require_once ('shared/header.php');
?>
<p> 
   
  <h2>Edit Profile</h2>
      <form method = "post" action="profile.php">
      First Name:<br>
      <input type="text" name="firstname" value="">
      <br>
      Last Name:<br>
      <input type="text" name="lastname" value="">
      <br>
      Gender:<br>
      <input type="text" name="gender" value="">
      <br>
      Birth Date:<br>
      <input type="text" name="birthdate" value="">
      <br>
      City:<br>
      <input type="text" name="city" value="">
      <br>
      State:<br>
      <input type="text" name="state" value="">
      <br>
      Country:<br>
      <input type="text" name="country" value="">
      <br>
      Zip Code:<br>
      <input type="text" name="zipcode" value="">
      <br><br>
      <input type="submit" name="submit" value="Update">
      </form>
</p>
<?php
    require_once ('shared/footer.php');
?>
