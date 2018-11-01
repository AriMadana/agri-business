<?php

include '../../init.php';
header("content-type:application/json");

$postdata = file_get_contents("php://input");
$acdm_ids = json_decode($postdata);

$stu_id = $mm_stu_list_and_acdm_class -> del_stus_acdm($acdm_ids);
//$teachers = $mm_teacher_class -> activated_teacher_list_for_sub($grade, $subject, $user_id);
echo json_encode($stu_id);
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
