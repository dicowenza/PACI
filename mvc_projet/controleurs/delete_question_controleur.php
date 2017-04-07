<?php
session_start();
if(isset($_SESSION["started"]) && $_SESSION["started"] == "true"){
  $_SESSION["faqID"] = $_GET["faqID"];
  header('Location: ../models/delete_question_model.php');
}
   
?> 
