<?php
	class ConnexionServeur{
		private $configuration;
		private $path_config;

		public function ConnexionServeur($path_config){
			$this->configuration=parse_ini_file($path_config);
		}

		private function db_reconnect(){
			try {
            	return new PDO('mysql:host=' . $this->conf['db_hostname'] . '; dbname=' . $this->conf['db_name'], $this->conf['db_user'], $this->conf['db_password']);
            	echo "Nouvel abonné ajouté !";
         	} 
         	catch (PDOException $e) {
            print "Error: "." echec de connecxion à la base de données". $e->getMessage() . "<br/>";
         	}
		}

		public function connecxion(){

		}

		public function inscription(){
			
		}

	}
?>