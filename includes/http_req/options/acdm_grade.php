<?php

include '../../init.php';
header("content-type:application/json");

$postdata = file_get_contents("php://input");
$years = json_decode($postdata);

$result = $mm_acdm_class -> get_acdmgrade_from_years($years);
//$teachers = $mm_teacher_class -> activated_teacher_list_for_sub($grade, $subject, $user_id);
echo json_encode($result);
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
