<?php
	session_start();
	include ("utils/SQLConfig.php");
  
	if(isset($_POST) && isset($_SESSION['name'])) {
		setcookie('name', "");
		setcookie('auto', "");
		setcookie('pass', "");
		session_destroy();
		echo ("<ok/>");
	} 
?>
