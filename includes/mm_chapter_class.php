<?php

// class MM_CHAPTER_CLASS extends Db_object{
//   protected static $db_table = 'mm_chapter';
//   protected static $db_fields = array('chap_id','chap_no','chap_title','chap_des');
//   public $chap_id,$chap_no,$chap_title,$chap_des;
//
//       public function chap_id_from_gd_sub_chap_no($grade, $subject, $chap_no, $school_info_id) {
//         global $database;
//         $db_table = static::$db_table;
//         $mm_grade_class = new MM_Grade_Class();
//         $mm_subject_class = new MM_Subject_Class();
//         $chap_no = $database -> escape_string($chap_no);
//
//         $grade_from_gdname_and_schoolid = $mm_grade_class -> grade_from_gdname_and_schoolid($grade, $school_info_id);
//
//         $subject_from_subname_and_gdid = $mm_subject_class -> subject_from_subname_and_gdid($subject, $grade_from_gdname_and_schoolid);
//         $subject_from_subname_and_gdid = $database -> escape_string($subject_from_subname_and_gdid);
//         $result = $this -> find_by_query("SELECT chap_id FROM $db_table WHERE chap_sub = $subject_from_subname_and_gdid AND chap_no = '$chap_no';");
//         $count = $this -> count_by_query("SELECT * FROM $db_table WHERE chap_sub = $subject_from_subname_and_gdid AND chap_no = '$chap_no';");
//         return ($count > 0) ? $result['chap_id'] : false;
//       }
//       public function chapter_detail_from_chapnum_grade_subject_userid($chap_number, $grade, $subject, $school_info_id){
//         global $database;
//
//         $db_table = static::$db_table;
//
//         $mm_grade_class = new MM_Grade_Class();
//         $grade_from_gdname_and_schoolid = $mm_grade_class->grade_from_gdname_and_schoolid($grade, $school_info_id);
//
//         $mm_subject_class = new MM_Subject_Class();
//         $subject_from_subname_and_gdid = $mm_subject_class->subject_from_subname_and_gdid($subject, $grade_from_gdname_and_schoolid);
//
//         $result = $this -> find_array_by_query("SELECT chap_no,chap_title,chap_des FROM $db_table WHERE chap_sub = $subject_from_subname_and_gdid AND chap_no = '$chap_number';");
//         $count = $this -> count_by_query("SELECT * FROM $db_table WHERE chap_sub = $subject_from_subname_and_gdid AND chap_no = '$chap_number';");
//
//         //$count = mysqli_num_rows($query);
//
//         return ($count > 0) ? $result : false;
//
//
//       }
//
//       public function chapter_detail_from_chap_info_id($chap_info_id){
//         global $database;
//
//         $db_table = static::$db_table;
//
//         $result = $this -> find_array_by_query("SELECT chap_id,chap_no,chap_title,chap_des FROM $db_table WHERE chap_id = $chap_info_id;");
//         $count = $this -> count_by_query("SELECT * FROM $db_table WHERE chap_id = $chap_info_id;");
//
//         //$count = mysqli_num_rows($query);
//
//         return ($count > 0) ? $result : false;
//
//
//       }
//
//       public function file_name_from_chap_info($chap_info_id) {
//         $db_table = static::$db_table;
//         $result = $this -> find_by_query("SELECT chap_des FROM $db_table WHERE chap_id = $chap_info_id;");
//         $count = $this -> count_by_query("SELECT chap_id FROM $db_table WHERE chap_id = $chap_info_id;");
//
//         return ($count > 0) ? $result['chap_des'] : false;
//       }
//
//       public function edit_chapter_file($chap_desc_file, $chap_desc_new) {
//         $data_to_write = $chap_desc_new;
//         $file_path = "prapite/" . $chap_desc_file . '.txt';
//
//         $file_handle = fopen($file_path, 'w');
//         $rwresult = fwrite($file_handle, $data_to_write);
//         fclose($file_handle);
//         return true;
//       }
//
//       public function chapter_update($chap_info_id, $chap_num_new, $chap_title_new, $subject_info) {
//         global $database;
//         $db_table = static::$db_table;
//         $chap_num_new = $database -> escape_string($chap_num_new);
//         $chap_title_new = $database -> escape_string($chap_title_new);
//         if ($this -> count_by_query("SELECT * FROM $db_table WHERE chap_no = '$chap_num_new' AND chap_sub = $subject_info AND chap_id != $chap_info_id;") > 0) {
//           return 'already';
//         } else {
//           $result = $this -> insert_query("UPDATE $db_table SET `chap_no`= '$chap_num_new',`chap_title`='$chap_title_new' WHERE chap_id = $chap_info_id;");
//           return $result;
//         }
//       }
//
//
//       public function chap_list_from_userid_grade_and_sub($school_info_id, $grade, $subject){
//         global $database;
//         $db_table = static::$db_table;
//
//         $mm_grade_class = new MM_Grade_Class();
//         $grade_from_gdname_and_schoolid = $mm_grade_class->grade_from_gdname_and_schoolid($grade, $school_info_id);
//
//
//         $mm_subject_class = new MM_Subject_Class();
//         $subject_from_subname_and_gdid = $mm_subject_class->subject_from_subname_and_gdid($subject, $grade_from_gdname_and_schoolid);
//
//
//         $result = $this -> find_array_by_query("SELECT chap_id,chap_no FROM $db_table WHERE chap_sub = $subject_from_subname_and_gdid;");
//         $count = $this -> count_by_query("SELECT * FROM $db_table WHERE chap_sub = $subject_from_subname_and_gdid;");
//
//         //$count = mysqli_num_rows($query);
//
//         return ($count > 0) ? $result : false;
//       }
//
//
//       public function insert_chapter($chap_num,$chap_title,$desc,$grade,$subject,$school){
//             global $database;
//             $db_table = static::$db_table;
//
//             $desc_name = $this->prapite_desc_creation($chap_num,$desc,$grade,$subject,$school);
//
//             $mm_school_class = new MM_School_Class();
//             $sc_id_from_sc_name = $mm_school_class -> sc_id_from_sc_name($school);
//
//             $mm_grade_class = new MM_Grade_Class();
//             $grade_from_gdname_and_schoolid = $mm_grade_class->grade_from_gdname_and_schoolid($grade, $sc_id_from_sc_name);
//
//             $mm_subject_class = new MM_Subject_Class();
//             $subject_from_subname_and_gdid = $mm_subject_class->subject_from_subname_and_gdid($subject,$grade_from_gdname_and_schoolid );
//
//             $chap_num = strtoupper($chap_num);
//
//             $chap_num = $database->escape_string($chap_num);
//             $chap_title = $database->escape_string($chap_title);
//             $desc_name = $database->escape_string($desc_name);
//
//             $this -> insert_query("INSERT INTO $db_table (`chap_no`,`chap_title`,`chap_des`,`chap_sub`) values ('$chap_num','$chap_title','$desc_name','$subject_from_subname_and_gdid')");
//
//       }
//
//     public function chapter_exists($chap_num, $subject , $grade , $school){
//       global $database;
//
//       $db_table = static::$db_table;
//
//       $mm_school_class = new MM_School_Class();
//       $sc_id_from_sc_name = $mm_school_class -> sc_id_from_sc_name($school);
//       $mm_grade_class = new MM_Grade_Class();
//       $grade_from_gdname_and_schoolid = $mm_grade_class->grade_from_gdname_and_schoolid($grade, $sc_id_from_sc_name);
//
//       $mm_subject_class = new MM_Subject_Class();
//       $subject_from_subname_and_gdid = $mm_subject_class->subject_from_subname_and_gdid($subject,$grade_from_gdname_and_schoolid );
//
//       $chap_num = $database -> escape_string($chap_num);
//       $result = $this->count_by_query("SELECT * FROM $db_table WHERE chap_no = '$chap_num' AND chap_sub = $subject_from_subname_and_gdid ;");
//       return ($result > 0)? true : false;
//     }
//
//     public function delete_chapter($chap_info_id) {
//       global $database;
//       $db_table = static::$db_table;
//
//       $file = $this -> find_by_query("SELECT chap_des FROM $db_table WHERE chap_id = $chap_info_id;");
//       $chap_file = $file['chap_des'];
//
//       $path = 'prapite/' . $chap_file . '.txt';
//       unlink($path);
//       $result = $this -> insert_query("DELETE FROM $db_table WHERE chap_id = $chap_info_id;");
//       return $result;
//     }
//
// }




?>
