<?php

class MM_Admin_Class extends Db_object {

	protected static $db_table = "ab_admin";
	protected static $db_fields = array('admin_id', 'admin_email', 'admin_fname', 'admin_lname', 'admin_pf', 'admin_cv', 'admin_pass', 'admin_gender', 'admin_birth', 'admin_phone', 'admin_address', 'admin_active');

	public $admin_id;
	public $admin_fname;
	public $admin_lname;
    public $admin_pf;
    public $admin_cv;
	public $admin_pass;
	public $admin_gender;
	public $admin_birth;
	public $admin_phone;
	public $admin_address;
	public $admin_active;

	public function user_match($email, $password) {
		global $database;
		$db_table = static::$db_table;
        $password = md5($password);
		$email = $database -> escape_string($email);
        $password = $database -> escape_string($password);
		$result = $this -> find_by_query("SELECT `admin_id` FROM `$db_table` WHERE `admin_email` = '$email' AND `admin_pass` = '$password';");
		//$count = mysqli_num_rows($query);
		// return ($result > 0) ? true : false;
    return $result['admin_id'];
	}

    public function isPresentUsername($email) {
        global $database;
        $db_table = static::$db_table;
        $email = $database->escape_string($email);
        $isPresent = $this->count_by_query("SELECT `admin_email` FROM `$db_table` WHERE `admin_email` = '$email';");

        if($isPresent == 1) {
            return true;
        }
        return false;
    }

    public function isCorrectPassword($password) {
        global $database;
        $db_table = static::$db_table;
        $password = md5($password);
        $password = $database->escape_string($password);
        $isCorrect = $this->count_by_query("SELECT `admin_pass` FROM `$db_table` WHERE `admin_pass` = '$password';");

        if($isCorrect == 1) {
            return true;
        }
        return false;
    }

    public function isInsertSuccessful($username, $phone, $email, $password) {
        global $database;
        $db_table = static::$db_table;

        $username = $database->escape_string($username);
        $phone    = $database->escape_string($phone);
        $email    = $database->escape_string($email);
        $password = $database->escape_string($password);
        $password = md5($password); //->OK

        /*for($i = 0; $i < count($values); $i++) {
            $values[i] = $database->escape_string($values[i]);
        }
        $values[3] = md5($values[3]);

        $isInsert = $this->insert($db_table, array(
            static::$db_fields[2] => $values[0], //name
            static::$db_fields[9] => $values[1], //phone
            static::$db_fields[1] => $values[2], //email
            static::$db_fields[6] => $values[3]  //password
        ));*/

        $sql = "INSERT INTO `$db_table` (`admin_fname`, `admin_phone`, `admin_email`, `admin_pass`) VALUES ('$username', '$phone', '$email', '$password')"; //-> OK

        $isInsert = $this->insert_query($sql); //-> OK

        if($isInsert) {
            return true;
        }
        return false;
    }

  public function user_info_from_userid($user_id) {
		global $database;
		$db_table = static::$db_table;
		$user_id = $database -> escape_string($user_id);
		$result = $this -> find_by_query("SELECT * FROM `$db_table` WHERE `admin_id` = $user_id;");
		//$count = mysqli_num_rows($query);
		// return ($result > 0) ? true : false;
        return $result;
	}

