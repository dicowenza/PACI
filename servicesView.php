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

  <div align="center" style="margin-top: 5%">

    <?php

      try
      {
        $bdd = new PDO('mysql:host=dbserver;dbname=test;charset=utf8', 'jefseutin', 'jefco');
      }
      catch (Exception $e)
      {
        die('Erreur : ' . $e->getMessage());
      }
      if (isset($_SESSION["started"]) && isset($_GET["my_services"]) && $_SESSION["started"] == "true" && $_GET["my_services"] == "true"){
        $req = $bdd->prepare("SELECT * FROM service WHERE service_user_ID = ".$_SESSION["user_ID"]);
      } else {
        $req = $bdd->prepare("SELECT * FROM service INNER JOIN user ON user_ID = service_user_id");
      }
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
              <div class="modal-footer" style="text-align: center;">
                <a style="text-align:left;float:left;" href="#" class="btn btn-default" type="button" data-toggle="modal" data-target="#'.$row["service_ID"].'">Contacter la personne</a>
                <p style="text-align:right;float:right;font-size: 13pt ! important;">Valable du '.date("d/m/y", $date).' jusqu\'au '.date("d/m/y", $delay).'</p>
              </div>
            </div>

          </div>
        </div>

        <!-- Modal contacter service-->
        <div style="padding-top: 15%" id="'.$row["service_ID"].'" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-size: 23pt ! important;">Envoyer un mail a cet utilisateur</h4>
              </div>
              <div class="modal-body">
                <p style="font-size: 18pt ! important;"><u><b>Que souhaitez vous lui dire ?</b></u><br><br>
                <form id="sendMail" method="post" action="sendMail.php">
                  <input type="hidden" name="destination" value="jeffrey.seutin@etu.u-bordeaux.fr">
                  <input type="hidden" name="sender" value="donald@trump.com">
                  <input type="hidden" name="subject" value="Message pour votre annonce : '.$row["service_title"].'">
                  <textarea style="font-size: 18pt ! important; width:80%;" class="input-xlarge" name="message" rows="5"></textarea>
                </form>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit" form="sendMail">Envoyer</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              </div>
            </div>

          </div>
        </div>';
      }

    ?>

    <br>
    <button style="margin-bottom:50px;font-size: 35px ! important;  width: 80%; height: 10%;" class="btn btn-success" type="button" data-toggle="modal" data-target="#addServiceForm" >PROPOSER MES SERVICES</button> 
    <div id="addServiceForm" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="font-size: 23pt ! important;">JE ME PROPOSE</h4>
          </div>
          <div class="modal-body">
             <div>
               <form id="addService" method="post" action="insertService.php">
               <fieldset>
                <br><ul class="nav nav-list">
                 <li style="font-size: 18pt ! important;" class="nav-header"><u><b>Catégorie</b></u></li><br>
                 <li>                     
                    <label style="font-size: 15pt ! important;" class="radio-inline"><input type="radio" name="category">Aide à domicile</label>
                    <label style="font-size: 15pt ! important;" class="radio-inline"><input type="radio" name="category">Soins infirmiers</label>
                    <label style="font-size: 15pt ! important;" class="radio-inline"><input type="radio" name="category">Loisirs</label> 
                 </li><br><br>
                 <li style="font-size: 18pt ! important;" class="nav-header"><u><b>Titre</b></u></li><br>
                 <li><input style="font-size: 18pt ! important; width:80%" class="input-xlarge" type="text" name="title"></li><br><br>
                 <li style="font-size: 18pt ! important;" class="nav-header"><u><b>Description</b></u></li><br>
                 <li><textarea style="font-size: 18pt ! important; width:80%" class="input-xlarge" name="description" rows="5"></textarea></li>
                </ul><br><br>
               </fieldset>
               </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="submit" form="addService">Envoyer</button>
            <button href="#" class="btn btn-danger" data-dismiss="modal">Fermer</button>
          </div>
        </div>

      </div>
    </div>

  </div>

</body>
</html>