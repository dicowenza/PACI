<?php

	include_once("../models/data/connexion_db_obj.php");
	include_once("../models/data/user_model.php");
	
	$db_connexion->inscription($nom,$prenom,$password,$pseudo,$mail);
?>