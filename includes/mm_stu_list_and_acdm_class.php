<?php

class MM_Stu_list_And_Acdm_Class extends Db_object {

	protected static $db_table_one = "mmhs_stu_list";
  protected static $db_table_two = "mmhs_acdm";
  protected static $db_fields = array('stu_id', 'stu_name', 'stu_father', 'stu_birth', 'stu_phone', 'stu_address', 'acdm_id');

  public $stu_id;
	public $stu_name;
	public $stu_father;
  public $stu_birth;
  public $stu_phone;
	public $stu_address;
  public $acdm_id;


  public function add_one_stu($student) {
    global $database;
    $db_table_one = static::$db_table_one;
    $db_table_two = static::$db_table_two;
    $stu_name = $database->escape_string($student->stu_name);
    $stu_father = $database->escape_string($student->stu_father);
    $stu_birth = $database->escape_string($student->stu_birth);
    $stu_phone = $database->escape_string($student->stu_phone);
    $stu_address = $database->escape_string($student->stu_address);
    $acdm_years = $database->escape_string($student->acdm_years);
    $acdm_grade = $database->escape_string($student->acdm_grade);
    $acdm_school = $database->escape_string($_SESSION['school_id']);

    $this -> insert_query("INSERT INTO `$db_table_one` (`stu_name`, `stu_father`, `stu_birth`, `stu_phone`, `stu_address`) VALUES ('$stu_name', '$stu_father', '$stu_birth', '$stu_phone', '$stu_address');");
    $result = $this -> find_by_query("SELECT `stu_id` FROM `$db_table_one` WHERE `stu_name` = '$stu_name' AND `stu_father` = '$stu_father';");
    $stu_id = $database->escape_string($result['stu_id']);

    $this -> insert_query("INSERT INTO `$db_table_two` (`acdm_years`, `acdm_student`, `acdm_grade`, `acdm_school`) VALUES ('$acdm_years', $stu_id, '$acdm_grade', $acdm_school);");


    $result = $this -> find_by_query("SELECT s.stu_id, a.acdm_id, a.acdm_years, a.acdm_grade
      FROM `$db_table_one` s, `$db_table_two` a WHERE s.stu_id = a.acdm_student AND s.stu_name = '$stu_name' AND s.stu_father = '$stu_father' AND a.acdm_years = '$acdm_years'
      AND a.acdm_grade = '$acdm_grade' AND a.acdm_school = $acdm_school;");
    return $result;
  }

  public function update_stu($student) {
    global $database;
    $db_table_one = static::$db_table_one;
    $db_table_two = static::$db_table_two;
    $stu_name = $database->escape_string($student->stu_name);
    $stu_father = $database->escape_string($student->stu_father);
    $stu_birth = $database->escape_string($student->stu_birth);
    $stu_phone = $database->escape_string($student->stu_phone);
    $stu_address = $database->escape_string($student->stu_address);
    $acdm_years = $database->escape_string($student->acdm_years);
    $acdm_grade = $database->escape_string($student->acdm_grade);
    $acdm_id = $database->escape_string($student->acdm_id);

    $result = $this -> insert_query("UPDATE `$db_table_one` s, `$db_table_two` a SET s.stu_name = '$stu_name', s.stu_father = '$stu_father', s.stu_birth = '$stu_birth', s.stu_phone = '$stu_phone', s.stu_address = '$stu_address', a.acdm_years = '$acdm_years', a.acdm_grade = '$acdm_grade' WHERE s.stu_id = a.acdm_student AND a.acdm_id = $acdm_id;");
    return ($result == true) ? 'gotcha' : 'error';
  }

  public function stu_list($stuReqInfo) {
		global $database;
		$db_table_one = static::$db_table_one;
    $db_table_two = static::$db_table_two;
    $acdm_years = $database->escape_string($stuReqInfo->acdm_years);
    $acdm_grade = $database->escape_string($stuReqInfo->acdm_grade);
    //$acdm_school = $database->escape_string($stuReqInfo->acdm_school);
    $acdm_school = $database->escape_string($_SESSION['school_id']);

    if($acdm_grade == '') {
      $result = $this -> find_array_by_query("SELECT s.*,a.acdm_id FROM `$db_table_one` s, `$db_table_two` a WHERE s.stu_id = a.acdm_student AND a.acdm_years = '$acdm_years' AND a.acdm_school = '$acdm_school' ORDER BY s.stu_name DESC;");
    } else {
      $result = $this -> find_array_by_query("SELECT s.*,a.acdm_id FROM `$db_table_one` s, `$db_table_two` a WHERE s.stu_id = a.acdm_student AND a.acdm_years = '$acdm_years' AND a.acdm_grade = '$acdm_grade' AND a.acdm_school = '$acdm_school' ORDER BY s.stu_name DESC;");
    }
		//$count = mysqli_num_rows($query);
		// return ($result > 0) ? true : false;
    return $result;
  }

  public function del_stu_acdm($acdm_id) {
    global $database;
    $db_table_two = static::$db_table_two;
    $acdm_id = $database->escape_string($acdm_id->acdm_id);
    $result = $this -> insert_query("DELETE FROM `$db_table_two` WHERE `acdm_id` = $acdm_id;");
    if($result) {
      return "gotcha";
    } else {
      return "error";
    }
  }

  public function del_stus_acdm($acdm_ids) {
    global $database;
    $db_table_two = static::$db_table_two;
    $result = $this -> insert_query("DELETE FROM `$db_table_two` WHERE `acdm_id` IN (" . implode(", ", $acdm_ids) . ");");
    if($result) {
      return "gotcha";
    } else {
      return "error";
    }
  }
}
