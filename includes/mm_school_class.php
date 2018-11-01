<?php

// class MM_School_Class extends Db_object {
//   protected static $db_table = 'mm_school';
//   protected static $db_fields = array('sc_name');
//   public $sc_name;
//
// 	public function school_from_user_id($user_id) {
//
// 		global $database;
//
//     $mm_teacher_class = new MM_Teacher_Class();
//     $db_table = static::$db_table;
//
//     $t_data = $mm_teacher_class -> user_data($user_id);
//     $t_school = $database -> escape_string($t_data['t_school']);
//     $result = $this -> find_by_query("SELECT sc_id FROM $db_table WHERE sc_id = '$t_school';");
//
// 		return $result['sc_id'];
// 	}
//   public function school_from_user_id_student($user_id) {
//
// 		global $database;
//
//     $mm_student_class = new MM_Student_Class();
//     $db_table = static::$db_table;
//
//     $t_data = $mm_student_class -> user_data($user_id);
//     $t_school = $database -> escape_string($t_data['s_school']);
//     $result = $this -> find_by_query("SELECT sc_id FROM $db_table WHERE sc_id = '$t_school';");
//
// 		return $result['sc_id'];
// 	}
//   public function school_from_sc_id($school_id) {
//     global $database;
//     $db_table = static::$db_table;
//     $school_id = $database -> escape_string($school_id);
//     $result = $this -> find_by_query("SELECT sc_name FROM $db_table WHERE sc_id = $school_id;");
//     return $result['sc_name'];
//   }
//   public function sc_id_from_sc_name($sc_name) {
//     global $database;
//     $db_table = static::$db_table;
//     $sc_name = $database -> escape_string($sc_name);
//     $result = $this -> find_by_query("SELECT sc_id FROM $db_table WHERE sc_name = '$sc_name';");
//     return $result['sc_id'];
//   }
//
//     public function sc_role_from_user_id($user_id){
//       global $database;
//       $db_table = static::$db_table;
//       $school_id=$this->school_from_user_id($user_id);
//       $school_id=$database ->escape_string($school_id);
//       $result = $this -> find_by_query("SELECT sc_role FROM $db_table WHERE sc_id=$school_id ;");
//       return $result['sc_role'];
//     }
//   public function is_head_from_user_id($user_id) {
//     global $database;
//   }
// }
?>
