<?php

class MM_Acdm_Class extends Db_object {

	protected static $db_table = "mmhs_acdm";
	protected static $db_fields = array('acdm_id', 'acdm_years', 'acdm_student', 'acdm_grade', 'acdm_school');

	public $acdm_id;
	public $acdm_years;
	public $acdm_student;
  public $acdm_grade;
  public $acdm_school;

  public function academic_option() {
		global $database;
		$db_table = static::$db_table;
		$result = $this -> find_array_by_query("SELECT * FROM `$db_table` GROUP BY `acdm_years` ORDER BY `acdm_years` DESC;");
		//$count = mysqli_num_rows($query);
		// return ($result > 0) ? true : false;
    return $result;
  }

  public function get_acdmgrade_from_years($years) {
    global $database;
    $db_table = static::$db_table;
    $acdm_years = $database->escape_string($years->acdm_years);
    $result = $this -> find_array_by_query("SELECT * FROM `$db_table` WHERE `acdm_years` = '$acdm_years' GROUP BY `acdm_grade` ORDER BY `acdm_grade` DESC;");
    return $result;
  }
}
