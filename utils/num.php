<?php 
	require_once('../PHPExcel/Classes/PHPExcel/IOFactory.php');
	$name =  "../schedules/2013-2014_autumn_4.xls";
	$inputFileType = PHPExcel_IOFactory::identify($name);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	$objReader->setReadDataOnly(false);
    $objPHPExcel = $objReader->load($name);
    $sheet = $objPHPExcel->getActiveSheet();
    $cell = $sheet->getCell("A5");
	if(PHPExcel_Shared_Date::isDateTime($cell)) {
		echo "yes"; 
		$val = $cell->getValue();
		$format = 'd.m.Y';
	        if(PHPExcel_Shared_Date::isDateTime($cell)) {
	             $val = date("", PHPExcel_Shared_Date::ExcelToPHP($val)); 
	        }
	    echo $val;
	}

?>