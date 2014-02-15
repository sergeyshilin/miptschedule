<?php 

	set_time_limit (30000);
	header('Content-type:text/html; charset=utf-8');

	class XLSParser {

		private $error;
		private $file;
		private $name;
		private $course;
		private $connection;
		const PATHDIR = "schedules/";
		const FIRSTROW = 5;
		const FIRSTCOLUMN = 'C';

		public function __construct($file, $year, $season, $course) {
			require_once('SQLConfig.php');
			require_once('ScheduleUtils.php');
			require_once('PHPExcel/Classes/PHPExcel/IOFactory.php');

			$this->error = NULL;
			$this->file = $file;
			$this->course = $course;
			$this->half = 0;

			$this->name = self::PATHDIR . $year . "_" . $season . "_" . $course . $this->getExtention($file['name']);
			$this->saveXLSFile();
			$this->xlsToSQL();
		}

		public function __destruct() {

		}

		private function clearDataBase($course) {
			$result = mysql_query("DELETE FROM `classes` WHERE `group` IN (SELECT `number` from `groups` WHERE `course` = {$course})");
				if(!$result) {
					die('Can\'t remove lines from database: ' . mysql_error());
				}
			echo "Databese for " . $course . " course was successfully cleared </br>";
		}

		public function xlsToSQL() {
			$this->clearDataBase($this->course);
			try {
			    $inputFileType = PHPExcel_IOFactory::identify($this->name);
			    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objReader->setReadDataOnly(false);
			    $objPHPExcel = $objReader->load($this->name);
			    unset($objReader);
			} catch(Exception $e) {
			    die('Error loading file "'.pathinfo($this->name, PATHINFO_BASENAME).'": '.$e->getMessage());
			}

			$sheet = $objPHPExcel->getActiveSheet();

			$lastrow = $sheet->getHighestRow();
			$lastcol = $sheet->getHighestColumn();

			for ($column = PHPExcel_Cell::columnIndexFromString(self::FIRSTCOLUMN) - 1; 
					$column < PHPExcel_Cell::columnIndexFromString($lastcol); 
						$column++) { 
				if(!is_numeric($this->getCellValue($sheet, $column, self::FIRSTROW)))
					continue;
				for($row = self::FIRSTROW; $row <= $lastrow; $row++) {					
					$cell = $this->getCellValue($sheet, $column, $row);
					$this->addCellToSQL($sheet, $this->course, $cell, $column, $row);
				}
			}
			echo $name . " SUCCESS!</br>";
		}

		private function addCellToSQL($sheet, $course, $cell, $column, $row) {
			if($row == self::FIRSTROW && is_numeric($cell) && (mysql_num_rows(mysql_query("SELECT * FROM `groups` WHERE `number` = '{$cell}'")) == 0)) {
				echo "Добавляю в базу... </br>";
				$query = sprintf("INSERT INTO `groups` (`course`, `number`) VALUES ('{$course}', '{$cell}') ");
				$result = mysql_query($query);
				if(!$result) {
					die('Не могу добавить запись в БД: ' . mysql_error());
				}
			} else if(!is_numeric($cell) && $row != self::FIRSTROW) {
				$group = $this->getCellValue($sheet, $column, self::FIRSTROW);
				$dayval = $this->getCellValue($sheet, 'A', $row);
				$pairval = $this->getCellValue($sheet, 'B', $row);
				if(!empty($dayval) && !empty($pairval)) {
					$ishalf = 0;
					$day = ScheduleUtils::getDayNumber($this->getCellValue($sheet, 'A', $row));
					$time = ScheduleUtils::getPairNumber($this->getCellValue($sheet, 'B', $row));

					$nextdayval = $this->getCellValue($sheet, 'A', $row + 1);
					$nextpairval = $this->getCellValue($sheet, 'B', $row + 1);
					$nextcell = $this->getCellValue($sheet, $column, $row + 1);

					if($this->half == 1) {
						$ishalf = 1;
						$this->half = 0;
					}

					if(!empty($nextdayval) && !empty($nextpairval)) {
						$nexttime = ScheduleUtils::getPairNumber($this->getCellValue($sheet, 'B', $row+1));	
						if($nexttime == $time && strcmp($cell, $nextcell) != 0) {
							$ishalf = 1;
							$this->half = 1;
						}
					}

					$color = $sheet->getStyle(PHPExcel_Cell::stringFromColumnIndex($column).$row)->getFill()->getStartColor()->getRGB();
					mysql_query("SET names cp1251");
					$cell = iconv("utf-8", "windows-1251", $cell);
					$this->writeToSQL($day, $time, $cell, $group, $color, $ishalf);
				}
				
			}
		}

		private function writeToSQL($day, $time, $cell, $group, $color, $half) {
			if(mysql_num_rows(mysql_query("SELECT * FROM `classes` WHERE `day` = '{$day}' AND `pair` = '{$time}' 
				AND `name` = '{$cell}' AND `group` = '{$group}'")) == 0) {
					$query = sprintf("INSERT INTO `classes` VALUES (null, '{$day}', '{$time}', '{$cell}', 
						'{$group}', 1, 1, '{$color}', {$half})");
					$result = mysql_query($query);
					if(!$result) {
						die('Не могу добавить запись в БД: ' . mysql_error());
					}
			}
		}

		private function getCellValue($sheet, $cellOrCol, $row, $format = 'd.m.Y') {

	        if(is_numeric($cellOrCol)) {
	            $cell = $sheet->getCellByColumnAndRow($cellOrCol, $row);
	        } else {
	            $lastChar = substr($cellOrCol, -1, 1);
	            if(!is_numeric($lastChar)) { //column contains only letter, e.g. "A"
	               $cellOrCol .= $row;
	            } 
	            
	            $cell = $sheet->getCell($cellOrCol);
	        }
	        
	        $mergedCellsRange = $sheet->getMergeCells();
	        foreach($mergedCellsRange as $currMergedRange){
	            if($cell->isInRange($currMergedRange)) {
	                $currMergedCellsArray = PHPExcel_Cell::splitRange($currMergedRange);
	                $cell = $sheet->getCell($currMergedCellsArray[0][0]);
	                break;
	            }
	        }

	        $val = $cell->getValue();

	        return $val;
    	}

		private function getExtention($name) {
			$ext = "";
			if(empty($name)) {
				$this->error = "Файл не был выбран";
			} else {
				$pos = strpos($name, ".");
				$ext = substr($name, $pos);
			}
			return $ext;
		}

		private function saveXLSFile() {
			if($this->file["error"] == 0) {
				if(!is_dir(self::PATHDIR) && !mkdir(self::PATHDIR, 0777)) {
					$this->error = "Не могу создать директорию " . self::PATHDIR;
				} else if(!move_uploaded_file($this->file['tmp_name'], $this->name)) {
					$this->error = "Файл не был загружен на сервер";
				}
			} else {
				$this->error = "Файл не был выбран";
			}
		}

		public function isError() {
			if(!is_null($this->error))
				return true;
			return false;
		}

		public function printError() {
			echo $this->error;
		}
	}
?>