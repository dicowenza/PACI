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

		public function inscription($nom,$prenom,$pseudo,$mail,$rand){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$req = $connexion->prepare("INSERT INTO user (user_firstname, user_lastname, user_password, user_nickname, user_email, user_id_confirm) VALUES (:prenom, :nom, :password, :pseudo, :email, :id_confirm)");
        	$req->execute(array(
            	'nom' => utf8_decode($nom), 
            	'prenom' => utf8_decode($prenom),
            	'pseudo' => utf8_decode($pseudo),
            	'password' => 'NULL',
            	'email' => utf8_decode($mail),
            	'id_confirm' => $rand
            ));
            echo 'done';
		}

		public function login($usr_log){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query= $connexion->prepare("SELECT DISTINCT * FROM user WHERE user_password = :password AND ( user_email = :login OR user_nickname = :login)");
			$query->execute(array('password' => $usr_log->getPassword(),'login' => $usr_log->getLogin()));
			$i = 0;
			while($row = $query->fetch(PDO::FETCH_ASSOC))
				$array[$i++] = $row;
			return $array;
		}

		public function db_load_user_data(){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("SELECT * FROM user WHERE user_ID = ".$_SESSION["user_ID"]);
			$query->execute();
			$i = 0;
			while($row = $query->fetch(PDO::FETCH_ASSOC))
				$array[$i++] = $row;
			return $array;

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
			$query=$connexion->prepare("SELECT * FROM service INNER JOIN user ON user.user_ID = service.service_user_ID WHERE user_ID = service_user_ID AND service_user_ID = ".$_SESSION["user_ID"]);
			$query->execute();
			$i = 0;
			while($row = $query->fetch(PDO::FETCH_ASSOC))
				$array[$i++] = $row;
			return $array;


		}

		public function db_load_services(){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("SELECT * FROM service INNER JOIN user ON user.user_ID = service.service_user_ID WHERE user_ID = service_user_ID");
			$query->execute();
			$i = 0;
			while($row = $query->fetch(PDO::FETCH_ASSOC))
				$array[$i++] = $row;
			return $array;

		}

		public function db_load_services_by_cat($category){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("SELECT * FROM service INNER JOIN user ON user.user_ID = service.service_user_ID WHERE user_ID = service_user_ID AND service_category = '".$category."'");
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
            'question' => utf8_decode($question),
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
            'title' => utf8_decode($title),
            'description' => utf8_decode($description),
            'category' => utf8_decode($category)
            ));
    		//$data = $query->fetchAll();
		}

		public function insert_answer_faq($user_ID, $faqID, $answer){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query = $connexion->prepare('INSERT INTO answer_faq (answer_text, answer_faq_ID, answer_user_ID, answer_note, answer_date) VALUES (:answer,:faqID, :userID, 0, now())');
    		$query->execute(array(
    		'answer' => $answer,
    		'faqID' => $faqID,
            'userID' => $user_ID
            ));
		}

		public function delete_answer_faq($answerID){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query = $connexion->prepare("DELETE FROM answer_faq where answer_ID = :answerID");
    		$query->execute(array('answerID' => $answerID));
		}

		public function delete_service($serviceID){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query = $connexion->prepare("DELETE FROM service where service_ID = :serviceID");
    		$query->execute(array('serviceID' => $serviceID));
		}

		public function insert_note_answer($answerID, $userID, $note){
			$connexion=$this->db_reconnect();
			//$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query = $connexion->prepare("SELECT * FROM note WHERE note_user_ID = :userID AND note_answer_ID = :answerID");
			$query->execute(array('answerID' => $answerID, 'userID' => $userID));

			$req = ($query->rowCount() == 0) ? "INSERT INTO note VALUES (0, :answerID, :userID, :note)" : "UPDATE note SET note_status = :note WHERE note_answer_ID = :answerID AND note_user_ID = :userID";

			$query = $connexion->prepare($req);
    		$query->execute(array(
    		'answerID' => $answerID,
    		'userID' => $userID,
            'note' => $note
            ));
		}

		public function search_questioner_faq($faqID){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("SELECT DISTINCT user_nickname, user_email FROM faq INNER JOIN user ON user.user_ID = faq.faq_user_ID WHERE faq_ID = ".$faqID);
			$query->execute();
			$i = 0;
			while($row = $query->fetch(PDO::FETCH_ASSOC))
				$array[$i++] = $row;
			return $array;

		}

		public function search_answerer_faq($userID){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("SELECT DISTINCT user_nickname FROM user WHERE user_ID = ".$userID);
			$query->execute();
			$i = 0;
			while($row = $query->fetch(PDO::FETCH_ASSOC))
				$array[$i++] = $row;
			return $array[0]["user_nickname"];
		}

		public function search_mailer($userID){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("SELECT DISTINCT user_email FROM user WHERE user_ID = ".$userID);
			$query->execute();
			$i = 0;
			while($row = $query->fetch(PDO::FETCH_ASSOC))
				$array[$i++] = $row;
			return $array[0]["user_email"];

		}

		public function final_insertion_user($id, $pseudo, $password){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query = $connexion->prepare("UPDATE user SET user_password = :password, user_nickname = :pseudo, user_id_confirm = 0 WHERE user_id_confirm=:id");
			$query->execute(array(
            'id' => $id,
            'pseudo' => utf8_decode($pseudo),
            'password' => utf8_decode($password)
            ));

		}


		public function update_user_profil($userID, $lastname, $firstname, $nickname, $email, $password){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query = $connexion->prepare("UPDATE user SET user_firstname = :firstname, user_lastname = :lastname, user_nickname = :nickname, user_password = :password, user_email = :email WHERE user_ID = :userID");
    		$query->execute(array(
            'userID' => $userID,
            'firstname' => utf8_decode($firstname),
            'lastname' => utf8_decode($lastname),
            'nickname' => utf8_decode($nickname),
            'password' => utf8_decode($password),
            'email' => $email
            ));
    		//$data = $query->fetchAll();

		}

		public function delete_question_in_db($faq_ID){
			$connexion=$this->db_reconnect();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query=$connexion->prepare("DELETE FROM faq WHERE faq_ID = :faqID");
			$query->execute(array('faqID' => $faq_ID));
		}

	}
?>