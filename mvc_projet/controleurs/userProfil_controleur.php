<?php
	 include_once("../models/userProfil_model.php");
if (isset($_GET["successful"]))
	header("Location: ../vues/userProfil_vue.php?successful=true");
else if (isset($_GET["notUnique"]))
	header("Location: ../vues/userProfil_vue.php?notUnique=true");
else header("Location: ../vues/userProfil_vue.php");


?>