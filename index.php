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

<body text-align="center">
	
	<?php 
		include_once ("navbar.php"); 
	?>

  <div align="center" style="margin-top: 20%">

    <a href="questionsView.php"><button style="font-size: 35px ! important; width: 500px; height: 100px;" class="btn btn-success" type="button" >QUESTIONS</button></a>
    <br><br>

    <a href="servicesView.php"><button style="font-size: 35px ! important; width: 500px; height: 100px;" class="btn btn-primary" type="button" >SERVICES</button></a>
    <br><br>
    

    <!--<div class="btn-group">
      <button style="font-size: 35px ! important; width: 500px; height: 100px;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SERVICES
      <span class="caret"></span></button>
      <ul class="dropdown-menu" aria-labelledby="services">
        <li><a style="font-size: 35px ! important;" ref="#">Aide à domicile</a></li>
        <li><a style="font-size: 35px ! important;" href="#">Soins infirmiers</a></li>
        <li><a style="font-size: 35px ! important;" href="#">Loisirs</a></li>
      </ul>
    </div>-->

  </div>

</body>
</html>