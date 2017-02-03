<?php

	include_once("../models/data/connexion_db_obj.php");
	include_once("../models/data/user_model.php");
	#$nw_user=new User()
	#$db_connexion->inscription(nw_user);
	$db_connexion->inscription($nom,$prenom,$password,$pseudo,$mail);
?>