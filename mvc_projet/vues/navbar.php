<?php session_start(); ?>
<nav class="navbar navbar-inverse navbar-toggleable-md" style="padding : 10px">
  <div class="container-fluid">
    <div class="navbar-header">
      <a style="font-size: 20pt ! important;" class="navbar-brand" href="index.php">Pacidnah</a>
    </div>
    <ul class="nav navbar-nav">
      <li style="font-size: 20pt ! important;"><a href="../vues/index.php">Page d'accueil</a></li>
      <?php if(isset($_SESSION["started"]) && $_SESSION["started"] == "true"){
      echo  '<li><a style="font-size: 20pt ! important;" href="../controleurs/my_questions_controleur.php">Mes questions</a></li>
            <li><a style="font-size: 20pt ! important;" href="../controleurs/my_services_controleur.php">Mes services</a></li>';
      }?>
    </ul>
    <iframe src="http://free.timeanddate.com/clock/i5o9r1y2/n328/tlfr2/fn7/fs20/fcfff/tct/pct/ftb/tt0/th1" frameborder="0" width="398" height="31" allowTransparency="true"></iframe>
    <ul class="nav navbar-nav navbar-right">
    <?php
      include_once("../controleurs/sheetofcode/test_connexion_user_controleur.php");
    ?>
    </ul>
  </div>
</nav>
