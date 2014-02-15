<?php 
	require_once("/home/snape/projects/mipt-schedule/classes/User.php");
	$user = new User();

	/**
	 * MIPT Schedule class. 
	 */
	class MiptSchedule {

		private $group;
		private $schedule;
		private $week;
		const PAIRNAMELENGTH = 37;
		const HALFPAIRNAMELENGTH = 27;
		
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

				$half = 0;
				$pair = 0;

				for ($j = 0; $j < count($daySchedule); $j++) {
					$class = $daySchedule[$j];

					if($half = 1 && $class["half"] == 1 && $class["pair"] == $pair) {
						$half = 0;
						$this->printSecondHalfOfPair($class);
					} 

					if($class["half"] == 1 && $class["pair"] != $pair) {
						$half = 1;
						$pair = $class["pair"];
						$this->printFirstHalfOfPair($class);
					} 

					if($class["half"] == 0 && $half == 0) {
						$this->printUsuallyPair($class);
					}

				}
				echo "</div>";
				echo "</li>";
			}
			echo "</ul>";
		}

		private function printFirstHalfOfPair($class) {
			$class['name'] = $this->getCuttedName($class['name'], self::HALFPAIRNAMELENGTH);
			echo "<div class=\"pair\">";
			echo "<div class=\"pairtime halftime\" style=\"border-bottom:none !important\">"; 
			echo ScheduleUtils::getPairTime($class["pair"]); 
			echo "</div>";
			echo "<div class=\"pairname half\" style=\"background-color: " . $class["color"] . " !important\">".$class["name"]."</div>";
			echo "</div>";
		}

		private function printSecondHalfOfPair($class) {
			$class['name'] = $this->getCuttedName($class['name'], self::HALFPAIRNAMELENGTH);
			echo "<div class=\"pair\">";
			echo "<div class=\"pairtime sechalftime\"></div>";
			echo "<div class=\"pairname half\" style=\"background-color: " . $class["color"] . " !important\">".$class["name"]."</div>";
			echo "</div>";
		}

		private function printUsuallyPair($class) {
			$class['name'] = $this->getCuttedName($class['name'], self::PAIRNAMELENGTH);
			echo "<div class=\"pair\">";
			echo "<div class=\"pairtime\">" . ScheduleUtils::getPairTime($class["pair"]) . "</div>";
			echo "<div class=\"pairname\" style=\"background-color: " . $class["color"] . " !important\">".$class["name"]."</div>";
			echo "</div>";
		}

		private function getCuttedName($name, $size) {
			if(mb_strlen($name, 'UTF-8') > $size)
				$name = mb_substr($name, 0, mb_strrpos(mb_substr($name, 0, $size,'utf-8'),' ','utf-8'),'utf-8')."<a href='#' title='".$name."' class='tooltip-right'>...</a>";
			return $name;
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