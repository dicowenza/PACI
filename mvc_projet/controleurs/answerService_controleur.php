 <?php
 	include_once("../models/data/connexion_db_obj.php");
 session_start();
  if (isset($_SESSION["started"]) && $_SESSION["started"] == "true"){
	$message = $_POST["message"];
	$type = $_POST["type"];
	$mail = $_POST["destination"];
	$title = $_POST["subject"];
	$pseudo = $_SESSION["pseudo"];
	$user_ID = $_SESSION["user_ID"];

	include_once("../models/answerService_model.php");

} else {
	header("Location: ../vues/connexion_vue.php");
}
	?>
