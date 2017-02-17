<?php session_start(); ?>
<nav class="navbar navbar-inverse navbar-toggleable-md" style="padding : 10px">
  <div class="container-fluid">
    <div class="navbar-header">
      <a style="font-size: 20pt ! important;" class="navbar-brand" href="test_index.php">Pacidnah</a>
    </div>
    <ul class="nav navbar-nav">
      <li style="font-size: 20pt ! important;"><a href="../vues/test_index.php">Page d'accueil</a></li>
      <li><a style="font-size: 20pt ! important;" href="../vues/questionsView.php?my_questions=true"><?php if (isset($_SESSION["started"]) && $_SESSION["started"] == "true") echo 'Mes questions';/*('.$_SESSION["questions"].')' */; ?></a></li>
      <li><a style="font-size: 20pt ! important;" href="servicesView.php?my_services=true"><?php if(isset($_SESSION["started"]) && $_SESSION["started"] == "true") echo 'Mes services'/*('.$_SESSION["services"].')'*/; ?></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php
      if (isset($_SESSION["started"]) && $_SESSION["started"] == "true"){
          echo "<li><a style='font-size: 20pt ! important;' href='../../userProfile.php'><span class='glyphicon glyphicon-user'></span> ".$_SESSION["pseudo"]."</a></li>";
          echo "<li><a style='font-size: 20pt ! important;' href='../../logout.php'><span class='glyphicon glyphicon-log-in'></span> Se déconnecter</a></li>";
      }else{
        echo"<li><a style='font-size: 20pt ! important;' href='connexion_vue.php'><span class='glyphicon glyphicon-user'></span> S'inscire</a></li>
        <li><a style='font-size: 20pt ! important;' href='connexion_vue.php'><span class='glyphicon glyphicon-log-in'></span> Se connecter</a></li>";
      }
      
      ?>
    </ul>
  </div>
</nav>
