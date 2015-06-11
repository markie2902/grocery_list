<?php

require_once("database.php");

class User {
  
  private $id;
  private $username;
  private $password;
  private $repeat_password;
  private $email;
  private $join_date;
  private $first_name;
  private $last_name;
  private $gender;
  private $birthdate;
  private $city;
  private $state;
  private $country;
  private $zipcode;

  function getID() {
    return $this->id;
  }

  function setID($id) {
    $this->id = $id;
  }

  function getUsername() {
    return $this->username;
  } 

  function setUsername($username) {
    $this->username = $username;
  }

  function getPassword() {
    return $this->password;
  }

  function setPassword($password) {
    $this->password = $password;
  }

  function getRepeatPassword() {
    return $this->repeat_password;
  }  

  function setRepeatPassword($repeat_password) {
    $this->repeat_password = $repeat_password;
  }

  function getEmail() {
    return $this->email;
  }   

  function setEmail($email) {
    $this->email = $email;
  }
  function getJoinDate() {
    return $this->join_date;
  }   

  function setJoinDate($join_date) {
    $this->join_date = $join_date;
  }

  function getFirstName() {
    return $this->first_name;
  }   

  function setFirstName($first_name) {
    $this->first_name = $first_name;
  }

  function getLastName() {
    return $this->last_name;
  }   

  function setLastName($last_name) {
    $this->last_name = $last_name;
  }

  function getGender() {
    return $this->gender;
  }   

  function setGender($gender) {
    $this->gender = $gender;
  }

  function getBirthdate() {
    return $this->birthdate;
  }

  function setBirthdate($birthdate) {
    $this->birthdate = $birthdate;
  }  

  function getCity() {
    return $this->city;
  }

  function setCity($city) {
    $this->city = $city;
  }

  function getState() {
    return $this->state;
  }

  function setState($state) {
    $this->state = $state;
  }

  function getCountry() {
    return $this->country;
  }

  function setCountry($country) {
    $this->country = $country;
  }

  function getZipcode() {
    return $this->zipcode;
  }

  function setZipcode($zipcode) {
    $this->zipcode = $zipcode;
  }
  
  public function login(&$session) {
    $session["id"] = $this->getID();
  }

  private function save() {
    $validation_result = $this->validate();
    if ($validation_result["valid"]) {
      $database = new Database();
      $clean_username = $database->clean($this->username);
      $clean_password = $database->clean($this->password);
      $clean_repeat_password = $database->clean($this->repeat_password);
      $clean_email = $database->clean($this->email);

      $userfromUsername = User::loadfromUsername($clean_username);
      $userfromEmail = User::loadfromEmail($clean_email);
      
      if ($userfromUsername != null) {
        return array("valid" => false, "message" => "Username already in use");
      
      } else if ($userfromEmail != null) {
        return array("valid" => false, "message" => "Email is already in use");
      
      } else { 
        $query = "" .
          "INSERT INTO user " .
          "   (username, password, repeat_password, email) " .
          "VALUES " .
          "   ('$clean_username', '$clean_password', '$clean_repeat_password', '$clean_email')";
        $database->insertRecord($query);
        return array("valid" => true, "message" => "You have now created an account");
      }
    } else {
      return $validation_result;
    }
  }
  
  private function validate() {
    if(!empty($this->username) && !empty($this->password) && !empty($this->repeat_password) && !empty($this->email)) {
      if($this->password !== $this->repeat_password){
        return array("valid" => false, "message" => "Passwords do not match"); 
      } else {
        return array("valid" => true, "message" => ""); 
      }
    } else {
      return array("valid" => false, "message" => "Please enter all information");
    }
  }

  public static function load($username, $password) {
    $database = new Database();
    $clean_username = $database->clean($username);
    $clean_password = $database->clean($password);
    $user_record = $database->getRecord("SELECT * FROM user WHERE username = '$clean_username' AND password = '$clean_password' ");

    if($user_record == null) {
      return null;
    } else {
      $user = new User();
      $user->setID($user_record["id"]);
      $user->setUsername($user_record["username"]);
      $user->setPassword($user_record["password"]);
      $user->setRepeatPassword($user_record["repeat_password"]);
      $user->setEmail($user_record["email"]);
      $user->setFirstName($user_record["first_name"]);
      $user->setLastName($user_record["last_name"]);
      $user->setGender($user_record["gender"]);
      $user->setBirthdate($user_record["birthdate"]);
      $user->setCity($user_record["city"]);
      $user->setState($user_record["state"]);
      $user->setCountry($user_record["country"]);
      $user->setZipcode($user_record["zipcode"]);
      return $user; 
    }
  }

