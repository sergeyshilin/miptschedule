<?php
	require_once("utils/SQLConfig.php");
	session_start();

	$error = false;

	if(empty($_POST['oldpassword']) || empty($_POST['newpassword'])) {
		echo("<bad1/>");
		$error = true;
	}
  
	if($_POST) {
		if(!get_magic_quotes_gpc()) {
			$_POST['oldpassword'] = md5($_POST['oldpassword']);
			$_POST['newpassword'] = md5($_POST['newpassword']);
		} else {
			$_POST['oldpassword']= md5(stripslashes($_POST['oldpassword']));
			$_POST['newpassword']= md5(stripslashes($_POST['newpassword']));
		}

		
		if(strcmp($_POST['oldpassword'], $_SESSION['password'])) {
			echo("<bad2/>");
			$error = true;
		} else if(!$error) {
			$query2 = "UPDATE `users` SET `password` = '".$_POST['newpassword']."' WHERE `email` = '".$_SESSION['name']."' AND `password` = '".$_SESSION['password']."'";
			$result2 = mysql_query($query2);
			if(!$result2) exit("error!");	
			$_SESSION['password'] = $_POST['newpassword'];
			echo("<ok/>");
		}
	} 
?>