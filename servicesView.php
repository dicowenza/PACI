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
  <?php include_once ("navbar.php"); ?>

  <div align="center" style="margin-top: 15%">

    <?php

      try
      {
        $bdd = new PDO('mysql:host=dbserver;dbname=test;charset=utf8', 'jefseutin', 'jefco');
      }
      catch (Exception $e)
      {
        die('Erreur : ' . $e->getMessage());
      }

      $req = $bdd->prepare("SELECT * FROM service");
      $req->execute();
      while($row = $req->fetch(PDO::FETCH_ASSOC)) {
        $date = strtotime($row["service_date"]);
        $delay = strtotime($row["service_delay"]);
        echo '
        <div id="myModal">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" style="font-size: 23pt ! important;">'.$row["service_title"].'</h4>
              </div>
              <div class="modal-body">
                <p style="font-size: 18pt ! important;">'.$row["service_description"].'</p>
              </div>
              <div class="modal-footer">
                <p style="font-size: 13pt ! important;">Valable du '.date("d/m/y", $date).' jusqu\'au '.date("d/m/y", $delay).'</p>
              </div>
            </div>

          </div>
        </div>';
      }

    ?>

    <br>
    <button style="font-size: 35px ! important; width: 500px; height: 100px;" class="btn btn-success" type="button" data-toggle="modal" data-target="#addServiceForm" >PROPOSER MES SERVICES</button>
    <div id="addServiceForm" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="font-size: 23pt ! important;">JE ME PROPOSE</h4>
          </div>
          <div class="modal-body">
             <div>
               <form class="addService">
               <fieldset>
                <br><ul class="nav nav-list">
                 <li style="font-size: 18pt ! important;" class="nav-header"><u><b>Catégorie</b></u></li><br>
                 <li>
                    <label style="font-size: 15pt ! important;" class="radio-inline"><input type="radio" name="optradio">Aide à domicile</label>
                    <label style="font-size: 15pt ! important;" class="radio-inline"><input type="radio" name="optradio">Soins infirmiers</label>
                    <label style="font-size: 15pt ! important;" class="radio-inline"><input type="radio" name="optradio">Loisirs</label> 
                 </li><br><br>
                 <li style="font-size: 18pt ! important;" class="nav-header"><u><b>Titre</b></u></li><br>
                 <li><input style="font-size: 18pt ! important;" class="input-xlarge" type="text" name="title"></li><br><br>
                 <li style="font-size: 18pt ! important;" class="nav-header"><u><b>Description</b></u></li><br>
                 <li><textarea style="font-size: 18pt ! important;" class="input-xlarge" name="sug" rows="5"></textarea></li>
                </ul><br><br>
               </fieldset>
               </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" id="submit">Envoyer</button>
            <button href="#" class="btn btn-danger" data-dismiss="modal">Fermer</button>
          </div>
        </div>

      </div>
    </div>
    <br><br>

  </div>

</body>
</html>