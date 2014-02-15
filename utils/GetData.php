<?php 
	if(isset($_POST) && !empty($_POST['group'])) {
		require_once('/home/snape/projects/mipt-schedule/classes/MiptSchedule.php');
		$schedule = new MiptSchedule($_POST['group']);
		$schedule->printWeekSchedule();
	}
?>