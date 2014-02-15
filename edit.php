<?php
	require_once("utils/SQLConfig.php");
	session_start();
  
	if($_POST) {
		if(!get_magic_quotes_gpc()) {
			$_POST['name']  = mysql_real_escape_string($_POST['name']);
			$_POST['group'] = mysql_real_escape_string($_POST['group']);
		} else {
			$_POST['name']  = $_POST['name'];
			$_POST['group'] = $_POST['group'];
		}

		$query1 = "SELECT * FROM `groups` WHERE `number` = '".$_POST['group']."'";
		$result1 = mysql_query($query1);
		if(!$result1) exit("error!");		

		if(mysql_num_rows($result1)) {
			mysql_query("SET NAMES 'utf8'");
			$query2 = "UPDATE `users` SET `fullname` = '".$_POST['name']."', `group` = '".$_POST['group']."' WHERE `email` = '".$_SESSION['name']."' AND `password` = '".$_SESSION['password']."'";
			$result2 = mysql_query($query2);
			if(!$result2) exit("error!");	
			else echo("<ok/>");
		} else {
			echo("<bad/>");
		}
	} 
?>