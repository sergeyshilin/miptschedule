<?php 
	/**
	* MIPT Schedule class. 
	*/
	class MiptSchedule {

		private $group;
		private $schedule;
		private $week;
		
		public function __construct($group) {
			require_once('/home/snape/projects/mipt-schedule/classes/Schedule.php');
			require_once('/home/snape/projects/mipt-schedule/utils/ScheduleUtils.php');

			$this->group = $group;
			$this->schedule = new Schedule($this->group);
			$this->week = $this->schedule->getWeekSchedule();
		}

		public function getWeekSchedule() {
			return $this->week;
		}

		public function printWeekSchedule() {
			echo "<ul class=\"schedule-row\">";
			for ($i = 0; $i < count($this->week); $i++) { 
				$day = $i + 1;

				if($day == 4) {
					echo "</ul>";
					echo "<ul class=\"schedule-row\">";
				}

				$daySchedule = $this->week[$day];
				echo "<li id=\"{$day}\">";
				echo "<div class=\"day\">";
				echo "<div class=\"dayname\">".ScheduleUtils::getDayName($day)."</div>";
				for ($j = 0; $j < count($daySchedule); $j++) { 
					$class = $daySchedule[$j];
					echo "<div class=\"pair\">";
					echo "<div class=\"pairtime\">".ScheduleUtils::getPairTime($class["pair"])."</div>";
					echo "<div class=\"pairname\">".$class["name"]."</div>";
					echo "</div>";
				}
				echo "</div>";
				echo "</li>";
			}
			echo "</ul>";
		}

		// public function printScheduleForDay($day) {
		// 	echo "<li class=\"day\">";
		// 	echo "<div>";
		// 	echo "<div class=\"dayname\">";
		// 	echo ScheduleUtils::getDayName($day);
		// 	echo "</div>";
		// 	$daySchedule = $this->week[$day];
		// 	for ($i = 0; $i < count($daySchedule); $i++) { 
		// 		$class = $daySchedule[$i];
		// 		echo "<div class=\"pair\">";
		// 		echo "<div class=\"pairtime\">".ScheduleUtils::getPairTime($class["pair"])."</div>";
		// 		echo "\t" . $class["name"] . "</br>";
		// 		echo "</div>";
		// 	}
		// 	echo "</div>";
		// 	echo "</li>";
		// }
	}
?>