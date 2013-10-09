<?php require_once("utils/redirect.php") ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="title" content="Физтех - Расписание" />
		<meta name="author" content="Sergey Shilin" />
		<meta name="Designer" content="Sergey Shilin" />
		<meta name="Publisher" content="Sergey Shilin" />
		<meta name="keywords" content="расписание мфти, расписание, мфти, schedule, mipt, физтех, физтех расписание" />
		<meta name="description" content="Расписание МФТИ" />
		<meta name="Publisher-URL" content="http://mipt-schedule.ru" />
		<meta name="Publisher-Email" content="snape@liceum8.ru" />
		<meta http-equiv="Reply-to" content="snape@liceum8.ru" />
		<meta name="revisit-after" content="1 weeks" />
		<meta name="robots" content="all" />
		<meta http-equiv="content-language" content="Russian" />
		<meta name="distribution" content="Local" />
		<script type="text/javascript" language="JavaScript" src="js/synchronize.js"></script>
		<script type="text/javascript" language="JavaScript" src="js/jquery-1.7.2.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<title>ФизТех - Расписание</title>
	</head>
	<body>
		<div id="wrapper">
			<div id="content">
				<div id="header">
				</div>

				<div id="course">
					<input type="button" id="1" name="1" value="1 курс" onclick="setCourse(1)">
					<input type="button" id="2" name="2" value="2 курс" onclick="setCourse(2)">
					<input type="button" id="3" name="3" value="3 курс" onclick="setCourse(3)">
					<input type="button" id="4" name="4" value="4 курс" onclick="setCourse(4)">
					<input type="button" id="5" name="5" value="5 курс" onclick="setCourse(5)">
					<input type="button" id="6" name="6" value="6 курс" onclick="setCourse(6)">
				</div>
				<div id="faculty">
					<input type="button" name="1" value="ФРТК" onclick="setFaculty(1)">
					<input type="button" name="2" value="ФОПФ" onclick="setFaculty(2)">
					<input type="button" name="3" value="ФАКИ" onclick="setFaculty(3)">
					<input type="button" name="4" value="ФМХФ" onclick="setFaculty(4)">
					<input type="button" name="5" value="ФФКЭ" onclick="setFaculty(5)">
					<input type="button" name="7" value="ФУПМ" onclick="setFaculty(7)">
					<input type="button" name="8" value="ФПФЭ" onclick="setFaculty(8)">
					<input type="button" name="9" value="ФИВТ" onclick="setFaculty(9)">
					<input type="button" name="11" value="ФБМФ" onclick="setFaculty(11)">
				</div>
				<div id="group">
				</div>

				</br>
					<!-- <input type="submit" name="getShedule" value="Получить расписание"> -->
				<div class="schedule" id="schedule">
					
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