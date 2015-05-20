<?php

class Database {
  
  $dbc = mysqli_connect('127.0.0.1', 'markie2902', 'burlbus952', 'grocery_list');
  
    public function dataInsert()
       $query = "INSERT INTO create_account (username, password, repeat_password, email) VALUES "."('$user_username', '$user_password', '$user_repeat_password', '$user_email')";
            mysqli_query($dbc, $query);
            echo 'You have successfully created an account, you may now create your profile. Enjoy!';
          mysqli_close($dbc);

    public function dataUpdate()
  

    public function dataRetrieve()
}

$database = new Database();
$database ->dataInsert();
?>
