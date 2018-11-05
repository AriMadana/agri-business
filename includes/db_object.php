<?php

class Db_object {

    protected static $prapite_folder = './prapite/';

    public function prapite_desc_creation($chap_num,$desc,$grade,$subject,$school) {
        $prapite_folder = static::$prapite_folder;
        $prapite_name = $chap_num . $grade . $subject . $school;
        $encoded_name = base64_encode($prapite_name);

        error_reporting(E_ALL);

        $newFileName = static::$prapite_folder . $encoded_name .".txt";

        $handle = fopen($newFileName, 'w') or die('Cannot open file:  '.$newFileName);
        fwrite($handle, $desc);
        // if (file_put_contents($newFileName, $lecture_desc) !== false) {
        //   echo "File created (" . basename($newFileName) . ")";
        // } else {
        //   echo "Cannot create file (" . basename($newFileName) . ")";
        // }
        return $encoded_name;
    }

    public function prapite_creation($school, $grade, $subject, $chapter, $lecture, $lecture_desc) {
      $prapite_folder = static::$prapite_folder;
      $prapite_name = $lecture . $school . $grade . $subject;
      $encoded_name = base64_encode($prapite_name);

      error_reporting(E_ALL);

      $newFileName = static::$prapite_folder.$encoded_name.".txt";

      $handle = fopen($newFileName, 'w') or die('Cannot open file:  '.$newFileName);
      fwrite($handle, $lecture_desc);
      // if (file_put_contents($newFileName, $lecture_desc) !== false) {
      //   echo "File created (" . basename($newFileName) . ")";
      // } else {
      //   echo "Cannot create file (" . basename($newFileName) . ")";
      // }
      return $encoded_name;
    }

    public static function find_all() {

        return static::find_array_by_query("SELECT * FROM " . static::$db_table);
    }

    public static function find_by_id($id) {
        $result = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");
        return !empty($result) ? array_shift($result) : false ;
    }

    // public static function find_by_t_username($username, $password) {
    //     $result = static::find_by_query("SELECT * FROM " . static::$mm_teacher_table . " WHERE t_user = '$username' and t_pass = '$password' LIMIT 1");
    //     return !empty($result) ? array_shift($result) : false ;
    //     return $username;
    // }

    public static function count_by_query($sql) {
      global $database;
      $result = $database -> query($sql);
      $count = mysqli_num_rows($result);
      return $count;
    }
    public static function find_by_query($sql) {
      global $database;
      $result = $database -> query($sql);
      return mysqli_fetch_assoc($result);
      // $object_array = array();
      // while( $row = mysqli_fetch_assoc($result)) {
      //     $object_array[] = static::instantiation($row);
      // }
      // return $object_array;
    }
    public static function find_array_by_query($sql) {
      global $database;
      $result = $database -> query($sql);
      $object_array = array();

      while ($row = mysqli_fetch_assoc($result)) {

        $object_array[] = static::instantiation($row);

      }
      return $object_array;
    }

    public static function insert_query($sql) {
      global $database;
      $result = $database -> query($sql);
      return $result;
    }

    /*public function insert($table, $fields = array()) {
        if(count($fields)) {
            $keys = array_keys($fields);
            $values = '';
            $x = 1;

            echo $fields[2];

            foreach($fields as $field) {
                $values .= '?';
                if($x < count($fields)) {
                    $values .= ', ';
                }
                $x++;
            }

            $sql = "INSERT INTO `$table` (`" . implode('`, `', $keys) . "`) VALUES ({$values})";

            $result = $database->query_by_array($sql, array $fields);
            //--------------------------^ this fucking shit is not ok YET !!!!!!!!! (can't still not transfer to query_by_array)

            if($result) {
                return true;
            }
            return false;
        }
    }*/


    private static function instantiation($record) {

        $obj = new static;
        foreach($record as $property => $value) {
            if( $obj -> has_property($property) ) {
                $obj -> $property = $value;
            }
        }

        return $obj;
    }
    private function has_property($property) {

        $property_array = get_object_vars($this);
        return array_key_exists($property, $property_array);

    }

/*    private static function instantiation($record) {

        $obj = new static;
        foreach($record as $property => $value) {
            if( $obj -> has_property($property) ) {
                $obj -> $property = $value;
            }
        }
        return $obj;
    }

    private function has_property($property) {

        $property_array = get_object_vars($this);

        return array_key_exists($property, $property_array);
    }

    private function clean_properties() {

        global $database;
        $property_array = array();
        foreach(static::$db_fields as $property):

            if (property_exists($this, $property)) {
                $property_array[$property] = $database -> escape_string($this->$property);
            }
        endforeach;
        return $property_array;
    }
  */

/*    public function save() {
        return isset($this->id) ? $this-> update() : $this->create();
    }

    public function create() {

        global $database;
        $property_array = $this -> clean_properties();

        $sql = "INSERT INTO " . static::$mm_teacher_table . " (" . implode(',',  array_keys($property_array)) . ")";
        $sql .=  " VALUES ('";
        $sql .= implode("', '", array_values($property_array));
        $sql .= "')";

        $result = $database->query($sql);
        if( $result) {
            return true;
        } else {
            return false;
        }
    }

    public function update() {
        global $database;
        $property_array = $this -> clean_properties();

        $property_pair = array();
        foreach($property_array as $key => $value) {

            $property_pair[] = $key . '=' . "'$value'";
        }
        $sql = "UPDATE " . static::$mm_teacher_table . " SET ";
        $sql .= implode(',', $property_pair);
        $sql .= " WHERE id = {$this->id}";

        $database -> query($sql);
        mysqli_affected_rows($database -> connection) > 0 ? true : false;
    }

    public function delete() {
        global $database;
        $sql = "DELETE FROM ". static::$mm_teacher_table ;
        $sql .= ' WHERE id = ' . $this -> id;

        $result = $database -> query($sql);

        return mysqli_affected_rows($database -> connection) > 0 ? true : false;
    }
    */
}
?>
