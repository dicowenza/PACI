 <?php
 	echo "c ".$_POST["pseudo"]." et ".$_POST["password"]." vtt";
	if (empty($_POST["pseudo"]) || empty($_POST["password"])){
	    $message='Remplissez tous les champs svp';
	    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
	    header("Location: ../vues/signupConfirmed_vue.php?mail_confirmed=true&id=".$_POST["id"]."&pseudo=".$_POST["pseudo"]."");
	}
		$id = $_POST["id"];
		$pseudo = $_POST["pseudo"];
		$password = $_POST["password"];

	include_once("../models/signupConfirmed_model.php");
	?>