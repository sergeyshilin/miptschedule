<?php require_once("utils/redirect.php") ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
		<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<title><?php if(isset($_GET['gr'])) echo $_GET['gr']." группа | "; ?>ФизТех - Расписание</title>
	</head>
	<body>
		<div id="wrapper">
			<div id="content">
				<div id="header">
				</div>
				<div id="groupname"><?php if(!empty($_GET['gr'])) echo $_GET['gr']." группа"; ?></div>
				<div class="schedule">
					<?php 
						if(isset($_GET) && !empty($_GET['gr'])) {
							require_once('classes/MiptSchedule.php');
							$schedule = new MiptSchedule($_GET['gr']);
							$schedule->printWeekSchedule();
						}
					?>
				</div>
			</div>
			<div id="footsaver"></div>
		</div>
		<div id="footer">
			<hr>
			<div id="author">
				since 2013</br>
				author: <a href="mailto:snape@liceum8.ru">S.Shilin</a>
			</div>
		</div>
	</body>
</html>