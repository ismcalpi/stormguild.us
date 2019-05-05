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

		public function readResults($query) {
            $rows = array();
			$connection = $this -> connect();
            $result = $connection -> query($query);
			if($result === false) {
                return $connection -> error;
			}
			while ($row = $result -> fetch_assoc()) {
				$rows[] = $row;
			}
			return $rows;
		}

    public function readRow($query) {
        $connection = $this -> connect();
        $result = $connection -> query($query);
        if (!$result) {
            return $connection -> error;
        }
        $row = $result -> fetch_assoc();
        return $row;
    }

    public function writeQuery($query) {
        $connection = $this -> connect();
        $result = $connection -> query($query);
        if($result === false) {
            return $connection -> error;
        }
        return $connection -> sqlstate;
    }

		public function quote($value) {
			$connection = $this -> connect();
			return "'" . $connection -> real_escape_string($value) . "'";
		}
	}

?>
