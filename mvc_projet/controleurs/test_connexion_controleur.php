<!DOCTYPE html>
<html>
<head>
	<title>test de connexion a la base</title>
</head>
<body>
	<?php
		include_once("../models/data/connexion.php");
		$connect;
		$serveur='localhost';
		$login='root';
		$pass="breezi93.";
		$data_base="mysql:host=$serveur;dbname=projet_technologique";
	?>
	<form method="post" action="test_connexion_controleur.php">
		<input type="submit" value="connexion" name="connexion">
	</form>
	<?php 
		if(isset($_POST['connexion'])){
			/*try{
				$connect=new PDO($data_base,$login,$pass);

				$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				echo "connexion réussie";
			}
			catch(PDOException $e){
				echo "echec de connexion au serveur :".$e->getMessage();
			}*/
			$connect=new ConnexionServeur();
			$connect->db_reconnect();
		}
	?>
</body>
</html>