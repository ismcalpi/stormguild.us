<?php
	class database {

		protected static $connection;

		/**
		 * Connect to the database
		 *
		 * @return bool false on failure / mysqli MySQLi object instance on success
		 */
		private function connect($type="read") {
			// Try and connect to the database
			if(!isset(self::$connection)) {
				// Load configuration as an array. Use the actual location of your configuration file
				$config = parse_ini_file('config/database.ini');
        if($type="read") {
          self::$connection = new mysqli('localhost',$config['read_uid'],$config['read_pwd'],$config['dbname']);
        } else if($type="write") {
          self::$connection = new mysqli('localhost',$config['write_uid'],$config['write_pwd'],$config['dbname']);
        } else {
          return false;
        }
			}
			// If connection was not successful, handle the error
			if(self::$connection === false) {
				// Handle error - notify administrator, log to a file, show an error screen, etc.
				return false;
			}
			return self::$connection;
		}

		/**
		 * Query the database
		 *
		 * @param $query The query string
		 * @return mixed The result of the mysqli::query() function
		 */
		private function query($query,$type="read") {
			// Connect to the database
			$connection = $this -> connect($type);

			// Query the database
			$result = $connection -> query($query);

			return $result;
		}

		/**
		 * Query the database
		 *
		 * @param $query The query string
		 * @return mixed The result of the mysqli::query() function
		 */
		public function read_row($query) {
			$row = array();
			$result = $this -> query($query);
			if (!$result) {
				return false;
			}
			$row = $result -> fetch_assoc();
			return $row;
		}

		/**
		 * Fetch rows from the database (SELECT query)
		 *
		 * @param $query The query string
		 * @return bool False on failure / array Database rows on success
		 */
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
			$result = $this -> query($query,"write");
			return $result;
		}

		/**
		 * Fetch the last error from the database
		 *
		 * @return string Database error message
		 */
		public function error() {
			$connection = $this -> connect();
			return $connection -> error;
		}

		/**
		 * Quote and escape value for use in a database query
		 *
		 * @param string $value The value to be quoted and escaped
		 * @return string The quoted and escaped string
		 */
		public function quote($value) {
			$connection = $this -> connect();
			return "'" . $connection -> real_escape_string($value) . "'";
		}
	}

?>