 /*   public function sendMail($to, array $message) {

        $mailtouser = mail($to, $message[0], $message[1], $message[2]);
    }

    public function randomNumber() {
        return rand(100000, 999999);
    }*/
}
	// public function user_id_from_username($username) {
	// 	global $database;
	// 	$db_table = static::$db_table;
	// 	$username = $database -> escape_string($username);
	// 	$result = $this -> find_by_query("SELECT t_id FROM $db_table WHERE t_user = '$username';");
	// 	return $result['t_id'];
	// }
	// public function login_id($username, $password) {
	// 	global $database;
	// 	$db_table = static::$db_table;
	// 	$user_id = $this -> user_id_from_username($username);
	// 	$username = $database -> escape_string($username);
	// 	$password = md5($password);
	// 	$result = $this -> count_by_query("SELECT * FROM $db_table WHERE t_user = '$username' AND t_pass = '$password';");
	// 	return ($result > 0) ? $user_id : false;
	// }
	// public function user_active($username) {
	// 	global $database;
	// 	$db_table = static::$db_table;
	// 	$username = $database -> escape_string($username);
	// 	$result = $this -> count_by_query("SELECT * FROM $db_table WHERE t_user = '$username' AND t_active = 1;");
	// 	return ($result > 0) ? true : false;
	// }
	// public function logged_in() {
  // 	return (isset($_SESSION['teacher_id_custom'])) ? true : false;
	// }
	// public function register_user($register_data,$school_id,$manage_id) {
	// 	global $database;
	// 	$db_table = static::$db_table;
	//   array_walk($register_data, 'array_sanitize');
	// 	$register_data['t_pass'] = md5($register_data['t_pass']);
	// 	  // sanitize the whole array using array_walk function
	//   //$register_data['password'] = md5($register_data['password']);
  //
	//   $fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	//   $data = '\'' . implode('\', \'', $register_data) . '\'';
  //   $school_id = $database->escape_string($school_id);
	// 	$manage_id=$database->escape_string($manage_id);
	// 	echo "insert into $db_table ($fields,'t_school','t_manage_id') values ($data,$school_id,$manage_id);";
	// 	$this -> insert_query("insert into $db_table ($fields,t_school,t_manage_id) values ($data,$school_id,$manage_id);");
  //
  //
	//   //mysqli_query(mysqli_connect('localhost','root','','users') , "insert into user ($fields) values ($data)");
	// }
	// public function is_head($user_id){
	// global $database;
  //
	// $db_table = static::$db_table;
	// $mm_school_class = new MM_School_Class();
	// $school_from_user_id = $mm_school_class -> school_from_user_id($user_id);
	// $school_from_user_id = $database -> escape_string($school_from_user_id);
	// $count = $this -> count_by_query("SELECT * FROM $db_table WHERE t_id = $user_id and t_head = 'kyaungoak';");
	// return ($count == 1) ? true : false;
	// }
  //
	// public function teacher_activate($teachers){
	// 	global $database;
  //
  //   $db_table = static::$db_table;
  //
	// 	$t_count = count($teachers);
	//   for($i=0;$i<$t_count;$i++)
	//   {
	//       $teacher = $teachers[$i];
	// 			$teacher = $database -> escape_string($teacher);
	// 			$this -> insert_query("UPDATE $db_table SET t_active = 1 WHERE t_id = $teacher");
	//   }
	// }
	// public function staff_add($teachers){
	// 	global $database;
  //
  //   $db_table = static::$db_table;
  //
	// 	$t_count = count($teachers);
	//   for($i=0;$i<$t_count;$i++)
	//   {
	//       $teacher = $teachers[$i];
	// 			$teacher = $database -> escape_string($teacher);
	// 			$this -> insert_query("UPDATE $db_table SET t_manage = 'pyinya' WHERE t_id = $teacher");
	//   }
	// }
  //
	// public function teacher_deactivate($teachers) {
	// 	global $database;
	// 	$db_table = static::$db_table;
	// 	$t_count = count($teachers);
	// 	for($i=0; $i<$t_count; $i++) {
	// 		$teacher = $teachers[$i];
	// 		$teacher = $database -> escape_string($teacher);
	// 		$this -> insert_query("UPDATE $db_table SET t_active = 0 WHERE t_id = $teacher");
	// 	}
	// }
	// public function staff_delete($teachers){
	// 	global $database;
  //
	// 	$db_table = static::$db_table;
  //
	// 	$t_count = count($teachers);
	// 	for($i=0;$i<$t_count;$i++)
	// 	{
	// 			$teacher = $teachers[$i];
	// 			$teacher = $database -> escape_string($teacher);
	// 			$this -> insert_query("UPDATE $db_table SET t_manage = null WHERE t_id = $teacher");
	// 	}
	// }
	// public function teacher_delete($teachers){
	// 	global $database;
  //
  //   $db_table = static::$db_table;
  //
	// 	$t_count = count($teachers);
	//   for($i=0;$i<$t_count;$i++)
	//   {
	//       $teacher = $teachers[$i];
	// 			$teacher = $database -> escape_string($teacher);
	// 			$this -> insert_query("DELETE FROM $db_table WHERE t_id = $teacher");
	//   }
	// }
	// public function is_teacher($user_id){
	// global $database;
  //
  //   $db_table = static::$db_table;
  //   $mm_school_class = new MM_School_Class();
  //   $school_from_user_id = $mm_school_class -> school_from_user_id($user_id);
  //   $school_from_user_id = $database -> escape_string($school_from_user_id);
	// 	$result = $this -> find_by_query("SELECT t_head FROM $db_table WHERE t_id = $user_id;");
	// 	return ($result == 1) ? true : false;
	// }
  //
	// public function activated_teacher_list($user_id) {
	// 	global $database;
  //
  //   $db_table = static::$db_table;
  //   $mm_school_class = new MM_School_Class();
  //   $school_from_user_id = $mm_school_class -> school_from_user_id($user_id);
  //   $school_from_user_id = $database -> escape_string($school_from_user_id);
  //
  //   $result = $this -> find_array_by_query("SELECT t_user, first_name, last_name, t_pass, t_ssn, t_father, t_id, t_gender, t_school, t_role, t_pno, t_add FROM $db_table WHERE t_school = $school_from_user_id AND t_active = 1 AND t_head != 'kyaungoak' AND t_manage != 'pyinya';");
	// 	$count = $this -> count_by_query("SELECT * FROM $db_table WHERE t_school = $school_from_user_id AND t_active = 1 AND t_head != 'kyaungoak' AND t_manage != 'pyinya';");
	// 	//$count = mysqli_num_rows($query);
  //
	// 	return ($count > 0) ? $result : false;
	// }
  //
	// public function activated_teacher_list_for_family($grade, $class, $school_info_id) {
	// 	global $database;
  //
  //   $db_table = static::$db_table;
	// 	$mm_class_class = new MM_Class_Class();
  //
	// 	$c_id = $mm_class_class -> c_from_grade_and_class_school($grade, $class, $school_info_id);
  //
  //   $result = $this -> find_array_by_query("SELECT t_user, first_name, last_name, t_pass, t_ssn, t_father, t_id, t_gender, t_school, t_role, t_pno, t_add FROM $db_table WHERE t_school = $school_info_id AND t_active = 1 AND t_head != 'kyaungoak' AND t_manage != 'pyinya' AND t_id NOT IN (SELECT c_teacher FROM mm_class);");
	// 	$count = $this -> count_by_query("SELECT t_id FROM $db_table WHERE t_school = $school_info_id AND t_active = 1 AND t_head != 'kyaungoak' AND t_manage != 'pyinya' AND t_id NOT IN (SELECT c_teacher FROM mm_class);");
	// 	//$count = mysqli_num_rows($query);
  //
	// 	return ($count > 0) ? $result : false;
	// }
  //
	// public function none_activated_teacher_list($user_id) {
	// 	global $database;
  //
  //   $db_table = static::$db_table;
  //   $mm_school_class = new MM_School_Class();
  //   $school_from_user_id = $mm_school_class -> school_from_user_id($user_id);
  //   $school_from_user_id = $database -> escape_string($school_from_user_id);
  //
	// 	$result = $this -> find_array_by_query("SELECT t_user, first_name, last_name, t_pass, t_ssn, t_father, t_id, t_gender, t_school, t_role, t_pno, t_add FROM $db_table WHERE t_school = $school_from_user_id and t_active = 0;");
	// 	$count = $this -> count_by_query("SELECT * FROM $db_table WHERE t_school = $school_from_user_id and t_active = 0;");
	// 	//$count = mysqli_num_rows($query);
  //
	// 	return ($count > 0) ? $result : false;
	// }
  //
  //
  //
	// public function activated_teacher_list_for_sub($grade, $subject, $user_id) {
	// 	global $database;
	// 	$mm_school_class = new MM_School_Class();
	// 	$mm_subject_class = new MM_Subject_Class();
	// 	$mm_tch_sub_rs_class = new MM_Tch_Sub_Rs_Class();
  //   $db_table = static::$db_table;
	// 	$db_table_two = $mm_tch_sub_rs_class -> wanna_know_pray();
	// 	$db_table_two = $database -> escape_string($db_table_two);
	// 	$sub = $mm_subject_class -> sub_from_grade_and_subject($grade, $subject, $user_id);
	// 	$sub = $database -> escape_string($sub);
  //
	// 	$school_from_user_id = $mm_school_class -> school_from_user_id($user_id);
  //   $school_from_user_id = $database -> escape_string($school_from_user_id);
	// 	//return "SELECT t_user, first_name, last_name, t_pass, t_ssn, t_father, t_id, t_gender, t_school, t_role, t_pno, t_add FROM $db_table WHERE t_school = $school_from_user_id and t_active = 1 AND t_head != 'kyaungoak' AND t_id IN (SELECT ts_tch_id FROM $db_table_two WHERE ts_sub_id = $sub);";
  //
  //   $result = $this -> find_array_by_query("SELECT t_user, first_name, last_name, t_ssn, t_father, t_id, t_gender, t_school, t_role, t_pno, t_add FROM $db_table WHERE t_school = $school_from_user_id AND t_active = 1 AND t_head != 'kyaungoak' AND t_id NOT IN (SELECT ts_tch_id FROM mm_tch_sub_rs WHERE ts_sub_id = $sub);");
	// 	$count = $this -> count_by_query("SELECT t_user, first_name, last_name, t_ssn, t_father, t_id, t_gender, t_school, t_role, t_pno, t_add FROM $db_table WHERE t_school = $school_from_user_id AND t_active = 1 AND t_head != 'kyaungoak' AND t_id NOT IN (SELECT ts_tch_id FROM mm_tch_sub_rs WHERE ts_sub_id = $sub);");
	// 	//$count = mysqli_num_rows($query);
  //
	// 	return ($count > 0) ? $result : false;
	// 	//return $result;
	// }
  //
	// public function activated_teacher_list_for_sub_already($grade, $subject, $user_id) {
	// 	global $database;
	// 	$mm_school_class = new MM_School_Class();
	// 	$mm_subject_class = new MM_Subject_Class();
	// 	$mm_tch_sub_rs_class = new MM_Tch_Sub_Rs_Class();
  //   $db_table = static::$db_table;
	// 	$db_table_two = $mm_tch_sub_rs_class -> wanna_know_pray();
	// 	$db_table_two = $database -> escape_string($db_table_two);
	// 	$sub = $mm_subject_class -> sub_from_grade_and_subject($grade, $subject, $user_id);
	// 	$sub = $database -> escape_string($sub);
  //
	// 	$school_from_user_id = $mm_school_class -> school_from_user_id($user_id);
  //   $school_from_user_id = $database -> escape_string($school_from_user_id);
	// 	//return "SELECT t_user, first_name, last_name, t_pass, t_ssn, t_father, t_id, t_gender, t_school, t_role, t_pno, t_add FROM $db_table WHERE t_school = $school_from_user_id and t_active = 1 AND t_head != 'kyaungoak' AND t_id IN (SELECT ts_tch_id FROM $db_table_two WHERE ts_sub_id = $sub);";
  //
  //   $result = $this -> find_array_by_query("SELECT t_user, first_name, last_name, t_ssn, t_father, t_id, t_gender, t_school, t_role, t_pno, t_add FROM $db_table WHERE t_school = $school_from_user_id AND t_active = 1 AND t_head != 'kyaungoak' AND t_id IN (SELECT ts_tch_id FROM mm_tch_sub_rs WHERE ts_sub_id = $sub);");
	// 	$count = $this -> count_by_query("SELECT t_user, first_name, last_name, t_ssn, t_father, t_id, t_gender, t_school, t_role, t_pno, t_add FROM $db_table WHERE t_school = $school_from_user_id AND t_active = 1 AND t_head != 'kyaungoak' AND t_id IN (SELECT ts_tch_id FROM mm_tch_sub_rs WHERE ts_sub_id = $sub);");
	// 	//$count = mysqli_num_rows($query);
  //
	// 	return ($count > 0) ? $result : false;
	// 	//return $result;
	// }
  //
	// public function fmly_tch_for_sub_already($grade, $class, $user_id) {
	// 	global $database;
	// 	$mm_school_class = new MM_School_Class();
	// 	$mm_class_class = new MM_Class_Class();
  //   $db_table = static::$db_table;
	// 	$c = $mm_class_class -> c_from_grade_and_class($grade, $class, $user_id);
	// 	$t_id = $mm_class_class -> fmly_of_c_id($c);
  //
	// 	// $school_from_user_id = $mm_school_class -> school_from_user_id($user_id);
  //   // $school_from_user_id = $database -> escape_string($school_from_user_id);
	// 	//return "SELECT t_user, first_name, last_name, t_pass, t_ssn, t_father, t_id, t_gender, t_school, t_role, t_pno, t_add FROM $db_table WHERE t_school = $school_from_user_id and t_active = 1 AND t_head != 'kyaungoak' AND t_id IN (SELECT ts_tch_id FROM $db_table_two WHERE ts_sub_id = $sub);";
  //
  //   $result = $this -> find_array_by_query("SELECT t_user, first_name, last_name, t_ssn, t_father, t_id, t_gender, t_school, t_role, t_pno, t_add FROM $db_table WHERE t_active = 1 AND t_head != 'kyaungoak' AND t_id = $t_id;");
	// 	$count = $this -> count_by_query("SELECT t_user, first_name, last_name, t_ssn, t_father, t_id, t_gender, t_school, t_role, t_pno, t_add FROM $db_table WHERE t_active = 1 AND t_head != 'kyaungoak' AND t_id = $t_id;");
	// 	//$count = mysqli_num_rows($query);
  //
	// 	return ($count > 0) ? $result : false;
	// 	//return $result;
	// }
  //
  //
	// public function staff_list($user_id){
	// global $database;
  //
  //   $db_table = static::$db_table;
  //   $mm_school_class = new MM_School_Class();
  //   $school_from_user_id = $mm_school_class -> school_from_user_id($user_id);
  //   $school_from_user_id = $database -> escape_string($school_from_user_id);
	// 	$result = $this -> find_array_by_query("SELECT t_user, first_name, last_name, t_pass, t_ssn, t_father, t_id, t_gender, t_school, t_role, t_pno, t_add  FROM $db_table WHERE t_manage = 'pyinya' AND t_active = 1 AND t_school = $school_from_user_id;");
	// 	$count = $this -> count_by_query("SELECT * FROM $db_table WHERE t_manage = 'pyinya' AND t_active = 1 AND t_school = $school_from_user_id;");
	// 	return ($count > 0) ? $result : false;
	// }
	// public function is_upper_level($user_id) {
	// 	global $database;
	// 	$db_table = static::$db_table;
	// 	$mm_school_class = new MM_School_Class();
	// 	$school_from_user_id = $mm_school_class -> school_from_user_id($user_id);
	// 	$result = $this -> find_by_query("SELECT * FROM $db_table WHERE t_manage = 'pyinya' AND t_active = 1 AND t_id = $user_id;");
	// 	return $result;
	// }
	// function user_data($user_id) {
	// 	global $database;
	// 	$result = array();
	// 	$user_id = $database -> escape_string($user_id);
	// 	$db_table = static::$db_table;
	// 	$result = $this -> find_by_query("SELECT * FROM $db_table WHERE t_id = $user_id;");
	// 	return $result;
  // $data = array();
  // $user_id = (int)$user_id;
	// $db_table = static::$db_table;
	//
  // $func_num_args = func_num_args();
  // $func_get_args = func_get_args();
	//
  // if ($func_num_args > 1) {
  //   unset($func_get_args[0]);
	//
  //   $fields = '`' . implode('`, `', $func_get_args) . '`';
  //   $data = $this -> find_by_query("SELECT $fields FROM $db_table WHERE t_id = '$user_id';");
	//
  //   return $data;
  // }

	// public function user_id_from_username($username) {
	// 	$result = $this -> find_by_query("SELECT")
	// }
