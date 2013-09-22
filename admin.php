<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
		<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
		<title>Редактирование расписаний ФизТеха </title>
	</head>
	<body>
		<h2>Добавление XLS файла расписания</h2>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="POST" >
			Год:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<select name="year">
				<option selected>2013-2014</option>
				<option>2014-2015</option>
				<option>2015-2016</option>
			</select>
			</br>
			Сезон:&nbsp;&nbsp; 
			<select name="season">
				<option selected value="autumn">Осень</option>
				<option value="spring">Весна</option>
			</select>
			</br>
			Курс:&nbsp;&nbsp;&nbsp;&nbsp;
			<select name="course">
				<option selected>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
			</select>
		</br>
			Файл:&nbsp;&nbsp;&nbsp;
			<input type="file" name="xls" value="Выберете файл"></br></br>
			<input type="submit" name="xlsdownload" value="Отправить на обработку">
		</form>
		<?php 
			if(isset($_POST) && !empty($_POST['xlsdownload'])) {
				require_once('utils/XLSParser.php');
				$parser = new XLSParser($_FILES['xls'], $_POST['year'], $_POST['season'], $_POST['course']);
				$parser->xlsToSQL('4', "schedules/2013-2014_autumn_4.xls");
				// $parser->xlsToSQL('1', "schedules/2013-2014_autumn_1.xls");
				// $parser->xlsToSQL('2', "schedules/2013-2014_autumn_2.xls");
				// $parser->xlsToSQL('3', "schedules/2013-2014_autumn_3.xls");
				// $parser->xlsToSQL('5', "schedules/2013-2014_autumn_5.xls");
				// $parser->xlsToSQL('6', "schedules/2013-2014_autumn_6.xls");
				if($parser->isError()) {
					$parser->printError();
				} else {
					echo "Выполнено!";
				}
			}
		?>
	</body>
</html>