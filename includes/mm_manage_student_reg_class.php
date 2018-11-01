<?php
// class MM_Manage_Student_Reg_Class extends db_object{
//
//   protected static $db_table = 'mm_manage_stu_reg';
//   protected static $db_fields = array('manage_stu_id', 's_full_name', 's_father_name', 's_phone_no', 's_birthdate', 's_gender', '	s_address', 's_study_code');
//
//   public $manage_stu_id;
//   public $s_full_name;
//   public $s_father_name;
//   public $s_phone_no;
//   public $s_birthdate;
//   public $s_gender;
//   public $s_address;
//   public $s_study_code;
//
//   public function update_stu_class($class_id_new,$class_id_old, $stu_arr){
//     global $database;
//
//     $db_table = static::$db_table;
//     $class_id_new = $database->escape_string($class_id_new);
//     $class_id_old = $database->escape_string($class_id_old);
//
//     array_walk($stu_arr, 'array_sanitize');
//     foreach ($stu_arr as $key => $value) {
//         $result = $this -> insert_query("UPDATE $db_table SET `s_class` = '$class_id_new' WHERE s_class = $class_id_old AND manage_stu_id = $value;");
//
//     }
//     return $result;
//   }
//
//   public function stu_list_from_class_id($class_id){
//     global $database;
//
//     $db_table = static::$db_table;
//
//     $class_id = $database->escape_string($class_id);
//
//     $result = $this->find_array_by_query("SELECT manage_stu_id,s_full_name,s_father_name,s_phone_no,s_birthdate,s_address,s_study_code FROM $db_table WHERE s_class = $class_id ;");
//     $count = $this->count_by_query("SELECT * FROM $db_table WHERE s_class = $class_id ;");
//
//    return ($count > 0) ? $result : false;
//
//   }
//
//   public function delete_students($students){
//     global $database;
//
//     $db_table = static::$db_table;
//
//     $s_count = count($students);
//     for($i=0;$i<$s_count;$i++)
//     {
//         $student = $students[$i];
//         $student = $database -> escape_string($student);
//         $this -> insert_query("DELETE FROM $db_table WHERE manage_stu_id = $student");
//     }
//   }
//
//   public function registered_student_list($user_id, $grade){
//
//     global $database;
//
//
//     $db_table = static::$db_table;
//
//     $mm_school_class = new MM_School_Class();
//     $school_from_user_id = $mm_school_class->school_from_user_id($user_id);
//
//     $mm_grade_class = new MM_Grade_Class();
//     $grade_from_gdname_and_schoolid = $mm_grade_class->grade_from_gdname_and_schoolid($grade, $school_from_user_id);
//
//     $result = $this->find_array_by_query("SELECT manage_stu_id,s_full_name,s_father_name,s_phone_no,s_birthdate,s_gender,s_address,s_study_code FROM $db_table WHERE s_grade = $grade_from_gdname_and_schoolid ;");
//     $count = $this->count_by_query("SELECT * FROM $db_table WHERE s_grade = $grade_from_gdname_and_schoolid ;");
//
//    return ($count > 0) ? $result : false;
//
//
//   }
//
//   public function insert_student($data, $grade, $user_id){
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
//     $grade_num =  preg_replace('~[^0-9]~', '', $grade);
//     $random_result = mt_rand(10000000,99999999);
//     $study_code = $str . $grade_num . $random_result;
//
//
//      $mm_grade_class = new MM_Grade_Class();
//      $grade_from_gdname_and_schoolid = $mm_grade_class->grade_from_gdname_and_schoolid($grade, $school_from_user_id);
//
//      for($i = 0; $i < count($data); $i++){
//        array_walk($data[$i], 'array_sanitize');
//        $stu_data = '\'' . implode('\', \'', $data[$i]) . '\'';
//     // $bae = "insert into $db_table (`s_full_name`, `s_father_name`, `s_phone_no`, `s_birthdate`, `s_grade`) values ($stu_data, $grade_from_gdname_and_schoolid);";
//     //   // return $bae;
//     //
//       $this -> insert_query("insert into $db_table (`s_full_name`, `s_father_name`, `s_phone_no`, `s_birthdate`,`s_gender`, `s_address`, `s_study_code`, `s_grade`) values ($stu_data, '$study_code', $grade_from_gdname_and_schoolid);");
//
//     }
//
//   }
//   public function checked_student_activation_code($activation_code){
//     global $database;
//     $db_table =static::$db_table;
//     $activation_code=$database->escape_string($activation_code);
//     $count = $this -> count_by_query("SELECT * FROM $db_table WHERE s_study_code='$activation_code';");
//     return ($count > 0) ? true : false;
//
//   }
//   public function stu_id_from_activation_code($activation_code){
//     global $database;
//     $db_table = static :: $db_table;
//     $activation_code=$database->escape_string($activation_code);
//     $result = $this->find_by_query("SELECT manage_stu_id FROM $db_table WHERE s_study_code='$activation_code';");
//     return $result['manage_stu_id'];
//   }
//
//   public function success_student_activation_code($activation_code){
//     global $database;
//     $db_table = static::$db_table;
//     $activation_code=$database->escape_string($activation_code);
//     $this->insert_query("UPDATE $db_table SET s_study_code='success' WHERE s_study_code='$activation_code';");
//   }
//   public function grade_id_from_student_activation_code($activation_code){
//     global $database;
//     $db_table = static::$db_table;
//     $activation_code=$database->escape_string($activation_code);
//     $result = $this->find_by_query("SELECT s_grade FROM $db_table WHERE s_study_code='$activation_code'; ");
//    return $result['s_grade'];
//   }
// }


?>
