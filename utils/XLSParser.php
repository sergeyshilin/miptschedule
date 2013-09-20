<?php 
	class XLSParser {

		private $error;
		private $file;
		private $year;
		private $season;

		// public function XLSParser($file, $year, $season) {
		// 	echo "Construct";
		// }

		public function __construct($file, $year, $season) {
			$this->error = NULL;
			$this->file = $file;
			$this->year = $year;
			$this->season = $season;
			$this->saveXLSFile();
		}

		private function saveXLSFile() {
			print $this->$file;
		}

		public function xlsToSQL() {

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