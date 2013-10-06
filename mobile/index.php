<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
		<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script type="text/javascript" language="JavaScript" src="js/synchronize.js"></script>
		<script type="text/javascript" language="JavaScript" src="js/jquery-1.7.2.min.js"></script>
		<title><?php if(isset($_GET['gr'])) echo $_GET['gr']." группа | "; ?>ФизТех - Расписание</title>
	</head>
	<body>
		<div id="head">
			<div id="title">ФизТех - Расписание</div>
		</div>
		<div id="content">
			<div id="selects">
				<select name="course" id="course" onchange="setCourse(selectedIndex);">
					<option selected disabled><span>Курс</span></option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
				</select>
				<select name="faculty" id="faculty" onchange="setFaculty(this.value);">
					<option selected disabled>Факультет</option>
					<option value="1">ФРТК</option>
					<option value="2">ФОПФ</option>
					<option value="3">ФАКИ</option>
					<option value="4">ФМХФ</option>
					<option value="5">ФФКЭ</option>
					<option value="7">ФУПМ</option>
					<option value="8">ФПФЭ</option>
					<option value="9">ФИФТ</option>
					<option value="11">ФМБФ</option>
				</select>
		       	<select name="group" id="group" onchange="redirect(this.value);">
		       		<option selected disabled>Группа</option>
		       	</select>
        	</div>
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