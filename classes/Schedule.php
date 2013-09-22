<?php 
	/**
	* Schedule class
	*/
	class Schedule {

		private $group;
		private $week = array(1 => array(), 2 => array(), 3 => array(), 4 => array(), 5 => array(), 6 => array());
		
		public function __construct($group) {
			require_once('utils/SQLConfig.php');
			$this->group = $group;
			$this->selectFromSQL();
		}

		private function selectFromSQL() {
			$connect = mysql_connect(SQLConfig::SERVERNAME, SQLConfig::USER, SQLConfig::PASSWORD);
			mysql_select_db(SQLConfig::DATABASE);
			mysql_query("SET names utf8");
			$result = mysql_query("SELECT * FROM `classes` WHERE `group` = {$this->group}");

			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$dayarray = array("pair" => $row['pair'], "name" => $row['name'], "room" => $row['room'], "prep" => $row['prep']);
				array_push($this->week[$row['day']], $dayarray);
			}
		}

		public function getWeekSchedule() {
			return $this->week;
		}

	}
 ?>