<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//FR"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="fr">

<head>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Mon ptit index</title>
</head>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
</script>

<body align="center" text-align="center">
	
	<?php 
		include_once ("navbar.php"); 
	?>

  <div text-align="center" align="center" style="margin-top:5%;">

    <h1>Projet d'Aide à la Commune Imaginé et Destiné aux Néophytes, Agés et Handicapés</h1>
    <br><br>


    <a href="../controleurs/questions_controleur.php">
      <button style="font-size: 35px ! important; width: 80%; padding: 20px;" class="btn btn-success" type="button" >
      <img src="../images/search.png" style="width: 10%;height: auto;float: left">Une question ?<br>Trouvez votre réponse ici
      </button>
    </a>
    
    <br><br>

    <a href="../controleurs/services_controleur.php">
      <button style="font-size: 35px ! important; width: 80%; padding: 20px;" class="btn btn-primary" type="button" >
      <img src="../images/help.png" style="width: 10%;height: auto;float: left">
      Consultez ou déposez<br>une annonce ici, c'est gratos ;)
      </button>
    </a>

    <br><br>

  </div>

</body>
</html>