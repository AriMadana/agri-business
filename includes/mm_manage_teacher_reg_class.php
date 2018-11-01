<?php
// class MM_Manage_Teacher_Reg_Class extends db_object{
//
//   protected static $db_table = 'mm_manage_tchr_reg';
//
//   protected static $db_fields = array('manage_tchr_id', 't_full_name', 't_father_name', 't_ssn', 't_phone_no', 't_birthdate', 't_gender', '	t_address', 't_reg_code');
//
//   public $manage_tchr_id;
//   public $t_full_name;
//   public $t_father_name;
//   public $t_ssn;
//   public $t_phone_no;
//   public $t_birthdate;
//   public $t_gender;
//   public $t_address;
//   public $t_reg_code;
//
//   public function delete_teachers($teachers){
//     global $database;
//
//     $db_table = static::$db_table;
//
//     $t_count = count($teachers);
//     for($i=0;$i<$t_count;$i++)
//     {
//         $teacher = $teachers[$i];
//         $teacher = $database -> escape_string($teacher);
//         $this -> insert_query("DELETE FROM $db_table WHERE manage_tchr_id = $teacher;");
//     }
//   }
//
//   public function registered_teacher_list($user_id){
//
//     global $database;
//
//     $db_table = static::$db_table;
//
//     $mm_school_class = new MM_School_Class();
//     $school_from_user_id = $mm_school_class->school_from_user_id($user_id);
//
//     $result = $this->find_array_by_query("SELECT manage_tchr_id,t_full_name,t_father_name,t_ssn,t_phone_no,t_birthdate,t_gender,t_address,t_reg_code FROM $db_table WHERE t_school = $school_from_user_id ;");
//     $count = $this->count_by_query("SELECT * FROM $db_table WHERE t_school = $school_from_user_id ;");
//
//     return ($count > 0) ? $result : false;
//
//
//   }
//
//   public function insert_teacher($data, $user_id){
//     global $database;
//
//     $db_table = static::$db_table;
//
//     $mm_school_class = new MM_School_Class();
//     $school_from_user_id = $mm_school_class->school_from_user_id($user_id);
//     $school_from_sc_id = $mm_school_class->school_from_sc_id($school_from_user_id);
//
//     $str = $school_from_sc_id;
//     $str = preg_replace('~[^A-Z]~', '', $str);
//     $random_result = mt_rand(1000000000,9999999999);
//     $study_code = $str . $random_result;
//
//     for($i = 0; $i < count($data); $i++){
//       array_walk($data[$i], 'array_sanitize');
//       $stu_data = '\'' . implode('\', \'', $data[$i]) . '\'';
//       $this -> insert_query("insert into $db_table (`t_full_name`, `t_father_name`,`t_ssn`, `t_phone_no`, `t_birthdate`, `t_gender`, `t_address`, `t_reg_code`, `t_school`) values ($stu_data, '$study_code', '$school_from_user_id');");
//     }
//
//
//   }
//
//     public function checked_teacher_activation_code($activation_code){
//   		global $database;
//       $db_table =static::$db_table;
//       $activation_code=$database->escape_string($activation_code);
//       $count = $this -> count_by_query("SELECT * FROM $db_table WHERE t_reg_code='$activation_code';");
//       return ($count > 0) ? true : false;
//
//   	}
//
//     public function teacher_id_from_activation_code($activation_code){
//       global $database;
//       $db_table = static::$db_table;
//       $activation_code=$database->escape_string($activation_code);
//       $result = $this->find_by_query("SELECT manage_tchr_id FROM $db_table WHERE t_reg_code='$activation_code';");
//       return $result['manage_tchr_id'];
//     }
//
//     public function success_activation_code($activation_code){
//       global $database;
//       $db_table = static::$db_table;
//       $activation_code=$database->escape_string($activation_code);
//       $this->insert_query("UPDATE $db_table SET t_reg_code='success' WHERE t_reg_code='$activation_code';");
//     }
//
//     public function school_id_from_acitvation_code($activation_code){
//       global $database;
//       $db_table = static::$db_table;
//       $activation_code=$database->escape_string($activation_code);
//       $result = $this->find_by_query("SELECT t_school FROM $db_table WHERE t_reg_code='$activation_code';");
//       return $result['t_school'];
//     }
//
// }


 ?>
