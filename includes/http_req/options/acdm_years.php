<?php

include '../../init.php';
header("content-type:application/json");

$academics = $mm_acdm_class -> academic_option();
//$teachers = $mm_teacher_class -> activated_teacher_list_for_sub($grade, $subject, $user_id);
echo json_encode($academics);

//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
