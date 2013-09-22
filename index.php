<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
		<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
		<script type="text/javascript" language="JavaScript" src="js/synchronize.js"></script>
		<script type="text/javascript" language="JavaScript" src="js/jquery-1.7.2.min.js"></script>
		<title>ФизТех - расписание</title>
	</head>
	<body onload="syncSelect(1);">
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="POST" >
			Курс:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<select name="course" id="course" onchange="syncSelect(selectedIndex+1);">
				<option selected>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
			</select>
		</br>
			Группа:&nbsp;&nbsp;&nbsp;
			<select name="group" id="group">
			</select>
		</br>
			<input type="submit" name="getShedule" value="Получить расписание">
		</form>
		<?php 
			if(isset($_POST) && !empty($_POST['getShedule'])) {
				if(empty($_POST['course']) || empty($_POST['group'])) {
					echo "Укажите группу";
				} else {
					require_once('classes/MiptSchedule.php');
					$schedule = new MiptSchedule($_POST['group']);
					$schedule->printWeekSchedule();
				}
			}
		?>
	</body>
</html>