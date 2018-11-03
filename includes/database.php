<?php

class Database {

	public $connection;

	function __construct() {

		$this->opendb_connection();
	}

	public function opendb_connection() {

		$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (!$this->connection) {

			die('Connection fail badly.'. $this-> connection -> connect_error);
		}
	}

	public function query($sql) {

		$result = $this -> connection ->query($sql);
        if(!$result) {
			die("Query Fail.".mysqli_error($this->connection));
		}

		$this->confirm_query($result);
		return $result;
	}

	public function confirm_query($result) {
		if(!$result) {
			die("Query Fail.".$this->connection->error);
		}
	}

    // escape variables for security
	public function escape_string($string) {
		return $this -> connection -> real_escape_string($string);
	}

}

	$database = new Database();
	$general = new General();
?>
