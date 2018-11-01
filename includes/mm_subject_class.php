<?php
// class MM_Subject_Class extends Db_object {
//   protected static $db_table = 'mm_subject';
//   protected static $db_fields = array('sub_id','sub_name');
//   public $sub_id;
//   public $sub_name;
//
//   public function subject_insertion($subject, $grade, $user_id) {
//     global $database;
//     $db_table = static:: $db_table;
//     $mm_grade_class = new MM_Grade_Class();
//     $mm_school_class = new MM_School_Class();
//
//     $school = $mm_school_class -> school_from_user_id($user_id);
//     $grade = $mm_grade_class -> grade_from_gdname_and_schoolid($grade, $school);
//     $subject = $database -> escape_string($subject);
//
//
//     $result = $this -> insert_query("INSERT INTO $db_table (`sub_name`, `sub_grade`) VALUES ('$subject', $grade);");
//     return $result;
//   }
//   public function subject_deleting($subject, $grade, $user_id) {
//     global $database;
//     $db_table = static:: $db_table;
//     $mm_grade_class = new MM_Grade_Class();
//     $mm_school_class = new MM_School_Class();
//
//     $school = $mm_school_class -> school_from_user_id($user_id);
//     $grade = $mm_grade_class -> grade_from_gdname_and_schoolid($grade, $school);
//     $subject = $database -> escape_string($subject);
//
//     $result = $this -> insert_query("DELETE FROM $db_table WHERE '$subject' = sub_name AND '$grade' = sub_grade;");
//     return $result;
//   }
//   public function subject_updating($subject_new, $subject, $grade, $user_id) {
//     global $database;
//     $db_table = static:: $db_table;
//     $mm_grade_class = new MM_Grade_Class();
//     $mm_school_class = new MM_School_Class();
//
//     $school = $mm_school_class -> school_from_user_id($user_id);
//     $grade = $mm_grade_class -> grade_from_gdname_and_schoolid($grade, $school);
//     $subject_new = $database -> escape_string($subject_new);
//     $subject = $database -> escape_string($subject);
//
//     $result = $this -> insert_query("UPDATE $db_table SET `sub_name` = '$subject_new' WHERE `sub_grade`= $grade AND `sub_name` = '$subject';");
//     return $result;
//   }
//   public function subject_from_subname_and_gdid($subject , $grade_id){
//     global $database;
//
//     $subject = $database->escape_string($subject);
//     $grade_id = $database->escape_string($grade_id);
//     $db_table = static:: $db_table;
//
//     $result = $this -> find_by_query("SELECT sub_id FROM $db_table WHERE sub_name = '$subject' AND sub_grade = $grade_id;");
//     return $result['sub_id'];
//
//   }
//
//   public function sub_list_from_school_and_grade($school_info_id, $grade_name) {
//     global $database;
//     $mm_grade_class = new MM_Grade_Class();
//     $db_table = static::$db_table;
//
//     $grade_id = $mm_grade_class -> grade_from_gdname_and_schoolid($grade_name, $school_info_id);
//     $grade_id = $database -> escape_string($grade_id);
//     //$query = 'select sub_name from $db_table where sub_grade = $grade_id;';
//     // $sql = "SELECT sub_name FROM $db_table WHERE sub_grade = $grade_id;";
//     $result = $this -> find_array_by_query("SELECT sub_id,sub_name FROM $db_table WHERE sub_grade = $grade_id;");
// 		$count = $this -> count_by_query("SELECT sub_id FROM $db_table WHERE sub_grade = $grade_id;");
// 		//$count = mysqli_num_rows($query);
//
// 		return ($count > 0) ? $result : false;
//   }
//
//   public function school_from_sc_id($school_id) {
//     global $database;
//     $db_table = static::$db_table;
//     $school_id = $database -> escape_string($school_id);
//     $result = $this -> find_by_query("SELECT sc_name FROM $db_table WHERE sc_id = $school_id;");
//     return $result['sc_name'];
//   }
//
//   public function sub_from_grade_and_subject($grade, $subject, $user_id) {
//     $mm_school_class = new MM_School_Class();
//     $mm_grade_class = new MM_Grade_Class();
//     $school_id = $mm_school_class -> school_from_user_id($user_id);
//     $grade_id = $mm_grade_class -> grade_from_gdname_and_schoolid($grade, $school_id);
//     $subject_id = $this -> subject_from_subname_and_gdid($subject, $grade_id);
//     return $subject_id;
//   }
//
//   public function is_head_from_user_id($user_id) {
//     global $database;
//   }
//
// }
?>
