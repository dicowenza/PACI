<nav class="navbar navbar-inverse" style="padding : 10px">
  <div class="container-fluid">
    <div class="navbar-header">
      <a style="font-size: 20pt ! important;" class="navbar-brand" href="index.php">Pacidnah</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active" style="font-size: 20pt ! important;"><a href="index.php">Page d'accueil</a></li>
      <li><a style="font-size: 20pt ! important;" href="#">Mes demandes(0)</a></li>
      <li><a style="font-size: 20pt ! important;" href="#">Mes offres(0)</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php
      session_start();
      if (isset($_SESSION["started"]) && $_SESSION["started"] == "true"){
          echo "<li><a style='font-size: 20pt ! important;' href='#'><span class='glyphicon glyphicon-user'></span> ".$_SESSION["pseudo"]."</a></li>";
          echo "<li><a style='font-size: 20pt ! important;' href='logout.php'><span class='glyphicon glyphicon-log-in'></span> Se déconnecter</a></li>";
      }else{
        echo"<li><a style='font-size: 20pt ! important;' href='signup.php'><span class='glyphicon glyphicon-user'></span> S'inscire</a></li>
        <li><a style='font-size: 20pt ! important;' href='login.php'><span class='glyphicon glyphicon-log-in'></span> Se connecter</a></li>";
      }
      
      ?>
    </ul>
  </div>
</nav>
