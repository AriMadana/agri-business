<?php
//   include 'init.php';
//
//   if (isset($_POST['activate_teacher'])) {
//     if(empty($_POST['deactivated_teacher_list']) ==  false) {
//       if($mm_teacher_class -> is_head($session_user_id) || $mm_teacher_class -> is_upper_level($session_user_id)) {
//         $teachers = $_POST['deactivated_teacher_list'];
//        $mm_teacher_class -> teacher_activate($teachers);
//        header('Location: ../widgets/learning_management.php');
//       }
//     }else {
//       header('Location: ../widgets/learning_management.php');
//     }
//
//   } else if (isset($_POST['delete_teacher'])) {
//     if(empty($_POST['deactivated_teacher_list']) == false) {
//       if($mm_teacher_class -> is_head($session_user_id) || $mm_teacher_class -> is_upper_level($session_user_id)) {
//         $teachers = $_POST['deactivated_teacher_list'];
//        $mm_teacher_class -> teacher_delete($teachers);
//        header('Location: ../widgets/learning_management.php');
//       }
//     }else {
//       header('Location: ../widgets/learning_management.php');
//     }
//
//   } else if (isset($_POST['deactivate'])) {
//     if(empty($_POST['activated_teacher_list']) == false) {
//       if($mm_teacher_class -> is_head($session_user_id) || $mm_teacher_class -> is_upper_level($session_user_id)) {
//         $teachers = $_POST['activated_teacher_list'];
//        $mm_teacher_class -> teacher_deactivate($teachers);
//        header('Location: ../widgets/learning_management.php');
//       }
//     }else {
//       header('Location: ../widgets/learning_management.php');
//     }
//   }
//
//
//
//   if (isset($_POST['activate_student'])) {
//     if(empty($_POST['deactivated_student_list']) ==  false) {
//         $students = $_POST['deactivated_student_list'];
//        $mm_student_class -> student_activate($students);
//        header('Location: ../widgets/learning_management.php');
//     } else {
//       header('Location: ../widgets/learning_management.php');
//     }
//   } else if (isset($_POST['delete_student'])) {
//     if(empty($_POST['deactivated_student_list']) == false) {
//         $students = $_POST['deactivated_student_list'];
//        $mm_student_class -> student_delete($students);
//        header('Location: ../widgets/learning_management.php');
//     }else {
//       header('Location: ../widgets/learning_management.php');
//     }
//   }else if (isset($_POST['deactivate_student'])) {
//     if(empty($_POST['activated_student_list']) == false) {
//         $students = $_POST['activated_student_list'];
//        $mm_student_class -> student_deactivate($students);
//        header('Location: ../widgets/learning_management.php');
//     }else {
//       header('Location: ../widgets/learning_management.php');
//     }
//   }
//
//
//
//
//   if (isset($_POST['delete_staff'])) {
//     if(empty($_POST['staff_list']) == false) {
//       if($mm_teacher_class -> is_head($session_user_id) || $mm_teacher_class -> is_upper_level($session_user_id)) {
//       $teachers = $_POST['staff_list'];
//       $mm_teacher_class -> staff_delete($teachers);
//       header('Location: ../widgets/learning_management.php');
//     }
//   }else {
//   header('location: ../widgets/learning_management.php');
// }
// }
// if (isset($_POST['add_staff'])) {
//   if(empty($_POST['activated_teacher_list']) ==  false) {
//     if($mm_teacher_class -> is_head($session_user_id) || $mm_teacher_class -> is_upper_level($session_user_id)) {
//     $teachers = $_POST['activated_teacher_list'];
//     $mm_teacher_class -> staff_add($teachers);
//     header('Location: ../widgets/learning_management.php');
//   }
// }else {
//   header('location: ../widgets/learning_management.php');
// }
// }
//
// if(isset($_POST['delete_registered_teacher'])){
//   if(empty($_POST['registered_teacher_list']) == false){
//     if($mm_teacher_class->is_head($session_user_id) || $mm_teacher_class -> is_upper_level($session_user_id)) {
//       $teachers = $_POST['registered_teacher_list'];
//       $mm_manage_teacher_reg_class -> delete_teachers($teachers);
//       header('Location: ../school_teacher_registeration.php');
//
//     }
//     else {
//         header('Location: ../school_teacher_registeration.php');
//     }
//   } else {
//       header('Location: ../school_teacher_registeration.php');
//   }
// }
//
//
// if(isset($_POST['delete_registered_teacher'])){
//   if(empty($_POST['registered_teacher_list']) == false){
//     if($mm_teacher_class->is_head($session_user_id) || $mm_teacher_class -> is_upper_level($session_user_id)) {
//       $teachers = $_POST['registered_teacher_list'];
//       $mm_manage_teacher_reg_class -> delete_teachers($teachers);
//       header('Location: ../school_teacher_registeration.php');
//
//     }
//     else {
//         header('Location: ../school_teacher_registeration.php');
//     }
//   } else {
//       header('Location: ../school_teacher_registeration.php');
//   }
// }
//
//
// if(isset($_POST['delete_registered_student'])){
//   if(empty($_POST['registered_student_list']) == false){
//     if($mm_teacher_class->is_head($session_user_id) || $mm_teacher_class -> is_upper_level($session_user_id)) {
//       $students = $_POST['registered_student_list'];
//       $mm_manage_student_reg_class -> delete_students($students);
//       header('Location: ../school_student_registeration.php');
//
//     }
//     else {
//         header('Location: ../school_student_registeration.php');
//     }
//   } else {
//       header('Location: ../school_student_registeration.php');
//   }
// }





?>
