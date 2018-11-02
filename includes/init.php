<?php
session_start();
//defined('DS') ? null : define('DS' , DIRECTORY_SEPARATOR);
//$site_path = $_SERVER['SCRIPT_NAME'];
//define ('PRJ_NAME', explode("/", $site_path)[3]);

//define('SITE_ROOT', PRJ_NAME);

//defined('INCLUDE_PATH') ? null : define('INCLUDE_PATH', SITE_ROOT . DS . 'includes');

require_once('new_config.php');
require_once('functions.php');
require_once('database.php');

$mm_admin_class = new MM_Admin_Class();
// $mm_teacher_class = new MM_Teacher_Class();
// $mm_student_class = new MM_Student_Class();
// $mm_grade_class = new MM_Grade_Class();
// $mm_school_class = new MM_School_Class();
// $mm_subject_class = new MM_Subject_Class();
// $mm_chapter_class = new MM_CHAPTER_CLASS();
// $mm_lecture_class = new MM_Lecture_Class();
// $mm_manage_student_reg_class = new MM_Manage_Student_Reg_Class();
// $mm_manage_teacher_reg_class = new MM_Manage_Teacher_Reg_Class();
// $mm_class_class = new MM_Class_Class();
// $mm_tch_sub_rs_class = new MM_Tch_Sub_Rs_Class();
// $school_info_id;
// if ($mm_teacher_class -> logged_in() == true) {
//   $session_user_id = $_SESSION['teacher_id_custom'];
//   $t_data = $mm_teacher_class -> user_data($session_user_id);
//   if($mm_teacher_class -> user_active($t_data['t_user']) == false) {
//     session_destroy();
//     header('Location: index.php');
//     exit();
//   }
//   $school_info_id = $mm_school_class -> school_from_user_id($session_user_id);
// } else if ($mm_student_class -> logged_in() == true) {
//   $session_user_id = $_SESSION['stu_id_custom'];
//   $t_data = $mm_student_class -> user_data($session_user_id);
//   if($mm_student_class -> user_active($t_data['s_username']) == false) {
//     session_destroy();
//     header('Location: index.php');
//     exit();
//   }
//   $school_info_id = $mm_school_class -> school_from_user_id_student($session_user_id);
// }
// $errors = array();
?>
