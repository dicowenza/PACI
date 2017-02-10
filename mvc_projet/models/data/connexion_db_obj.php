<?php
	
	include_once("identite_model.php");
	include_once("log_obj_model.php");

	#include_once("adresse_model.php");
	#include_once("user_model.php");

	class ConnexionServeur{
		private $configuration;
		private $path_config;

		public function ConnexionServeur(){
			$this->configuration=parse_ini_file("../db_config/app.ini");
		}

		public function db_reconnect(){
			$connexion;
			try{
				$connexion=new PDO('mysql:host=' . $this->configuration['db_hostname'] . ';dbname=' . $this->configuration['db_name'], $this->configuration['db_user'], $this->configuration['db_password']);
				echo "connexion établie";
				return $connexion;
			}
			catch(PDOException $e){
				echo "echec de connexion ".$e->getMessage();
			}
		}

		public function inscription($nom,$prenom,$password,$pseudo,$mail){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query="INSERT  INTO Utilisateurs ('id_user','nom', 'prenom', 'password','pseudo','mail') VALUES('NULL','$nom','$prenom','$password','$pseudo','$mail')";
			try{
				$connexion->exec($query);
			}
			catch(PDOException $e){
				echo " erreur d'inscription ERR_MSG:".$e->getMessage();
			}
		}

		public function login($usr_log){
		$connexion=$this->db_reconnect();
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$query= $connexion->prepare("SELECT DISTINCT * FROM user WHERE user_password = :password AND ( user_email = :login OR user_nickname = :login)");
		$query->execute(array('password' => $usr_log->getPassword(),'login' => $usr_log->getLogin()));
		$row = $query->fetch(PDO::FETCH_ASSOC);
		return $row;
		}

		public function db_load_user_questions(){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("SELECT * FROM faq WHERE faq_user_ID = ".$_SESSION["user_ID"]);
			$req->execute();


		}

		public function db_load_faq(){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("SELECT * FROM faq ");
			$req->execute();

		}

	}
?>