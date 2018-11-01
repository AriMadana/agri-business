<?php

include '../../init.php';
header("content-type:application/json");

$postdata = file_get_contents("php://input");
$stuReqInfo = json_decode($postdata);

$students = $mm_stu_list_and_acdm_class -> stu_list($stuReqInfo);
//$teachers = $mm_teacher_class -> activated_teacher_list_for_sub($grade, $subject, $user_id);
echo json_encode($students);
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
