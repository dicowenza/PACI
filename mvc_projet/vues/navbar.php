<?php session_start(); ?>
<nav class="navbar navbar-inverse navbar-toggleable-md" style="padding : 10px">
  <div class="container-fluid">
    <div class="navbar-header">
      <a style="font-size: 20pt ! important;" class="navbar-brand" href="index.php">Pacidnah</a>
    </div>
    <ul class="nav navbar-nav">
      <li style="font-size: 20pt ! important;"><a href="../vues/index.php">Page d'accueil</a></li>
      <li><a style="font-size: 20pt ! important;" href="../controleurs/my_questions_controleur.php"><?php if (isset($_SESSION["started"]) && $_SESSION["started"] == "true") echo 'Mes questions';/*('.$_SESSION["questions"].')' */; ?></a></li>
      <li><a style="font-size: 20pt ! important;" href="../controleurs/my_services_controleur.php"><?php if(isset($_SESSION["started"]) && $_SESSION["started"] == "true") echo 'Mes services'/*('.$_SESSION["services"].')'*/; ?></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php
      include_once("../controleurs/sheetofcode/test_connexion_user_controleur.php")
    ?>
    </ul>
  </div>
</nav>
