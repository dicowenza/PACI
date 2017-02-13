<?php
session_start();
if(isset($_SESSION["started"]) && $_SESSION["started"] == "true"){
  try
  {
    $bdd = new PDO('mysql:host=dbserver;dbname=test;charset=utf8', 'jefseutin', 'jefco');
  }
  catch (Exception $e)
  {
        die('Erreur : ' . $e->getMessage());
  }
    $req = $bdd->prepare("DELETE FROM faq where faq_ID = :faqID");
    $req->execute(array('faqID' => $_GET['faqID']));

    $data = $req->fetchAll();

}
   header('Location: questionsView.php');
?>
