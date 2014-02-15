<?php 
	if(isset($_POST['faculty']) && isset($_POST['course'])) {
		
		$groups = array();
		$faculty = $_POST['faculty'];
		$course = $_POST['course'];
		require_once("SQLConfig.php");

		$connect = mysql_connect(SQLConfig::SERVERNAME, SQLConfig::USER, SQLConfig::PASSWORD);
		mysql_select_db(SQLConfig::DATABASE);
		mysql_query("SET names utf8");
		$result = mysql_query("SELECT * FROM `groups` WHERE `faculty` = '{$faculty}' AND `course` = '{$course}'");
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$number = $row['number'];
			array_push($groups, $number);
		}

		print_r(implode(",", $groups));
	} else {
		echo ("BAD!");
	}
 ?>