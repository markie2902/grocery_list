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
    return $id;
  }

  function setID($id) {
    $this->id = $id;
  }

  function getUsername() {
    return $username;
  } 

  function setUsername($username) {
    $this->username = $username;
  }

  function getPassword() {
    return $password;
  }

  function setPassword($password) {
    $this->password = $password;
  }

  function getRepeatPassword() {
    return $repeat_password;
  }  

  function setRepeatPassword($repeat_password) {
    $this->repeat_password = $repeat_password;
  }

  function getEmail() {
    return $email;
  }   

  function setEmail($email) {
    $this->email = $email;
  }
  function getJoinDate() {
    return $join_date;
  }   

  function setJoinDate($join_date) {
    $this->join_date = $join_date;
  }

  function getFirstName() {
    return $first_name;
  }   

  function setFirstName($first_name) {
    $this->first_name = $first_name;
  }

  function getLastName() {
    return $last_name;
  }   

  function setLastName($last_name) {
    $this->last_name = $last_name;
  }

  function getGender() {
    return $gender;
  }   

  function setGender($gender) {
    $this->gender = $gender;
  }

  function getBirthdate() {
    return $birthdate;
  }

  function setBirthdate($birthdate) {
    $this->birthdate = $birthdate;
  }  

  function getCity() {
    return $city;
  }

  function setCity($city) {
    $this->city = $city;
  }

  function getState() {
    return $state;
  }

  function setState($state) {
    $this->state = $state;
  }

  function getCountry() {
    return $country;
  }

  function setCountry($country) {
    $this->country = $country;
  }

  function getZipcode() {
    return $zipcode;
  }

  function setZipcode($zipcode) {
    $this->zipcode = $zipcode;
  }

  //private function clean($str) {
    //$this->$str = mysqli_real_escape_string($dbc, trim($str));
    //return $str;
  //} 

  public static function load($username, $password) {
    $database = new Database();
    $clean_username = $database->clean($username);
    $clean_password = $database->clean($password);
    $user_record = $database->getRecord("SELECT * FROM create_account WHERE username = '$clean_username' AND password = '$clean_password' ");

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

  public static function loadID($id) {
    $database = new Database();
    $user_record = $database->getRecord("SELECT * FROM create_account WHERE id = '$id'");
    
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
