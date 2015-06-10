<?php

class Utils {

  public static function cleanArray($array, $keys, $defaultValue) {
    $cleanValues = array("");
    
    foreach($keys as $key) {
      if(isset($array[$key])) {
          if($key == "redirect") {
            $cleanValues[$key] = urldecode($array[$key]);
          } else {
            $cleanValues[$key] = $array[$key];
          }

      } else {
        $cleanValues[$key] = $defaultValue;  
      }
    }
    return $cleanValues;
  }

  public static function redirect($values, $location) {
    
    if(!empty($values["redirect"])){
      header("Location: " . $values["redirect"]);
    
    } else {
      $url =  "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . $location;
      header("Location: " .  $url);
    }
  }
}
