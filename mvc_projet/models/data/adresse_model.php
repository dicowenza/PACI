<?php
	class Adresse{

		private rue;
		private numero_rue;
		private boite_postale;
		private ville;
		private pays;
		private libele;

		public function getRue(){
			return $this->rue;
		}

		public function getNumeroRue(){
			return $this->numero_rue;
		}

		public function getBoitePostale(){
			return  $this->boite_postale;
		}

		public function getVille(){
			return $this->ville;
		}

		public function getLibele(){
			return $this->libele;
		}

		public function setRue($rue){
			$this->rue=$rue;
		}

		public function setNumeroRue($numero_rue){
			$this->numero_rue=$numero_rue;
		}

		public function setVille($ville){
			$this->ville=$ville;
		}

		public function setPays($pays){
			$this->pays=$pays;
		}

		public function setLibele($libele){
			$this->libele=$libele;
		}

	}


?>