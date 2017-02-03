<?php
	class ConnexionServeur{
		private $configuration;
		private $path_config;

		public function ConnexionServeur(){
			$this->configuration=parse_ini_file("../db_config/app.ini");
		}

		public function db_reconnect(){
			$connexion;
			try{
				$connexion=new PDO('mysql:host=' . $this->configuration['db_hostname'] . '; dbname=' . $this->configuration['db_name'], $this->configuration['db_user'], $this->configuration['db_password']);
				echo "connexion établie";
				return $connexion;
			}
			catch(PDOException $e){
				echo "echec de connexion ".$e->getMessage();
			}
		}

		public function inscription($nom,$prenom,$password,$pseudo,$mail){
			$connexion=$this->db_reconnect();
			#$tmp=NULL;
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			/*
			$query="INSERT INTO `Utilisateurs` (`id_user`,`nom`, `prenom`, `password`,`pseudo`,`mail`) VALUES ('NULL',:nom, :prenom, :password, :pseudo, :mail)";
			*/
			$query="INSERT  INTO Utilisateurs ('id_user','nom', 'prenom', 'password','pseudo','mail') VALUES('NULL','$nom','$prenom','$password','$pseudo','$mail')";
			try{
				$connexion->exec($query);
			}
			catch(PDOException $e){
				echo " erreur ajout ".$e->getMessage();
			}
			/*
			$stmt=$connexion->prepare($query);
			$stmt->bindParam(':id_user',$tmp);
			$stmt->bindParam(':nom', $nom);
			$stmt->bindParam(':prenom', $prenom);
			$stmt->bindParam(':password', $password);
			$stmt->bindParam(':nom', $pseudo);
			$stmt->bindParam(':email', $mail);
			$stmt->execute();
			*/
		}

	}
?>