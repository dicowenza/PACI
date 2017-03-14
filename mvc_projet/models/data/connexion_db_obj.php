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

		public function db_load_usr_questions(){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("SELECT * FROM faq WHERE faq_user_ID = ".$_SESSION["user_ID"]);
			$query->execute();
			$i = 0;
			while($row = $query->fetch(PDO::FETCH_ASSOC))
				$array[$i++] = $row;
			return $array;


		}

		public function db_load_faq_answers($faq_ID){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("SELECT answer_faq.*, user_nickname, sum(note_status) as nbr FROM answer_faq INNER JOIN user ON user_ID = answer_user_ID LEFT JOIN note ON answer_ID = note_answer_ID WHERE answer_faq_ID = ".$faq_ID." GROUP BY answer_ID ORDER BY nbr DESC");
			$query->execute();
			$i = 0;
			while($row = $query->fetch(PDO::FETCH_ASSOC))
				$array[$i++] = $row;
			return $array;

		}

		public function db_load_faq(){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("SELECT *, count(answer_ID) AS nbr FROM faq LEFT JOIN answer_faq ON faq_ID = answer_faq_id GROUP BY faq_ID");
			$query->execute();
			$i = 0;
			while($row = $query->fetch(PDO::FETCH_ASSOC))
				$array[$i++] = $row;
			return $array;

		}

		public function db_load_usr_services(){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("SELECT * FROM service WHERE service_user_ID = ".$_SESSION["user_ID"]);
			$query->execute();
			$i = 0;
			while($row = $query->fetch(PDO::FETCH_ASSOC))
				$array[$i++] = $row;
			return $array;


		}

		public function db_load_services(){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("SELECT * FROM service");
			$query->execute();
			$i = 0;
			while($row = $query->fetch(PDO::FETCH_ASSOC))
				$array[$i++] = $row;
			return $array;

		}

		public function db_load_services_by_cat($category){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("SELECT * FROM service WHERE service_category = '".$category."'");
			$query->execute();
			$i = 0;
			while($row = $query->fetch(PDO::FETCH_ASSOC))
				$array[$i++] = $row;
			print_r($query);
			return $array;

		}

		public function insert_question_faq($user_ID, $question){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query = $connexion->prepare("INSERT INTO faq (faq_user_ID, faq_question, faq_answer, faq_date) VALUES (:userID, :question, :answer, now())");
    		$query->execute(array(
            'userID' => $user_ID,
            'question' => $question,
            'answer' => "Aucune réponse disponible pour le moment!"
            ));
    		//$data = $query->fetchAll();

		}

		public function insert_service_faq($user_ID, $title, $description, $category){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query = $connexion->prepare("INSERT INTO service (service_user_ID, service_title, service_description, service_category, service_date, service_delay) VALUES (:userID, :title, :description, :category, now(), now())");
    		$query->execute(array(
            'userID' => $user_ID,
            'title' => $title,
            'description' => $description,
            'category' => $category
            ));
    		//$data = $query->fetchAll();

		}

	}
?>