/*	public $upload_errors = array (

		UPLOAD_ERR_OK			=> 'There is no error, the file uploaded with success.',
		UPLOAD_ERR_INI_SIZE 	=> 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
		UPLOAD_ERR_FORM_SIZE 	=> 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
		UPLOAD_ERR_PARTIAL 		=> 'THe uploaded file was only partially uploaded.',
		UPLOAD_ERR_NO_FILE		=> 'No file was uploaded',
		UPLOAD_ERR_NO_TMP_DIR	=> 'Missing a temporary folder',
		UPLOAD_ERR_CANT_WRITE	=> 'Failed to write file to disk.',
		UPLOAD_ERR_EXTENSION	=> 'A PHP extension stopped the file uplaod.'
		);

	public function picture_path() {

		return $this->upload_directory . DS . $this->filename;
	}

	public function set_file($file) {

		if (empty($file) || !$file || !is_array($file)) {

			$this -> errors[] = "There is no uploaded file here.";
			return false;
		} elseif ($file['error'] != 0) {

			$this-> errors[] = $this->upload_error[$file['error']];
			return false;
		} else {

			$this -> filename = basename ($file['name']);
			$this -> tmp_path = $file['tmp_name'];
			$this -> type = $file['type'];
			$this -> size = $file['size'];
			return true;
		}
	}
*/
	// public function is_registered($username, $password) {
	// 	return $this -> find_by_t_username($username, $password);
	// }
	// public function name_from_user_id($user_id){
	// 		global $database;
	// 	  $db_table =static::$db_table;
	// 		$user_id=$database->escape_string($user_id);
	// 		$result =$this ->find_by_query("SELECT t_user FROM $db_table WHERE t_id=$user_id ;");
	// 		return $result['t_user'];
	// 	}
  //
	// 	public function update_teacher_info($user_id,$username,$first_name,$last_name,$gender,$ssn,$father,$birth,$phone,$address){
	// 		global $database;
	// 		$db_table = static::$db_table;
	// 		$user_id =  $database -> escape_string($user_id);
	// 		$username = $database -> escape_string($username);
	// 		$first_name = $database ->escape_string($first_name);
	// 		$last_name = $database ->escape_string($last_name);
	// 		$gender = $database ->escape_string($gender);
	// 		$ssn = $database->escape_string($ssn);
	// 		$father = $database->escape_string($father);
	// 		$birth = $database->escape_string($birth);
	// 		$phone = $database ->escape_string($phone);
	// 		$address = $database->escape_string($address);
	// 		$this -> insert_query("UPDATE $db_table SET t_user='$username' , first_name='$first_name' , last_name='$last_name' , t_gender='$gender', t_ssn='$ssn' , t_father = '$father' , t_birth='$birth' , t_pno='$phone',t_add='$address' WHERE t_id=$user_id;");
	// 	}
  //
	//   public function password_from_user_id($user_id){
	//     global $database;
	//     $db_table = static :: $db_table;
	//     $user_id = $database->escape_string($user_id);
	//     $result = $this ->find_by_query("SELECT t_pass from $db_table WHERE t_id=$user_id ;");
	//     return $result['t_pass'];
	//   }
  //
	//   public function update_password($user_id,$new_password){
	//     global $database;
	//     $db_table = static :: $db_table;
	//     $user_id = $database->escape_string($user_id);
	//     $new_password = md5($new_password);
	//     $new_password=$database->escape_string($new_password);
	//     $this ->insert_query("UPDATE $db_table SET t_pass='$new_password' WHERE t_id=$user_id ;");
	//   }
/*	public function save() {

		if (isset ($this->id)) {

			$this -> update();
		} else {

			if ( !empty($this -> errors)) {
				return false;
			}
			if ( empty($this -> filename) || empty ($this -> tmp_path)) {

				$this -> errors[] = "The file was not available";
				return false;
			}
			$target_path = $this->upload_directory. DS . $this->filename;
			if (file_exists($target_path)) {

				$this->errors[] = "This file was already exists. Please try again!";
				return false;
			}

			if (move_uploaded_file($this->tmp_path, $target_path)) {

				if ($this -> create() ) {

					unset($this-> tmp_path);
					return true;
				}
			} else {

				$this -> errors[] = "The file directory probably does not have permission";
				return false;
			}
		}
	}
	*/

?>
