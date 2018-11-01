<?php

class MM_Stu_List_Class extends Db_object {

	protected static $db_table = "mmhs_stu_list";
	protected static $db_fields = array('stu_id', 'stu_name', 'stu_father', 'stu_birth', 'stu_phone', 'stu_address');

	public $stu_id;
	public $stu_name;
	public $stu_father;
  public $stu_birth;
  public $stu_phone;
	public $stu_address;

  public function add_one_stu($student) {
    global $database;
    $db_table = static::$db_table;
    $stu_name = $database->escape_string($student->stu_name);
    $stu_father = $database->escape_string($student->stu_father);
    $result = $this -> insert_query("INSERT INTO `$db_table` (`stu_name`, `stu_father`) VALUES ('$stu_name', '$stu_father');");
    $result = $this -> find_by_query("SELECT `stu_id` FROM `$db_table` WHERE `stu_name` = '$stu_name' AND `stu_father` = '$stu_father';");
    return $result['stu_id'];
  }
}
