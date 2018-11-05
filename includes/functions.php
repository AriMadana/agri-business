<?php

spl_autoload_register(function ($class) {

	$class = strtolower($class);
	$path = $class . '.php';
	if (is_file($class) || !class_exists($class)) {
		require_once ($path);
	}
});

function object_to_array($data){
	if(is_array($data) || is_object($data)){
		$result = array();
		foreach ($data as $key => $value) {
			$result[$key] = object_to_array($value);
		}
		return $result;
	}
	return $data;
}

function is_valid_chapno($chap_num){
	$chap_num = strtoupper($chap_num);

    //strpos->finds the position of the first occurrence of a string inside another string.
	if(strpos($chap_num, 'CHAPTER-') === 0){
		return true;
	}
	else return false;
}

function is_valid_grade($grade){
	$grade = strtoupper($grade);
	if (strpos($grade, 'GRADE-') === 0){
		return true;
	}
	else return false;
}

//must have at least an uppercase letter->?
function is_valid_pwd($password){
	$result = false;
	$i = 0;
	while($result == false && $i < strlen($password)){
		if(ctype_upper($password{$i})){
			$result = true;
		}
		$i++;
	}
	return $result;
}

function is_valid_phone($phone){
	$result = false;
	$str_length = strlen($phone);
	if($str_length > 6 && $str_length < 12){
		if(is_numeric($phone))
		{
			$result = true;
		}

	}
	return $result;
}

function redirect($path) {
	header ("Location: " . $path);
}

function redirectSelf($path, $error) {
	header ("Location: " . $path . "?error=" . $error);
}

function array_sanitize(&$item){
	$item = mysqli_real_escape_string(mysqli_connect('50.62.209.114:3306', '7hunder_3irds', '7hunder_3irdS', 'mm_stage_school'), $item);
	//$item = mysqli_real_escape_string(mysqli_connect('localhost', 'root', '', 'users'), $item);
}
?>
