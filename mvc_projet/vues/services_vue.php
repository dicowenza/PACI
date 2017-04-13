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
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCNfIpY1HskI6EdkVAMVwb9QwULRc-VPUk&libraries=geometry"></script>


<script type="text/javascript">

  function calcDist(lat1,lon1,lat2,lon2){
    var p1 = new google.maps.LatLng(lat1, lon1);
    var p2 = new google.maps.LatLng(lat2, lon2);
    return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2);
  }

  function setDistance(serviceID,lat1,lon1,lat2,lon2){
    document.getElementById("dist"+serviceID).innerHTML = "A environ <b>" + calcDist(lat1,lon1,lat2,lon2) + " km</b> de votre maison";
  }

</script>


<body text-align="center">
  <?php include_once ("navbar.php"); ?>

  <div align="center">
    <h1 style="width:80%;padding:2%; background:#00B0FF;color:#37474F" align="center">CONSULTEZ LES SERVICES OU PROPOSEZ LE VOTRE</h1>
  </div>

  <div align="center">
    <div style="width:80%" class="btn-group">
      <button style="font-size: 18pt ! important; width: 100%; height: 100px;" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Recherche par catégorie
      <span class="caret"></span></button>
      <ul class="dropdown-menu" aria-labelledby="services">
         <li><a style="font-size: 18pt ! important;" href="../controleurs/services_controleur.php">Tous</a></li>
         <li><a style="font-size: 18pt ! important;" href="../controleurs/services_controleur.php?category=Aide a domicile">Aide à domicile</a></li>
         <li><a style="font-size: 18pt ! important;" href="../controleurs/services_controleur.php?category=Soins infirmiers">Soins infirmiers</a></li>
         <li><a style="font-size: 18pt ! important;" href="../controleurs/services_controleur.php?category=Loisirs">Loisirs</a></li>
      </ul>
    </div>
  </div>

  <div align="center">

    <?php

        
        for($i = 0; $i< count($_SESSION['row']); $i++ ){
        $srvc = $_SESSION['row'][$i];
        $srvcID = $srvc["service_ID"];

        $date = strtotime($srvc["service_date"]);
        $delay = strtotime($srvc["service_delay"]);
        echo '
        <div id="myModal">
          <div style="width:80%" class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">';
              $usrLogged = (isset($_SESSION["started"]) && $_SESSION["started"] == "true");
              if ($_SESSION["user_isModerator"] == 1 || ($_SESSION["user_ID"] == $srvc["service_user_ID"] && $usrLogged) || (isset($_GET["my_services"])  && $_GET["my_services"] == "true"))
                  echo '<a style="text-align:left;float:left;" href="../controleurs/deleteService_controleur.php?serviceID='.$srvcID.'"><h1  class="glyphicon glyphicon-remove-sign fa-5x"></h1></a>';
              echo '<h4 class="modal-title" style="text-align:center;font-size: 23pt ! important;">'.utf8_encode($srvc["service_title"]).'</h4>
              </div>
              <div class="modal-body">
                <p style="font-size: 18pt ! important;">'.utf8_encode($srvc["service_description"]).'</p>
              </div>
              <div class="modal-footer" style="text-align: center;">
                <a style="text-align:left;float:left;" href="#" class="btn btn-default" type="button" data-toggle="modal" data-target="#'.$srvcID.'">Contacter la personne</a>
                <span id="dist'.$srvcID.'" style="text-align:center;float:center;font-size: 13pt ! important;"></span>';
                if($usrLogged)
                  echo ('<script>setDistance('.$srvcID.','.$_SESSION["user_adrLat"].','.$_SESSION["user_adrLng"].','.$srvc["user_address_latitude"].','.$srvc["user_address_longitude"].')</script>');
                echo '<p style="text-align:right;float:right;font-size: 13pt ! important;">Valable du '.date("d/m/y", $date).' jusqu\'au '.date("d/m/y", $delay).'</p>
              </div>
            </div>

          </div>
        </div>

        <!-- Modal contacter service-->
        <div style="padding-top: 15%" id="'.$srvcID.'" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-size: 23pt ! important;">Envoyer un mail a cet utilisateur</h4>
              </div>
              <div class="modal-body">
                <p style="font-size: 18pt ! important;"><u><b>Que souhaitez vous lui dire ?</b></u><br><br>
                <form id="sendMail" method="post" action="../controleurs/answerService_controleur.php">
                  <input type="hidden" name="destination" value="'.utf8_encode($srvc["user_email"]).'">
                  <input type="hidden" name="type" value="answerService">
                  <input type="hidden" name="subject" value="Message pour votre annonce : '.utf8_encode($srvc["service_title"]).'">
                  <textarea style="font-size: 18pt ! important; width:80%;" class="input-xlarge" name="message" rows="5"></textarea>

              </div>
              <div class="modal-footer">
                <input class="btn btn-success" type="submit" value="Envoyer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              </form>
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
               <form id="addService" method="post" action="../controleurs/insertService_controleur.php">
               <fieldset>
                <br><ul class="nav nav-list">
                 <li style="font-size: 18pt ! important;" class="nav-header"><u><b>Catégorie</b></u></li><br>
                 <li>                     
                    <label style="font-size: 15pt ! important;" class="radio-inline"><input type="radio" name="category" value="Aide a domicile">Aide à domicile</label>
                    <label style="font-size: 15pt ! important;" class="radio-inline"><input type="radio" name="category" value="Soins infirmiers">Soins infirmiers</label>
                    <label style="font-size: 15pt ! important;" class="radio-inline"><input type="radio" name="category" value="Loisirs">Loisirs</label> 
                 </li><br><br>
                 <li style="font-size: 18pt ! important;" class="nav-header"><u><b>Titre</b></u></li><br>
                 <li><input style="font-size: 18pt ! important; width:80%" class="input-xlarge" type="text" name="title"></li><br><br>
                 <li style="font-size: 18pt ! important;" class="nav-header"><u><b>Description</b></u></li><br>
                 <li><textarea style="font-size: 18pt ! important; width:80%" class="input-xlarge" name="description" rows="5"></textarea></li><br>
                 <li style="font-size: 18pt ! important;" class="nav-header">Valable du <input style="font-size: 14pt; width:26%" class="input-xlarge" type="date" name="date"> au <input style="font-size: 14pt; width:26%" class="input-xlarge" type="date" name="delay"></li> 
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