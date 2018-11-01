<?php
// class MM_Class_Class extends Db_object {
//   protected static $db_table = 'mm_class';
//   protected static $db_fields = array('c_name', 'c_grade', 'c_id');
//   public $c_id;
//   public $c_name;
//   public $c_grade;
//
//   public function is_tchr_in_class($user_id){
//     global $database;
//     $db_table = static:: $db_table;
//
//     $user_id = $database->escape_string($user_id);
//
//     $result = $this -> find_by_query("SELECT c_id FROM $db_table WHERE c_teacher = $user_id;");
//     $count = $this -> count_by_query("SELECT * FROM $db_table WHERE c_teacher = $user_id;");
//
//     return ($count > 0) ? $result['c_id'] : false;
//
//   }
//
//   public function class_insertion($class, $grade, $user_id) {
//     global $database;
//     $db_table = static:: $db_table;
//     $mm_grade_class = new MM_Grade_Class();
//     $mm_school_class = new MM_School_Class();
//
//     $school = $mm_school_class -> school_from_user_id($user_id);
//     $grade = $mm_grade_class -> grade_from_gdname_and_schoolid($grade, $school);
//     $class = $database -> escape_string($class);
//
//
//     $result = $this -> insert_query("INSERT INTO $db_table (`c_name`, `c_grade`) VALUES ('$class', $grade);");
//     return $result;
//   }
//   public function class_deleting($class, $grade, $user_id) {
//     global $database;
//     $db_table = static:: $db_table;
//     $mm_grade_class = new MM_Grade_Class();
//     $mm_school_class = new MM_School_Class();
//
//     $school = $mm_school_class -> school_from_user_id($user_id);
//     $grade = $mm_grade_class -> grade_from_gdname_and_schoolid($grade, $school);
//     $class = $database -> escape_string($class);
//
//     $result = $this -> insert_query("DELETE FROM $db_table WHERE '$class' = c_name AND '$grade' = c_grade;");
//     return $result;
//   }
//   public function class_updating($class_new, $class, $grade, $user_id) {
//     global $database;
//     $db_table = static:: $db_table;
//     $mm_grade_class = new MM_Grade_Class();
//     $mm_school_class = new MM_School_Class();
//
//     $school = $mm_school_class -> school_from_user_id($user_id);
//     $grade = $mm_grade_class -> grade_from_gdname_and_schoolid($grade, $school);
//     $class_new = $database -> escape_string($class_new);
//     $class = $database -> escape_string($class);
//
//     $result = $this -> insert_query("UPDATE $db_table SET `c_name` = '$class_new' WHERE `c_grade`= $grade AND `c_name` = '$class';");
//     return $result;
//   }
//   public function class_from_classname_and_gdid($class , $grade_id){
//     global $database;
//
//     $class = $database->escape_string($class);
//     $grade_id = $database->escape_string($grade_id);
//     $db_table = static:: $db_table;
//
//     $result = $this -> find_by_query("SELECT c_id FROM $db_table WHERE c_name = '$class' AND c_grade = $grade_id;");
//     return $result['c_id'];
//   }
//
//   public function c_from_grade_and_class($grade, $class, $user_id) {
//     $mm_school_class = new MM_School_Class();
//     $mm_grade_class = new MM_Grade_Class();
//     $school_id = $mm_school_class -> school_from_user_id($user_id);
//     $grade_id = $mm_grade_class -> grade_from_gdname_and_schoolid($grade, $school_id);
//     $class_id = $this -> class_from_classname_and_gdid($class, $grade_id);
//     return $class_id;
//   }
//
//   public function c_from_grade_and_class_school($grade, $class, $school_info_id) {
//     $mm_grade_class = new MM_Grade_Class();
//     $grade_id = $mm_grade_class -> grade_from_gdname_and_schoolid($grade, $school_info_id);
//     $class_id = $this -> class_from_classname_and_gdid($class, $grade_id);
//     return $class_id;
//   }
//
//   public function fmly_of_c_id($c_id) {
//     $db_table = static::$db_table;
//     $result = $this -> find_by_query("SELECT c_teacher FROM $db_table WHERE c_id = $c_id;");
//     $count = $this -> count_by_query("SELECT c_teacher FROM $db_table WHERE c_id = $c_id;");
//     return ($count > 0) ? $result['c_teacher'] : false;
//   }
//
//   public function fmly_tch_remove($grade, $class, $user_id) {
//     $db_table = static::$db_table;
//     $c_id = $this -> c_from_grade_and_class($grade, $class, $user_id);
//     $result = $this -> insert_query("UPDATE $db_table SET c_teacher = 0 WHERE c_id = $c_id;");
//     return $result;
//   }
//
//   public function class_list_from_school_and_grade($user_id, $grade_name) {
//     global $database;
//     $mm_school_class = new MM_School_Class();
//     $mm_grade_class = new MM_Grade_Class();
//     $db_table = static::$db_table;
//
//     $school_from_user_id = $mm_school_class -> school_from_user_id($user_id);
//
//     $grade_id = $mm_grade_class -> grade_from_gdname_and_schoolid($grade_name, $school_from_user_id);
//     $grade_id = $database -> escape_string($grade_id);
//     //$query = 'select c_name from $db_table where c_grade = $grade_id;';
//     // $sql = "SELECT c_name FROM $db_table WHERE c_grade = $grade_id;";
//     $result = $this -> find_array_by_query("SELECT c_name FROM $db_table WHERE c_grade = $grade_id;");
// 		$count = $this -> count_by_query("SELECT * FROM $db_table WHERE c_grade = $grade_id;");
// 		//$count = mysqli_num_rows($query);
//
// 		return ($count > 0) ? $result : false;
//   }
//
//   public function class_list_cid_from_school_and_grade($user_id, $grade_name) {
//     global $database;
//     $mm_school_class = new MM_School_Class();
//     $mm_grade_class = new MM_Grade_Class();
//     $db_table = static::$db_table;
//
//     $school_from_user_id = $mm_school_class -> school_from_user_id($user_id);
//
//     $grade_id = $mm_grade_class -> grade_from_gdname_and_schoolid($grade_name, $school_from_user_id);
//     $grade_id = $database -> escape_string($grade_id);
//     //$query = 'select c_name from $db_table where c_grade = $grade_id;';
//     // $sql = "SELECT c_name FROM $db_table WHERE c_grade = $grade_id;";
//     $result = $this -> find_array_by_query("SELECT c_id,c_name FROM $db_table WHERE c_grade = $grade_id;");
//     $count = $this -> count_by_query("SELECT * FROM $db_table WHERE c_grade = $grade_id;");
//     //$count = mysqli_num_rows($query);
//
//     return ($count > 0) ? $result : false;
//   }
//
//
//
//   public function school_from_sc_id($school_id) {
//     global $database;
//     $db_table = static::$db_table;
//     $school_id = $database -> escape_string($school_id);
//     $result = $this -> find_by_query("SELECT sc_name FROM $db_table WHERE sc_id = $school_id;");
//     return $result['sc_name'];
//   }
//
//   public function set_fmly_tch($tch_for_class, $class, $grade, $user_id) {
//     global $database;
//     $db_table = static::$db_table;
//
//     $tch_for_class = $database -> escape_string($tch_for_class);
//     $c_id = $this -> c_from_grade_and_class($grade, $class, $user_id);
//     $result = $this -> insert_query("UPDATE $db_table SET c_teacher = $tch_for_class WHERE c_id = $c_id;");
//     return $result;
//   }
//
//   public function is_head_from_user_id($user_id) {
//     global $database;
//   }
// }
?>
