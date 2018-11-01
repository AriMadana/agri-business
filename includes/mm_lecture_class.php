<?php

// class MM_Lecture_Class extends Db_object {
//   protected static $db_table = 'mm_lecture';
//   protected static $db_fields = array('lt_id','lt_title','lt_file');
//   public $lt_id;
//   public $lt_title;
//   public $lt_file;
//
//   public function update_lecture($lecture_id, $lecture_file, $lecture_title, $lecture_desc_new) {
//     global $database;
//     $db_table = static::$db_table;
//
//     $lecture_title = $database -> escape_string($lecture_title);
//     $result = $this -> insert_query("UPDATE $db_table SET lt_title = '$lecture_title' WHERE lt_id = $lecture_id;");
//
//     $data_to_write = $lecture_desc_new;
//     $file_path = "prapite/" . $lecture_file . '.txt';
//
//     $file_handle = fopen($file_path, 'w');
//     $rwresult = fwrite($file_handle, $data_to_write);
//     fclose($file_handle);
//     return $result;
//   }
//
//   public function delete_lecture($lecture_id) {
//     global $database;
//     $db_table = static::$db_table;
//
//     $result = $this -> insert_query("DELETE FROM $db_table WHERE lt_id = $lecture_id;");
//     return $result;
//   }
//
//   public function load_lecture_list($chap_no, $subject, $grade, $school_info_id) {
//     global $database;
//     $db_table = static::$db_table;
//     $mm_chapter_class = new MM_CHAPTER_CLASS();
//     $chap_id = $mm_chapter_class -> chap_id_from_gd_sub_chap_no($grade, $subject, $chap_no, $school_info_id);
//     $chap_id = $database -> escape_string($chap_id);
//     $result = $this -> find_array_by_query("SELECT lt_id, lt_title, lt_file FROM $db_table WHERE lt_chap = $chap_id;");
//     $count = $this -> count_by_query("SELECT * FROM $db_table WHERE lt_chap = $chap_id;");
//     return ($count > 0) ? $result : false;
//   }
//
// 	public function upload_lecture($school_info_id, $grade, $subject, $chapter, $lecture, $lecture_desc) {
//     global $database;
//     $db_table = static::$db_table;
//     $mm_chapter_class = new MM_CHAPTER_CLASS();
//
//     $chap_id = $mm_chapter_class -> chap_id_from_gd_sub_chap_no($grade, $subject, $chapter, $school_info_id);
//     $chap_id = $database -> escape_string($chap_id);
//     $prapite_name = $this -> prapite_creation($school_info_id, $grade, $subject, $chapter, $lecture, $lecture_desc);
//     $result = $this -> insert_query("INSERT INTO $db_table (lt_title, lt_file, lt_chap) VALUES ('$lecture', '$prapite_name', '$chap_id')");
//
//     //return 'success';
//     return $result;
// 	}
// }
?>
