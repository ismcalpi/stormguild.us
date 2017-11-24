<?php
	class database {

		protected static $connection;

		private function connect() {
			if(!isset(self::$connection)) {
				$config = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/config/database.ini');
        self::$connection = new mysqli('localhost',$config['write_uid'],$config['write_pwd'],$config['dbname']);
			}
			if(self::$connection === false) { return false; }
			return self::$connection;
		}

		public function sql_query($query) {
			$rows = array();
			$result = $this -> query($query);
			if($result === false) {
				return false;
			}
			while ($row = $result -> fetch_assoc()) {
				$rows[] = $row;
			}
			return $rows;
		}

		public function sql_fetchrow($query) {
			$row = array();
			$result = $this -> query($query);
			if (!$result) {
				return false;
			}
			$row = $result -> fetch_assoc();
			return $row;
		}

		private function query($query) {
			// Connect to the database
			$connection = $this -> connect();
			// Query the database
			$result = $connection -> query($query);
			return $result;
		}

		public function read_row($query) {
			$row = array();
			$result = $this -> query($query);
			if (!$result) {
				return false;
			}
			$row = $result -> fetch_assoc();
			return $row;
		}

		public function read_select($query) {
			$rows = array();
			$result = $this -> query($query);
			if($result === false) {
				return false;
			}
			while ($row = $result -> fetch_assoc()) {
				$rows[] = $row;
			}
			return $rows;
		}

    public function write_query($query) {
			$result = $this -> query($query);
			return $result;
		}

		public function error() {
			$connection = $this -> connect();
			return $connection -> error;
		}

		public function quote($value) {
			$connection = $this -> connect();
			return "'" . $connection -> real_escape_string($value) . "'";
		}
	}

?>
