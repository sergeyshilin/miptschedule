<?php
	header('Content-type:text/html; charset=utf-8');
	require_once('SQLConfig.php');
	$connect = mysql_connect(SQLConfig::SERVERNAME, SQLConfig::USER, SQLConfig::PASSWORD);
	mysql_select_db(SQLConfig::DATABASE);
	mysql_query("SET names utf8");
	$result = mysql_query("SELECT * FROM `groups`");
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$group = $row['number'];
		$id = $row['id'];
		if (preg_match('/^\d{3}$/', $group)) {
			$faculty = substr($group, 1,1);
		} else {
			$faculty = substr($group, 1,2);
		}
		$result2 = mysql_query("UPDATE `groups` SET `faculty` = '{$faculty}' WHERE `id` = '{$id}'");
		if($result2) {
			echo "ok";
		} else {
			echo $faculty."</br>";
			echo $group."</br>";
			echo $day."</br>";
			echo $pair."</br>";
			echo $name."</br>";
			die('Не обновиться: ' . mysql_error());
		}
	}
?>