  public static function loadfromID($id) {
    $database = new Database();
    $user_record = $database->getRecord("SELECT * FROM user WHERE id = '$id'");
      
    if($user_record == null) {
      return null;
    } else {
      $user = new User();
      $user->setID($user_record["id"]);
      $user->setUsername($user_record["username"]);
      $user->setPassword($user_record["password"]);
      $user->setRepeatPassword($user_record["repeat_password"]);
      $user->setEmail($user_record["email"]);
      $user->setFirstName($user_record["first_name"]);
      $user->setLastName($user_record["last_name"]);
      $user->setGender($user_record["gender"]);
      $user->setBirthdate($user_record["birthdate"]);
      $user->setCity($user_record["city"]);
      $user->setState($user_record["state"]);
      $user->setCountry($user_record["country"]);
      $user->setZipcode($user_record["zipcode"]);
      return $user;
    }
  }

    public static function loadfromUsername($username) {
      $database = new Database();
      $clean_username = $database->clean($username);
      $user_record = $database->getRecord("SELECT * FROM user WHERE username = '$clean_username'");

      if($user_record == null) {
        return null;
      } else {
        $user = new User();
        $user->setID($user_record["id"]);
        $user->setUsername($user_record["username"]);
        $user->setPassword($user_record["password"]);
        $user->setRepeatPassword($user_record["repeat_password"]);
        $user->setEmail($user_record["email"]);
        $user->setFirstName($user_record["first_name"]);
        $user->setLastName($user_record["last_name"]);
        $user->setGender($user_record["gender"]);
        $user->setBirthdate($user_record["birthdate"]);
        $user->setCity($user_record["city"]);
        $user->setState($user_record["state"]);
        $user->setCountry($user_record["country"]);
        $user->setZipcode($user_record["zipcode"]);
        return $user;
      }
    }

    public static function loadfromEmail($email) {
      $database = new Database();
      $clean_email = $database->clean($email);
      $user_record = $database->getRecord("SELECT * FROM user WHERE email = '$clean_email'");
  
    if($user_record == null) {
      return null;
    } else {
      $user = new User();
      $user->setID($user_record["id"]);
      $user->setUsername($user_record["username"]);
      $user->setPassword($user_record["password"]);
      $user->setRepeatPassword($user_record["repeat_password"]);
      $user->setEmail($user_record["email"]);
      $user->setFirstName($user_record["first_name"]);
      $user->setLastName($user_record["last_name"]);
      $user->setGender($user_record["gender"]);
      $user->setBirthdate($user_record["birthdate"]);
      $user->setCity($user_record["city"]);
      $user->setState($user_record["state"]);
      $user->setCountry($user_record["country"]);
      $user->setZipcode($user_record["zipcode"]);
      return $user;
    }
  }

    public static function createNewAccount($username, $password, $repeat_password, $email) {
      $user = new User();
      $user->setUsername($username);
      $user->setPassword($password);
      $user->setRepeatPassword($repeat_password);
      $user->setEmail($email);
      $results = $user->save();
      return $results;
    }    
    
    public function update() {
      $dbc = mysqli_connect('127.0.0.1', 'markie2902', 'burlbus952', 'grocery_list') or die ('Error, could not connect to Database.');
      $database = new Database();
      $user_record = $database->getRecord("SELECT * FROM user WHERE id = '$id'");
      
      if (!empty($this->firstname) && !empty($this->lastname) && !empty($this->gender) && !empty($this->birthdate) && !empty($this->city) && !empty($this->state) && !empty($this->country) && !empty($this->zipcode)) { 
          
        $clean_firstname = $database->clean($this->firstname);     
        $clean_lastname = $database->clean($this->lastname);     
        $clean_gender = $database->clean($this->gender);     
        $clean_birthdate = $database->clean($this->birthdate);     
        $clean_city = $database->clean($this->city);     
        $clean_state = $database->clean($this->state);     
        $clean_country = $database->clean($this->country);     
        $clean_zipcode = $database->clean($this->zipcode);    
    
       $query = "".
        "UPDATE user".
        "SET first_name = '$clean_firstname', last_name = '$clean_lastname',".
        " gender = '$clean_gender', birthdate = '$clean_birthdate',".
        " city = '$clean_city', state = '$clean_state', country = '$clean_country',".
        " zipcode = '$clean_zipcode' WHERE username = '" . $session['username'] . "'";    
      }
    }
} 
