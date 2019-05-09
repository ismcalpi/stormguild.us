<?php
	class database {

		protected static $connection;

		private function connect() {
			if(!isset(self::$connection)) {
				$iniPath = $_SERVER['DOCUMENT_ROOT'].'/config/database.ini';
				$config = parse_ini_file($iniPath);
        self::$connection = new mysqli($config['db_address'],$config['uid'],$config['pwd'],$config['dbname']);
			}
			if(self::$connection === false) {
				return false;
			}
			return self::$connection;
		}

		public function sql_select($query) {
			$rows = array();
			$result = $this -> sql_query($query);
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
			$result = $this -> sql_query($query);
			if (!$result) {
				return false;
			}
			$row = $result -> fetch_assoc();
			return $row;
		}

		public function sql_query($query) {
			// Connect to the database
			$connection = $this -> connect();
			// Query the database
			$result = $connection -> query($query);
			return $result;
		}

		public function read_row($query) {
			$row = array();
			$result = $this -> sql_query($query);
			if (!$result) {
				return false;
			}
			$row = $result -> fetch_assoc();
			return $row;
		}

		public function read_select($query) {
			$rows = array();
			$result = $this -> sql_query($query);
			if($result === false) {
				return false;
			}
			while ($row = $result -> fetch_assoc()) {
				$rows[] = $row;
			}
			return $rows;
		}

    public function write_query($query) {
			$result = $this -> sql_query($query);
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
