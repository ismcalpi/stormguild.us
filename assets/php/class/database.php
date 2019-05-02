<?php
	class database {

		protected static $connection;

		private function connect($type) {
			if(!isset(self::$connection)) {
				$iniPath = $_SERVER['DOCUMENT_ROOT'].'/config/database.ini';
				$config = parse_ini_file($iniPath);
				switch ($type) {
					case 'write':
            self::$connection = new mysqli($config['db_address'],$config['write_uid'],$config['write_pwd'],$config['dbname']);
						break;
					case 'read':
            self::$connection = new mysqli($config['db_address'],$config['read_uid'],$config['read_pwd'],$config['dbname']);
						break;
				}
			}
			if(self::$connection === false) {
				return false;
			}
			return self::$connection;
		}

		public function readResults($query) {
            $rows = array();
			$connection = $this -> connect('read');
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
            $connection = $this -> connect('read');
            $result = $connection -> query($query);
            if (!$result) {
                return $connection -> error;
            }
            $row = $result -> fetch_assoc();
            return $row;
        }

        public function writeQuery($query) {
            $connection = $this -> connect('write');
            $result = $connection -> query($query);
            if($result === false) {
                return $connection -> error;
            }
            return $connection -> sqlstate;
        }

		public function quote($value) {
			$connection = $this -> connect('read');
			return "'" . $connection -> real_escape_string($value) . "'";
		}
	}

?>
