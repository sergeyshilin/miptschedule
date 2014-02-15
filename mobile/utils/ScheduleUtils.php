<?php
	/**
	 * Utilities for Mipt Schedule
	 */
	class ScheduleUtils {

		public static $days = array("Понедельник" => 1, "Вторник" => 2, "Среда" => 3, "Четверг" => 4, "Пятница" => 5, 
							"Суббота" => 6, 1 => "Понедельник", 2 => "Вторник", 3 => "Среда", 4 => "Четверг", 
							5 => "Пятница", 6 => "Суббота");
		public static $pairs = array("900-1025" => 1, "1045-1210" => 2, "1220-1345" => 3, "1355-1520" => 4,
							 "1530-1655" => 5, "1705-1830" => 6, "1830-1950" => 7, 1 => "9:00 - 10:25", 2 => "10:45 - 12:10",
							  3 => "12:20 - 13:45", 4 => "13:55 - 15:20", 5 => "15:30 - 16:55", 6 => "17:05 - 18:30", 7 => "18:30 - 19:50");

		/**
		 * Get the number of the day by its name
		 * @param  string $name 	name of the day
		 * @return int 	  $day 		number of the day
		 */
		public static function getDayNumber($name) {
			return self::$days[$name];
		}

		/**
		 * Get number of the pair by its time range
		 * @param  string $time 	time range
		 * @return int    $pair     number of pair
		 */
		public static function getPairNumber($time) {
			return self::$pairs[preg_replace('/\s+/', '', $time)];
		}

		/**
		 * Get day name by its number
		 * @param  int 	  $day 		day of the week
		 * @return string $name   	name of the day
		 */
		public static function getDayName($day) {
			return self::$days[$day];
		}

		/**
		 * get Pair time range by its number
		 * @param  int 	  $pair 	pair number
		 * @return string $time    	time range
		 */
		public static function getPairTime($pair) {
			return self::$pairs[$pair];
		}

	}
?>