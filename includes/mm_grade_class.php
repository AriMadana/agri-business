<?php
// class MM_Grade_Class extends Db_object {
//   protected static $db_table = 'mm_grade';
//   protected static $db_fields = array('g_name');
//   public $g_name;
//
//   public function grade_comobbox_show($user_id){
//     global $database;
//
//     $db_table = static::$db_table;
//
//     $mm_school_class = new MM_School_Class();
//     $school_id_from_user_id = $mm_school_class -> school_from_user_id($user_id);
//     $school_id_from_user_id = $database -> escape_string($school_id_from_user_id);
//     //$new_grade = strtoupper($new_grade);
//     //$new_grade = $database->escape_string($new_grade);
//
//     $result = $this -> find_array_by_query("SELECT g_name FROM $db_table WHERE $school_id_from_user_id = g_school;");
// 		return ($result);
//   }
//
//   public function is_registered_grade($school_id) {
//     global $database;
//     $db_table = static::$db_table;
//     $count = $this -> count_by_query("SELECT * FROM $db_table WHERE $school_id = g_school;");
//     return ($count > 0) ? true : false;
//   }
//
//   public function insert_grade($user_id, $new_grade){
//     global $database;
//
//     $db_table = static::$db_table;
//
//     $mm_school_class = new MM_School_Class();
//     $school_id_from_user_id = $mm_school_class -> school_from_user_id($user_id);
//     //$new_grade = strtoupper($new_grade);
//     $new_grade = $database->escape_string($new_grade);
//
//     $this -> insert_query("INSERT INTO $db_table (`g_name`,`g_school`) values ('$new_grade', $school_id_from_user_id);");
//   }
//
//   public function delete_grade($user_id, $grade) {
//     global $database;
//     $db_table = static::$db_table;
//     $mm_school_class = new MM_School_Class();
//
//     $grade = $database -> escape_string($grade);
//     $school_id_from_user_id = $mm_school_class -> school_from_user_id($user_id);
//     $this -> insert_query("DELETE FROM $db_table WHERE g_name = '$grade' AND g_school = $school_id_from_user_id;");
//   }
//
//
//   public function grade_from_user_id($user_id) {
//
// 		global $database;
//
//     $db_table = static::$db_table;
//     $mm_school_class = new MM_School_Class();
//     $school_from_user_id = $mm_school_class -> school_from_user_id($user_id);
//     $school_from_user_id = $database -> escape_string($school_from_user_id);
//
//     $result = $this -> find_array_by_query("SELECT g_name FROM $db_table WHERE g_school = $school_from_user_id;");
// 		$count = $this -> count_by_query("SELECT * FROM $db_table WHERE g_school = $school_from_user_id;");
// 		//$count = mysqli_num_rows($query);
//
// 		return ($count > 0) ? $result : false;
// 	}
//
//   public function grade_from_user_id_student($user_id) {
//
// 		global $database;
//
//     $db_table = static::$db_table;
//     $mm_school_class = new MM_School_Class();
//     $school_from_user_id = $mm_school_class -> school_from_user_id_student($user_id);
//     $school_from_user_id = $database -> escape_string($school_from_user_id);
//
//     $result = $this -> find_array_by_query("SELECT g_name FROM $db_table WHERE g_school = $school_from_user_id;");
// 		$count = $this -> count_by_query("SELECT * FROM $db_table WHERE g_school = $school_from_user_id;");
// 		//$count = mysqli_num_rows($query);
//
// 		return ($count > 0) ? $result : false;
// 	}
//
//   public function grade_from_gdname_and_schoolid($gd_name, $sc_id) {
//     global $database;
//     $mm_school_class = new MM_School_Class();
//     $db_table = static::$db_table;
//
//     $gd_name = $database -> escape_string($gd_name);
//     $sc_id = $database -> escape_string($sc_id);
//     $result = $this -> find_by_query("SELECT g_id FROM $db_table WHERE g_name = '$gd_name' AND g_school = $sc_id");
//     return $result['g_id'];
//   }
//
//
//
//   public function school_id_from_grade_id($grade_id){
//     global $database;
//     $db_table = static::$db_table;
//     $grade_id = $database->escape_string($grade_id);
//
//     $result = $this->find_by_query("SELECT g_school FROM $db_table WHERE g_id = $grade_id");
//     return $result['g_school'];
//
//   }
//
//
//
//
//
//
//   public function grade_exists($new_grade,$user_id){
//     global $database;
//
//     $db_table = static::$db_table;
//     $user_id=school_id_from_user_id($user_id);
//     $new_grade = $database -> escape_string($new_grade);
//     $result = $this->count_by_query("select * from $db_table where g_name = '$new_grade' and g_school = $user ;");
//     return ($result > 0)? true : false;
//   }
//
// public function insert_grades($new_grade_names,$user_id){
//    global $database;
//   $db_table = static:: $db_table;
//   $mm_school_class = new MM_School_Class();
//   $school_id = $mm_school_class -> school_from_user_id($user_id);
//   $school_id = $database -> escape_string($school_id);
//   $count = count($new_grade_names);
//   for($i=0;$i<$count;$i++){
//     $new_grade_names[$i]=$database->escape_string($new_grade_names[$i]);
//   $this->insert_query("insert into $db_table(g_name,g_school) values('$new_grade_names[$i]',$school_id)");
//   }
// }
// }
?>
