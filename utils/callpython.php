<?php
	header('Content-Type: text/html; charset=utf-8');
	
	$data = "Лин методы в р/т /Доц. Григорьев А. А. /117 ГК";
	$output = array();
	file_put_contents("inputcell", $data);
	exec("python cell_parser.py < inputcell", $output);
	var_dump($output);

	$data = "Альтерн. курсы 1 из 4-х: 1 Физика низкотемпературной плазмы 117 ГК 2. Биофизика 113 ГК";
	$output = array();
	file_put_contents("inputcell", $data);
	exec("python cell_parser.py < inputcell", $output);
	var_dump($output);

	$data = "Физическая механика 113 ГК";
	$output = array();
	file_put_contents("inputcell", $data);
	exec("python cell_parser.py < inputcell", $output);
	var_dump($output);
?>