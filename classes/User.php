<?php
	/**
	 * User class
	 */
	class User {
		private $mail;
		private $fullname;
		private $group;
		private $course;
		private $faculty;
		private $admin;
		private $login = false;

		public function __construct() {
			session_start();
			require_once("/home/snape/projects/mipt-schedule/utils/SQLConfig.php");
			if(isset($_SESSION['name']) && isset($_SESSION['password'])) {
				mysql_query("SET NAMES 'utf8'");
				$query = "SELECT u.email, u.fullname, u.group, u.admin, g.course, g.faculty FROM `users` u INNER JOIN `groups` g WHERE `email` = '".$_SESSION['name']."' AND `password` = '".$_SESSION['password']."' AND u.group = g.number";
				$result = mysql_query($query);
				if(!$result) exit("error!");

				$num = mysql_num_rows($result);
				$user = mysql_fetch_array($result);

				if($num > 0) {
					$this->login = true;
					$this->mail = $user['email'];
					$this->fullname = $user['fullname'];
					$this->group = $user['group'];
					$this->course = $user['course'];
					$this->faculty = $user['faculty'];
					$this->admin = $user['admin'];
				}
			}
		}

		public function __destruct() {

		}

		public function isLoggedIn() {
			return $this->login;
		}

		public function hasName() {
			if(!empty($this->fullname))
				return true;
			return false;
		}

		public function getFullname() {
			return $this->fullname;
		}

		public function getEmail() {
			return $this->mail;
		}

		public function getGroup() {
			return $this->group;
		}

		public function getCourse() {
			return $this->course;
		}

		public function getFaculty() {
			return $this->faculty;
		}

		public function isAdmin() {
			return $this->admin;
		}
	}
?>