<?php
	class Identite{
		
		private $nom;
		private $prenom;

		public function __construct ($nom,$prenom){
			$this->setNom($nom);
			$this->setPrenom($prenom);
		}

		public function setNom($nom){
			$this->nom=$nom;
		}

		public function setPrenom($prenom){
			$this->prenom=$prenom;
		}

		public function getNom(){
			return $this->nom;
		}

		public function getPrenom(){
			return $this->prenom;
		}
	}

?>