<?php
	require_once("utils/SQLConfig.php");
  
	if($_POST) {
		if(!get_magic_quotes_gpc()) {
			$password = md5($_POST['password']);
			$name     = mysql_real_escape_string($_POST['name']);
		} else {
			$password = md5(stripslashes($_POST['password']));
			$name     = $_POST['name'];
		}

		$query = "SELECT * FROM `users` WHERE `email` = '".$name."' AND `password` = '".$password."'";
		$result = mysql_query($query);
		if(!$result) exit("error!");

		if(mysql_num_rows($result)) {
			session_start();
			$_SESSION['name'] = $name;
			$_SESSION['password'] = $password;
			if(isset($_POST['loginkeeping'])) {
				setcookie("auto", "yes", time()+9999999);
				setcookie('name', $name, time()+ 9999999);
				setcookie('pass', $password, time()+ 9999999);
			} else { 
				setcookie('name', $name, time()+ 86400 * 30 * 12);
				setcookie('pass', $password, time()+ 86400 * 30 * 12);
			}

			echo ("<ok/>");
		} else {
		  echo("<bad/>");
		}
	} 
?>

