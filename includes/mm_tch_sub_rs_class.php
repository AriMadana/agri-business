<?php
//   class MM_Tch_Sub_Rs_Class extends Db_object {
//     protected static $db_table = 'mm_tch_sub_rs';
//     protected static $db_fields = array('ts_tch_id','ts_sub_id');
//     public $ts_tch_id;
//     public $ts_sub_id;
//
//     public function is_teach($user_id, $sub_id) {
//       global $database;
//       $user_id = $database->escape_string($user_id);
//       $db_table = static:: $db_table;
//       $count = $this -> count_by_query("SELECT * FROM $db_table WHERE $user_id = ts_tch_id AND $sub_id = ts_sub_id;");
//       return ($count == 0)? false : true;
//     }
//
//     public function insert_tch_for_sub($teachers, $subject, $grade, $user_id) {
//       global $database;
//       $db_table = static::$db_table;
//       $mm_subject_class = new MM_Subject_Class();
//
//       $sub = $mm_subject_class -> sub_from_grade_and_subject($grade, $subject, $user_id);
//
//       $t_count = count($teachers);
//       for($i=0;$i<$t_count;$i++)
//       {
//           $teacher = $teachers[$i];
//           $teacher = $database -> escape_string($teacher);
//           $result = $this -> insert_query("INSERT INTO $db_table (`ts_tch_id`, `ts_sub_id`) VALUES ( $teacher, $sub);");
//       }
//       return true;
//
//     }
//     public function delete_teacher_with_sub($teacher, $subject, $grade, $user_id) {
//       global $database;
//       $db_table = static::$db_table;
//       $mm_subject_class = new MM_Subject_Class();
//       $sub = $mm_subject_class -> sub_from_grade_and_subject($grade, $subject, $user_id);
//
//       $result = $this -> insert_query("DELETE FROM $db_table WHERE ts_tch_id = $teacher AND ts_sub_id = $sub;");
//       return $result;
//     }
//
//     public function wanna_know_pray() {
//       $db_table = static::$db_table;
//       return $db_table;
//     }
//
// }
?>
