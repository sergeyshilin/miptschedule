<?php
	/**
	 * Utilities for Mipt Schedule
	 */
	class ScheduleUtils {

		public static $days = array("Понедельник" => 1, "Вторник" => 2, "Среда" => 3, "Четверг" => 4, "Пятница" => 5, 
							"Суббота" => 6);
		public static $pairs = array("900-1025" => 1, "1045-1210" => 2, "1220-1345" => 3, "1355-1520" => 4,
							 "1530-1655" => 5, "1705-1830" => 6, "1830-1950" => 7);

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
	}
?>