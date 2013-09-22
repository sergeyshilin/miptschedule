<?php 
	/**
	* MIPT Schedule class. 
	*/
	class MiptSchedule {

		private $group;
		private $schedule;
		private $week;
		
		public function __construct($group) {
			require_once('Schedule.php');
			require_once('utils/ScheduleUtils.php');

			$this->group = $group;
			$this->schedule = new Schedule($this->group);
			$this->week = $this->schedule->getWeekSchedule();
		}

		public function getWeekSchedule() {
			return $this->week;
		}

		public function printWeekSchedule() {
			for ($i = 0; $i < count($this->week); $i++) { 
				$this->printScheduleForDay($i + 1);
				echo "</br></br>";
			}
		}

		public function printScheduleForDay($day) {
			echo ScheduleUtils::getDayName($day)."</br>";
			$daySchedule = $this->week[$day];
			for ($i = 0; $i < count($daySchedule); $i++) { 
				$class = $daySchedule[$i];
				echo "1.\t" . ScheduleUtils::getPairTime($class["pair"]);
				echo "\t" . $class["name"] . "</br>";
			}
		}
	}
?>