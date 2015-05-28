<?php

class Database {

  public function clean($str){
    $dbc = mysqli_connect('127.0.0.1', 'markie2902', 'burlbus952', 'grocery_list') or die ('Error, could not connect to Database.');
    return mysqli_real_escape_string($dbc, trim($str));
  }

  public function getRecord($query){
    $dbc = mysqli_connect('127.0.0.1', 'markie2902', 'burlbus952', 'grocery_list') or die ('Error, could not connect to Database.');
    $data = mysqli_query($dbc, $query);
    if (mysqli_num_rows($data) == 1) {
      
      $row = mysqli_fetch_assoc($data);
      //error_log(print_r($row, true));
      return $row;  
    } 
  }
  
  public function updateRecord($query){
    $dbc = mysqli_connect('127.0.0.1', 'markie2902', 'burlbus952', 'grocery_list') or die ('Error, could not connect to Database.');
  }  

  public function insertRecord($query){
    $dbc = mysqli_connect('127.0.0.1', 'markie2902', 'burlbus952', 'grocery_list') or die ('Error, could not connect to Database.');
  }


} 
