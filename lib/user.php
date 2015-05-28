<?php

require_once("database.php");

class User {
  
  private $username;
  private $password;
  private $repeat_password;
  private $email;
  private $join_date;
  private $first_name;
  private $last_niame;
  private $gender;
  private $birthdate;
  private $city;
  private $state;
  private $country;
  private $zipcode;


  function getUsername() {
    return $username;
  } 

  function setUsername($username) {
    $this->$username = $username;
  }

  function getPassword() {
    return $password;
  }

  function setPassword($password) {
    $this->$password = $password;
  }

  function getRepeatPassword() {
    return $repeat_password;
  }  

  function setRepeatPassword($repeat_password) {
    $this->$repeat_password = $repeat_password;
  }

  function getEmail() {
    return $email;
  }   

  function setEmail($email) {
    $this->$email = $email;
  }
  function getJoinDate() {
    return $join_date;
  }   

  function setJoinDate($join_date) {
    $this->$join_date = $join_date;
  }

  function getFirstName() {
    return $first_name;
  }   

  function setFirstName($first_name) {
    $this->$first_name = $first_name;
  }

  function getLastName() {
    return $last_name;
  }   

  function setLastName($last_name) {
    $this->$last_name = $last_name;
  }

  function getGender() {
    return $gender;
  }   

  function setGender($gender) {
    $this->$gender = $gender;
  }

  function getBirthdate() {
    return $birthdate;
  }

  function setBirthdate($birthdate) {
    $this->$birthdate = $birthdate;
  }  

  function getCity() {
    return $city;
  }

  function setCity($city) {
    $this->$city = $city;
  }

  function getState() {
    return $state;
  }

  function setState($state) {
    $this->$state = $state;
  }

  function getCountry() {
    return $country;
  }

  function setCountry($country) {
    $this->$country = $country;
  }

  function getZipcode() {
    return $zipcode;
  }

  function setZipcode($zipcode) {
    $this->$zipcode = $zipcode;
  }

  //private function clean($str) {
    //$this->$str = mysqli_real_escape_string($dbc, trim($str));
    //return $str;
  //} 

  public static function load($username, $password) {
    $database = new Database();
    $user_record = $database->getRecord("SELECT * FROM create_account WHERE username = '$username' AND password = '$password' ");
    $user = new User();
    $user->setUsername($user_record["username"]);
    return $user; 
  }
}

//error_log("hi");
$user = User::load("markie2902", "ethan");
var_dump($user);
error_log(var_dump($user));
