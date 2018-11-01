<?php
class General {
  public $general;
  function user_exists($username) {
    global $database;
    $username = $database -> escape_string($username);
    $query = $database -> query("SELECT * FROM mm_teacher WHERE t_user = '$username';");
    $count = mysqli_num_rows($query);
    return ($count > 0) ? true : false;
  }

  function user_id_from_username($username) {
    global $database;
    $username = $database -> escape_string($username);
    $query = $database -> query("SELECT t_id FROM mm_teacher WHERE t_user = '$username';");
    $row = mysqli_fetch_assoc($query);
    return $row["t_id"];
  }
  function login($username, $password) {
    global $database;
    $user_id = $this -> user_id_from_username($username);
    $username = $database -> escape_string($username);
    $password = md5($password);

    $query = $database -> query("SELECT * FROM mm_teacher WHERE t_user = '$username' AND t_pass = '$password';");
    $count = mysqli_num_rows($query);
    return ($count > 0) ? $user_id : false;
  }
}
?>
