<?php
	require_once("utils/SQLConfig.php");
    
    $error = 0;
    
    if($_POST) {
	    if(empty($_POST['name']) || empty($_POST['password'])) {
		    echo("<bad1/>");
		    $error = 1;
	    }
	
	    if(!get_magic_quotes_gpc()) {
		    $_POST['name'] = mysql_real_escape_string($_POST['name']);
		    $_POST['password'] = mysql_real_escape_string($_POST['password']);
	    }

	    $_POST['name'] = iconv("utf-8", "windows-1251", $_POST['name']);
	    $_POST['name'] = strtolower($_POST['name']);
	    $_POST['password'] = iconv("utf-8", "windows-1251", $_POST['password']);
	    
	    $query1 = "SELECT * FROM `users` WHERE `email` = '".$_POST['name']."'";
	    $result1 = mysql_query($query1) or die(mysql_error());
    	if(!$result1) exit("<mysqlerr/>");

	    $num = mysql_num_rows($result1);

	
        if($num > 0) {
		    echo("<bad2/>");
		    $error = 1;
	    } else if(!preg_match("%^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z])+$%", $_POST['name'])) {
		    echo("<bad3/>");
		    $error = 1;
	    } else if(!$error) {
		    $query2 = "INSERT INTO `users` VALUES(NULL, '".$_POST['name']."', '".md5($_POST['password'])."', DEFAULT, DEFAULT, DEFAULT)";
		    $result2 = mysql_query($query2) or die(mysql_error());

		    if($result2) {
			    echo ("<ok/>");
                $email = trim($_POST['name']);
                if ($email) {
                    date_default_timezone_set('Europe/Moscow');
                    mail($email, 'Вы успешно зарегистрировались на сайте расписания МФТИ!', "
                    Вы успешно прошли регистрацию на сайте http://mipt-schedule.ru.\n
                    Если вы не понимаете, о чем идет речь, то ответным письмом попросите удалить этот аккаунт на нашем сайте.\n
                    С уважением, команда разработки ФизТех-Расписания.", 'From: info@mipt-schedule.ru');
                }

                session_start();
				$_SESSION['name'] = $_POST['name'];
				$_SESSION['password'] = md5($_POST['password']);
				if(isset($_POST['loginkeeping'])) {
					setcookie("auto", "yes", time()+9999999);
					setcookie('name', $_SESSION['name'], time()+ 9999999);
					setcookie('pass', $_SESSION['password'], time()+ 9999999);
				} 
				else { 
					setcookie('name', $_SESSION['name'], time()+ 86400 * 30 * 12);
					setcookie('pass', $_SESSION['password'], time()+ 86400 * 30 * 12);
				}
		    } else {
			    exit("<mysqlerr/>");
		    }
	    } else {
	    	echo("<bad4/>");
	    }
    }
?>
