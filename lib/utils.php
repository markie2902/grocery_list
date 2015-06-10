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

  public static function redirect($values, $defaultURL) {
    
    if(!empty($redirect)){
      header("Location: " . $redirect);
    
    } else {
      header("Location: " .  $defaultURL);
    }
    exit;
  }
}
