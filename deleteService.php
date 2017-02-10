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
    $req = $bdd->prepare("DELETE FROM service where service_ID = :serviceID");
    $req->execute(array('serviceID' => $_GET['serviceID']));

    $data = $req->fetchAll();

}
   header('Location: servicesView.php');
?>
