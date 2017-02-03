<?php
	class User{

		private $identite;
		private $age;
		private $status;
		private $mail;
		private $addresse;

		private $login;
		private $mot_de_pass;
		


		public function getIdentite(){
			return $this->identite;
		}

		public function getAge(){
			return $this->age;
		}

		private function getSatatus(){
			return $this->status;
		}

		public function getAdresse(){
			return $this->adresse;
		}



		public  function getLogin(){
			return $this->login;
		}

		public function grtMotDePass(){
			return $this->mot_de_pass;
		}


		public function setIdentite($identite){
			$this->identite=$identite;
		}

		public function setAge($age){
			$this->age=$age;
		}

		public function setEmail($email){
			$this->email=$email;
		}

		public function setAdresse($adresse){
			$this->adresse=$adresse;
		}		

		public function setSattus($status){
			$this->status=$status;
		}	

		public function setLogin($login){
			$this->login=$login;
		}
		

	}


?>