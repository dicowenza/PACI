<?php
      if (isset($_SESSION["started"]) && $_SESSION["started"] == "true"){
          echo "<li><a style='font-size: 20pt ! important;' href='../controleurs/userProfil_controleur.php'><span class='glyphicon glyphicon-user'></span> ".$_SESSION["pseudo"]."</a></li>";
          echo "<li><a style='font-size: 20pt ! important;' href='d../controleurs/econnexion_controleur.php'><span class='glyphicon glyphicon-log-in'></span> Se déconnecter</a></li>";
      }else{
        echo"<li><a style='font-size: 20pt ! important;' href='inscription_vue.php'><span class='glyphicon glyphicon-user'></span> S'inscire</a></li>
        <li><a style='font-size: 20pt ! important;' href='connexion_vue.php'><span class='glyphicon glyphicon-log-in'></span> Se connecter</a></li>";
      }
      
      ?>