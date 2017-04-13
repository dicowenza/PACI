<?php 
	class LogObject{

		private $login;
		private $password;

		public function __construct($login,$password){
			$this->setLogin($login);
			$this->setPassword($password);
		}

		public function setLogin($login){
			$this->login=$login;
		}

		public function setPassword($password){
			$this->password=$password;
		}

		public function getLogin($login){
			return $this->login;
		}

		public function getPassword($login){
			return $this->password;
		}
	}

?>

