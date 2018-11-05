<?php

class Database {

	public $connection;
    /*private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;*/

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

    /*public function query_by_array($sql, array $params) {
        $this->_error = false;
        echo "succ";

        if($this->_query = $this->connection->query($sql)) {
            echo "success";
            $x = 1;
            if(count($params)) {
                foreach($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }

            if($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);

                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }*/

    /*public function error() {
        return $this->_error;
    }*/

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
