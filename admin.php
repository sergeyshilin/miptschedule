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
				<option selected>Осень</option>
				<option>Весна</option>
			</select>
			</br>
			Файл:&nbsp;&nbsp;&nbsp;
			<input type="file" name="xls" value="Выберете файл"></br></br>
			<input type="submit" name="xlsdownload" value="Отправить на обработку">
		</form>
		<?php 
			if(isset($_POST) && !empty($_POST['xlsdownload'])) {
				require_once('utils/XLSParser.php');
				$parser = new XLSParser($_FILES['xls'], $_POST['year'], $_POST['season']);
				// $parser->xlsToSQL();
				if($parser->isError()) {
					$parser->printError();
				} else {
					echo "ALL is OK";
				}
			} else {
				echo "no post";
			} 
		?>
	</body>
</html>