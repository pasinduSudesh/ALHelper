<?php

	class DB {
		
		public $mysqli = NULL;
		public $conf = NULL;
		
		public function __construct() {
			$this->dbConnect(); // Initiate Database connection
		}
		
		/* Connect to Database */
		private function dbConnect() {
			require_once ("../includes/connection.php");
			$this->mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
			$this->mysqli->query('SET CHARACTER SET utf8');
		}
		
		/* Api Checker */
		public function checkResponse_Impl() {
			if (mysqli_ping($this->mysqli)){
				echo "Database Connection : Success";
			}else {
				echo "Database Connection : Error";
			}
		}
		
		/* String mysqli_real_escape_string */
		public function real_escape($s) {
			return mysqli_real_escape_string($this->mysqli, $s);
		}
		
	}
		
?>