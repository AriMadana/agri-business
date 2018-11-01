<?php

// class MM_Student_Class extends Db_object {
//   protected static $db_table = "mm_student";
//   protected static $db_fields = array('s_id', 's_username', 's_first_name', 's_last_name', 's_father', 's_gender', 's_phone', 's_address');
//
//   public $s_id;
//   public $s_username;
//   public $s_first_name;
//   public $s_last_name;
//   public $s_father;
//   public $s_gender;
//   public $s_phone;
//   public $s_address;
//
//
//   //functions start
//
//   public function student_deactivate($students){
//     global $database;
//     $db_table = static::$db_table;
//     $s_count = count($students);
//     for($i=0; $i<$s_count; $i++) {
//       $student = $students[$i];
//       $student = $database -> escape_string($student);
//       $this -> insert_query("UPDATE $db_table SET s_active = 0 WHERE s_id = $student");
//     }
//   }
//
//   public function student_delete($students){
//   		global $database;
//
//       $db_table = static::$db_table;
//
//   		$s_count = count($students);
//   	  for($i=0;$i<$s_count;$i++)
//   	  {
//   	      $student = $students[$i];
//   				$student = $database -> escape_string($student);
//       //    echo "DELETE FROM $db_table WHERE s_id = $student";
//   				$this -> insert_query("DELETE FROM $db_table WHERE s_id = $student");
//   	  }
//   }
//
//   public function student_activate($students){
//     global $database;
//
//     $db_table = static::$db_table;
//
//     $s_count = count($students);
//     for($i=0;$i<$s_count;$i++)
//     {
//         $student = $students[$i];
//         $student = $database -> escape_string($student);
//         $this -> insert_query("UPDATE $db_table SET s_active = 1 WHERE s_id = $student");
//     }
//   }
//
//   public function user_exists($username) {
// 		global $database;
// 		$db_table = static::$db_table;
// 		$username = $database -> escape_string($username);
// 		$result = $this -> count_by_query("SELECT * FROM $db_table WHERE s_username = '$username';");
// 		//$count = mysqli_num_rows($query);
// 		return ($result > 0) ? true : false;
// 	}
//
//   public function logged_in() {
//     return (isset($_SESSION['stu_id_custom'])) ? true : false;
//   }
//
//   function user_data($user_id) {
// 		$result = array();
// 		$db_table = static::$db_table;
// 		$result = $this -> find_by_query("SELECT * FROM $db_table WHERE s_id = '$user_id';");
// 		return $result;
//   }
//
//   public function is_registered($username, $password) {
//     return $this -> find_by_t_username($username, $password);
//   }
//
//   public function user_active($username) {
// 		global $database;
// 		$db_table = static::$db_table;
// 		$username = $database -> escape_string($username);
// 		$result = $this -> count_by_query("SELECT * FROM $db_table WHERE s_username = '$username' AND s_active = 1;");
// 		return ($result > 0) ? true : false;
// 	}
//
//   public function user_id_from_username($username) {
//     global $database;
//     $db_table = static::$db_table;
//     $username = $database -> escape_string($username);
//     $result = $this -> find_by_query("SELECT s_id FROM $db_table WHERE s_username = '$username';");
//     return $result['s_id'];
//   }
//
//   public function login_id($username, $password) {
//     global $database;
//     $db_table = static::$db_table;
//     $user_id = $this -> user_id_from_username($username);
//     $username = $database -> escape_string($username);
//     $password = md5($password);
//     $result = $this -> count_by_query("SELECT * FROM $db_table WHERE s_username = '$username' AND s_password = '$password';");
//     return ($result > 0) ? $user_id : false;
//   }
//
//   public function register_user($register_data,$grade_id,$manage_id) {
//   global $database;
//   $db_table = static::$db_table;
//   $register_data['s_password'] = md5($register_data['s_password']);
//   array_walk($register_data, 'array_sanitize');  // sanitize the whole array using array_walk function
//   //$register_data['password'] = md5($register_data['password']);
//
//   $fields = '`' . implode('`, `', array_keys($register_data)) . '`';
//   $data = '\'' . implode('\', \'', $register_data) . '\'';
//   $grade_id = $database->escape_string($grade_id);
//   $manage_id = $database->escape_string($manage_id);
//
//   $this -> insert_query("insert into $db_table ($fields,s_grade,s_manage_id) values ($data,$grade_id,$manage_id);");
//   //mysqli_query(mysqli_connect('localhost','root','','users') , "insert into user ($fields) values ($data)");
// }
//   public function update_student_info($user_id,$username,$first_name,$last_name,$gender,$father,$birth,$ph_no,$address){
//   global $database;
//   $db_table = static :: $db_table;
//   $username= $database->escape_string($username);
//   $first_name = $database -> escape_string($first_name);
//   $last_name =  $database -> escape_string($last_name);
//   $gender = $database ->escape_string($gender);
//   $father = $database ->escape_string($father);
//   $birth = $database  ->escape_string($birth);
//   $ph_no= $database ->escape_string($ph_no);
//   $address = $database ->escape_string($address);
//   $user_id=$database->escape_string($user_id);
//   echo "UPDATE $db_table SET s_username='$username' , s_first_name='$first_name' , s_last_name='$last_name' , s_gender='$gender' , s_father='$father' , s_birth='$birth' , s_phone='$ph_no' , s_address='$address' WHERE s_id=$user_id;";
//   $this -> insert_query("UPDATE $db_table SET s_username='$username' , s_first_name='$first_name' , s_last_name='$last_name' , s_gender='$gender' , s_father='$father' , s_birth='$birth' , s_phone='$ph_no' , s_address='$address' WHERE s_id=$user_id;");
// }
//
// public function name_from_user_id($user_id){
//   global $database;
//   $db_table = static :: $db_table;
//   $user_id=$database->escape_string($user_id);
//   $result = $this -> find_by_query("SELECT s_username FROM $db_table WHERE s_id=$user_id;");
//   return $result['s_username'];
// }
//
// public function password_from_user_id($user_id){
//   global $database;
//   $db_table = static :: $db_table;
//   $user_id = $database->escape_string($user_id);
//   $result = $this ->find_by_query("SELECT s_password from $db_table WHERE s_id=$user_id ;");
//   return $result['s_password'];
// }
//
// public function update_password($user_id,$new_password){
//   global $database;
//   $db_table = static :: $db_table;
//   $user_id = $database->escape_string($user_id);
//   $new_password = md5($new_password);
//   $new_password=$database->escape_string($new_password);
//   $this ->insert_query("UPDATE $db_table SET s_password='$new_password' WHERE s_id=$user_id ;");
// }
//
// public function activated_student_list($user_id){
//     global $database;
//
//     $db_table = static::$db_table;
//     $mm_school_class = new MM_School_Class();
//     $school_from_user_id = $mm_school_class -> school_from_user_id($user_id);
//     $school_from_user_id = $database -> escape_string($school_from_user_id);
//     $mm_class_class = new MM_Class_Class();
//     $class_from_user_id = $mm_class_class -> is_tchr_in_class($user_id);
//     if($class_from_user_id != false){
//       $class_from_user_id = $database -> escape_string($class_from_user_id);
//
//       $result = $this -> find_array_by_query("SELECT s_id,s_username, s_first_name, s_last_name, s_gender, s_father, s_phone, s_address FROM $db_table WHERE s_school = $school_from_user_id AND s_active = 1 AND s_manage_id in (SELECT manage_stu_id FROM mm_manage_stu_reg WHERE s_class = $class_from_user_id);");
//       $count = $this -> count_by_query("SELECT * FROM $db_table WHERE s_school = $school_from_user_id AND s_active = 1 AND s_manage_id in (SELECT manage_stu_id FROM mm_manage_stu_reg WHERE s_class = $class_from_user_id);");
//       //$count = mysqli_num_rows($query);
//
//       return ($count > 0) ? $result : false;
//     }else{
//       return false;
//     }
//
//   }
//
//   public function none_activated_student_list($user_id){
//     global $database;
//
//     $db_table = static::$db_table;
//     $mm_school_class = new MM_School_Class();
//     $school_from_user_id = $mm_school_class -> school_from_user_id($user_id);
//     $school_from_user_id = $database -> escape_string($school_from_user_id);
//     $mm_class_class = new MM_Class_Class();
//     $class_from_user_id = $mm_class_class -> is_tchr_in_class($user_id);
//     if($class_from_user_id != false){
//       $class_from_user_id = $database -> escape_string($class_from_user_id);
//
//       $result = $this -> find_array_by_query("SELECT s_id,s_username, s_first_name, s_last_name, s_gender, s_father, s_phone, s_address FROM $db_table WHERE s_school = $school_from_user_id AND s_active = 0 AND s_manage_id IN (SELECT manage_stu_id FROM mm_manage_stu_reg WHERE s_class = $class_from_user_id);");
//       $count = $this -> count_by_query("SELECT * FROM $db_table WHERE s_school = $school_from_user_id AND s_active = 0 AND s_manage_id IN (SELECT manage_stu_id FROM mm_manage_stu_reg WHERE s_class = $class_from_user_id);");
//       //$count = mysqli_num_rows($query);
//
//       return ($count > 0) ? $result : false;
//     }else{
//       return false;
//     }
//
//   }
// }


?>
