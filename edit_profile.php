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
      //$Login = $_GET['Log in first'];
      header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/log_in.php');
 }

$dbc = mysqli_connect('127.0.0.1', 'markie2902', 'burlbus952', 'grocery_list') or die ('Error, could not connect to Database.');

  $query = "SELECT first_name, last_name, gender, birthdate, city, state, country, zipcode FROM create_account WHERE username = '" . $_SESSION['username'] . "'";
  $data = mysqli_query($dbc, $query);
  $user = mysqli_fetch_array($data); 
  //$user = loadUserData();

  if ($user != NULL){
    $user_firstname = $user['first_name']; 
    $user_lastname = $user['last_name'];
    $user_gender = $user['gender'];
    $user_birthdate = $user['birthdate'];
    $user_city = $user['city'];
    $user_state = $user['state'];
    $user_country = $user['country'];
    $user_zipcode = $user['zipcode'];
  } else {
    echo 'could not retrieve your profile';
    }

  require_once ('shared/header.php');
?>

  <fieldset>
  <legend>Edit Profile</legend>
  <!---<form method = "post" action="profile.php">--->
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

      First Name:<br>
      <input type="text" name="firstname" value="<?php if (!empty($user_firstname)) echo $user_firstname; ?>">
      <br>
      Last Name:<br>
      <input type="text" name="lastname" value="<?php if (!empty($user_lastname)) echo $user_lastname; ?>">
      <br>
      Gender:<br>
      <select id = "gender" name="gender">
      <option value="M" <?php if (!empty($gender) && $gender == 'M') echo 'selected = "selected"'; ?>>Male</option>
      <option value="F" <?php if (!empty($gender) && $gender == 'F') echo 'selected = "selected"'; ?>>Female</option>
      </select><br>
      Birth Date:<br>
      <input type="text" name="birthdate" value="<?php if (!empty($user_birthdate)) echo $user_birthdate; ?>">
      <br>
      City:<br>
      <input type="text" name="city" value="<?php if (!empty($user_city)) echo $user_city; ?>">
      <br>
      State:<br>
      <input type="text" name="state" value="<?php if (!empty($user_state)) echo $user_state; ?>">
      <br>
      Country:<br>
      <input type="text" name="country" value="<?php if (!empty($user_country)) echo $user_country; ?>">
      <br>
      Zip Code:<br>
      <input type="text" name="zipcode" value="<?php if (!empty($user_zipcode)) echo $user_zipcode; ?>">
      <br><br>
      <input type="submit" name="submit" value="Update" onclick="alert('Thank you')">
      </fieldset>
      </form>
<?php
    require_once ('shared/footer.php');
?>
